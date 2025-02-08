<template>
    <div
        class="not-content mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-5 gap-8">
        <BookCard v-for="book in books" :key="book.link" :link="book.link" :book="{ title: book.title }"
            :childrenCount="10" />
    </div>
</template>

<script setup lang="ts">
import BookCard from './BookCard.vue';

defineProps<{
    books: Array<{
        link: string;
        title: string;
    }>;
}>();
</script>
