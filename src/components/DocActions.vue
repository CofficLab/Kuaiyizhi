<script setup lang="ts">
import { ref, computed } from 'vue';
import { RiFileCopyLine, RiCheckLine } from '@remixicon/vue';
import { userStore } from '@/stores/userStore';

const props = defineProps<{
    lang: string;
}>();

const isLoggedIn = computed(() => userStore.isLoggedIn());
const isCopied = ref(false);

const copyContent = async () => {
    try {
        // 获取文档内容区域
        const content = document.querySelector('.prose')?.textContent || '';
        await navigator.clipboard.writeText(content);

        // 显示复制成功状态
        isCopied.value = true;
        setTimeout(() => {
            isCopied.value = false;
        }, 2000);
    } catch (err) {
        console.error('Failed to copy:', err);
    }
};
</script>

<template>
    <div v-if="isLoggedIn" class="flex items-center justify-end gap-2 py-4 px-6 border-b border-base-200">
        <button class="btn btn-ghost btn-sm gap-2 tooltip tooltip-left" :data-tip="isCopied
            ? (lang === 'zh-cn' ? '已复制' : 'Copied!')
            : (lang === 'zh-cn' ? '复制全文' : 'Copy content')" @click="copyContent">
            <RiCheckLine v-if="isCopied" class="w-4 h-4 text-success" />
            <RiFileCopyLine v-else class="w-4 h-4" />
        </button>
    </div>
</template>