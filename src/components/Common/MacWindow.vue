<template>
    <div class="flex max-w-5xl mx-auto bg-white/90 dark:bg-gray-800 relative rounded-2xl overflow-hidden shadow" :class="[
        props.height,
        props.withShadow ? 'shadow' : ''
    ]">
        <!-- 窗口控制按钮 -->
        <div
            class="absolute top-0 left-0 right-0 flex items-center h-12 px-4 bg-gray-100 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 rounded-full bg-red-500 cursor-pointer" @click="handleCloseWindow"></div>
                <div class="w-3 h-3 rounded-full bg-yellow-500 cursor-pointer" @click="handleMinimizeWindow"></div>
                <div class="w-3 h-3 rounded-full bg-green-500 cursor-pointer" @click="handleMaximizeWindow"></div>
            </div>
            <div class="ml-6 text-sm font-medium text-gray-700 dark:text-gray-200">{{ props.title }}</div>

            <!-- 添加标签选择器 -->
            <div v-if="props.tabs?.length" class="flex-1 flex justify-center">
                <div class="inline-flex rounded-lg bg-gray-200 dark:bg-gray-600 p-1">
                    <button v-for="(tab, index) in props.tabs" :key="index" @click="handleTabClick(tab.value)" :class="[
                        'px-3 py-1 text-sm rounded-md transition-colors',
                        modelValue === tab.value
                            ? 'bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow'
                            : 'text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white'
                    ]">
                        {{ tab.label }}
                    </button>
                </div>
            </div>

            <div class="ml-auto flex items-center space-x-2">
                <template v-for="(button, index) in props.toolbarButtons" :key="index">
                    <button
                        class="p-1.5 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 rounded"
                        @click="button.onClick">
                        <component :is="button.icon" class="w-4 h-4" />
                    </button>
                </template>
            </div>
        </div>

        <!-- 主要内容区域 -->
        <div class="flex-1 flex flex-col pt-12 h-full">
            <div class="flex flex-1 h-full overflow-hidden">
                <!-- 左侧栏插槽 -->
                <slot name="sidebar"></slot>

                <!-- 主内容插槽 -->
                <slot></slot>
            </div>

            <!-- 底部状态栏 -->
            <div v-if="statusBarButtons?.length"
                class="h-6 bg-gray-100/95 dark:bg-gray-700/95 border-t border-gray-200 dark:border-gray-600 flex items-center justify-end px-4 text-sm">
                <div class="flex items-center space-x-0">
                    <template v-for="(button, index) in statusBarButtons" :key="index">
                        <button class="hover:text-blue-400 p-2 text-gray-600 dark:text-gray-200"
                            @click="button.onClick">
                            <component :is="button.icon" class="w-4 h-4" />
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
    <!-- 添加 AlertDialog 组件 -->
    <AlertDialog v-model="showAlertDialog" :message="alertMessage" />
</template>

<script setup>
import AlertDialog from './AlertDialog.vue'
import { ref } from 'vue'

const props = defineProps({
    height: {
        type: String,
        default: 'h-96'
    },
    title: {
        type: String,
        default: ''
    },
    toolbarButtons: {
        type: Array,
        default: () => []
    },
    statusBarButtons: {
        type: Array,
        default: () => []
    },
    withShadow: {
        type: Boolean,
        default: true
    },
    tabs: {
        type: Array,
        default: () => []
    },
    modelValue: {
        type: String,
        default: ''
    }
})

const emit = defineEmits(['close', 'minimize', 'maximize', 'update:modelValue'])

const showAlertDialog = ref(false)
const alertMessage = ref('')

const handleCloseWindow = () => {
    alertMessage.value = '关闭APP窗口（这是演示，不会真实操作）'
    showAlertDialog.value = true
    emit('close')
}

const handleMinimizeWindow = () => {
    alertMessage.value = '最小化窗口（这是演示，不会真实操作）'
    showAlertDialog.value = true
    emit('minimize')
}

const handleMaximizeWindow = () => {
    alertMessage.value = '最大化窗口（这是演示，不会真实操作）'
    showAlertDialog.value = true
    emit('maximize')
}

const handleTabClick = (value) => {
    emit('update:modelValue', value)
}
</script>