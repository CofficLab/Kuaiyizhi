<template>
    <div class="p-4 card bg-base-100 shadow-xl">
        <ul class="list-none pl-5">
            <li v-for="post in posts" :key="post.slug" class="mb-2">
                <a :href="getBlogLink(post)" class="text-blue-500 hover:underline no-underline hover:no-underline">{{
                    post.data.title
                    }}</a>
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
defineProps<{
    posts: CollectionEntry<'blogs'>[];
}>();

function getBlogLink(post: CollectionEntry<'blogs'>) {
    let filePath = post.filePath;
    let slug = filePath.split('/').slice(3).join('/').replace('.md', '');
    return `/blogs/${slug}`;
}
</script>