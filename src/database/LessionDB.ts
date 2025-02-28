/**
 * 课程数据库模块
 * 
 * 该模块提供了与课程内容相关的数据访问功能，包括获取课程列表、
 * 获取课程章节、生成课程侧边栏等功能。
 * 
 * @module database/courses
 */

import { getCollection, type CollectionEntry, type DataEntry } from 'astro:content';
import { Lession } from '@/models/Lession';
import { logger } from '@/utils/logger';
export default class LessionDB {
    /**
     * 获取文档集合
     * 
    * 该函数获取文档集合。
    * 
    * @returns {Promise<CollectionEntry<'content'>[]>} 返回文档集合
    */
    static async getLessionCollection(): Promise<CollectionEntry<'lession'>[]> {
        return await getCollection('lession');
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
        const allPosts = await this.getLessionCollection();
        const descendantPosts = allPosts.filter(post => {
            return post.id.startsWith(docId);
        });
        return descendantPosts;
    }

    /**
     * 获取指定深度后代文档
     * 
     * 该函数根据指定深度获取指定深度的后代文档。
     * 
     * @param {number} depth - 深度，例如 1, 2, 3
     * @returns {Promise<Array>} 返回后代文档数组
     * @example
     * const descendants = await getDocsByDepth(2);
     */
    static async getDocsByDepth(depth: number): Promise<DataEntry[]> {
        const debug = false;
        if (debug) {
            logger.info(`getDocsByDepth, depth: ${depth}`);
        }

        const allPosts = await this.getLessionCollection();
        const descendantPosts = allPosts.filter(post => {
            let postLevel = post.id.split('/').length;
            return postLevel === depth;
        });

        return descendantPosts;
    }

    /**
    * 获取所有课程
    * 
    * @returns {Promise<Array>} 返回课程数组
    */
    static async getAllLessions(): Promise<Lession[]> {
        const lessions = await this.getDocsByDepth(2);
        return lessions.map((lession) => Lession.fromDataEntry(lession));
    }
}