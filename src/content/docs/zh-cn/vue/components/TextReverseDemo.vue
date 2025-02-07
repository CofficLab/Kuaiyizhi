<!-- TextReverseDemo.vue -->
<template>
    <div class="p-8 my-4 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-md transition-colors duration-200">
        <div
            class="p-6 mb-4 bg-white dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 flex items-center justify-center min-h-[4rem] transition-colors duration-200">
            <h2 class="m-0 text-2xl text-gray-800 dark:text-gray-100 transition-all duration-300">
                {{ message }}
            </h2>
        </div>
        <div class="flex gap-4 justify-center">
            <button @click="reverseMessage"
                class="inline-flex items-center gap-2 px-6 py-3 bg-vue-green hover:bg-vue-green-dark text-white rounded-md transition-all duration-200 hover:-translate-y-0.5">
                <span>反转文字</span>
                <span class="text-xl">↔️</span>
            </button>
            <button v-if="isReversed" @click="resetMessage"
                class="inline-flex items-center px-6 py-3 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-200 rounded-md transition-all duration-200 hover:-translate-y-0.5">
                重置
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const originalMessage = 'Hello Vue!'
const message = ref(originalMessage)
const isReversed = computed(() => message.value !== originalMessage)

function reverseMessage() {
    message.value = message.value.split('').reverse().join('')
}

function resetMessage() {
    message.value = originalMessage
}
</script>

<style>
/* 定义 Vue 的品牌颜色 */
:root {
    --vue-green: #42b883;
    --vue-green-dark: #3aa876;
}

.bg-vue-green {
    background-color: var(--vue-green);
}

.bg-vue-green:hover {
    background-color: var(--vue-green-dark);
}

@media (max-width: 480px) {
    .text-2xl {
        font-size: 1.25rem;
    }

    button {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
}
</style>