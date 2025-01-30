<template>
    <MacWindow :height="height" title="JuiceNote" :toolbarButtons="[
        {
            icon: RiNotificationLine,
            onClick: () => handleNotification()
        },
        {
            icon: RiSettings3Line,
            onClick: () => handleSettings()
        }
    ]" :statusBarButtons="[
        {
            icon: RiGitRepositoryLine,
            onClick: () => handleGitRepository()
        },
        {
            icon: RiMessageLine,
            onClick: () => handleMessage()
        },
        {
            icon: RiInfoCardLine,
            onClick: () => handleInfo()
        }
    ]">
        <template #sidebar>
            <div class="w-48 bg-gray-800/95 text-gray-200 text-sm border-r border-gray-700">
                <div class="p-4">
                    <div>
                        <div class="flex items-center space-x-2 p-2 hover:bg-gray-700 rounded">
                            <RiHome2Line class="w-4 h-4" />
                            <span>{{ translations[lang].documentRepo }}</span>
                        </div>
                        <div class="flex items-center space-x-2 p-2 ml-4 hover:bg-gray-700 rounded">
                            <RiArticleLine class="w-4 h-4" />
                            <span>{{ translations[lang].spring }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <div class="flex-1 flex flex-col bg-gray-900">
            <div class="flex-1 overflow-auto p-6 bg-gray-900 text-gray-200 custom-scrollbar">
                <div class="space-y-0 text-center">
                    <div class="p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2">{{ translations[lang].spring }}</h3>
                        <p class="whitespace-pre-line">{{ translations[lang].poem }}</p>
                    </div>
                </div>
            </div>
        </div>
    </MacWindow>
</template>

<script setup lang="ts">
import { RiGitRepositoryLine, RiInfoCardLine, RiMessageLine, RiArticleLine, RiHome2Line, RiNotificationLine, RiSettings3Line } from '@remixicon/vue'
import MacWindow from '../Common/MacWindow.vue'

const props = defineProps({
    height: {
        type: String,
        default: 'h-[40rem]',
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
    },
    lang: {
        type: String,
        default: 'en',
        validator: (value: string) => ['en', 'zh', 'zh-cn'].includes(value)
    }
})

const lang = (props.lang === 'zh-cn' ? 'zh' : props.lang) as 'en' | 'zh'

const translations = {
    en: {
        documentRepo: 'Repository',
        spring: 'Spring',
        poem: `
            Spring brings gentle breeze and sun,
            Nature's dance has just begun.
            Flowers bloom in morning light,
            Creating such a lovely sight.
        `
    },
    zh: {
        documentRepo: '文档仓库',
        spring: '春日',
        poem: `
            春风拂柳绿如烟，
            花落花开又一年。
            蝴蝶纷飞春意闹，
            小园深处好晴天。
        `
    }
}

const handleNotification = () => {
    console.log('Notification clicked')
}

const handleSettings = () => {
    console.log('Settings clicked')
}

const handleGitRepository = () => {
    console.log('Git Repository clicked')
}

const handleMessage = () => {
    console.log('Message clicked')
}

const handleInfo = () => {
    console.log('Info clicked')
}
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