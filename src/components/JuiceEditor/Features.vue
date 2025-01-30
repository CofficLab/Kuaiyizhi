<template>
    <div class="flex flex-col gap-8">
        <SmartBanner :background-class-index="index + 1" v-for="(banner, index) in banners"
            :key="banner.getTitle(props.lang)" :banner="banner" :lang="props.lang" />
    </div>
</template>

<script setup lang="ts">
import SmartBanner from '../Common/SmartBanner.vue';
import Banner from '../Model/Banner';
import Feature from '../Model/Feature';

const props = defineProps({
    lang: {
        type: String,
        default: 'en',
        validator: (value: string) => ['en', 'zh'].includes(value)
    }
})

const banners = [
    Banner.create()
        .setZhTitle('优雅简约 - 专注写作')
        .setEnTitle('Elegant and Simple')
        .withFeatures([
            Feature.createWithIcon('📝').setZh('所见即所得').setEn('WYSIWYG'),
            Feature.createWithIcon('🎨').setZh('主题定制').setEn('Themes'),
            Feature.createWithIcon('📱').setZh('响应式设计').setEn('Responsive'),
            Feature.createWithIcon('⚡').setZh('实时预览').setEn('Real-time Preview'),
        ]),

    Banner.create()
        .setZhTitle('API 支持')
        .setEnTitle('API Support')
        .withFeatures([
            Feature.createWithIcon('🔌').setZh('插件系统').setEn('Plugin System'),
            Feature.createWithIcon('🎯').setZh('事件系统').setEn('Event System'),
            Feature.createWithIcon('🔧').setZh('工具链').setEn('Toolchain'),
            Feature.createWithIcon('📦').setZh('扩展性').setEn('Extensible'),
        ]),

    Banner.create()
        .setZhTitle('多平台支持')
        .setEnTitle('Multi-platform Support')
        .withFeatures([
            Feature.createWithIcon('💻').setZh('桌面端').setEn('Desktop'),
            Feature.createWithIcon('📱').setZh('移动端').setEn('Mobile'),
            Feature.createWithIcon('🌐').setZh('网页端').setEn('Web'),
            Feature.createWithIcon('⚡').setZh('小程序').setEn('Mini Program'),
        ]),

    Banner.create()
        .setZhTitle('框架集成')
        .setEnTitle('Framework Integration')
        .withFeatures([
            Feature.createWithIcon('⚛️').setZh('React').setEn('React'),
            Feature.createWithIcon('💚').setZh('Vue').setEn('Vue'),
            Feature.createWithIcon('🟣').setZh('Svelte').setEn('Svelte'),
            Feature.createWithIcon('🔷').setZh('Angular').setEn('Angular'),
        ]),

    Banner.create()
        .setZhTitle('AI 增强')
        .setEnTitle('AI Enhancement')
        .withFeatures([
            Feature.createWithIcon('✍️').setZh('智能写作').setEn('Smart Writing'),
            Feature.createWithIcon('🎯').setZh('内容优化').setEn('Content Optimization'),
            Feature.createWithIcon('🔍').setZh('语法检查').setEn('Grammar Check'),
            Feature.createWithIcon('💡').setZh('智能建议').setEn('Smart Suggestions'),
        ]),

    Banner.create()
        .setZhTitle('嵌入支持')
        .setEnTitle('Embed Support')
        .withFeatures([
            Feature.createWithIcon('🎥').setZh('视频嵌入').setEn('Video Embed'),
            Feature.createWithIcon('🎵').setZh('音频嵌入').setEn('Audio Embed'),
            Feature.createWithIcon('📊').setZh('图表嵌入').setEn('Chart Embed'),
            Feature.createWithIcon('🎮').setZh('交互嵌入').setEn('Interactive Embed'),
        ]),

    Banner.create()
        .setZhTitle('让我们一起开启美妙旅程')
        .setEnTitle('Don\'t Miss the Beauty')
        .setZhDescription("别忘了点亮🌟")
        .setEnDescription("Don't forget to light up the 🌟")
        .withFeatures([
            Feature.createWithIcon('💬').setZh('反馈问题').setEn('Feedback').setLink('https://github.com/CofficLab/JuiceEditor/issues'),
            Feature.createWithIcon('🐈').setZh('GitHub').setEn('GitHub').setLink('https://github.com/CofficLab/JuiceEditor'),
        ]),
];
</script>
