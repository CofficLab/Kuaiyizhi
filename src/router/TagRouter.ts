import TagDB from '@/database/TagDB';

export default class TagRouter {
    /**
     * 获取所有标签的路径，用于生成路由
     * 
     * @param lang 语言代码，例如 'zh-cn', 'en'
     * @returns 所有标签的路径数组, 例如：
     * [
     *     {
     *         params: { slug: 'default' },
     *         props: { tag: 'default' },
     *     },
     *     {
     *         params: { slug: 'tag1' },
     *         props: { tag: 'tag1' },
     *     },
     *     {
     *         params: { slug: 'tag2' },
     *         props: { tag: 'tag2' },
     *     },
     * ]
     */
    static async getPaths() {
        const tags = await TagDB.getTags('zh-cn');

        // 为每个标签创建一个路由
        return tags.map((tag) => tag.toTagPath());
    }
}
