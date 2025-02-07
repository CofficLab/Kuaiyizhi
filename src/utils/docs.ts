import { getCollection } from 'astro:content';

async function getTopLevelPosts() {
    // 获取所有文章
    const allPosts = await getCollection('docs');
    // 获取一级目录的文章
    const topLevelPosts = allPosts.filter(post => {
        // slug 格式例如: "blog/astro" 或 "guide/start"
        // 统计斜杠的数量来判断层级
        return post.id.split('/').length === 2;
    });

    return topLevelPosts;
}

export { getTopLevelPosts };
