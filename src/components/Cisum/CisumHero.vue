<template>
    <CofficHero :title="title" :description="description" :links="links">
        <template #app>
            <CisumApp :lang="lang" :height="'h-[20rem]'" />
        </template>
    </CofficHero>
</template>

<script setup lang="ts">
import CofficHero from '../Common/CofficHero.vue';
import CisumApp from './CisumApp.vue';
const props = defineProps({
    lang: {
        type: String,
        default: 'zh',
        validator: (value: string) => ['en', 'zh'].includes(value)
    }
})

const title = 'Cisum'

const description = props.lang === 'zh' ? '播放音乐，本该如此简单' : 'Play music, it should be so simple'

const links = [
    { text: 'GitHub', href: 'https://github.com/Cofficlab/Cisum_SwiftUI' },
    { text: 'macOS & iOS', href: 'https://apps.apple.com/cn/app/cisum/id6466401036' },
    { text: 'Issues', href: 'https://github.com/Cofficlab/Cisum_SwiftUI/issues' },
]
</script>
