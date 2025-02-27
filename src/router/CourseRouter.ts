export default class CourseRouter {
    /**
     * 获取所有课程的路径，用于生成路由
     * 
     * @returns 所有课程的路径数组
     */
    static async getPaths(): Promise<{ params: { slug: string } }[]> {
        return [
            {
                params: {
                    slug: '/zh-cn/courses',
                },
            },
            {
                params: {
                    slug: '/en/courses',
                },
            },
        ];
    }

    static isMatch(slug: string | undefined) {
        return slug && slug.includes('/courses') && slug.endsWith('/courses');
    }
}
