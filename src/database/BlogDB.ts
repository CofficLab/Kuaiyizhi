import { normalizeLang } from '@/utils/lang';
import { logger } from '@/utils/logger';
import { type DataEntry } from 'astro:content';
import ContentDB from './ContentDB';
import { Blog } from '@/models/Blog';

export default class BlogDB {

    static async getTopLevelBlogs(): Promise<DataEntry[]> {
        return await ContentDB.getDocsByTopCategory('blogs', 'zh-cn', 1);
    }

    /**
     * 获取指定语言的所有博客
     * 
     * 该函数获取指定语言的所有博客。
     * 
     * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
     * @returns {Promise<Blog[]>} 返回博客数组
         */
    static async getAllBlogs(lang: string): Promise<Blog[]> {
        const debug = false;
        let langFormatted = normalizeLang(lang);
        let docs = await ContentDB.getDocsByTopCategory('blogs', langFormatted, 10);

        if (debug) {
            logger.array("getAllBlogs with lang " + langFormatted, docs);
        }
        return docs.map(doc => Blog.fromDataEntry(doc));
    }

    /**
     * 获取带有特定标签的文章
     * 
     * 该函数获取带有特定标签的文章。
     * 
     * @param {string} tag - 标签
     * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
     * @returns {Promise<Blog[]>} 返回博客数组
         */
    static async getBlogsWithTag(tag: string, lang: string): Promise<Blog[]> {
        let allBlogs = await BlogDB.getAllBlogs(lang);
        let docs = allBlogs.filter(blog => blog.tags.includes(tag));
        return docs;
    }

    /**
     * 获取博客内容
     * 
     * 该函数获取博客的内容。
     * 
     * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
     * @param {string} id - 博客ID
     * @returns {Promise<string>} 返回博客内容
         */
    static async getBlogContent(lang: string, id: string): Promise<string> {
        let allBlogs = await BlogDB.getAllBlogs(lang);
        let post = allBlogs.find(post => post.link === id);
        return post?.content ?? '';
    }
}