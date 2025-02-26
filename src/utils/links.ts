export function makeMetaLink(lang: string, id: string): string {
    return `/${normalizeLanguage(lang)}/meta/${id}`;
}

/**
 * 生成博客文章链接
 * @param lang - 语言代码 (如 'zh-cn', 'en')
 * @param id - 博客文章的ID
 * @returns 博客文章的完整URL路径
 */
export function makeBlogLink(lang: string, id: string): string {
    return `/${lang}/blogs/${id}`;
}

/**
 * 生成文档链接
 * @param lang - 语言代码
 * @param path - 文档路径
 * @returns 文档的完整URL路径
 */
export function makeDocLink(lang: string, path: string): string {
    return `/${lang}/docs/${path}`;
}

/**
 * 生成标签页链接
 * @param lang - 语言代码
 * @param tag - 标签名称
 * @returns 标签页的完整URL路径
 */
export function makeTagLink(lang: string, tag: string): string {
    return `/${lang}/tags/${tag}`;
}

/**
 * 生成首页链接
 * @param lang - 语言代码
 * @returns 首页的完整URL路径
 */
export function makeHomeLink(lang: string): string {
    return `/${lang}`;
}

/**
 * 生成博客列表页链接
 * @param lang - 语言代码
 * @returns 博客列表页的完整URL路径
 */
export function makeBlogsLink(lang: string): string {
    return `/${lang}/blogs`;
}

/**
 * 规范化语言代码
 * @param lang - 语言代码
 * @returns 规范化后的语言代码
 */
export function normalizeLanguage(lang: string): string {
    return lang.toLowerCase().replace('zh-CN', 'zh-cn');
} 