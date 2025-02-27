import { SidebarItem } from '@/models/Sidebar';
import { isValidLang, normalizeLang } from '@/utils/lang';
import { logger } from '@/utils/logger';
import { getCollection, type CollectionEntry } from 'astro:content';

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

// const getBlogTags = async (lang: string): Promise<string[]> => {
//     const tags = new Set<string>();
//     const posts = await getBlogs(lang);

//     posts.forEach(post => {
//         post.data.tags?.forEach(tag => tags.add(tag));
//     });
//     return Array.from(tags);
// }

const getBlogContent = async (lang: string, id: string): Promise<string> => {
    const posts = await getBlogs(lang);
    logger.array(`posts`, posts.map(post => post.id));
    const post = posts.find(post => post.id === id.replace('blogs/', ''));
    return post?.body ?? '';
}

export {
    getTopLevelPosts,
    getBlogTags as getTags,
    getBlogs,
    getBlogsWithTags,
    getBlogContent
};


export const getTagSidebarItem = async (lang: string): Promise<SidebarItem> => {
    const tags = await getBlogTags(lang);
    const sidebarItem = new SidebarItem({
        type: 'group',
        label: 'Tags',
        items: tags.map(
            (tag) =>
                new SidebarItem({
                    type: 'link',
                    label: tag,
                    link: `/blogs/tags/${tag}`,
                })
        ),
    });

    return sidebarItem;
};

// const getBlogs = async (lang: string): Promise<CollectionEntry<'blogs'>[]> => {
//     let langFormatted = normalizeLang(lang);
//     const posts = await getCollection('blogs', (post) => post.id.startsWith(langFormatted));
//     return posts.sort((a, b) => {
//         const dateA = a.data.date ? new Date(a.data.date).getTime() : 0;
//         const dateB = b.data.date ? new Date(b.data.date).getTime() : 0;
//         return dateB - dateA;
//     });
// }

/**
 * 获取博客标签
 * 
 * 该函数获取博客的标签。
 * 
 * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
 * @returns {Promise<string[]>} 返回博客标签数组
 */
const getBlogTags = async (lang: string): Promise<string[]> => {
    const debug = false;
    if (debug) {
        logger.info(`📑 getBlogTags: lang: ${lang}`);
    }

    if (!isValidLang(lang)) {
        throw new Error(`Invalid language: ${lang}`);
    }

    const tags = new Set<string>();
    const posts = await getBlogs(lang);

    posts.forEach(post => {
        post.data.tags?.forEach(tag => tags.add(tag));
    });
    return Array.from(tags);
}