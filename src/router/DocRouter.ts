import { logger } from '@/utils/logger';
import ContentDB from '@/database/ContentDB';
import TagDB from '@/database/TagDB';

export default class DocRouter {
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
    static async getPaths(): Promise<{ params: { slug: string } }[]> {
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
            logger.array('所有文档的路径', paths);
        }

        return paths;
    }
}
