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
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">{{ title }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ message }}</p>
                </div>

                <!-- 按钮区域 -->
                <div class="flex border-t border-gray-200 dark:border-gray-700">
                    <button @click="$emit('update:modelValue', false)"
                        class="flex-1 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors rounded-bl-xl">
                        取消
                    </button>
                    <button @click="handleConfirm"
                        class="flex-1 px-4 py-3 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors border-l border-gray-200 dark:border-gray-700 rounded-br-xl font-medium">
                        确认
                    </button>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script setup>
const props = defineProps({
    modelValue: Boolean,
    title: String,
    message: String
})

const emit = defineEmits(['update:modelValue', 'confirm'])

const handleConfirm = () => {
    emit('update:modelValue', false)
    emit('confirm')
}
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