<script setup lang="ts">
import { computed, ref } from 'vue';
import { RiArrowRightSLine } from '@remixicon/vue';

interface Props {
    code: string;
    language?: string;
    title?: string;
    collapsible?: boolean;
    defaultOpen?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    language: 'json',
    title: '',
    collapsible: false,
    defaultOpen: true
});

const isOpen = ref(props.defaultOpen);

const formattedCode = computed(() => {
    if (props.language === 'json') {
        try {
            // 尝试解析和格式化 JSON
            const parsed = JSON.parse(props.code);
            return JSON.stringify(parsed, null, 2);
        } catch {
            // 如果解析失败，返回原始代码
            return props.code;
        }
    }
    return props.code;
});

const toggleCollapse = () => {
    isOpen.value = !isOpen.value;
};
</script>

<template>
    <div class="w-full">
        <div v-if="collapsible" class="collapse bg-base-200 rounded-lg overflow-hidden"
            :class="{ 'collapse-open': isOpen }">
            <div class="collapse-title text-sm font-medium flex items-center gap-2 bg-base-300/50 cursor-pointer"
                @click="toggleCollapse">
                <RiArrowRightSLine class="h-4 w-4 transition-transform" :class="{ 'rotate-90': isOpen }" />
                {{ title || (language === 'json' ? 'JSON Data' : 'Code') }}
            </div>
            <div class="collapse-content bg-base-100">
                <pre class="mockup-code bg-neutral text-neutral-content mt-2 !text-left">
                    <code class="text-sm block py-2 whitespace-pre">{{ formattedCode }}</code>
                </pre>
            </div>
        </div>
        <div v-else class="bg-base-100 rounded-lg p-4">
            <div v-if="title" class="text-sm font-medium mb-2">{{ title }}</div>
            <pre class="mockup-code bg-neutral text-neutral-content !text-left">
                <code class="text-sm block py-2 whitespace-pre">{{ formattedCode }}</code>
            </pre>
        </div>
    </div>
</template>

<style scoped>
.mockup-code code {
    padding-left: 1rem !important;
    padding-right: 1rem !important;
}

/* 确保代码块内的空白符被保留 */
.mockup-code pre {
    white-space: pre !important;
}

/* 添加折叠过渡动画 */
.collapse-content {
    transition: all 0.2s ease-in-out;
}
</style>