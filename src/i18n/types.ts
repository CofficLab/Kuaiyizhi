// 定义所有可用的翻译键类型
export interface TranslationSchema {
    course: {
        notFound: {
            title: string;
            description: string;
            backToList: string;
        }
    }
    // 可以在这里添加更多的翻译键类型
}

// 定义支持的语言类型
export type SupportedLocale = 'zh-cn' | 'en';

// 定义翻译记录类型
export type TranslationRecord = Record<SupportedLocale, TranslationSchema>;

// 创建类型安全的翻译键常量
export const keys = {
    course: {
        notFound: {
            title: 'course.notFound.title' as const,
            description: 'course.notFound.description' as const,
            backToList: 'course.notFound.backToList' as const
        }
    }
} as const;

// 定义翻译键类型
export type TranslationKey =
    | typeof keys.course.notFound.title
    | typeof keys.course.notFound.description
    | typeof keys.course.notFound.backToList; 