<template>
    <div class="p-4 card bg-base-100 shadow-xl">
        <ul class="list-none pl-5">
            <li v-for="post in posts" :key="post.id" class="mb-2 flex items-center gap-3">
                <span class="badge badge-ghost font-mono text-sm">{{ formatDate(post.data.date) }}</span>
                <a :href="getBlogLink(post)" class="text-blue-500 no-underline hover:no-underline">{{
                    post.data.title
                    }}</a>
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import type { CollectionEntry } from 'astro:content';

const props = defineProps<{
    posts: CollectionEntry<'blogs'>[];
    lang: string;
}>();

function getBlogLink(post: CollectionEntry<'blogs'>) {
    let slug = post.id.replace('en/', '').replace('zh-cn/', '');
    return `/${props.lang}/blogs/${slug}`;
}

function formatDate(date: Date | undefined) {
    if (!date) return '';
    const d = new Date(date);
    const pad = (n: number) => n.toString().padStart(2, '0');

    return `${d.getFullYear()}${pad(d.getMonth() + 1)}${pad(d.getDate())}`;
}
</script>
