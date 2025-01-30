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
import CisumApp from './CisumApp.vue';
import CisumApps from './CisumApps.vue';

const props = defineProps({
    lang: {
        type: String,
        default: 'en',
        validator: (value: string) => ['en', 'zh'].includes(value)
    }
})

const banners = [
    Banner.create()
        .setZhTitle('播放音乐 - 简简单单')
        .setEnTitle('Play music - Simple and easy')
        .setComponent(CisumApp)
        .setComponentProps({ height: 'h-[20rem]', songIndex: 1, lang: props.lang })
        .withFeatures([
            Feature.createWithIcon('💡').setZh('一键操作').setEn('One-click operation'),
            Feature.createWithIcon('💣').setZh('没有负担').setEn('No burden'),
        ]),

    Banner.create()
        .setZhTitle('各个平台 - 尽享美好')
        .setEnTitle('All platforms - Enjoy the beauty')
        .setComponent(CisumApps)
        .setComponentProps({
            height: 'h-[32rem]',
            showDBView: true,
            songIndex: 4,
            lang: props.lang
        })
        .withFeatures([
            Feature.createWithIcon('🔄').setZh('多平台同步').setEn('Multi-platform synchronization'),
            Feature.createWithIcon('📱').setZh('支持 iOS').setEn('iOS'),
            Feature.createWithIcon('🖥️').setZh('支持 macOS').setEn('macOS'),
        ]),

    Banner.create()
        .setZhTitle('干扰全无 - 清新轻松')
        .setEnTitle('Ad-free - Fresh and easy')
        .setComponent(CisumApp)
        .setComponentProps({ height: 'h-[20rem]', songIndex: 2, lang: props.lang })
        .withFeatures([
            Feature.createWithIcon('🪧').setZh('无广告').setEn('No ads'),
            Feature.createWithIcon('📺').setZh('无弹窗').setEn('No pop-ups'),
            Feature.createWithIcon('🔑').setZh('无注册').setEn('No registration'),
            Feature.createWithIcon('📱').setZh('无登录').setEn('No login'),
            Feature.createWithIcon('🔍').setZh('无扫码').setEn('No scan code'),
        ]),

    Banner.create()
        .setZhTitle('音乐仓库 - 随心随意')
        .setEnTitle('Music library - Simple and powerful')
        .setComponent(CisumApp)
        .setComponentProps({ height: 'h-[28rem]', showDBView: true, songIndex: 3, lang: props.lang, showPlayerView: false })
        .withFeatures([
            Feature.createWithIcon('🎁').setZh('支持本地音乐').setEn('Local music'),
            Feature.createWithIcon('☁️').setZh('支持 iCloud 云盘').setEn('iCloud music'),
            Feature.createWithIcon('🔄').setZh('支持播放列表').setEn('Playlists'),
            Feature.createWithIcon('📥').setZh('支持导入').setEn('Import'),
            Feature.createWithIcon('📤').setZh('支持导出').setEn('Export'),
        ]),

    Banner.create()
        .setZhTitle('开始享受美好')
        .setEnTitle('Start Enjoying the Beauty')
        .setZhDescription("别忘了点亮🌟")
        .setEnDescription("Don't forget to light up the 🌟")
        .withFeatures([
            Feature.createWithIcon('💬').setZh('反馈问题').setEn('Feedback').setLink('https://github.com/CofficLab/Cisum_SwiftUI/issues'),
            Feature.createWithIcon('🐈').setZh('GitHub').setEn('GitHub').setLink('https://github.com/CofficLab/Cisum_SwiftUI'),
            Feature.createWithIcon('🍎').setZh('App Store').setEn('App Store').setLink('https://apps.apple.com/cn/app/cisum/id6466401036')
        ]),
];
</script>
