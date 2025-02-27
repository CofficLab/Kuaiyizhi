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

/**
 * 根据ID生成链接
 * 
 * 该函数根据文档ID生成对应的链接路径。
 * 
 * @param {string} id - 文档ID, 例如 'courses/zh-cn/supervisor/index.md'
 * @param {boolean} [withLang=true] - 是否包含语言前缀
 * @returns {string} 返回生成的链接路径
 * @example
 * // 例如：
 * // id=courses/zh-cn/supervisor/index.md，则返回/zh-cn/courses/supervisor
 * // id=courses/en/supervisor/index.md，则返回/en/courses/supervisor
 * const link = makeLink('courses/zh-cn/supervisor/index.md');
 */
export function makeLink(id: string, withLang: boolean = true): string {
    let category = id.split('/')[0];
    let lang = id.split('/')[1];
    let path = id.split('/').slice(2).join('/');

    let link = `/${withLang ? lang : ''}/${category}/${path}`;

    // 如果开头有多个 /，则去掉
    link = link.replace(/\/+/g, '/');

    return link;
}

/**
 * 根据分类生成顶级链接
 * 
 * 该函数根据分类生成顶级链接路径。
 * 
 * @param {string} category - 分类名称
 * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
 * @returns {string} 返回生成的顶级链接路径
 * @example
 * // 例如：
 * // category=courses, lang=zh-cn，则返回/zh-cn/courses
 * // category=courses, lang=en，则返回/en/courses
 */
export function makeTopLevelLink(category: string, lang: string): string {
    return `/${lang}/${category}`;
}

/**
 * 根据ID生成不带语言的链接
 * 
 * 该函数根据文档ID生成不带语言前缀的链接路径。
 * 
 * @param {string} id - 文档ID, 例如 'courses/zh-cn/supervisor/index.md'
 * @returns {string} 返回生成的不带语言前缀的链接路径
 * @example
 * // 例如：
 * // id=courses/zh-cn/supervisor/index.md，则返回/courses/supervisor
 * // id=courses/en/supervisor/index.md，则返回/courses/supervisor
 * const link = makeLinkWithoutLang('courses/zh-cn/supervisor/index.md');
 */
export function makeLinkWithoutLang(id: string): string {
    return makeLink(id, false);
}