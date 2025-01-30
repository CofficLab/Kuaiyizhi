<template>
    <Transition name="fade">
        <div v-if="modelValue" class="fixed inset-0 z-50 flex items-center justify-center">
            <!-- 背景遮罩 -->
            <div class="absolute inset-0 bg-black/20 dark:bg-black/40 backdrop-blur-sm"
                @click="$emit('update:modelValue', false)"></div>

            <!-- 对话框 -->
            <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-xl w-[400px] transform transition-all">
                <!-- 内容区域 -->
                <div class="p-6">
                    <p class="text-gray-600 dark:text-gray-300">{{ message }}</p>
                </div>

                <!-- 按钮区域 -->
                <div class="flex border-t border-gray-200 dark:border-gray-700">
                    <button @click="$emit('update:modelValue', false)"
                        class="flex-1 px-4 py-3 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors rounded-b-xl font-medium">
                        确定
                    </button>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script setup>
defineProps({
    modelValue: Boolean,
    message: String
})
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>