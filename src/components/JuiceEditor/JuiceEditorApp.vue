<template>
    <div class="flex bg-white/90 dark:bg-gray-800 relative rounded-2xl overflow-hidden max-w-5xl self-center mx-auto shadow-xl"
        :class="height">
        <!-- 主要内容区域 -->
        <div class="flex-1 flex flex-col pt-12">
            <!-- 标题区域 -->
            <div class="p-6 space-y-6 overflow-y-auto custom-scrollbar">
                <!-- 标题按钮组 -->
                <div class="flex items-center justify-start space-x-2">
                    <button
                        class="px-3 py-1 text-purple-700 dark:text-purple-400 bg-gray-100 dark:bg-gray-700 rounded-lg text-sm">
                        H1
                    </button>
                    <button
                        class="px-3 py-1 text-purple-700 dark:text-purple-400 bg-gray-100 dark:bg-gray-700 rounded-lg text-sm">
                        H2
                    </button>
                    <button
                        class="px-3 py-1 text-purple-700 dark:text-purple-400 bg-gray-100 dark:bg-gray-700 rounded-lg text-sm">
                        H3
                    </button>
                    <button
                        class="px-3 py-1 text-purple-700 dark:text-purple-400 bg-gray-100 dark:bg-gray-700 rounded-lg text-sm">
                        B
                    </button>
                </div>

                <!-- 中文描述 -->
                <div class="text-gray-700 dark:text-gray-200">
                    灵活又优雅，简洁而强大。
                </div>

                <!-- 颜色按钮组 -->
                <div class="flex items-center justify-start space-x-2">
                    <button class="w-8 h-8 rounded-full bg-red-500"></button>
                    <button class="w-8 h-8 rounded-full bg-green-500"></button>
                    <button class="w-8 h-8 rounded-full bg-blue-500"></button>
                    <button class="w-8 h-8 rounded-full bg-yellow-500"></button>
                    <button class="w-8 h-8 rounded-full bg-purple-500"></button>
                </div>

                <!-- 示例文本 -->
                <div class="p-4 bg-green-100 dark:bg-green-900/30 rounded-xl text-gray-700 dark:text-gray-200">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                </div>

                <!-- 两列布局 -->
                <div class="grid grid-cols-2 gap-8">
                    <!-- 左侧图形按钮组 -->
                    <div class="space-y-4">
                        <div
                            class="flex items-center justify-center space-x-2 bg-gray-100 dark:bg-gray-700 p-4 rounded-xl">
                            <button class="p-2 text-purple-700 dark:text-purple-400">
                                <div class="w-5 h-5 border-2 border-current"></div>
                            </button>
                            <button class="p-2 text-purple-700 dark:text-purple-400">
                                <div class="w-5 h-5 rounded-full border-2 border-current"></div>
                            </button>
                            <button class="p-2 text-purple-700 dark:text-purple-400">
                                <div class="w-5 h-5 transform rotate-45 border-2 border-current"></div>
                            </button>
                            <button class="p-2 text-purple-700 dark:text-purple-400">
                                <RiStarLine class="w-5 h-5" />
                            </button>
                            <button class="p-2 text-purple-700 dark:text-purple-400">
                                <div class="w-5 h-5 transform rotate-[30deg] border-2 border-current"></div>
                            </button>
                        </div>
                        <div
                            class="flex items-center justify-start space-x-2 bg-gray-100 dark:bg-gray-700 p-4 rounded-xl">
                            <button class="p-2 text-purple-700 dark:text-purple-400">
                                <RiDownloadLine class="w-5 h-5" />
                            </button>
                            <button class="p-2 text-purple-700 dark:text-purple-400">
                                <RiPencilLine class="w-5 h-5" />
                            </button>
                            <button class="p-2 text-purple-700 dark:text-purple-400">
                                <RiCropLine class="w-5 h-5" />
                            </button>
                        </div>
                    </div>

                    <!-- 右侧图片 -->
                    <div class="relative">
                        <img src="/images/juiceEditor/workspace.jpeg" alt="Workspace"
                            class="w-full h-64 object-cover rounded-xl" />
                    </div>
                </div>

                <!-- 底部信息 -->
                <div class="flex items-center justify-between pt-8">
                    <div class="flex items-center space-x-2">
                        <button class="p-2 text-purple-700 dark:text-purple-400">
                            <RiLinksLine class="w-5 h-5" />
                        </button>
                        <button class="p-2 text-purple-700 dark:text-purple-400">
                            T
                        </button>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700 dark:text-gray-200">Created by</span>
                        <a href="https://cofficlab.github.io"
                            class="text-purple-700 dark:text-purple-400 hover:underline">
                            https://cofficlab.github.io
                        </a>
                        <span class="text-gray-700 dark:text-gray-200">with love</span>
                    </div>
                </div>

                <!-- 语言选择 -->
                <div class="flex items-center justify-start space-x-2 pt-4">
                    <button
                        class="px-4 py-1 bg-gray-100 dark:bg-gray-700 rounded-lg text-purple-700 dark:text-purple-400">
                        T
                    </button>
                    <button class="px-4 py-1 text-gray-500">汉语</button>
                    <button class="px-4 py-1 text-gray-500">英语</button>
                    <button class="px-4 py-1 text-gray-500">日语</button>
                </div>

                <!-- 特点列表 -->
                <div class="space-y-2 text-gray-700 dark:text-gray-200">
                    <div>有何特别</div>
                    <ul class="list-disc list-inside space-y-1 pl-4">
                        <li>简单易用</li>
                        <li>优雅简洁的界面</li>
                        <li>丰富强大的 API</li>
                        <li>多平台、多框架的支持</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { RiStarLine, RiDownloadLine, RiPencilLine, RiCropLine, RiLinksLine } from '@remixicon/vue'

defineProps({
    height: {
        type: String,
        default: 'h-[48rem]',
        validator: (value: string) => {
            return [
                'h-64',
                'h-96',
                'h-[32rem]',
                'h-[40rem]',
                'h-[48rem]',
                'h-[56rem]'
            ].includes(value)
        }
    }
})
</script>

<style scoped>
.custom-scrollbar {
    scrollbar-width: thin;
    scrollbar-color: rgba(156, 163, 175, 0.5) transparent;
}

.custom-scrollbar::-webkit-scrollbar {
    width: 8px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background-color: rgba(156, 163, 175, 0.5);
    border-radius: 4px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background-color: rgba(156, 163, 175, 0.7);
}

:dark .custom-scrollbar {
    scrollbar-color: rgba(156, 163, 175, 0.3) transparent;
}

:dark .custom-scrollbar::-webkit-scrollbar-thumb {
    background-color: rgba(156, 163, 175, 0.3);
}

:dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background-color: rgba(156, 163, 175, 0.5);
}
</style>