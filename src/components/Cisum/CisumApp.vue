<template>
    <component :is="windowComponent" v-bind="windowProps" title="Cisum Player">
        <!-- 主要内容区域 -->
        <div class="flex-1 flex flex-col"
            :class="deviceType === 'mac' ? 'bg-gradient-to-br from-emerald-500/60 to-blue-900/60' : ''">
            <!-- 播放器区域 -->
            <div v-if="showPlayerView" :class="{
                'flex-none pb-4 mx-8 mt-8 bg-red-300/0': true,
                'mx-8': deviceType === 'mac',
                'mx-auto': deviceType === 'iphone'
            }">
                <div class="text-2xl font-medium mb-4">{{ currentSong.name }}</div>
                <!-- 进度条 -->
                <div :class="{
                    'flex items-center mt-12 mx-auto': true,
                    'w-3/4 space-x-4': deviceType === 'mac',
                    'w-full space-x-4': deviceType === 'iphone'
                }">
                    <span class="text-sm">00:00</span>
                    <div class="flex-1 h-1 bg-white/30 rounded-full">
                        <div class="w-1/4 h-full bg-white rounded-full"></div>
                    </div>
                    <span class="text-sm">04:32</span>
                </div>
                <!-- 控制按钮 -->
                <div class="flex items-center justify-center space-x-8 mt-12">
                    <button class="text-2xl">
                        <RiShuffleLine class="w-8 h-8" />
                    </button>
                    <button class="text-2xl">
                        <RiPlayCircleLine class="w-8 h-8" />
                    </button>
                    <button class="text-3xl">
                        <RiSkipForwardLine class="w-8 h-8" />
                    </button>
                    <button class="text-2xl">
                        <RiShuffleLine class="w-8 h-8" />
                    </button>
                    <button class="text-2xl">
                        <RiRepeatLine class="w-8 h-8" />
                    </button>
                </div>
            </div>

            <!-- 歌曲列表 -->
            <div v-if="showDBView"
                class="flex-1 bg-white dark:bg-gray-800 p-4 overflow-y-auto border-t border-gray-200 dark:border-gray-700">
                <div class="text-sm text-gray-500 mb-2 text-start pl-4">共 2918</div>
                <!-- 歌曲列表 -->
                <div class="space-y-2">
                    <div v-for="song in songs" :key="song.name"
                        class="flex items-center p-3 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <div
                            class="w-12 h-12 rounded-lg bg-gray-200 flex-shrink-0 flex items-center justify-center text-2xl">
                            {{ song.cover }}
                        </div>
                        <div class="ml-3 flex-1 flex flex-col justify-start text-start">
                            <div class="font-medium text-gray-900 dark:text-gray-100">{{ song.name }}</div>
                            <div class="text-sm text-gray-500">{{ song.size }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </component>
</template>

<script setup>
import MacWindow from '../Common/MacWindow.vue'
import iPhoneWindow from '../Common/iPhoneWindow.vue'
import { RiPlayCircleLine, RiShuffleLine, RiSkipForwardLine, RiRepeatLine } from '@remixicon/vue';
import { computed } from 'vue';

const props = defineProps({
    height: {
        type: String,
        default: 'h-[40rem]',
    },
    showPlayerView: {
        type: Boolean,
        default: true
    },
    showDBView: {
        type: Boolean,
        default: false
    },
    lang: {
        type: String,
        default: 'zh',
        validator: (value) => ['zh', 'en'].includes(value)
    },
    songIndex: {
        type: Number,
        default: 0
    },
    deviceType: {
        type: String,
        default: 'mac',
        validator: (value) => ['mac', 'iphone'].includes(value)
    }
})

const windowComponent = computed(() => props.deviceType === 'mac' ? MacWindow : iPhoneWindow)

const currentSong = computed(() => songs.value[props.songIndex])

const songs = computed(() => props.lang === 'zh' ? [
    { name: '林俊杰-生生.mp3', size: '10.4MB', cover: '🌱' },
    { name: '林俊杰-不为谁而作的歌.wav', size: '46.9MB', cover: '🎸' },
    { name: '光良-每一次喊你 (Live)-6.mp3', size: '4.8MB', cover: '🎤' },
    { name: '光良-1901的上一位房客-6.mp3', size: '11.5MB', cover: '🏠' },
    { name: '周杰伦-她de睡颜.wav', size: '41.1MB', cover: '😴' },
    { name: 'Groove Coverage - On The Radio.wav', size: '31.9MB', cover: '📻' },
    { name: '伍佰-那威威的森林.wav', size: '69.1MB', cover: '🌳' },
    { name: 'ai mini - 遇.wav', size: '65.8MB', cover: '🤖' },
    { name: '孙燕姿-星期一天气晴我离开你.mp3', size: '10.5MB', cover: '☀️' }
] : [
    { name: 'Various Artists - The Way I Am.wav', size: '48.1MB', cover: '💌' },
    { name: 'Ed Sheeran - Shape of You.mp3', size: '9.2MB', cover: '🎸' },
    { name: 'Adele - Rolling in the Deep.wav', size: '25.3MB', cover: '🎤' },
    { name: 'Bruno Mars - Uptown Funk.mp3', size: '8.7MB', cover: '🎺' },
    { name: 'Taylor Swift - Blank Space.wav', size: '30.1MB', cover: '📝' },
    { name: 'Maroon 5 - Sugar.mp3', size: '7.8MB', cover: '🍬' },
    { name: 'The Weeknd - Blinding Lights.wav', size: '32.4MB', cover: '💡' },
    { name: 'Billie Eilish - Bad Guy.mp3', size: '9.1MB', cover: '😈' },
    { name: 'Dua Lipa - Levitating.wav', size: '28.5MB', cover: '🌌' },
    { name: 'Shawn Mendes - Stitches.mp3', size: '8.3MB', cover: '🧵' },
    { name: 'Imagine Dragons - Believer.wav', size: '35.2MB', cover: '🔥' }
])

const windowProps = computed(() => {
    const base = {
        height: props.deviceType === 'iphone' ? '' : props.height
    }

    if (props.deviceType === 'iphone') {
        base.showFrame = true
    }

    return base
})
</script>
