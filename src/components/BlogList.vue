<template>
    <div class="p-4 card bg-base-100 shadow-xl">
        <ul v-if="blogs.length > 0" class="list-none pl-5">
            <li v-for="blog in blogs" :key="blog.link" class="mb-2 flex items-center gap-3">
                <span class="badge badge-ghost font-mono text-sm">{{ blog.getDateForDisplay() }}</span>
                <a :href="blog.link" class="text-blue-500 no-underline hover:no-underline">{{
                    blog.title
                    }}</a>
            </li>
        </ul>
        <div v-else class="text-center py-8">
            <div class="text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <p class="text-lg">暂无博客文章</p>
                <p class="text-sm">稍后再来看看吧</p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Blog } from '@/models/Blog';
defineProps<{
    blogs: Blog[];
    lang: string;
}>();
</script>
