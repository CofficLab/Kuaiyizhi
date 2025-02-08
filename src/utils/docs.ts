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

const getBlogs = async () => {
    return await getCollection('blogs');
}

const getBlogTags = async (): Promise<string[]> => {
    const tags = new Set<string>();
    const posts = await getBlogs();
    posts.forEach(post => {
        post.data.tags?.forEach(tag => tags.add(tag));
    });
    return Array.from(tags);
}

export { getTopLevelPosts, getBlogTags as getTags, getBlogs };
