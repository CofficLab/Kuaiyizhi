import { type CollectionEntry } from 'astro:content';
import BaseDB from './BaseDB';
import LessonDoc from '@/models/LessonDoc';
import { logger } from '@/utils/logger';

const COLLECTION_NAME = 'lessons' as const;
export type LessonEntry = CollectionEntry<typeof COLLECTION_NAME>;

/**
 * 课程数据库类，用于管理课程内容集合。
 * 继承自 BaseDB，提供课程章节相关的特定功能。
 * 
 * 使用方法：
 * ```typescript
 * // 获取数据库实例
 * const db = LessonDB.getInstance();
 * 
 * // 获取所有课程ID
 * const ids = await db.getLessonIds();
 * 
 * // 获取指定深度和语言的课程
 * const lessons = await db.getEntriesByDepthAndLang(2, 'zh-cn');
 * ```
 * 
 * 目录结构：
 * ```
 * lessons/
 * ├── build_your_own_web_toolbox/      # 课程目录
 * │   ├── images/                      # 课程图片资源
 * │   ├── components/                  # 课程组件
 * │   ├── en/                         # 英文版本
 * │   │   ├── index.mdx               # 课程首页
 * │   │   ├── 1.mdx                   # 第一章
 * │   │   └── 2.mdx                   # 第二章
 * │   └── zh-cn/                      # 中文版本
 * │       ├── index.mdx               # 课程首页
 * │       ├── 1.mdx                   # 第一章
 * │       └── 2.mdx                   # 第二章
 * └── learn_astro/                    # 另一个课程
 *     ├── en/
 *     │   ├── index.mdx
 *     │   ├── 1.mdx
 *     │   └── 2.mdx
 *     └── zh-cn/
 *         ├── index.mdx
 *         ├── 1.mdx
 *         └── 2.mdx
 * ```
 * 
 * 说明：
 * - 每个课程（如 build_your_own_web_toolbox）是一个独立的目录
 * - 课程目录可以包含多语言版本（en, zh-cn 等）
 * - 每个语言版本包含完整的课程内容
 * - 课程目录可以作为 git 子模块独立管理
 */
export default class LessonDB extends BaseDB<typeof COLLECTION_NAME, LessonEntry, LessonDoc> {
    protected collectionName = COLLECTION_NAME;

    protected createDoc(entry: LessonEntry): LessonDoc {
        return new LessonDoc(entry);
    }

    /**
     * 获取指定深度和语言的文档
     * 
     * @param {number} depth - 深度
     * @param {string} lang - 语言代码
     * @returns {Promise<LessonDoc[]>} 返回文档集合
     */
    async getEntriesByDepthAndLang(depth: number, lang: string): Promise<LessonDoc[]> {
        const docs = await this.getDocsByDepth(depth);
        return docs.filter(doc => doc.getId().startsWith(lang));
    }

    /**
     * 获取所有课程ID
     * 
     * @returns {Promise<string[]>} 返回课程ID集合
     */
    async getLessonIds(): Promise<string[]> {
        const docs = await this.allTopLevelDocs();
        return docs.map(doc => doc.getId());
    }

    // 静态工厂方法
    private static instance: LessonDB | null = null;

    static getInstance(): LessonDB {
        if (!LessonDB.instance) {
            LessonDB.instance = new LessonDB();
        }
        return LessonDB.instance;
    }

    static async allTopLevelDocs(): Promise<LessonDoc[]> {
        const db = LessonDB.getInstance();
        return await db.allTopLevelDocs();
    }

    static async allLessons(lang: string): Promise<LessonDoc[]> {
        const db = LessonDB.getInstance();
        const docs = await db.allTopLevelDocs();

        return docs.filter(doc => doc.getId().endsWith(lang));
    }

    static async getStaticPaths() {
        const debug = false;
        const db = LessonDB.getInstance();
        const docs = await db.getEntries();

        if (debug) {
            logger.array('所有文档', docs);
        }

        const paths = docs.map((doc) => {
            const id = doc.id;
            const lang = id.split('/')[1];

            let slug = '';
            if (id.endsWith(lang)) {
                slug = id.replace(`${lang}`, '');
            } else {
                slug = id.replace(`${lang}/`, '');
            }

            return {
                params: {
                    lang: lang,
                    slug: slug,
                },
            };
        });

        if (debug) {
            logger.array('所有文档的路径', paths);
        }

        return paths;
    }
}