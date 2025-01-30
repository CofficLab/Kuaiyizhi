<template>
    <div class="flex flex-col gap-8">
        <SmartBanner :background-class-index="index + 2" v-for="(banner, index) in banners"
            :key="banner.getTitle(props.lang)" :banner="banner" :lang="props.lang" />
    </div>
</template>

<script setup lang="ts">
import SmartBanner from '../Common/SmartBanner.vue';
import Banner from '../Model/Banner';
import Feature from '../Model/Feature';
import JuiceNoteApp from './JuiceNoteApp.vue';

const props = defineProps({
    lang: {
        type: String,
        default: 'en',
        validator: (value: string) => ['en', 'zh'].includes(value)
    }
})

const banners = [
    Banner.create()
        .setZhTitle('广告全无 - 自在由你')
        .setEnTitle('Ad-free - Freedom for you')
        .setComponent(JuiceNoteApp)
        .setComponentProps({ height: 'h-[32rem]' })
        .withFeatures([
            Feature.createWithIcon('📥').setZh('可导入').setEn('Importable'),
            Feature.createWithIcon('🔌').setZh('可离线').setEn('Offline'),
            Feature.createWithIcon('📤').setZh('可导出').setEn('Exportable'),
            Feature.createWithIcon('🔄').setZh('可同步').setEn('Syncable'),
        ]),

    Banner.create()
        .setZhTitle('简于形 - 强于心')
        .setEnTitle('Simple and powerful')
        .setComponent(JuiceNoteApp)
        .setComponentProps({ height: 'h-[32rem]' })
        .withFeatures([
            Feature.createWithIcon('📥').setZh('可导入').setEn('Importable'),
            Feature.createWithIcon('🔌').setZh('可离线').setEn('Offline'),
            Feature.createWithIcon('📤').setZh('可导出').setEn('Exportable'),
            Feature.createWithIcon('🔄').setZh('可同步').setEn('Syncable'),
        ]),

    Banner.create()
        .setZhTitle('开始记录美好')
        .setEnTitle('Start Recording the Beauty')
        .withFeatures([
            Feature.createWithIcon('🍎').setZh('App Store').setEn('App Store').setLink('https://apps.apple.com/cn/app/juice-note/id6457892799?mt=12'),
        ]),
];
</script>