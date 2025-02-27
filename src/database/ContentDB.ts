/**
 * 内容数据库模块
 * 
 * 该模块提供了与内容（文档、课程、元数据）相关的数据访问功能，包括获取内容列表、
 * 获取内容章节、生成内容侧边栏等功能。
 * 
 * content 目录的结构必须如下：
 * 
 * courses/
 *    zh-cn/
 *      supervisor/
 *        index.md
 *        chapter1.md
 *        chapter2.md
 *    en/
 *      supervisor/
 *        index.md
 *        chapter1.md
 *        chapter2.md
 * 
 *  blogs/
 *    zh-cn/
 *      supervisor/
 *        index.md
 *        chapter1.md
 *        chapter2.md
 *    en/
 *      supervisor/
 *        index.md
 *        chapter1.md
 *        chapter2.md
 * 
 * @module database/content
 */

import { getCollection, type CollectionEntry, type DataEntry } from 'astro:content';
import { logger } from '../utils/logger';
import { normalizeLang } from '@/utils/lang';

export default class ContentDB {

    /**
     * 获取文档集合
     * 
         * 该函数获取文档集合。
         * 
         * @returns {Promise<CollectionEntry<'content'>[]>} 返回文档集合
         */
    static async getDocsCollection(): Promise<CollectionEntry<'content'>[]> {
        return getCollection('content');
    }

    /**
     * 获取所有顶级分类
     * 
     * 该函数获取所有顶级分类，结果的例子：['courses', 'blogs']
     * 
     * @returns {Promise<string[]>} 返回所有顶级分类
         */
    static async getTopCategories(): Promise<string[]> {
        let categories: string[] = [];
        const allPosts = await ContentDB.getDocsCollection();
        allPosts.forEach((post) => {
            const category = ContentDB.getTopCategoryFromDocId(post.id);
            if (!categories.includes(category)) {
                categories.push(category);
            }
        });
        return categories;
    }

    /**
     * 获取指定顶级分类的文档
     * 
     * 该函数获取指定顶级分类的文档内容集合。
     * 
     * @param {string} category - 顶级分类，例如 'courses', 'blogs'
     * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
     * @param {number} depth - 深度，例如 1, 2, 3
     * @returns {Promise<DataEntry[]>} 返回文档集合
         */
    static async getDocsByTopCategory(category: string, lang: string, depth: number): Promise<DataEntry[]> {
        const debug = false

        if (debug) {
            logger.info(`getDocsByTopCategory, category: ${category}, lang: ${lang}`);
        }

        const allPosts = await ContentDB.getDocsCollection();
        const normalizedLang = normalizeLang(lang);

        if (debug) {
            logger.array(`getDocsByTopCategory, allPosts`, allPosts);
        }

        // id是这样的格式：courses/zh-cn/supervisor/index.md
        // 所以我们要过滤出以 {category}/{normalizedLang} 开头的文档

        const prefix = `${category}/${normalizedLang}/`;
        const filteredPosts = allPosts.filter((post) => post.id.startsWith(prefix)).filter((post) => {
            const parts = post.id.split('/');
            return parts.length <= depth + 2;
        });

        if (debug) {
            logger.array(`getDocsByTopCategory, filteredPosts`, filteredPosts);
        }

        return filteredPosts;
    }

    /**
     * 获取指定ID的文档
     * 
     * 该函数获取指定ID的文档内容。
     * 
     * @param {string} id - 文档ID, 例如 'courses/zh-cn/supervisor/index.md'
     * @returns {Promise<DataEntry>} 返回文档内容
     */
    static async getDocById(id: string): Promise<CollectionEntry<'content'>> {
        const debug = false;
        const allPosts = await ContentDB.getDocsCollection();
        const content = allPosts.find(post => post.id === id);

        if (debug) {
            logger.info(`getDocById, id: ${id}`);
            logger.info(`getDocById, content: ${content}`);
        }

        if (!content) {
            // 输出以id开头的所有文档
            const matchingPosts = allPosts.filter(post => post.id.startsWith(id));
            logger.info(`getDocById, matchingPosts: ${matchingPosts}`);

            throw new Error(`Document with ID ${id} not found`);
        }

        return content;
    }

    /**
     * 获取指定文档的父文档ID
     * 
     * 该函数获取指定文档的父文档ID。
     * 
     * @param {string} id - 文档ID, 例如 'courses/zh-cn/supervisor/index.md'
     * @returns {string} 返回父文档ID, 例如 'courses/zh-cn/supervisor'
     */
    static getParentDocId(id: string): string {
        const parts = id.split('/');
        parts.pop();
        return parts.join('/');
    }

    /**
     * 获取指定文档的父文档slug
     * 
     * 该函数获取指定文档的父文档slug。
     * 
     * @param {string} id - 文档ID, 例如 'zh-cn/courses/supervisor/index.md'
     * @returns {string} 返回父文档slug, 例如 'zh-cn/courses/supervisor'
     */
    static getParentDocSlug(slug: string): string {
        return slug.split('/').slice(0, -1).join('/');
    }

    /**
     * 获取指定slug的文档
     * 
     * 该函数获取指定slug的文档内容。
     * 
     * @param {string} slug - slug, 例如 'zh-cn/courses/supervisor/index.md'
     * @returns {Promise<DataEntry>} 返回文档内容
     */
    static async getDocBySlug(slug: string): Promise<CollectionEntry<'content'>> {
        const id = ContentDB.slugToId(slug);
        return ContentDB.getDocById(id);
    }


    /**
     * 获取指定文档的所有后代文档
     * 
     * 该函数根据指定文档ID获取所有后代文档。
     * 
     * @param {string} docId - 文档ID, 例如 'courses/zh-cn/supervisor/index.md'
     * @returns {Promise<Array>} 返回后代文档数组
     * @example
     * const descendants = await getDescendants('courses/zh-cn/supervisor/index.md');
     */
    static async getDescendants(docId: string): Promise<DataEntry[]> {
        const allPosts = await ContentDB.getDocsCollection();
        const descendantPosts = allPosts.filter(post => {
            return post.id.startsWith(docId);
        });
        return descendantPosts;
    }

    /**
     * 获取指定文档的指定级别后代文档
     * 
     * 该函数根据指定文档ID和级别获取指定级别的后代文档。
     * 
     * @param {string} docId - 文档ID, 例如 'courses/zh-cn/supervisor'
     * @param {number} level - 级别，例如 1, 2, 3
     * @returns {Promise<Array>} 返回后代文档数组
     * @example
     * const descendants = await getDescendantsByLevel('courses/zh-cn/supervisor', 2);
     */
    static async getDescendantsByLevel(docId: string, level: number): Promise<DataEntry[]> {
        const debug = false;
        if (debug) {
            logger.info(`getDescendantsByLevel, docId: ${docId}, level: ${level}`);
        }

        const currentLevel = docId.split('/').length;
        const allPosts = await ContentDB.getDocsCollection();
        const descendantPosts = allPosts.filter(post => {
            let postLevel = post.id.split('/').length;
            return (post.id.startsWith(docId) || post.id.startsWith('/' + docId)) && postLevel === currentLevel + level;
        });

        return descendantPosts;
    }

    /**
     * 获取指定文档的子文档
     * 
     * 该函数根据指定文档ID获取其子文档。
     * 
     * @param {string} docId - 文档ID, 例如 'courses/zh-cn/supervisor'
     * @returns {Promise<Array>} 返回子文档数组
     * @example
     * const children = await getChildren('courses/zh-cn/supervisor');
     */
    static async getChildren(docId: string): Promise<DataEntry[]> {
        return ContentDB.getDescendantsByLevel(docId, 1);
    }

    /**
     * 获取文档的顶级分类
     * 
     * 该函数获取文档的顶级分类。
     * 
     * @param {string} id - 文档ID, 例如 'courses/zh-cn/supervisor/index.md'
     * @returns {string} 返回文档的顶级分类，例如 'courses'
     */
    static getTopCategoryFromDocId(id: string): string {
        return id.split('/')[0];
    }

    /**
     * 获取文档的顶级分类
     * 
     * 该函数获取文档的顶级分类。
     * 
     * @param {string} slug - slug, 例如 'zh-cn/courses/supervisor/index.md'
     * @returns {string} 返回文档的顶级分类，例如 'courses'
     */
    static getTopCategoryFromSlug(slug: string): string {
        return slug.split('/')[1];
    }

    /**
     * 将slug转换为id
     * 
     * 该函数将slug转换为id。
     * 
     * @param {string} slug - slug, 例如 'zh-cn/courses/supervisor/index.md'
     * @returns {string} 返回id, 例如 'courses/zh-cn/supervisor/index.md'
     */
    static slugToId(slug: string): string {
        let lang = slug.split('/')[0];
        let category = slug.split('/')[1];
        let path = slug.split('/').slice(2).join('/');
        return `${category}/${lang}/${path}`;
    }
}