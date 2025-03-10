import MetaDoc from "@/models/MetaDoc";
import { logger } from "@/utils/logger";
import { getCollection, getEntry, type CollectionEntry } from "astro:content";
import BaseDB from "./BaseDB";

const COLLECTION_NAME = 'meta' as const;

export type MetaEntry = CollectionEntry<typeof COLLECTION_NAME>;

/**
 * 元数据数据库类，用于管理网站的元数据内容集合（如"关于我们"等页面）。
 * 继承自 BaseDB，提供元数据页面的特定功能。
 * 
 * 使用方法：
 * ```typescript
 * // 获取数据库实例
 * const db = MetaDB.getInstance();
 * 
 * // 获取中文页面
 * const pages = await db.allTopLevelDocsByLang('zh-cn');
 * 
 * // 获取特定页面的兄弟页面
 * const siblings = await db.getSiblingDocs('zh-cn/about');
 * ```
 * 
 * 目录结构：
 * ```
 * meta/
 * ├── zh-cn/                          # 中文内容
 * │   ├── about.md                    # 关于我们
 * │   ├── advice.md                   # 建议
 * │   ├── our-story.md               # 我们的故事
 * │   ├── privacy.md                  # 隐私政策
 * │   ├── tech-evolution.md          # 技术演进
 * │   ├── tech-stack.md              # 技术栈
 * │   ├── terms.md                    # 服务条款
 * │   └── works.md                    # 作品展示
 * └── en/                            # 英文内容
 *     ├── about.md
 *     ├── privacy.md
 *     └── terms.md
 * ```
 * 
 * 说明：
 * - 按语言分类组织内容（en, zh-cn 等）
 * - 每个页面都是独立的 Markdown 文件
 * - 支持多语言版本的内容管理
 * - 适用于网站的静态页面和元数据内容
 */
export default class MetaDB extends BaseDB<typeof COLLECTION_NAME, MetaEntry, MetaDoc> {
    protected collectionName = COLLECTION_NAME;

    protected createDoc(entry: MetaEntry): MetaDoc {
        return new MetaDoc(entry);
    }

    /**
     * 获取指定深度的文档
     * 
     * @param {number} depth - 深度
     * @returns {Promise<LessonEntry[]>} 返回文档集合
     */
    static async getDocsByDepth(depth: number): Promise<MetaDoc[]> {
        const entries = await getCollection(COLLECTION_NAME, ({ id }) => id.split('/').length === depth);
        return entries.map(entry => MetaDoc.fromEntry(entry));
    }

    static async find(id: string): Promise<MetaDoc | null> {
        const debug = false

        if (debug) {
            logger.info(`MetaDB: 获取元数据文档: ${id}`);
        }

        const entry = await getEntry(COLLECTION_NAME, id);
        return entry ? new MetaDoc(entry) : null;
    }

    /**
     * 获取指定文档的子文档, 不包括孙子文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<MetaDoc[]>} 返回子文档集合
     */
    static async getChildren(parentId: string): Promise<MetaDoc[]> {
        const parentLevel = parentId.split('/').length;
        const childrenLevel = parentLevel + 1;

        const entries = await getCollection(COLLECTION_NAME,
            ({ id }) => id.startsWith(parentId) && id.split('/').length === childrenLevel);
        return entries.map(entry => MetaDoc.fromEntry(entry));
    }

    /**
     * 获取指定文档的兄弟文档
     * 例如：对于 'zh-cn/about'，会返回 'zh-cn' 下的其他文档
     * 
     * @param targetId - 目标文档ID
     * @returns 返回兄弟文档数组（不包括目标文档本身）
     * @example
     * ```typescript
     * const siblings = await db.getSiblingDocs('zh-cn/about');
     * // 返回如：['zh-cn/contact', 'zh-cn/privacy'] 对应的文档
     * ```
     */
    async getSiblingDocs(targetId: string): Promise<MetaDoc[]> {
        const docs = await this.allTopLevelDocs();
        return docs.filter(doc => doc.getId() !== targetId);
    }

    /**
     * 获取指定文档的所有后代文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<CourseDoc[]>} 返回后代文档集合
     */
    static async getDescendantDocs(parentId: string): Promise<MetaDoc[]> {
        const entries = await getCollection(COLLECTION_NAME, ({ id }) => id.startsWith(parentId));
        return entries.map(entry => MetaDoc.fromEntry(entry));
    }

    static async allTopLevelDocs(): Promise<MetaDoc[]> {
        const debug = false
        const entries = await MetaDB.getDocsByDepth(2);

        if (debug) {
            logger.array('所有顶级文档', entries);
        }

        return entries;
    }

    static async allTopLevelDocsByLang(lang: string): Promise<MetaDoc[]> {
        const docs = await MetaDB.getDocsByDepth(2);
        const filteredEntries = docs.filter(doc => doc.getId().startsWith(lang));

        return filteredEntries;
    }

    static async getFamousCourses(lang: string): Promise<MetaDoc[]> {
        const instance = new MetaDB();
        const courses = await instance.allTopLevelDocsByLang(lang);
        return courses.slice(0, 4);
    }

    static async getStaticPaths() {
        const debug = false;
        const docs = await MetaDB.getDescendantDocs('');

        // DocId 的格式为 courses/zh-cn/supervisor/index.md
        // 需要转换为 /zh-cn/courses/supervisor/index.md

        const paths = docs.map((doc) => {
            return {
                params: {
                    lang: doc.getLang(),
                    slug: doc.getSlug(),
                },
            };
        });

        if (debug) {
            logger.array('所有元数据文档的路径', paths);
        }

        return paths;
    }

    // 静态工厂方法
    private static instance: MetaDB | null = null;

    /**
     * 获取 MetaDB 的单例实例
     * @returns MetaDB 实例
     */
    static getInstance(): MetaDB {
        if (!MetaDB.instance) {
            MetaDB.instance = new MetaDB();
        }
        return MetaDB.instance;
    }
}