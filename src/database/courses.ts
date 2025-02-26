/**
 * 课程数据库模块
 * 
 * 该模块提供了与课程内容相关的数据访问功能，包括获取课程列表、
 * 获取课程章节、生成课程侧边栏等功能。
 * 
 * @module database/courses
 */

import { getCollection, type DataEntry } from 'astro:content';
import { logger } from '../utils/logger';
import SidebarItem from '@/models/SidebarItem';

/**
 * 获取指定语言的所有课程项目
 * 
 * 该函数获取指定语言的所有课程内容集合。
 * 
 * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
 * @returns {Promise<Array>} 返回所有课程项目数组
 */
async function getAllCourseItems(lang: string) {
    const parsedLang = lang.replace('zh-CN', 'zh-cn');

    const allPosts = await getCollection('courses');
    return allPosts.filter((post) => post.id.startsWith(parsedLang));
}

/**
 * 获取中文课程的所有项目
 * 
 * 该函数获取所有中文课程内容集合。
 * 
 * @returns {Promise<Array>} 返回所有中文课程项目数组
 */
async function getAllCourseItemsZhCn() {
    return getAllCourseItems('zh-cn');
}

/**
 * 获取英文课程的所有项目
 * 
 * 该函数获取所有英文课程内容集合。
 * 
 * @returns {Promise<Array>} 返回所有英文课程项目数组
 */
async function getAllCourseItemsEn() {
    return getAllCourseItems('en');
}

async function getCourseBySlug(slug: string, lang: string) {
    const debug = true;
    const id = `${lang}/${slug}`;
    const allPosts = await getCollection('courses');
    const course = allPosts.find(post => post.id === id);

    if (debug) {
        logger.info(`getCourseBySlug, slug: ${slug}`);
        logger.info(`getCourseBySlug, id: ${id}`);
        logger.info(`getCourseBySlug, course: ${course}`);
    }
    return course;
}

/**
 * 获取所有顶级课程
 * 
 * 该函数获取所有课程内容集合，并过滤出一级目录的课程（即路径中只有一个斜杠的课程）。
 * 
 * @returns {Promise<Array>} 返回顶级课程数组
 * @example
 * const topLevelCourses = await getCourses();
 */
async function getCourses() {
    // 获取所有文章
    const allPosts = await getCollection('courses');
    // 获取一级目录的文章
    const topLevelPosts = allPosts.filter(post => {
        // slug 格式例如: "blog/astro" 或 "guide/start"
        // 统计斜杠的数量来判断层级
        return post.id.split('/').length === 2;
    });

    return topLevelPosts;
}

/**
 * 获取指定课程的所有后代课程
 * 
 * 该函数根据指定课程ID获取所有后代课程。
 * 
 * @param {string} courseId - 课程ID
 * @returns {Promise<Array>} 返回后代课程数组
 * @example
 * const descendants = await getDescendants('zh-cn/astro');
 */
async function getDescendants(courseId: string) {
    const allPosts = await getCollection('courses');
    const descendantPosts = allPosts.filter(post => {
        return post.id.startsWith(courseId);
    });
    return descendantPosts;
}

/**
 * 获取所有章节ID和标题
 * 
 * 该函数根据指定语言获取所有课程章节的ID和标题。
 * 
 * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
 * @returns {Promise<Array<{id: string, title: string}>>} 返回包含章节ID和标题的对象数组
 * @example
 * // 返回的格式是：
 * // [
 * //     {
 * //         id: 'zh-cn/courses/supervisor',
 * //         title: 'Supervisor 完全指南：进程管理利器',
 * //     },
 * // ]
 * const chapters = await getChapterIdsAndTitles('zh-cn');
 */
const getChapterIdsAndTitles = async (lang: string): Promise<{ id: string, title: string }[]> => {
    // 如果lang=zh-CN，lang=zh-cn，都转换成lang=zh-cn
    lang = lang.replace('zh-CN', 'zh-cn');

    logger.info(`getChapterIdsAndTitles for lang: ${lang}`);

    const courses = await getCourses();
    const items = courses.filter((course) => course.id.startsWith(lang)).map((course) => ({
        id: course.id,
        title: course.data.title || '',
    }));

    logger.info(`getChapterIdsAndTitles, total: ${courses.length}`);
    logger.array(`getChapterIdsAndTitles, subset`, items.slice(0, 2));

    return items;
}

/**
 * 获取课程侧边栏项目
 * 
 * 该函数根据指定语言获取所有课程的侧边栏项目。
 * 
 * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
 * @returns {Promise<Array<SidebarItem>>} 返回侧边栏项目数组
 * @example
 * const sidebarItems = await getCourseSidebarItems('zh-cn');
 */
const getCourseSidebarItems = async (lang: string): Promise<SidebarItem[]> => {
    const chapterIdsAndTitles = await getChapterIdsAndTitles(lang);
    return chapterIdsAndTitles.map((chapterIdAndTitle) => {
        return SidebarItem.withLabel(chapterIdAndTitle.title)
            .setLink(makeLinkWithoutLang(chapterIdAndTitle.id));
    });
}

/**
 * 获取特定课程的章节侧边栏
 * 
 * 该函数根据指定语言和课程ID获取特定课程的章节侧边栏项目。
 * 
 * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
 * @param {string} courseId - 课程ID
 * @returns {Promise<Array<SidebarItem>>} 返回侧边栏项目数组
 * @example
 * const chapters = await getChapters('zh-cn', 'astro');
 */
const getChapters = async (lang: string, courseId: string): Promise<SidebarItem[]> => {
    const debug = true;
    const parsedLang = lang.replace('zh-CN', 'zh-cn');
    const realCourseId = `${parsedLang}/${courseId}`;

    if (debug) {
        logger.info(`getChapters for lang: ${parsedLang}, courseId: ${courseId}`);
        logger.info(`realCourseId: ${realCourseId}`);
    }

    const descendants = await getDescendants(realCourseId);
    const chapters = descendants.map((descendant) => {
        return {
            id: descendant.id,
            title: descendant.data.title || '',
        };
    });

    if (!chapters) {
        return [];
    }

    return chapters.map((chapter) => {
        return SidebarItem.withLabel(chapter.title)
            .setLink(makeLinkWithoutLang(chapter.id));
    });
}

/**
 * 获取中文课程的章节侧边栏
 * 
 * 该函数获取中文课程的章节侧边栏项目。
 * 
 * @param {string} courseId - 课程ID
 * @returns {Promise<Array<SidebarItem>>} 返回侧边栏项目数组
 */
const getChaptersZhCn = async (courseId: string): Promise<SidebarItem[]> => {
    return getChapters('zh-cn', courseId);
}

/**
 * 获取英文课程的章节侧边栏
 * 
 * 该函数获取英文课程的章节侧边栏项目。
 * 
 * @param {string} courseId - 课程ID
 */
const getChaptersEn = async (courseId: string): Promise<SidebarItem[]> => {
    return getChapters('en', courseId);
}

/**
 * 根据ID生成链接
 * 
 * 该函数根据课程ID生成对应的链接路径。
 * 
 * @param {string} id - 课程ID
 * @param {boolean} [withLang=true] - 是否包含语言前缀
 * @returns {string} 返回生成的链接路径
 * @example
 * // 例如：
 * // id=zh-cn/supervisor，则返回/zh-cn/courses/supervisor
 * // id=en/supervisor，则返回/en/courses/supervisor
 * const link = makeLink('zh-cn/supervisor');
 */
function makeLink(id: string, withLang: boolean = true): string {
    let lang = id.split('/')[0];
    let path = id.split('/').slice(1).join('/');

    let link = `/${withLang ? lang : ''}/courses/${path}`;

    // 如果开头有多个 /，则去掉
    link = link.replace(/\/+/g, '/');

    return link;
}

/**
 * 根据ID生成不带语言的链接
 * 
 * 该函数根据课程ID生成不带语言前缀的链接路径。
 * 
 * @param {string} id - 课程ID
 * @returns {string} 返回生成的不带语言前缀的链接路径
 * @example
 * // 例如：
 * // id=zh-cn/supervisor，则返回/courses/supervisor
 * // id=en/supervisor，则返回/courses/supervisor
 * const link = makeLinkWithoutLang('zh-cn/supervisor');
 */
function makeLinkWithoutLang(id: string): string {
    return makeLink(id, false);
}

export {
    getCourses,
    getChapters,
    getChaptersZhCn,
    getChaptersEn,
    getAllCourseItemsZhCn,
    getAllCourseItemsEn,
    getCourseBySlug,
    getChapterIdsAndTitles,
    getCourseSidebarItems,
};