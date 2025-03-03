import { logger } from "@/utils/logger";

export default class LinkDB {
    static getHomeLink(lang: string): string {
        return `/${lang}`;
    }

    static getLessonsLink(lang: string): string {
        return `/${lang}/lessons`;
    }

    static getCoursesLink(lang: string): string {
        return `/${lang}/courses`;
    }

    static getBlogsLink(lang: string): string {
        return `/${lang}/blogs`;
    }

    static getLessonLink(lang: string, lessonId: string): string {
        if (lessonId.endsWith(lang)) {
            return `/${lang}/lessons/${lessonId.replace(`${lang}`, '')}`;
        } else {
            const idWithoutLang = lessonId.replace(`${lang}/`, '');
            return `/${lang}/lessons/${idWithoutLang}`;
        }
    }

    static getTagLink(lang: string, tagName: string): string {
        return `/${lang}/blogs/tag/${tagName}`;
    }

    static getBlogLink(blogId: string, lang: string): string {
        const debug = false
        const blogIdWithoutLang = blogId.replace(`${lang}/`, '')

        if (debug) {
            logger.info(`获取博客文档链接，博客文档ID: ${blogId}`);
        }

        return `/${lang}/blogs/${blogIdWithoutLang}`;
    }

    static getCourseLink(courseId: string): string {
        const debug = false
        const lang = courseId.split('/')[0]
        const courseIdWithoutLang = courseId.replace(`${lang}/`, '')

        if (debug) {
            logger.info(`获取课程文档链接，课程文档ID: ${courseId}`);
        }

        return `/${lang}/courses/${courseIdWithoutLang}`;
    }

    static getMetaLink(lang: string, slug: string): string {
        return `/${lang}/meta/${slug}`;
    }

    static isHomeLink(path: string, lang: string): boolean {
        return path === `/${lang}` || path === `/${lang}/`;
    }

    static isLessonsLink(path: string, lang: string): boolean {
        return path === `/${lang}/lessons` ||
            path === `/${lang}/lessons/` ||
            path.startsWith(`/${lang}/lessons/`);
    }

    static isCoursesLink(path: string, lang: string): boolean {
        return path === `/${lang}/courses`
            || path === `/${lang}/courses/`
            || path.startsWith(`/${lang}/courses/`);
    }

    static isBlogsLink(path: string, lang: string): boolean {
        return path === `/${lang}/blogs`
            || path === `/${lang}/blogs/`
            || path.startsWith(`/${lang}/blogs/`);
    }
}