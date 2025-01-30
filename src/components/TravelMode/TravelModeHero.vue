<template>
    <CofficHero :title="title" :description="description" :links="links">
        <template #app>
            <TravelModeApp :lang="lang" height="h-[50em]" />
        </template>
    </CofficHero>
</template>

<script setup>
import CofficHero from '../Common/CofficHero.vue';
import TravelModeApp from './TravelModeApp.vue';
const props = defineProps({
    lang: {
        type: String,
        default: 'zh',
        validator: (value) => ['en', 'zh', 'zh-cn'].includes(value)
    }
})

const title = 'TravelMode'

const description = props.lang.startsWith('zh')
    ? '控制 macOS APP 的联网权限'
    : 'Control the network permission of macOS APP'

const links = [
    { text: 'macOS', href: 'https://apps.apple.com/cn/app/travelmode/id6474899051?mt=12' },
    { text: 'GitHub', href: 'https://github.com/CofficLab/TravelMode' },
    { text: 'Issues', href: 'https://github.com/CofficLab/TravelMode/issues' },
]
</script>