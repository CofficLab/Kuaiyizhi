/**
 * 课程数据库模块
 * 
 * 课程集合的目录结构：
 * 
 * - lessions/
 *   - build_your_own_web_toolbox/
 *     - images
 *     - components
 *     - en/
 *       - index.mdx
 *       - 1.mdx
 *       - 2.mdx
 *     - zh-cn/
 *       - index.mdx
 *       - 1.mdx
 *       - 2.mdx
 *   - learn_astro/
 *     - en/
 *       - index.mdx
 *       - 1.mdx
 *       - 2.mdx
 *     - zh-cn/
 *       - index.mdx
 *       - 1.mdx
 *       - 2.mdx
 * 
 * 其中 build_your_own_web_toolbox 是一个课程，ID为 build_your_own_web_toolbox。
 * 一个课程包含了多个语言的版本，每个语言的版本又包含了多个章节。
 * 一个课程目录是一个相对独立的项目，可作为git子项目独立存储。
 * 
 * @module database/courses
 */

import { getCollection, type CollectionEntry, getEntry } from 'astro:content';
import { logger } from '@/utils/logger';

export type LessionEntry = CollectionEntry<'lession'>;

const collectionName = 'lession';

export default class LessionDB {
    /**
     * 获取文档集合，即lessions目录下的所有文件
     * 
     * @returns {Promise<LessionEntry[]>} 返回文档集合
     */
    static async getEntries(): Promise<LessionEntry[]> {
        return await getCollection(collectionName);
    }

    static async getEntry(id: string): Promise<LessionEntry | null> {
        const entry = await getEntry(collectionName, id);
        return entry || null;
    }

    /**
     * 获取指定文档的子文档, 不包括孙子文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<LessionEntry[]>} 返回子文档集合
     */
    static async getChildrenEntries(parentId: string): Promise<LessionEntry[]> {
        const parentLevel = parentId.split('/').length;
        const childrenLevel = parentLevel + 1;

        return await getCollection(collectionName,
            ({ id }) => id.startsWith(parentId) && id.split('/').length === childrenLevel);
    }

    /**
     * 获取指定文档的所有后代文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<LessionEntry[]>} 返回后代文档集合
     */
    static async getDescendantEntries(parentId: string): Promise<LessionEntry[]> {
        return await getCollection(collectionName, ({ id }) => id.startsWith(parentId));
    }

    /**
     * 获取指定深度的文档
     * 
     * @param {number} depth - 深度
     * @returns {Promise<LessionEntry[]>} 返回文档集合
     */
    static async getEntriesByDepth(depth: number): Promise<LessionEntry[]> {
        return await getCollection(collectionName, ({ id }) => id.split('/').length === depth);
    }

    /**
     * 获取指定深度和语言的文档
     * 
     * @param {number} depth - 深度
     * @param {string} lang - 语言
     * @returns {Promise<LessionEntry[]>} 返回文档集合
     */
    static async getEntriesByDepthAndLang(depth: number, lang: string): Promise<LessionEntry[]> {
        return await getCollection(collectionName, ({ id }) => id.split('/').length === depth && id.endsWith(lang));
    }

    /**
     * 获取指定文档的所有后代文档, 不包括孙子文档
     * 
     * @param {string} parentId - 父文档ID
     * @param {number} depth - 深度
     * @returns {Promise<LessionEntry[]>} 返回后代文档集合
     */
    static async getDescendantEntriesByDepth(parentId: string, depth: number): Promise<LessionEntry[]> {
        return await getCollection(collectionName, ({ id }) => id.startsWith(parentId) && id.split('/').length === depth);
    }

    /**
     * 获取所有课程的ID
     * 
     * 例如：
     * 
     * - lessions/
     *   - build_your_own_web_toolbox/
     *   - learn_astro/
     * 
     * 会返回：
     * 
     * ['build_your_own_web_toolbox', 'learn_astro']
     * 
     * @returns {Promise<string[]>} 返回一级文件夹名称数组
     */
    static async getLessionIds(): Promise<string[]> {
        const debug = true;
        if (debug) {
            logger.info(`getLessionIds`);
        }

        // 不必遍历所有文档，只需获取部分较浅的文档
        //  - build_your_own_web_toolbox/zh-cn
        //  - build_your_own_web_toolbox/en
        //  - learn_astro/zh-cn
        //  - learn_astro/en
        //  - ...
        // 因为从这样的文档中，可以获取到课程ID，如：build_your_own_web_toolbox
        const lowLevelEntries = await getCollection(collectionName, (entry) => {
            return entry.id.split('/').length <= 2;
        });

        // 创建一个集合来存储课程ID
        const ids = new Set<string>();

        // 遍历所有较浅的课程文档
        lowLevelEntries.forEach(entry => {
            const parts = entry.id.split('/');
            if (parts.length > 0) {
                // 添加第一级目录名到集合中
                ids.add(parts[0]);
            }
        });

        if (debug) {
            logger.array('LessionDB.getLessionIds', Array.from(ids));
        }

        // 将集合转换为数组并返回
        return Array.from(ids);
    }
}