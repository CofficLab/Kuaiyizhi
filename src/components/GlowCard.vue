<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from 'vue';

defineProps<{
    width?: string; // 可选的宽度，默认为 w-96
}>();

const card = ref<HTMLElement | null>(null);
let isHovering = false;

// 处理鼠标移动时的倾斜效果
const handleMouseMove = (e: MouseEvent) => {
    if (!card.value || !isHovering) return;

    const rect = card.value.getBoundingClientRect();
    const x = e.clientX - rect.left; // 鼠标在卡片上的X坐标
    const y = e.clientY - rect.top;  // 鼠标在卡片上的Y坐标

    // 计算倾斜角度（最大15度）
    const xRotation = ((y - rect.height / 2) / rect.height) * -15;
    const yRotation = ((x - rect.width / 2) / rect.width) * 15;

    // 应用变换
    card.value.style.transform = `
        perspective(1000px)
        rotateX(${xRotation}deg)
        rotateY(${yRotation}deg)
        scale3d(1.02, 1.02, 1.02)
    `;
};

// 处理鼠标进入事件
const handleMouseEnter = () => {
    if (!card.value) return;
    isHovering = true;
    // 确保过渡效果平滑
    card.value.style.transition = 'transform 0.1s ease-out';
};

// 处理鼠标离开事件
const handleMouseLeave = () => {
    if (!card.value) return;
    isHovering = false;
    // 重置卡片位置，添加过渡效果使其平滑
    card.value.style.transition = 'transform 0.5s ease-out';
    card.value.style.transform = `
        perspective(1000px)
        rotateX(0deg)
        rotateY(0deg)
        scale3d(1, 1, 1)
    `;
};

// 组件挂载时添加事件监听
onMounted(() => {
    if (card.value) {
        card.value.addEventListener('mousemove', handleMouseMove);
        card.value.addEventListener('mouseenter', handleMouseEnter);
        card.value.addEventListener('mouseleave', handleMouseLeave);
    }
});

// 组件卸载时移除事件监听
onBeforeUnmount(() => {
    if (card.value) {
        card.value.removeEventListener('mousemove', handleMouseMove);
        card.value.removeEventListener('mouseenter', handleMouseEnter);
        card.value.removeEventListener('mouseleave', handleMouseLeave);
    }
});
</script>

<template>
    <div ref="card" class="relative group will-change-transform" style="transform-style: preserve-3d;">
        <!-- 光晕效果 -->
        <div
            class="absolute -inset-1 bg-gradient-to-r from-primary/20 via-primary/5 to-primary/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500 group-hover:opacity-70 opacity-0">
        </div>

        <!-- 主卡片 -->
        <div :class="[
            'card relative transition-colors duration-500',
            'bg-base-100/80 backdrop-blur-xl',
            'border border-base-content/10',
            'shadow-lg shadow-base-content/5',
            'group-hover:shadow-xl group-hover:shadow-primary/5',
            'group-hover:bg-base-100/90',
            width || 'w-96'
        ]">
            <div class="card-body">
                <slot></slot>
            </div>
        </div>
    </div>
</template>