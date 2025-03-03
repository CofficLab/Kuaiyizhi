<template>
    <div class="p-4">
        <ul v-if="blogs.length > 0" class="list-none pl-5">
            <li v-for="blog in blogs" :key="blog.getId()" class="mb-2 flex items-center gap-3">
                <a :href="blog.getLink()" class="text-blue-500 no-underline hover:no-underline">{{
                    blog.getTitle()
                    }}</a>
            </li>
        </ul>
        <div v-else class="text-center py-8">
            <div class="text-gray-400 flex flex-col items-center">
                <RiInboxArchiveLine class="text-5xl mb-4 h-36 w-36" />
                <p class="text-lg">{{ lang === 'zh' ? '暂无博客文章' : 'No blog posts yet' }}</p>
                <p class="text-sm">{{ lang === 'zh' ? '稍后再来看看吧' : 'Check back later' }}</p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import type BlogDoc from '@/models/BlogDoc';
import { RiInboxArchiveLine } from '@remixicon/vue';

defineProps<{
    blogs: BlogDoc[];
    lang: string;
}>();
</script>
