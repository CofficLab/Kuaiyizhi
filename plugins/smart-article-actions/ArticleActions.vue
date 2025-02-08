<template>
    <div class="z-10 flex flex-row gap-2">
        <!-- 下载转换后的 Markdown -->
        <button class="
            w-8 h-8 rounded-lg
            flex justify-center items-center
            duration-200 transition-all
            disabled:opacity-50 disabled:cursor-not-allowed
            bg-blue-300 hover:bg-blue-400 disabled:hover:bg-blue-300" @click="downloadMarkdown"
            :disabled="isDownloading" :title="isDownloading ? '正在下载...' : '下载转换后的 Markdown'">
            <div v-if="isDownloading" class="animate-spin">
                <svg class="w-4 h-4" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"
                        fill="none" />
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                </svg>
            </div>
            <RiDownloadLine v-else />
        </button>

        <!-- 下载原始 Markdown -->
        <button class="
            w-8 h-8 rounded-lg
            flex justify-center items-center
            duration-200 transition-all
            disabled:opacity-50 disabled:cursor-not-allowed
            bg-green-300 hover:bg-green-400 disabled:hover:bg-green-300" @click="downloadOriginalMarkdown"
            :disabled="isDownloading" :title="isDownloading ? '正在下载...' : '下载原始 Markdown'">
            <div v-if="isDownloading" class="animate-spin">
                <svg class="w-4 h-4" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"
                        fill="none" />
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                </svg>
            </div>
            <RiDownloadLine2 v-else />
        </button>

        <!-- Toast -->
        <div class="toast toast-end" v-if="showToast">
            <div class="alert alert-success">
                <span>Markdown 已复制到剪贴板</span>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { RiDownloadLine, RiDownload2Line as RiDownloadLine2 } from '@remixicon/vue';
import { onMounted, ref } from 'vue';
import { convertToBaseMarkdown, fixMarkdownFormat } from './converter';
import { copyToClipboard } from './utils/clipboard';
import { downloadMarkdownWithImages } from './utils/download';

interface ImageInfo {
    original: string;
    src: string;
}

const props = defineProps({
    content: {
        type: String,
        required: true
    },
    title: {
        type: String,
        required: true
    }
});

const showToast = ref(false);
const images = ref<ImageInfo[]>([]);
const isDownloading = ref(false);

// 显示 toast 的函数
const showToastMessage = () => {
    showToast.value = true;
    setTimeout(() => {
        showToast.value = false;
    }, 3000);
};

onMounted(() => {
    const articleImages = document.querySelectorAll('main img');
    images.value = Array.from(articleImages).map(img => ({
        original: img.getAttribute('data-original') || (img as HTMLImageElement).src,
        src: (img as HTMLImageElement).src
    }));
});

// 下载转换后的 Markdown
const downloadMarkdown = async () => {
    if (isDownloading.value) return;

    try {
        isDownloading.value = true;
        let markdown = props.content;
        markdown = convertToBaseMarkdown(markdown);

        // 下载文件并获取处理后的 markdown
        const processedMarkdown = await downloadMarkdownWithImages({
            content: markdown,
            title: props.title,
            images: images.value,
            convertContent: true // 转换内容
        });

        // 尝试复制到剪贴板
        const copySuccess = await copyToClipboard(processedMarkdown);
        if (copySuccess) {
            showToastMessage();
        }
    } finally {
        isDownloading.value = false;
    }
};

// 下载原始 Markdown
const downloadOriginalMarkdown = async () => {
    if (isDownloading.value) return;

    try {
        isDownloading.value = true;
        const processedMarkdown = await downloadMarkdownWithImages({
            content: fixMarkdownFormat(props.content),
            title: props.title,
            images: images.value,
            convertContent: false // 不转换内容
        });

        const copySuccess = await copyToClipboard(processedMarkdown);
        if (copySuccess) {
            showToastMessage();
        }
    } finally {
        isDownloading.value = false;
    }
};
</script>