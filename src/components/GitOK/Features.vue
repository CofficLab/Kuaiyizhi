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
import GitOKApp from './GitOKApp.vue';

const props = defineProps({
    lang: {
        type: String,
        default: 'en',
        validator: (value: string) => ['en', 'zh'].includes(value)
    }
})

const banners = [
    Banner.create()
        .setZhTitle('Git 项目管理')
        .setEnTitle('Git Management')
        .setComponent(GitOKApp)
        .setComponentProps({ height: 'h-[40rem]' })
        .withFeatures([
            Feature.createWithIcon('📈').setZh('可视化历史').setEn('Visual History'),
            Feature.createWithIcon('🌳').setZh('分支管理').setEn('Branch Management'),
            Feature.createWithIcon('📁').setZh('文件追踪').setEn('File Tracking'),
            Feature.createWithIcon('🔄').setZh('冲突解决').setEn('Conflict Resolution'),
        ]),

    Banner.create()
        .setZhTitle('Banner 生成器')
        .setEnTitle('Banner Generator')
        .setComponent(GitOKApp)
        .setComponentProps({
            height: 'h-[32rem]',
            defaultTab: 'banner'
        })
        .withFeatures([
            Feature.createWithIcon('📱').setZh('App Store 适配').setEn('App Store Ready'),
            Feature.createWithIcon('🎨').setZh('多种模板').setEn('Multiple Templates'),
            Feature.createWithIcon('⚙️').setZh('自定义设计').setEn('Customizable'),
            Feature.createWithIcon('📦').setZh('多种格式').setEn('Multi-Format'),
        ]),

    Banner.create()
        .setZhTitle('Icon 生成器')
        .setEnTitle('Icon Generator')
        .setComponent(GitOKApp)
        .setComponentProps({ height: 'h-[32rem]', defaultTab: 'icon' })
        .withFeatures([
            Feature.createWithIcon('💻').setZh('多平台支持').setEn('Multi-Platform'),
            Feature.createWithIcon('📏').setZh('自动尺寸').setEn('Auto-Size'),
            Feature.createWithIcon('🎨').setZh('自定义设计').setEn('Custom Design'),
            Feature.createWithIcon('📤').setZh('快速导出').setEn('Quick Export'),
        ]),

    Banner.create()
        .setZhTitle('API 测试工具')
        .setEnTitle('API Tester')
        .setComponent(GitOKApp)
        .setComponentProps({ height: 'h-[32rem]', defaultTab: 'api' })
        .withFeatures([
            Feature.createWithIcon('🔄').setZh('多种请求方法').setEn('Multiple Methods'),
            Feature.createWithIcon('📊').setZh('可视化响应').setEn('Visual Response'),
            Feature.createWithIcon('⚙️').setZh('参数管理').setEn('Parameter Manager'),
            Feature.createWithIcon('📝').setZh('历史记录').setEn('History Tracking'),
        ]),

    Banner.create()
        .setZhTitle('数据库管理器')
        .setEnTitle('Database Manager')
        .setComponent(GitOKApp)
        .setComponentProps({ height: 'h-[32rem]', defaultTab: 'database' })
        .withFeatures([
            Feature.createWithIcon('💾').setZh('MySQL 和 SQLite').setEn('MySQL & SQLite'),
            Feature.createWithIcon('📊').setZh('可视化数据').setEn('Visual Data'),
            Feature.createWithIcon('📝').setZh('SQL 查询').setEn('SQL Query'),
            Feature.createWithIcon('🔄').setZh('数据导入导出').setEn('Data I/O'),
        ]),

    Banner.create()
        .setZhTitle('美好源于第一次尝试')
        .setEnTitle('Beauty Comes from the First Try')
        .setZhDescription("别忘了点亮🌟")
        .setEnDescription("Don't forget to light up the 🌟")
        .withFeatures([
            Feature.createWithIcon('💬').setZh('反馈问题').setEn('Feedback').setLink('https://github.com/CofficLab/GitOK/issues'),
            Feature.createWithIcon('🐈').setZh('GitHub').setEn('GitHub').setLink('https://github.com/CofficLab/GitOK'),
        ]),
];
</script>