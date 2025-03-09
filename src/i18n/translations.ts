import type { TranslationRecord } from './types';

// 所有语言的翻译数据
export const translations: TranslationRecord = {
    'zh-cn': {
        course: {
            notFound: {
                title: '😅 哎呀，课程去旅行了',
                description: '抱歉，您要查看的课程暂时不存在',
                backToList: '返回课程列表'
            }
        }
    },
    'en': {
        course: {
            notFound: {
                title: '😅 Oops, the course is on vacation',
                description: 'Sorry, the course you are looking for does not exist',
                backToList: 'Back to course list'
            }
        }
    }
}; 