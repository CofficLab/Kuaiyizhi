import { getAllCourseItemsZhCn, getAllCourseItemsEn } from '../database/course_db';
import { logger } from '../utils/logger';
/**
 * 获取中文课程的路径
 * 
 * 该函数获取所有中文课程的路径。
 * 
 * @returns {Promise<Array>} 返回所有中文课程的路径数组
 */
export async function getPathsZhCn() {
    const debug = false;
    const courses = await getAllCourseItemsZhCn();
    const paths = courses.map((course) => ({
        params: {
            slug: course.id.replace('zh-cn/', ''),
        },
        // props: { course },
    }));

    if (debug) {
        logger.array('中文课程的路径', paths);
    }

    return paths;
}

/**
 * 获取英文课程的路径
 * 
 * 该函数获取所有英文课程的路径。
 * 
 * @returns {Promise<Array>} 返回所有英文课程的路径数组
 */
export async function getPathsEn() {
    const debug = true;
    const courses = await getAllCourseItemsEn();
    const paths = courses.map((course) => ({
        params: {
            slug: course.id.replace('en/', ''),
        },
        // props: { course },
    }));

    if (debug) {
        logger.array('英文课程的路径', paths);
    }

    return paths;
}
