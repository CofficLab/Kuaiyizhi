<template>
    <div>

        <div class="z-50 flex flex-col justify-center gap-4 py-8 shadow-inner mt-12 bg-gray-900/10 backdrop-blur-3xl">
            <a :href="`/${lang}/`" class="flex items-center self-center w-auto text-lg font-bold smart-link">
                <div class="flex flex-row items-center w-full">
                    <img src="/logo.png" alt="" class="h-6 sm:h-8 mt-1 fill-current">
                    <span class="w-full ml-2 sm:ml-4 text-lg sm:text-xl font-bold">快易知</span>
                </div>
            </a>

            <div class="flex flex-col w-full">
                <div class="flex flex-col md:flex-row justify-center w-full gap-8 md:gap-16 p-4 md:p-8">
                    <ul class="flex flex-col gap-4 md:gap-8 items-center md:items-start">
                        <li>
                            <a :href="makeLink('privacy')" class="smart-link">
                                {{ t('privacy') }}
                            </a>
                        </li>
                        <li>
                            <a :href="makeLink('terms')" class="smart-link">
                                {{ t('terms') }}
                            </a>
                        </li>
                        <li>
                            <a :href="makeLink('about')" class="smart-link">
                                {{ t('about') }}
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/CofficLab/FeedbackHub" class="smart-link">
                                {{ t('githubComments') }}
                            </a>
                        </li>
                    </ul>

                    <ul class="flex flex-col gap-4 md:gap-8 items-center md:items-start">
                        <li>
                            <a href="https://www.kuaiyc.com" class="smart-link" target="_blank">
                                {{ t('kuaiyicha') }}
                            </a>
                        </li>
                        <li>
                            <a href="https://www.kuaiyc.com/products" class="smart-link" target="_blank">
                                {{ t('apiProducts') }}
                            </a>
                        </li>
                        <li>
                            <a href="https://www.kuaiyizhi.cn/ideas" class="smart-link" target="_blank">
                                {{ t('tutorials') }}
                            </a>
                        </li>
                        <li>
                            <a href="https://cofficlab.github.io" class="smart-link" target="_blank">
                                {{ t('cofficSeries') }}
                            </a>
                        </li>
                    </ul>
                    <ul class="flex flex-col gap-4 md:gap-8 items-center md:items-start">
                        <li>
                            <a href="https://github.com/cofficlab" class="smart-link" target="_blank">{{ t('github')
                                }}</a>
                        </li>
                        <li>
                            <a href="https://github.com/CofficLab/JuiceEditor" class="smart-link" target="_blank">{{
                                t('juiceeditor') }}</a>
                        </li>
                        <li>
                            <a href="https://apps.apple.com/cn/app/%E5%BF%AB%E6%98%93%E7%9F%A5/id6457892799"
                                class="smart-link" target="_blank">{{ t('kuaiyizhi') }}</a>
                        </li>
                        <li>
                            <a href="https://apps.apple.com/cn/app/cisum/id6466401036" class="smart-link"
                                target="_blank">{{ t('cisum') }}</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="w-full px-8 z-50 mx-auto">
                <div class="mt-0 hero smart-card">
                    <div class="text-center hero-content">
                        <div class="max-w-md flex flex-row justify-center items-center mx-auto">
                            <h1 class="text-2xl md:text-3xl font-bold">
                                {{ t('slogan') }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="self-center my-4 text-sm sm:text-base">
                <a href="http://beian.miit.gov.cn" class="smart-link" id="beian-www.kuaiyc.com" target="_blank">
                    {{ t('icp') }}
                </a>
            </div>

            <div class="self-center text-sm sm:text-base">
                <a href="javascript:void(0)" class="smart-link">&copy; 2025
                    {{ t('company') }}
                </a>
            </div>
        </div>


    </div>
</template>

<script lang="ts" setup>
const props = defineProps({
    lang: {
        type: String,
        default: 'en',
    },
});

const translations = {
    slogan: {
        zh: '也许，这是一番成就的开始',
        en: 'Perhaps, this is the beginning of achievement'
    },
    github: {
        zh: 'GitHub',
        en: 'GitHub'
    },
    juiceeditor: {
        zh: 'JuiceEditor',
        en: 'JuiceEditor'
    },
    privacy: {
        zh: '隐私条款',
        en: 'Privacy Policy'
    },
    terms: {
        zh: '服务条款',
        en: 'Terms of Service'
    },
    about: {
        zh: '关于我们',
        en: 'About Us'
    },
    githubComments: {
        zh: 'GitHub 留言',
        en: 'GitHub Comments'
    },
    cisum: {
        zh: 'Cisum',
        en: 'Cisum'
    },
    kuaiyicha: {
        zh: '快易查',
        en: 'KuaiYiCha'
    },
    kuaiyizhi: {
        zh: '快易知',
        en: 'KuaiYiZhi'
    },
    apiProducts: {
        zh: 'API 产品',
        en: 'API Products'
    },
    tutorials: {
        zh: '系列教程',
        en: 'Tutorials'
    },
    cofficSeries: {
        zh: 'Coffic 系列软件',
        en: 'Coffic Software Series'
    },
    icp: {
        zh: '鲁ICP备2022009149号-2',
        en: 'ICP License: 2022009149-2'
    },
    company: {
        zh: '青岛岳亿网络科技有限公司',
        en: 'Qingdao Yueyi Network Technology Co., Ltd.'
    }
};

const lang = props.lang.toLowerCase();

const t = (key: keyof typeof translations) => {
    return translations[key][lang.startsWith('zh') ? 'zh' : 'en'];
};

const makeLink = (path: string) => {
    return `/${lang}/${path}`;
};
</script>

<style scoped lang="postcss">
ul {
    @apply list-none;
}

a {
    @apply text-gray-500 dark:text-gray-400;
}

.smart-link {
    @apply px-4 py-2 rounded-xl ring-white/50 no-underline hover:ring-1 hover:shadow-2xl hover:bg-green-600/10 hover:backdrop-blur transform duration-100;
}

.smart-card {
    @apply p-4 rounded-2xl text-white dark:text-gray-500 bg-gradient-to-br from-gray-900/30 via-gray-800/40 to-gray-800/50 dark:from-gray-900/30 dark:via-gray-900/40 dark:to-gray-800/50 backdrop-blur-3xl border-r border-gray-50/30 dark:border-gray-600/50 dark:border hover:ring-0 hover:shadow-2xl transform duration-100;
}

.smart-button {
    @apply p-4 rounded-2xl text-white/80 dark:text-gray-500 bg-gradient-to-br from-gray-900/30 via-gray-800/40 to-gray-800/50 dark:from-gray-900/30 dark:via-gray-900/40 dark:to-gray-800/50 backdrop-blur-3xl border-r border-gray-50/30 dark:border-gray-600/50 dark:border hover:ring-0 hover:shadow-2xl transform duration-100;
}
</style>