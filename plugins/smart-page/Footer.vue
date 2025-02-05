<template>
    <footer
        class="mt-24 bg-gradient-to-br from-gray-400/20 to-gray-400/10 dark:from-slate-800 dark:to-gray-800/80 z-50 no-underline">
        <div class="flex flex-col justify-center">
            <a href="/" class="flex items-center self-center w-auto text-lg font-bold smart-link my-6">
                <div class="flex flex-row justify-center w-full">
                    <img src="/images/coffic/logo4.min.png" alt="CofficLab" class="h-8 fill-current my-auto flex" />
                    <span class="w-full ml-2 text-xl font-bold my-auto">CofficLab</span>
                </div>
            </a>

            <div class="flex flex-col w-full text-xs">
                <div class="flex flex-row justify-center w-full gap-2 p-0">
                    <ul class="flex flex-col gap-4">
                        <li>
                            <a href="https://www.kuaiyc.com" class="smart-link" target="_blank">{{ lang === 'en' ?
                                'Kuaiyicha' : '快易查' }}</a>
                        </li>
                        <li>
                            <a href="https://www.kuaiyizhi.cn" class="smart-link" target="_blank">{{ lang === 'en' ?
                                'Knowledge Database' : '快易知' }}</a>
                        </li>
                        <li>
                            <a href="https://www.kuaiyc.com/products" class="smart-link" target="_blank">{{ lang ===
                                'en' ? 'API Products' : 'API 产品' }}</a>
                        </li>
                        <li>
                            <a href="https://www.kuaiyizhi.cn/ideas" class="smart-link" target="_blank">{{ lang === 'en'
                                ? 'Tutorial Series' : '系列教程' }}</a>
                        </li>
                    </ul>
                    <ul class="flex flex-col gap-4">
                        <li>
                            <a href="https://apps.apple.com/cn/app/cisum/id6466401036" class="smart-link"
                                target="_blank">Cisum</a>
                        </li>
                        <li>
                            <a href="https://github.com/cofficlab" class="smart-link" target="_blank">GitHub</a>
                        </li>
                        <li>
                            <a href="https://apps.apple.com/cn/app/%E5%BF%AB%E6%98%93%E7%9F%A5/id6457892799"
                                class="smart-link" target="_blank">{{ lang === 'en' ? 'JuiceNote' : '聚思笔记' }}</a>
                        </li>
                        <li>
                            <a href="https://github.com/CofficLab/JuiceEditor" class="smart-link"
                                target="_blank">JuiceEditor</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="self-center mt-8 mb-4 text-xs">
                <p>{{ lang === 'en' ? 'All rights reserved.' : '版权所有' }} &copy; 2024-present Coffic Lab</p>
            </div>
        </div>
    </footer>
</template>

<script lang="ts" setup>
defineProps({
    lang: {
        type: String,
        default: 'en',
    },
});
</script>

<style scoped lang="postcss">
li {
    @apply list-none;
}

.smart-link {
    @apply px-4 py-2 rounded-xl ring-white/50 no-underline hover:ring-1 hover:shadow-2xl hover:bg-green-600/10 hover:backdrop-blur transform duration-100;
}
</style>