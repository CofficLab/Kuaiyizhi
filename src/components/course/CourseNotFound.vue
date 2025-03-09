<script setup lang="ts">
import { computed } from 'vue';
import { RiEmotionSadLine, RiArrowLeftLine } from '@remixicon/vue';
import { useI18n } from '@/i18n';
import type { SupportedLocale } from '@/i18n/types';

const props = defineProps<{
    lang: string;
}>();

// 确保语言是支持的语言
const safeLang = computed<SupportedLocale>(() => {
    return (props.lang === 'en' || props.lang === 'zh-cn')
        ? props.lang as SupportedLocale
        : 'zh-cn';
});

const { t, keys } = useI18n(safeLang.value);

const coursesLink = computed(() => `/${props.lang}/courses`);

const messages = {
    title: t(keys.course.notFound.title, '😅 哎呀，课程去旅行了'),
    description: t(keys.course.notFound.description, '抱歉，您要查看的课程暂时不存在'),
    backToList: t(keys.course.notFound.backToList, '返回课程列表')
};
</script>

<template>
    <div class="flex flex-col items-center justify-center min-h-[400px] text-center">
        <div class="text-6xl text-gray-300 mb-4">
            <RiEmotionSadLine />
        </div>
        <h1 class="text-4xl font-bold mb-4">{{ messages.title }}</h1>
        <p class="text-lg text-gray-600 mb-6">{{ messages.description }}</p>
        <a :href="coursesLink" class="btn btn-primary">
            <RiArrowLeftLine class="mr-2" />
            {{ messages.backToList }}
        </a>
    </div>
</template>