<template>
    <div class="not-content">
        <!-- Hero Section -->
        <div class="hero min-h-[70vh] bg-base-200/0">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="max-w-sm">
                    <img src="/images/hero-star.webp" alt="Hero image" class="w-full h-auto" />
                </div>
                <div class="text-center lg:text-left">
                    <p class="text-2xl text-base-content/70 pb-6">{{ heroText[lang] }}</p>
                    <div>
                        <a :href="`/${lang}/build_your_own_web_toolbox`" class="btn btn-primary">
                            {{ ctaText[lang] }}
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-8">
            <div v-for="(card, index) in cards" :key="index" class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="text-3xl mb-4">{{ card.emoji }}</div>
                    <h3 class="card-title">{{ card.title[lang] }}</h3>
                    <p class="text-base-content/70">{{ card.description[lang] }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const props = defineProps<{
    lang: 'zh-cn' | 'en';
}>();

const lang = props.lang.toLowerCase() as 'zh-cn' | 'en';

const heroText = {
    'zh-cn': '追寻知识的纯粹之光',
    'en': 'Pursuing the Pure Light of Knowledge'
};

const ctaText = {
    'zh-cn': '一起搭建工具箱网页',
    'en': 'Build Your Web Toolbox Together'
};

const cards = [
    {
        emoji: '🚀',
        title: {
            'zh-cn': '快速加载',
            'en': 'Fast Loading'
        },
        description: {
            'zh-cn': '绝不拖累你的浏览器',
            'en': 'Never slows down your browser'
        }
    },
    {
        emoji: '🪧',
        title: {
            'zh-cn': '广告全无',
            'en': 'Ad-Free'
        },
        description: {
            'zh-cn': '没有广告，用户体验永远最佳',
            'en': 'No ads, best user experience always'
        }
    },
    {
        emoji: '🧩',
        title: {
            'zh-cn': '生动的文档',
            'en': 'Interactive Docs'
        },
        description: {
            'zh-cn': '文档不再是静态的文字和图片，你可以和它充分交互',
            'en': 'Documents are no longer static text and images, you can fully interact with them'
        }
    }
];
</script>