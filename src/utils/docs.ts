import { getCollection } from 'astro:content';
import type { BlogPost } from '../interface/BlogPost';
import type { CollectionEntry } from 'astro:content';

const emoji = "🚀";

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

// 获取所有元数据
const getMetas = async (): Promise<CollectionEntry<'metas'>[]> => {
    return await getCollection('metas');
}

const getMetaIds = async (lang: string): Promise<string[]> => {
    // 如果lang=zh-CN，lang=zh-cn，都转换成lang=zh-cn
    lang = lang.replace('zh-CN', 'zh-cn');
    const metas = await getMetas();
    return metas.filter((meta) => meta.id.startsWith(lang)).map((meta) => meta.id);
}

const getBlogs = async (lang: string): Promise<CollectionEntry<'blogs'>[]> => {
    let langFormatted = lang.replace('zh-CN', 'zh-cn');
    const posts = await getCollection('blogs', (post) => post.id.startsWith(langFormatted));
    return posts.sort((a, b) => {
        const dateA = a.data.date ? new Date(a.data.date).getTime() : 0;
        const dateB = b.data.date ? new Date(b.data.date).getTime() : 0;
        return dateB - dateA;
    });
}

// 获取带有特定标签的文章
const getBlogsWithTags = async (tag: string): Promise<CollectionEntry<'blogs'>[]> => {
    return await getCollection('blogs', (post) => post.data.tags?.includes(tag));
}

const getBlogTags = async (lang: string): Promise<string[]> => {
    const tags = new Set<string>();
    const posts = await getBlogs(lang);

    posts.forEach(post => {
        post.data.tags?.forEach(tag => tags.add(tag));
    });
    return Array.from(tags);
}

const getBlogContent = async (lang: string, id: string): Promise<string> => {
    console.log(`${emoji} Docs: getBlogContent with \n lang: ${lang} \n id: ${id}`);
    const posts = await getBlogs(lang);
    console.log(`${emoji} Docs: posts: ${posts.map(post => post.id)}`);
    const post = posts.find(post => post.id === id.replace('blogs/', ''));
    return post?.body ?? '';
}

export {
    getTopLevelPosts,
    getBlogTags as getTags,
    getBlogs,
    getBlogsWithTags,
    getMetas,
    getMetaIds,
    getBlogContent
};
