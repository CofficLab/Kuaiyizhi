/**
 * 课程数据库模块
 * 
 * 该模块提供了与课程内容相关的数据访问功能，包括获取课程列表、
 * 获取课程章节、生成课程侧边栏等功能。
 * 
 * @module database/courses
 */

import ContentDB from './ContentDB';
import { Course } from '@/models/Course';
export default class CourseDB {

    /**
     * 获取所有顶级课程
    * 
    * 该函数获取所有课程内容集合，并过滤出一级目录的课程（即路径中只有一个斜杠的课程）。
    * 
    * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
    * @returns {Promise<Array>} 返回顶级课程数组
    * @example
    * const topLevelCourses = await getCourses();
    */
    static async getCourses(lang: string): Promise<Course[]> {
        const courses = await ContentDB.getDocsByTopCategory('courses', lang, 1);
        return courses.map((course) => Course.fromDataEntry(course));
    }
}