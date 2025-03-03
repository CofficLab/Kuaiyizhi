<template>
    <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-sm p-1">
            {{ currentLanguageName }}
        </div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-40 p-2 shadow">
            <li v-for="lang in languages" :key="lang.code">
                <a href="javascript:void(0)" :data-lang-code="lang.code"
                    :class="{ active: currentLanguage === lang.code }" @click.prevent="switchLanguage(lang.code)">
                    {{ lang.name }}
                </a>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

// 支持的语言列表
const languages = [
    { code: 'zh-cn', name: '简体中文' },
    { code: 'en', name: 'English' },
];

// 支持的所有语言代码
const supportedLanguages = languages.map(lang => lang.code);

// 获取当前页面路径和语言
const currentLanguage = ref('zh-cn');

onMounted(() => {
    try {
        const pathname = window.location.pathname;
        const firstPathPart = pathname.split('/').filter(Boolean)[0];
        currentLanguage.value = supportedLanguages.includes(firstPathPart) ? firstPathPart : 'zh-cn';
        console.log('Current language detected:', currentLanguage.value);
    } catch (error) {
        console.error('Error detecting current language:', error);
    }
});

// 获取当前选中的语言名称
const currentLanguageName = computed(() => {
    return languages.find((lang) => lang.code === currentLanguage.value)?.name || '简体中文';
});

// 处理语言切换逻辑
const switchLanguage = (newLang) => {
    console.log('Language switch triggered for:', newLang);

    if (!newLang) {
        console.error('No language code provided');
        return;
    }

    try {
        const currentPath = window.location.pathname;
        const currentHash = window.location.hash;
        const currentSearch = window.location.search;

        // 获取当前路径的部分
        const pathParts = currentPath.split('/').filter(Boolean);
        console.log('Current path parts:', pathParts);

        const firstPathPart = pathParts[0];
        const isFirstPartLang = supportedLanguages.includes(firstPathPart);
        console.log('Is first part a language code?', isFirstPartLang, firstPathPart);

        let newPath;
        if (isFirstPartLang) {
            // 替换当前语言
            pathParts[0] = newLang;
            newPath = '/' + pathParts.join('/');
        } else {
            // 在路径前添加新语言，同时保留原始路径
            newPath = '/' + newLang;
            if (pathParts.length > 0) {
                newPath += '/' + pathParts.join('/');
            }
        }

        // 保留查询参数和哈希
        newPath = newPath + currentSearch + currentHash;

        // 跳转到新路径
        console.log('Redirecting to new path:', newPath);
        window.location.href = newPath;
    } catch (error) {
        console.error('Error during language switch:', error);
    }
};
</script>