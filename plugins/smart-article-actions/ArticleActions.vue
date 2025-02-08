<template>
    <div class="z-10 flex flex-col gap-2">
        <button class="
        w-8 h-8 bg-blue-300 rounded-lg hover:bg-blue-400 
        flex justify-center items-center
        duration-200 transition-all" @click="downloadMarkdown" title="下载 Markdown">
            <RiDownloadLine />
        </button>
    </div>
</template>

<script setup lang="ts">
import { RiDownloadLine } from '@remixicon/vue';
import { onMounted, ref } from 'vue';
import { convertTabsToHTML } from './markdownConverter';

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

// 从优化后的 URL 中提取原始文件名
function extractOriginalFileName(url: string): string {
    const match = url.match(/images%2F([^%]+\.png)/);
    return match ? match[1] : 'image.png';
}

const images = ref<ImageInfo[]>([]);

onMounted(() => {
    const articleImages = document.querySelectorAll('main img');
    console.log('Found images:', articleImages);
    images.value = Array.from(articleImages).map(img => {
        console.log('Image element:', {
            src: (img as HTMLImageElement).src,
            dataset: (img as HTMLImageElement).dataset,
            attributes: Array.from(img.attributes).map(attr => `${attr.name}=${attr.value}`)
        });
        return {
            original: img.getAttribute('data-original') || (img as HTMLImageElement).src,
            src: (img as HTMLImageElement).src
        };
    });
});

const downloadMarkdown = async () => {
    const JSZip = (await import('jszip')).default;
    const zip = new JSZip();

    let markdown = props.content;
    markdown = convertTabsToHTML(markdown);
    const imgPromises = [];

    for (const image of images.value) {
        console.log('Processing image:', image);
        // 使用新的函数提取文件名
        const imgName = extractOriginalFileName(image.src);
        const imgPromise = fetch(image.src)
            .then(res => res.blob())
            .then(blob => {
                zip.file(`images/${imgName}`, blob);
                markdown = markdown.replace(image.original, `./images/${imgName}`);
            });
        imgPromises.push(imgPromise);
    }

    await Promise.all(imgPromises);
    zip.file(`${props.title}.md`, markdown);

    const blob = await zip.generateAsync({ type: 'blob' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${props.title}.zip`;
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(url);
    document.body.removeChild(a);
};
</script>