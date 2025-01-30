<template>
    <MacWindow :height="height" title="GitOK" :toolbarButtons="[
        {
            icon: RiTerminalBoxLine,
            onClick: () => handleTerminal()
        },
        {
            icon: RiGitBranchLine,
            onClick: () => handleBranch()
        },
        {
            icon: RiDatabase2Line,
            onClick: () => handleDatabase()
        },
        {
            icon: RiPlayCircleLine,
            onClick: () => handlePlay()
        },
        {
            icon: RiSettings4Line,
            onClick: () => handleSettings()
        },
        {
            icon: RiRefreshLine,
            onClick: () => handleRefresh()
        }
    ]" :tabs="tabs" v-model="activeTab">
        <!-- 左侧边栏 -->
        <template #sidebar>
            <div class="w-32 bg-gray-50 dark:bg-gray-700/90 border-r border-gray-200 dark:border-gray-600">
                <div class="p-2">
                    <a v-for="project in projects" :key="project.name" :href="project.url" target="_blank"
                        class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg text-left">
                        {{ project.name }}
                    </a>
                </div>
            </div>
        </template>

        <!-- 主要内容区域 -->
        <div class="flex h-full w-full">
            <GitContent v-if="activeTab === 'git'" />
            <BannerContent v-else-if="activeTab === 'banner'" />
            <IconContent v-else-if="activeTab === 'icon'" />
            <ApiContent v-else-if="activeTab === 'api'" />
            <DatabaseContent v-else-if="activeTab === 'database'" />
        </div>
    </MacWindow>
</template>

<script setup lang="ts">
import {
    RiTerminalBoxLine,
    RiGitBranchLine,
    RiDatabase2Line,
    RiPlayCircleLine,
    RiSettings4Line,
    RiRefreshLine
} from '@remixicon/vue'
import MacWindow from '../Common/MacWindow.vue'
import { ref } from 'vue';
import GitContent from './Components/GitContent.vue'
import BannerContent from './Components/BannerContent.vue'
import IconContent from './Components/IconContent.vue'
import ApiContent from './Components/ApiContent.vue'
import DatabaseContent from './Components/DatabaseContent.vue'

const props = defineProps({
    height: {
        type: String,
        default: 'h-[40rem]'
    },
    defaultTab: {
        type: String,
        default: 'git'
    }
})

const activeTab = ref(props.defaultTab)
const tabs = [
    { label: 'Git', value: 'git' },
    { label: 'Banner', value: 'banner' },
    { label: 'Icon', value: 'icon' },
    { label: 'API', value: 'api' },
    { label: 'DB', value: 'database' },
]

const projects = [
    {
        name: 'GitOK',
        url: 'https://github.com/cofficlab/GitOK'
    },
    {
        name: 'Cisum',
        url: 'https://github.com/cofficlab/Cisum_SwiftUI'
    },
    {
        name: 'JuiceEditor',
        url: 'https://github.com/cofficlab/JuiceEditor'
    },
    {
        name: 'TravelMode',
        url: 'https://github.com/cofficlab/TravelMode'
    },
    {
        name: 'Hackintosh',
        url: 'https://github.com/nookery/Hackintosh-DeskMini-H310'
    },
    {
        name: 'Author',
        url: 'https://github.com/nookery'
    },
    {
        name: 'CofficLab',
        url: 'https://github.com/cofficlab'
    }
]

const handleTerminal = () => console.log('Terminal clicked')
const handleBranch = () => console.log('Branch clicked')
const handleDatabase = () => console.log('Database clicked')
const handlePlay = () => console.log('Play clicked')
const handleSettings = () => console.log('Settings clicked')
const handleRefresh = () => console.log('Refresh clicked')
</script>
