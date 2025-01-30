<template>
    <div class="flex w-full h-full">
        <!-- 左侧文件列表 -->
        <div class="w-64 border-r border-gray-200 dark:border-gray-700">
            <div class="p-4">
                <button class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg mb-4 text-sm">
                    新建 Banner
                </button>

                <!-- 文件列表 -->
                <div class="space-y-1">
                    <div v-for="banner in banners" :key="banner.id" :class="[
                        'p-2 rounded-lg cursor-pointer text-sm',
                        selectedBanner?.id === banner.id
                            ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400'
                            : 'hover:bg-gray-100 dark:hover:bg-gray-800'
                    ]" @click="selectedBanner = banner">
                        {{ banner.name }}
                    </div>
                </div>
            </div>
        </div>

        <!-- 右侧编辑区域 -->
        <div class="flex-1 p-6" v-if="selectedBanner">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-lg font-medium mb-6">编辑 Banner</h2>

                <!-- 预览区域 -->
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">预览</label>
                    <div class="bg-gradient-to-br from-emerald-400 via-cyan-400 to-blue-400 rounded-lg p-6">
                        <h1 class="text-4xl font-bold text-white mb-2">{{ bannerForm.title }}</h1>
                        <p class="text-xl text-white/90">{{ bannerForm.subtitle }}</p>
                    </div>
                </div>

                <!-- 编辑表单 -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">标题</label>
                        <input type="text" v-model="bannerForm.title"
                            class="w-full px-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">副标题</label>
                        <input type="text" v-model="bannerForm.subtitle"
                            class="w-full px-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">背景样式</label>
                        <div class="grid grid-cols-5 gap-2">
                            <div v-for="style in backgroundStyles" :key="style.id" :class="[
                                'h-12 rounded-lg cursor-pointer border-2',
                                bannerForm.styleId === style.id ? 'border-blue-500' : 'border-transparent'
                            ]" :style="{ background: style.gradient }" @click="bannerForm.styleId = style.id">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <button class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">
                            取消
                        </button>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm">
                            保存更改
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 未选择 Banner 时的提示 -->
        <div class="flex-1 flex items-center justify-center" v-else>
            <div class="text-gray-400 text-sm">
                请选择要编辑的 Banner
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, reactive } from 'vue'

interface Banner {
    id: number
    name: string
}

const banners = [
    { id: 1, name: 'Homepage Banner.banner' },
    { id: 2, name: 'Feature Banner.banner' },
    { id: 3, name: 'Product Banner.banner' }
]

const backgroundStyles = [
    { id: 1, gradient: 'linear-gradient(to right bottom, #10B981, #0EA5E9)' },
    { id: 2, gradient: 'linear-gradient(to right bottom, #6366F1, #EC4899)' },
    { id: 3, gradient: 'linear-gradient(to right bottom, #F59E0B, #EF4444)' },
    { id: 4, gradient: 'linear-gradient(to right bottom, #8B5CF6, #EC4899)' },
    { id: 5, gradient: 'linear-gradient(to right bottom, #059669, #0284C7)' }
]

const selectedBanner = ref<Banner | null>(null)
const bannerForm = reactive({
    title: 'Git 客户端',
    subtitle: '简洁的风格',
    styleId: 1
})
</script>