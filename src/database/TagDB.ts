import Tag from "@/models/Tag";
import BlogDB from "./BlogDB";
import { logger } from "@/utils/logger";

export default class TagDB {

    /**
     * 获取博客标签
     * 
     * 该函数获取博客的标签。
     * 
     * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
     * @returns {Promise<string[]>} 返回博客标签数组
     */
    static async getTags(lang: string): Promise<Tag[]> {
        const debug = false
        const tags = new Set<string>();
        const posts = await BlogDB.getAllBlogs(lang);

        if (debug) {
            logger.array("posts", posts);
        }

        posts.forEach(post => {
            post.tags.forEach(tag => tags.add(tag));
        });

        if (debug) {
            logger.array("tags", Array.from(tags));
        }

        return Array.from(tags).map(tag => new Tag(tag, 0));
    }
}
