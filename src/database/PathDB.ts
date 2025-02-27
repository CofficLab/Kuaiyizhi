import { logger } from '../utils/logger';
import ContentDB from './ContentDB';
import TagDB from './TagDB';

export default class PathDB {
    /**
     * 获取所有文档的路径，用于生成路由
    * 
    * @returns {Promise<Array>} 返回所有文档的路径数组, 例如：
    * [
    *     {
    *         params: { slug: '/zh-cn/courses/supervisor' },
    *     },
    *     {
    *         params: { slug: '/en/courses/supervisor' },
    *     },
    *     {
    *         params: { slug: '/zh-cn/blogs/index' },
    *     },
    *     {
    *         params: { slug: '/en/blogs/index' },
    *     },
    * ]
    */
    static async getPaths() {
        const debug = false;
        const docs = await ContentDB.getDocsCollection();

        // DocId 的格式为 courses/zh-cn/supervisor/index.md
        // 需要转换为 /zh-cn/courses/supervisor/index.md

        const paths = docs.map((doc) => {
            const lang = doc.id.split('/')[1];
            const category = doc.id.split('/')[0];
            const path = doc.id.split('/').slice(2).join('/');
            return {
                params: {
                    slug: `/${lang}/${category}/${path}`,
                },
            };
        });

        if (debug) {
            logger.array('中文文档的路径', paths);
        }

        return paths;
    }


    /**
     * 获取所有标签的路径，用于生成路由
     * 
     * @param lang 语言代码，例如 'zh-cn', 'en'
     * @returns 所有标签的路径数组, 例如：
     * [
     *     {
     *         params: { id: 'default' },
     *         props: { tag: 'default' },
     *     },
     *     {
     *         params: { id: 'tag1' },
     *         props: { tag: 'tag1' },
     *     },
     *     {
     *         params: { id: 'tag2' },
     *         props: { tag: 'tag2' },
     *     },
     * ]
     */
    static async getPathsForTags(lang: string) {
        const tags = await TagDB.getTags(lang);

        // 为每个标签创建一个路由
        return tags.map((tag) => tag.toTagPath());
    }
}
