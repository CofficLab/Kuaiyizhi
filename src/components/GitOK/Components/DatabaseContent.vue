<template>
    <div class="w-full h-full p-6">
        <div class="mb-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Database Management</h2>
            <p class="text-sm text-gray-500">Manage your database connections and queries</p>
        </div>

        <div class="grid grid-cols-12 gap-4">
            <!-- 左侧数据库列表 -->
            <div class="col-span-3 border-r border-gray-200 dark:border-gray-700">
                <div v-for="table in tables" :key="table.name"
                    class="px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg cursor-pointer">
                    {{ table.name }}
                </div>
            </div>

            <!-- 右侧查询区域 -->
            <div class="col-span-9">
                <div class="mb-4">
                    <textarea class="w-full h-32 p-3 bg-gray-900 text-gray-300 rounded-lg font-mono text-sm"
                        placeholder="Enter your SQL query here..."></textarea>
                </div>
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">Execute Query</button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const tables = [
    { name: 'users' },
    { name: 'products' },
    { name: 'orders' },
    { name: 'categories' }
]
</script>