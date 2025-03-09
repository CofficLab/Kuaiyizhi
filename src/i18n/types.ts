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