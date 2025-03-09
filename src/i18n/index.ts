import { ref, computed } from 'vue';
import type { SupportedLocale, TranslationKey } from './types';
import { keys } from './types';
import { translations } from './translations';

// 获取嵌套对象的属性值，支持点号路径
function getNestedValue(obj: any, path: string): string | undefined {
    const keys = path.split('.');
    return keys.reduce((o, key) => (o && o[key] !== undefined) ? o[key] : undefined, obj);
}

export function useI18n(initialLocale: SupportedLocale = 'zh-cn') {
    // 当前语言
    const locale = ref<SupportedLocale>(initialLocale);

    // 设置当前语言
    const setLocale = (newLocale: SupportedLocale) => {
        locale.value = newLocale;
    };

    // 获取当前语言的所有翻译
    const currentTranslations = computed(() => {
        return translations[locale.value];
    });

    // 翻译函数
    function t(key: TranslationKey, fallback: string = ''): string {
        const value = getNestedValue(currentTranslations.value, key);
        return value !== undefined ? value : fallback;
    }

    return {
        t,
        locale,
        setLocale,
        keys,
        availableLocales: Object.keys(translations) as SupportedLocale[]
    };
} 