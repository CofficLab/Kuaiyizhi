import BlogDoc from "@/models/BlogDoc";
import type Tag from "@/models/Tag";
import { logger } from "@/utils/logger";
import { getCollection, getEntry, type CollectionEntry } from "astro:content";
import BaseDB from "./BaseDB";

const collectionName = 'blogs';

/**
 * 博客数据库类，用于管理博客内容集合。
 * 继承自 BaseDB，提供博客和标签相关的特定功能。
 * 
 * 使用方法：
 * ```typescript
 * // 获取数据库实例
 * const db = BlogDB.getInstance();
 * 
 * // 获取所有中文标签
 * const tags = await db.getTagsByLang('zh-cn');
 * 
 * // 获取指定标签的博客文章
 * const posts = await db.getBlogsByTag('typescript', 'zh-cn');
 * ```
 * 
 * 目录结构：
 * ```
 * blogs/
 * ├── zh-cn/
 * │   ├── typescript-intro/
 * │   │   ├── index.md      # 文章内容
 * │   │   └── images/       # 文章相关图片
 * │   └── web-performance/
 * │       ├── index.md
 * │       └── ...
 * └── en/
 *     └── ...
 * ```
 */
export type BlogEntry = CollectionEntry<'blogs'>;

export default class BlogDB extends BaseDB<'blogs', BlogEntry, BlogDoc> {
    protected collectionName = 'blogs' as const;

    protected createDoc(entry: BlogEntry): BlogDoc {
        return BlogDoc.fromEntry(entry);
    }

    /**
     * 获取指定深度的文档
     * 
     * @param {number} depth - 深度
     * @returns {Promise<BlogDoc[]>} 返回文档集合
     */
    static async getDocsByDepth(depth: number): Promise<BlogDoc[]> {
        const entries = await getCollection(collectionName, ({ id }) => id.split('/').length === depth);
        return entries
            .map(entry => BlogDoc.fromEntry(entry))
            .sort((a, b) => b.getDate().getTime() - a.getDate().getTime());
    }

    static async find(id: string): Promise<BlogDoc | null> {
        const entry = await getEntry(collectionName, id);
        return entry ? new BlogDoc(entry) : null;
    }

    /**
     * 获取指定文档的子文档, 不包括孙子文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<BlogDoc[]>} 返回子文档集合
     */
    static async getChildren(parentId: string): Promise<BlogDoc[]> {
        const parentLevel = parentId.split('/').length;
        const childrenLevel = parentLevel + 1;

        const entries = await getCollection(collectionName,
            ({ id }) => id.startsWith(parentId) && id.split('/').length === childrenLevel);
        return entries.map(entry => BlogDoc.fromEntry(entry));
    }

    /**
     * 获取指定文档的所有后代文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<BlogDoc[]>} 返回后代文档集合
     */
    static async getDescendantDocs(parentId: string): Promise<BlogDoc[]> {
        const entries = await getCollection(collectionName, ({ id }) => id.startsWith(parentId));
        return entries.map(entry => BlogDoc.fromEntry(entry));
    }

    static async allTopLevelDocs(): Promise<BlogDoc[]> {
        const debug = false
        const entries = await BlogDB.getDocsByDepth(2);

        if (debug) {
            logger.array('所有顶级博客文档', entries);
        }

        return entries;
    }

    static async allTopLevelDocsByLang(lang: string): Promise<BlogDoc[]> {
        const docs = await BlogDB.getDocsByDepth(2);
        const filteredEntries = docs.filter(doc => doc.getId().startsWith(lang));

        return filteredEntries;
    }

    static async getStaticPaths() {
        const debug = false;
        const docs = await BlogDB.getDescendantDocs('');

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
            logger.array('所有博客文档的路径', paths);
        }

        return paths;
    }

    /**
     * 获取所有博客标签
     * 标签会根据语言和名称去重，使用复合键 "lang:name" 确保唯一性
     * 
     * @returns 返回所有标签数组
     * @example
     * ```typescript
     * const tags = await db.getTags();
     * // 返回格式：
     * // [
     * //   { name: 'typescript', lang: 'zh-cn', count: 5 },
     * //   { name: 'javascript', lang: 'en', count: 3 }
     * // ]
     * ```
     */
    async getTags(): Promise<Tag[]> {
        const tagsMap = new Map<string, Tag>();
        const posts = await this.allTopLevelDocs();

        posts.forEach(post => {
            post.getTags().forEach(tag => {
                const key = `${tag.lang}:${tag.name}`;
                if (!tagsMap.has(key)) {
                    tagsMap.set(key, tag);
                }
            });
        });

        return Array.from(tagsMap.values());
    }

    /**
     * 获取指定语言的博客标签
     * 
     * @param lang - 语言代码（如 'zh-cn', 'en'）
     * @returns 返回指定语言的标签数组
     * @example
     * ```typescript
     * const tags = await db.getTagsByLang('zh-cn');
     * // 返回该语言下的所有唯一标签
     * ```
     */
    async getTagsByLang(lang: string): Promise<Tag[]> {
        const debug = false;
        const tagsMap = new Map<string, Tag>();
        const posts = await this.allTopLevelDocsByLang(lang);

        if (debug) {
            logger.array("posts", posts);
        }

        if (posts.length === 0) {
            return [];
        }

        posts.forEach(post => {
            post.getTags().forEach(tag => {
                const key = `${tag.lang}:${tag.name}`;
                if (!tagsMap.has(key)) {
                    tagsMap.set(key, tag);
                }
            });
        });

        if (debug) {
            logger.array("tags", Array.from(tagsMap.values()));
        }

        return Array.from(tagsMap.values());
    }

    /**
     * 获取指定标签和语言的博客文章
     * 
     * @param tag - 标签名称
     * @param lang - 语言代码
     * @returns 返回匹配的博客文档数组
     * @example
     * ```typescript
     * const posts = await db.getBlogsByTag('typescript', 'zh-cn');
     * // 返回所有包含 'typescript' 标签的中文博客
     * ```
     */
    async getBlogsByTag(tag: string, lang: string): Promise<BlogDoc[]> {
        const posts = await this.allTopLevelDocsByLang(lang);
        return posts.filter(post => post.getTags().some(t => t.name === tag));
    }

    /**
     * 获取标签的静态路径参数
     * 用于生成标签页面的路由
     * 
     * @returns 返回所有标签的路径参数数组
     * @example
     * ```typescript
     * const paths = await db.getTagsStaticPaths();
     * // 返回格式：
     * // [
     * //   { params: { lang: 'zh-cn', name: 'typescript' } },
     * //   { params: { lang: 'en', name: 'javascript' } }
     * // ]
     * ```
     */
    async getTagsStaticPaths() {
        const debug = false;
        const tags = await this.getTags();

        let paths = tags.map((tag) => {
            return {
                params: {
                    lang: tag.lang,
                    name: tag.name,
                },
            };
        });

        if (debug) {
            logger.array('所有的标签路径', paths);
        }

        return paths;
    }

    // 静态工厂方法
    private static instance: BlogDB | null = null;

    /**
     * 获取 BlogDB 的单例实例
     * @returns BlogDB 实例
     */
    static getInstance(): BlogDB {
        if (!BlogDB.instance) {
            BlogDB.instance = new BlogDB();
        }
        return BlogDB.instance;
    }

    /**
     * 获取指定标签和语言的博客文章
     * 静态方法版本，内部使用单例实例
     * 
     * @param tag - 标签名称
     * @param lang - 语言代码
     * @returns 返回匹配的博客文档数组
     */
    static async getBlogsByTag(tag: string, lang: string): Promise<BlogDoc[]> {
        const db = BlogDB.getInstance();
        return await db.getBlogsByTag(tag, lang);
    }

    /**
     * 获取指定语言的博客标签
     * 静态方法版本，内部使用单例实例
     * 
     * @param lang - 语言代码
     * @returns 返回指定语言的标签数组
     */
    static async getTagsByLang(lang: string): Promise<Tag[]> {
        const db = BlogDB.getInstance();
        return await db.getTagsByLang(lang);
    }
}