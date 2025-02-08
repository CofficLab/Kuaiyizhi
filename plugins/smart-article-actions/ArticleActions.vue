<template>
    <div class="z-10 flex flex-col gap-2 md:static md:flex-row md:justify-end md:py-4">
        <button class="btn btn-ghost btn-sm" @click="downloadMarkdown" title="下载 Markdown">
            <RiDownloadLine class="w-5 h-5" />
        </button>
    </div>
</template>

<script setup>
import { RiDownloadLine } from '@remixicon/vue';

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

const downloadMarkdown = () => {
    const blob = new Blob([props.content], { type: 'text/markdown' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${props.title}.md`;
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(url);
    document.body.removeChild(a);
};
</script>

<style>
.article-actions {
    position: fixed;
    right: 2rem;
    top: 6rem;
    z-index: 10;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.action-button {
    background-color: var(--sl-color-bg-inline);
    border: 1px solid var(--sl-color-border);
    border-radius: 0.5rem;
    padding: 0.5rem;
    cursor: pointer;
    transition: all 0.2s ease;
    color: var(--sl-color-text);
}

.action-button:hover {
    background-color: var(--sl-color-bg-hover);
}

@media (max-width: 72rem) {
    .article-actions {
        position: static;
        flex-direction: row;
        justify-content: flex-end;
        padding: 1rem 0;
    }
}
</style>