<template>
    <div class="flex w-full h-full">
        <div class="w-96 border-r border-gray-200 dark:border-gray-600 relative">
            <div class="flex-1 overflow-y-auto custom-scrollbar h-full">
                <div class="p-2">
                    <div v-for="commit in commits" :key="commit.id"
                        class="p-3 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <div class="flex items-center space-x-2 text-left">
                            <div class="text-yellow-500">{{ commit.icon }}</div>
                            <div class="text-sm text-gray-900 dark:text-gray-100">{{ commit.title }}</div>
                        </div>
                        <div class="ml-6 text-xs text-gray-500 text-left">{{ commit.type }}</div>
                    </div>
                </div>
            </div>
            <div
                class="absolute bottom-0 left-0 right-0 p-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600">
                <div class="flex items-center space-x-2">
                    <div class="flex-1">
                        <input type="text" placeholder="Minor adjustments"
                            class="w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-lg text-sm text-left" />
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm">
                        Commit and Push
                    </button>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-gray-900 text-gray-300 p-4 font-mono text-sm overflow-y-auto custom-scrollbar w-full">
            <div class="space-y-1">
                <div class="flex" v-for="line in codeLines" :key="line.number">
                    <span class="w-8 text-gray-500 text-right pr-2">{{ line.number }}</span>
                    <span class="text-left">{{ line.content }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const commits = [
    { id: 1, icon: '🔍', title: 'Chore: Minor adjustments', type: 'UI: Update user interface elements' },
    { id: 2, icon: '🎨', title: 'UI: Update user interface elements', type: 'UI: Update user interface elements' },
    { id: 3, icon: '✨', title: 'Improve: Enhance existing functionality', type: 'Feature: Enhance for db' },
    { id: 4, icon: '🐛', title: 'Bugfix: Fix a bug', type: 'Fix: Database connection issue' }
]

const codeLines = [
    { number: 12, content: 'Text("Select a table")' },
    { number: 13, content: '.foregroundColor(.secondary)' },
    { number: 14, content: '}' },
    { number: 15, content: '' },
    { number: 16, content: 'Spacer()' },
    { number: 17, content: '}' },
    { number: 18, content: '.frame(maxWidth: .infinity)' }
]
</script>