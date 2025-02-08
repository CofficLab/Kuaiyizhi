import type { MiddlewareHandler } from 'astro';

const emoji = '🚩';

/**
 * @type {import("astro").MiddlewareHandler}
 */
export const onRequest: MiddlewareHandler = (context, next) => {
    console.log(`${emoji} middleware: current path`, context.url.pathname);

    // 检查并重写 /{lang}/about 路径
    if (context.url.pathname === '/zh-cn/about' || context.url.pathname === '/en/about') {
        const lang = context.url.pathname.startsWith('/zh-cn') ? 'zh-cn' : 'en';
        console.log(`${emoji} middleware: rewrite to /${lang}/meta/about`);
        return context.rewrite(`/${lang}/meta/about`);
    }

    // 检查并重写 /{lang}/privacy 路径
    if (context.url.pathname === '/zh-cn/privacy' || context.url.pathname === '/en/privacy') {
        const lang = context.url.pathname.startsWith('/zh-cn') ? 'zh-cn' : 'en';
        console.log(`${emoji} middleware: rewrite to /${lang}/meta/privacy`);
        return context.rewrite(`/${lang}/meta/privacy`);
    }

    // 检查并重写 /{lang}/terms 路径
    if (context.url.pathname === '/zh-cn/terms' || context.url.pathname === '/en/terms') {
        const lang = context.url.pathname.startsWith('/zh-cn') ? 'zh-cn' : 'en';
        console.log(`${emoji} middleware: rewrite to /${lang}/meta/terms`);
        return context.rewrite(`/${lang}/meta/terms`);
    }

    return next();
};