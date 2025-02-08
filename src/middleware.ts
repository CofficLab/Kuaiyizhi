import type { MiddlewareHandler } from 'astro';

const emoji = '🚩';

/**
 * @type {import("astro").MiddlewareHandler}
 */
export const onRequest: MiddlewareHandler = (context, next) => {
    console.log(`${emoji} Middleware: current path`, context.url.pathname);

    const pathsToRewrite = [
        { path: '/about', rewrite: '/meta/about' },
        { path: '/privacy', rewrite: '/meta/privacy' },
        { path: '/terms', rewrite: '/meta/terms' },
        { path: '/partners', rewrite: '/meta/partners' },
        { path: '/tech-stack', rewrite: '/meta/tech-stack' },
        { path: '/our-story', rewrite: '/meta/our-story' },
        { path: '/tech-evolution', rewrite: '/meta/tech-evolution' },
    ];

    for (const { path, rewrite } of pathsToRewrite) {
        if (context.url.pathname === `/zh-cn${path}` || context.url.pathname === `/en${path}`) {
            const lang = context.url.pathname.startsWith('/zh-cn') ? 'zh-cn' : 'en';
            console.log(`${emoji} Middleware: rewrite to /${lang}${rewrite}`);
            return context.rewrite(`/${lang}${rewrite}`);
        }
    }

    return next();
};