<template>
    <div class="z-10 flex flex-col gap-2">
        <button class="
        w-8 h-8 bg-blue-300 rounded-lg hover:bg-blue-400 
        flex justify-center items-center
        duration-200 transition-all" @click="downloadMarkdown" title="下载 Markdown">
            <RiDownloadLine />
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
import { RiDownloadLine } from '@remixicon/vue';
import { onMounted, ref } from 'vue';
import { convertToBaseMarkdown } from './converter';
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

const downloadMarkdown = async () => {
    let markdown = props.content;
    markdown = convertToBaseMarkdown(markdown);

    // 下载文件并获取处理后的 markdown
    const processedMarkdown = await downloadMarkdownWithImages({
        content: markdown,
        title: props.title,
        images: images.value
    });

    // 尝试复制到剪贴板
    const copySuccess = await copyToClipboard(processedMarkdown);
    if (copySuccess) {
        showToastMessage();
    }
};
</script>