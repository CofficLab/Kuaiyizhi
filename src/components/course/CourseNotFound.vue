<script setup lang="ts">
import { computed } from 'vue';
import { RiEmotionSadLine, RiArrowLeftLine } from '@remixicon/vue';

const props = defineProps<{
    lang: string;
}>();

const coursesLink = computed(() => `/${props.lang}/courses`);

const messages = {
    title: props.lang === 'en' ? '😅 Oops, the course is on vacation' : '😅 哎呀，课程去旅行了',
    description: props.lang === 'en' ? 'Sorry, the course you are looking for does not exist' : '抱歉，您要查看的课程暂时不存在',
    backToList: props.lang === 'en' ? 'Back to course list' : '返回课程列表'
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