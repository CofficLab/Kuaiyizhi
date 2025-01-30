<template>
    <div class="w-full h-full p-6">
        <div class="mb-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Icon Management</h2>
            <p class="text-sm text-gray-500">Manage your application icons here</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-4">
            <div v-for="icon in icons" :key="icon.id"
                class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                <div class="flex flex-col items-center">
                    <div class="text-2xl mb-2">{{ icon.symbol }}</div>
                    <span class="text-xs text-gray-500">{{ icon.name }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const icons = [
    { id: 1, name: 'Home', symbol: '🏠' },
    { id: 2, name: 'Settings', symbol: '⚙️' },
    { id: 3, name: 'User', symbol: '👤' },
    { id: 4, name: 'Search', symbol: '🔍' }
]
</script>