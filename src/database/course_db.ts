/**
 * 课程数据库模块
 * 
 * 该模块提供了与课程内容相关的数据访问功能，包括获取课程列表、
 * 获取课程章节、生成课程侧边栏等功能。
 * 
 * @module database/courses
 */

import { type DataEntry } from 'astro:content';
import { getDocsByTopCategory } from './content_db';

/**
 * 获取所有顶级课程
 * 
 * 该函数获取所有课程内容集合，并过滤出一级目录的课程（即路径中只有一个斜杠的课程）。
 * 
 * @returns {Promise<Array>} 返回顶级课程数组
 * @example
 * const topLevelCourses = await getCourses();
 */
export async function getCourses(): Promise<DataEntry[]> {
    return getDocsByTopCategory('courses', 'zh-cn', 1);
}