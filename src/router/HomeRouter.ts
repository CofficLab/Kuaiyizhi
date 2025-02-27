export default class HomeRouter {
    /**
     * 获取所有首页的路径，用于生成路由
     * 
     * @returns 所有首页的路径数组
     */
    static async getPaths(): Promise<{ params: { slug: string } }[]> {
        return [
            {
                params: {
                    slug: '/',
                },
            },
            {
                params: {
                    slug: '/zh-cn',
                },
            },
            {
                params: {
                    slug: '/en',
                },
            },
        ];
    }

    static isMatch(slug: string | undefined) {
        return !slug || ['/', 'zh-cn', 'en'].includes(slug);
    }
}
