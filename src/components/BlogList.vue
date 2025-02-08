<template>
    <div class="p-4 card bg-base-100 shadow-xl">
        <ul class="list-none pl-5">
            <li v-for="post in posts" :key="post.id" class="mb-2">
                <a :href="getBlogLink(post)" class="text-blue-500 hover:underline no-underline hover:no-underline">{{
                    post.data.title
                }}</a>
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import type { CollectionEntry } from 'astro:content';

defineProps<{
    posts: CollectionEntry<'blogs'>[];
}>();

function getBlogLink(post: CollectionEntry<'blogs'>) {
    let slug = post.id;
    return `/zh-cn/blogs/${slug}`;
}
</script>
