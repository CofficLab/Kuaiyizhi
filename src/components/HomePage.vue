<template>
    <div
        class="not-content mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-5 gap-8">
        <BookCard v-for="book in books" :key="book.link" :link="book.link" :book="{ title: book.title }"
            :childrenCount="10" />
    </div>
</template>

<script setup lang="ts">
import BookCard from './BookCard.vue';

const books = [
    { link: '/zh-cn/laravel_learn', title: 'Laravel' },
    { link: '/zh-cn/kong', title: 'Kong' },
    { link: '/zh-cn/vue', title: 'Vue' },
    { link: '/zh-cn/caddy', title: 'Caddy' },
    { link: '/zh-cn/build_your_own_web_toolbox', title: 'Build Your Own Web Toolbox' },
];
</script>
