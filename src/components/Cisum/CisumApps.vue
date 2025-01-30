<template>
    <div class="flex flex-col md:flex-row gap-8 justify-center items-center">
        <!-- macOS 版本 -->
        <div class="w-full md:w-2/3">
            <CisumApp deviceType="mac" height="h-[40rem]" :showDBView="true" :lang="lang" />
        </div>

        <!-- iPhone 版本 -->
        <div class="w-1/2 md:w-1/3">
            <CisumApp deviceType="iphone" height="h-[40rem]" :showDBView="true" :lang="lang" />
        </div>
    </div>
</template>

<script setup>
import CisumApp from './CisumApp.vue'

defineProps({
    lang: {
        type: String,
        default: 'zh',
        validator: (value) => ['zh', 'en'].includes(value)
    }
})
</script>
