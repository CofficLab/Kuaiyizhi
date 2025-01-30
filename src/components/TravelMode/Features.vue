<template>
    <div class="flex flex-col gap-8">
        <SmartBanner v-for="(banner, index) in banners" :key="banner.getTitle(props.lang)" :backgroundClassIndex="index"
            :banner="banner" :lang="props.lang" />
    </div>
</template>

<script setup lang="ts">
import SmartBanner from '../Common/SmartBanner.vue';
import Banner from '../Model/Banner';
import Feature from '../Model/Feature';
import TravelModeApp from './TravelModeApp.vue';

const props = defineProps({
    lang: {
        type: String,
        default: 'en',
        validator: (value: string) => ['en', 'zh'].includes(value)
    }
})

const banners = [
    Banner.create()
        .setZhTitle('简约强大 - 干净利落')
        .setEnTitle('Clean and Powerful')
        .setComponent(TravelModeApp)
        .setComponentProps({
            height: 'h-[29rem]',
            appsCount: 5,
            showActionButtons: true,
            showNetworkLogs: false,
        })
        .withFeatures([
            Feature.createWithIcon('🖱️').setZh('一键操作').setEn('One-click Operation'),
            Feature.createWithIcon('⚙️').setZh('快速设置').setEn('Quick Settings'),
            Feature.createWithIcon('📤').setZh('简易规则').setEn('Simple Rules'),
            Feature.createWithIcon('🔄').setZh('自动保存').setEn('Auto Save'),
        ]),

    Banner.create()
        .setZhTitle('广告全无 - 清新轻松')
        .setEnTitle('Ad-free Experience')
        .setComponent(TravelModeApp)
        .setComponentProps({
            height: 'h-[24rem]',
            showActionButtons: false,
            appsCount: 4,
            showNetworkLogs: false,
        })
        .withFeatures([
            Feature.createWithIcon('🪧').setZh('无广告').setEn('No Ads'),
            Feature.createWithIcon('🔍').setZh('无跟踪').setEn('No Tracking'),
            Feature.createWithIcon('🪤').setZh('无弹窗').setEn('No Popups'),
            Feature.createWithIcon('💰').setZh('无内购').setEn('No In-App Purchases')
        ]),

    Banner.create()
        .setZhTitle('网络日志 - 透明清晰')
        .setEnTitle('Network Logs')
        .setComponent(TravelModeApp)
        .setComponentProps({
            height: 'h-[24rem]',
            showActionButtons: false,
            appsCount: 4,
            showNetworkLogs: true,
            showToolbarIcons: false,
            showAppList: false,
        }),

    Banner.create()
        .setZhTitle('原生开发 - 性能卓越')
        .setEnTitle('Native Development')
        .setComponent(TravelModeApp)
        .withFeatures([
            Feature.createWithIcon('💻').setZh('原生风格').setEn('Native Style'),
            Feature.createWithIcon('🚀').setZh('性能卓越').setEn('High Performance'),
            Feature.createWithIcon('🔥').setZh('稳定性强').setEn('High Stability'),
            Feature.createWithIcon('💾').setZh('体积小巧').setEn('Small Size'),
        ])
        .setComponentProps({
            height: 'h-[24rem]',
            showActionButtons: false,
            appsCount: 4,
            showNetworkLogs: false,
            showToolbarIcons: false,
            showAppList: true,
        }),

    Banner.create()
        .setZhTitle('美好不容错过')
        .setEnTitle('Don\'t Miss the Beauty')
        .setZhDescription("别忘了点亮🌟")
        .setEnDescription("Don't forget to light up the 🌟")
        .withFeatures([
            Feature.createWithIcon('💬').setZh('反馈问题').setEn('Feedback').setLink('https://github.com/CofficLab/TravelMode/issues'),
            Feature.createWithIcon('🐈').setZh('GitHub').setEn('GitHub').setLink('https://github.com/CofficLab/Netto'),
            Feature.createWithIcon('🍎').setZh('App Store').setEn('App Store').setLink('https://apps.apple.com/cn/app/travelmode/id6474899051?mt=12')
        ]),
];
</script>