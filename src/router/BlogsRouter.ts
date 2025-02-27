export default class BlogsRouter {
    /**
     * 获取所有博客的路径，用于生成路由
     * 
     * @returns 所有博客的路径数组
     */
    static async getPaths(): Promise<{ params: { slug: string } }[]> {
        return [
            {
                params: {
                    slug: '/zh-cn/blogs',
                },
            },
            {
                params: {
                    slug: '/en/blogs',
                },
            },
        ];
    }

    static isMatch(slug: string | undefined) {
        return slug && slug.includes('/blogs') && slug.endsWith('/blogs');
    }
}
