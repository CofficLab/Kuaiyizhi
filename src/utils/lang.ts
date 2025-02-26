import { logger } from "./logger";

export const normalizeLang = (lang: string) => {
    if (lang === 'zh-CN') {
        return 'zh-cn';
    }
    return lang;
}

export const getLangFromSlug = (slug: string) => {
    const debug = true;
    if (debug) {
        logger.info(`📑 getLangFromSlug: slug: ${slug}`);
    }

    let lang = slug.split('/')[0];

    return normalizeLang(lang);
}

export const isValidLang = (lang: string) => {
    return ['zh-cn', 'en'].includes(lang);
}