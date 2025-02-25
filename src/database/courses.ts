import { getCollection } from 'astro:content';
import { logger } from '../utils/logger';
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

// 获取所有章节ID和标题，返回的格式是：
// [
//     {
//         id: 'zh-cn/courses/supervisor',
//         title: 'Supervisor 完全指南：进程管理利器',
//     },
// ]
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

export {
    getCourses,
    getChapterIdsAndTitles,
};
