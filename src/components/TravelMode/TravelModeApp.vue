<template>
    <MacWindow :height="height" title="TravelMode" :toolbarButtons="toolbarButtons">
        <div class="flex flex-col w-full h-full">
            <!-- 应用列表 -->
            <div v-if="showAppList" class="flex-1 basis-1/2 min-h-0">
                <div class="h-full overflow-y-auto">
                    <div class="p-4 space-y-2">
                        <div v-for="app in apps.slice(0, appsCount)" :key="app.name"
                            class="flex items-center p-3 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group"
                            :class="{
                                'bg-red-100 dark:bg-red-900/30': blockedApps.has(app.bundleId)
                            }">
                            <div class="w-8 h-8 flex items-center justify-center text-xl">{{ app.icon }}</div>
                            <div class="ml-3 flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <div class="font-medium text-gray-900 dark:text-gray-100 text-start">{{ app.name
                                            }}
                                        </div>
                                        <div class="flex flex-row gap-2">
                                            <div class="text-sm text-gray-500">{{ app.pid }}</div>
                                            <div class="text-sm text-gray-500">{{ app.bundleId }}</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2" v-if="showActionButtons">
                                        <!-- 新增的按钮组，默认隐，group-hover时显示 -->
                                        <div class="hidden group-hover:flex space-x-2">
                                            <button @click="handleBlockNetwork(app)"
                                                class="p-1.5 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 text-red-600 dark:text-red-400 disabled:opacity-50 disabled:cursor-not-allowed"
                                                :disabled="blockedApps.has(app.bundleId)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <button @click="handleAllowNetwork(app)"
                                                class="p-1.5 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 text-green-600 dark:text-green-400 disabled:opacity-50 disabled:cursor-not-allowed"
                                                :disabled="!blockedApps.has(app.bundleId)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 日志表格 -->
            <div v-if="isNetworkLogsVisible"
                class="flex-1 basis-1/2 min-h-0 shadow border-t border-gray-200 dark:border-gray-700">
                <div class="h-full overflow-y-auto pb-4 w-full">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700/50 w-full">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">时间</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">APP</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">ID</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">地址</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">端口</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">方向</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">状态</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr v-for="(log, index) in networkLogs" :key="index"
                                class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ log.time }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex items-center">
                                        <div class="w-5 h-5 mr-2">{{ log.icon }}</div>
                                        <span class="text-gray-600 dark:text-gray-300">{{ log.app }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300 font-mono text-xs">{{ log.id }}
                                </td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ log.address }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ log.port }}</td>
                                <td class="px-4 py-2">
                                    <span class="text-gray-600 dark:text-gray-300">{{ log.direction === '出' ? '出站' :
                                        '入站'
                                        }}</span>
                                </td>
                                <td class="px-4 py-2">
                                    <span :class="log.status === '允许' ? 'text-green-500' : 'text-red-500'">{{ log.status
                                        }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- 对话框组件 -->
        <ConfirmDialog v-model="showConfirmDialog" :title="confirmDialogTitle" :message="confirmDialogMessage"
            @confirm="handleDialogConfirm" />
        <AlertDialog v-model="showAlertDialog" :message="alertMessage" />
    </MacWindow>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import MacWindow from '../Common/MacWindow.vue'
import ConfirmDialog from '../Common/ConfirmDialog.vue'
import AlertDialog from '../Common/AlertDialog.vue'
import { apps } from './data/apps'
import { networkLogs } from './data/networkLogs'
import { RiListView } from '@remixicon/vue'

const props = defineProps({
    height: {
        type: String,
        default: 'h-96'
    },
    showActionButtons: {
        type: Boolean,
        default: true
    },
    showAppList: {
        type: Boolean,
        default: true
    },
    showNetworkLogs: {
        type: Boolean,
        default: true
    },
    showToolbarIcons: {
        type: Boolean,
        default: true
    },
    appsCount: {
        type: Number,
        default: 10
    }
})

// 对话框状态
const showConfirmDialog = ref(false)
const confirmDialogTitle = ref('')
const confirmDialogMessage = ref('')

// 添加类型定义
type ActionFunction = () => void;

// 修改 ref 的类型声明
const pendingAction = ref<ActionFunction | null>(null);

// 添加 Alert 对话框状态
const showAlertDialog = ref(false)
const alertMessage = ref('')

// 添加一个新的 ref 来跟踪被禁止的应用
const blockedApps = ref(new Set(['com.apple.Safari']))

// 添加日志显示状态控制
const isNetworkLogsVisible = ref(props.showNetworkLogs)

// 添加工具栏按钮配置
const toolbarButtons = props.showToolbarIcons ? [
    {
        icon: RiListView,
        onClick: () => {
            isNetworkLogsVisible.value = !isNetworkLogsVisible.value
        }
    }
] : []

const handleBlockNetwork = (app) => {
    confirmDialogTitle.value = '确认禁止联网'
    confirmDialogMessage.value = `确定要禁止 ${app.name} 联网吗？（演示）`
    pendingAction.value = () => {
        blockedApps.value.add(app.bundleId)
        alertMessage.value = '操作已确认（演示）'
        showAlertDialog.value = true
    }
    showConfirmDialog.value = true
}

const handleAllowNetwork = (app) => {
    confirmDialogTitle.value = '确认允许联网'
    confirmDialogMessage.value = `确定要允许 ${app.name} 联网吗？（这是演示）`
    pendingAction.value = () => {
        blockedApps.value.delete(app.bundleId)
        alertMessage.value = '操作已确认（演示）'
        showAlertDialog.value = true
    }
    showConfirmDialog.value = true
}

const handleDialogConfirm = () => {
    if (pendingAction.value) {
        pendingAction.value()
        pendingAction.value = null
    }
}
</script>