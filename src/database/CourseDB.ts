import CourseDoc from "@/models/CourseDoc";
import { type CollectionEntry } from "astro:content";
import BaseDB from "./BaseDB";
const COLLECTION_NAME = 'courses' as const;
export type CourseEntry = CollectionEntry<typeof COLLECTION_NAME>;

/**
 * 课程数据库类，用于管理课程内容集合。
 * 继承自 BaseDB，提供课程相关的特定功能。
 * 
 * 使用方法：
 * ```typescript
 * // 获取数据库实例
 * const db = CourseDB.getInstance();
 * 
 * // 获取中文精选课程
 * const courses = await db.getFamousCourses('zh-cn');
 * 
 * // 获取课程详情
 * const course = await db.find('zh-cn/web-development');
 * ```
 * 
 * 目录结构：
 * ```
 * courses/
 * ├── zh-cn/
 * │   ├── web-development/
 * │   │   ├── index.md
 * │   │   ├── chapter1.md
 * │   │   └── chapter2.md
 * │   └── mobile-dev/
 * │       ├── index.md
 * │       └── ...
 * └── en/
 *     └── ...
 * ```
 */
export default class CourseDB extends BaseDB<typeof COLLECTION_NAME, CourseEntry, CourseDoc> {
    protected collectionName = COLLECTION_NAME;

    protected createDoc(entry: CourseEntry): CourseDoc {
        return new CourseDoc(entry);
    }

    /**
     * 获取精选课程
     * 返回指定语言的前4个顶级课程文档
     * 
     * @param lang - 语言代码（如 'zh-cn', 'en'）
     * @returns 返回精选课程文档数组（最多4个）
     * @example
     * ```typescript
     * const courses = await db.getFamousCourses('zh-cn');
     * // 返回格式：[CourseDoc, CourseDoc, CourseDoc, CourseDoc]
     * ```
     */
    async getFamousCourses(lang: string): Promise<CourseDoc[]> {
        const courses = await this.allTopLevelDocsByLang(lang);
        return courses.slice(0, 4);
    }

    // 静态工厂方法
    private static instance: CourseDB | null = null;

    /**
     * 获取 CourseDB 的单例实例
     * @returns CourseDB 实例
     */
    static getInstance(): CourseDB {
        if (!CourseDB.instance) {
            CourseDB.instance = new CourseDB();
        }
        return CourseDB.instance;
    }

    /**
     * 获取指定语言的所有顶级课程
     * 静态方法版本，内部使用单例实例
     * 
     * @param lang - 语言代码
     * @returns 返回指定语言的顶级课程数组
     */
    static async allTopLevelDocsByLang(lang: string): Promise<CourseDoc[]> {
        const db = CourseDB.getInstance();
        return await db.allTopLevelDocsByLang(lang);
    }

    /**
     * 获取用于 Astro 静态路由生成的路径参数
     * 静态方法版本，内部使用单例实例
     * 
     * @returns 返回路径参数数组
     */
    static async getStaticPaths(): Promise<{ params: { lang: string, slug: string } }[]> {
        const db = CourseDB.getInstance();
        return await db.getStaticPaths();
    }

    /**
     * 根据ID查找课程文档
     * 静态方法版本，内部使用单例实例
     * 
     * @param id - 课程文档ID
     * @returns 返回找到的课程文档，如果不存在则返回null
     */
    static async find(id: string): Promise<CourseDoc | null> {
        const db = CourseDB.getInstance();
        return await db.find(id);
    }

    /**
     * 获取精选课程
     * 静态方法版本，内部使用单例实例
     * 
     * @param lang - 语言代码
     * @returns 返回精选课程文档数组
     */
    static async getFamousCourses(lang: string): Promise<CourseDoc[]> {
        const db = CourseDB.getInstance();
        return await db.getFamousCourses(lang);
    }
}