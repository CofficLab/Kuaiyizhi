<script setup lang="ts">
defineProps<{
    lang: string;
    show: boolean;
}>();
</script>

<template>
    <div v-if="show" class="toast toast-top toast-end">
        <div class="alert alert-warning">
            <span>{{ lang === 'zh-cn' ? '您已经在登录页面了' : 'You are already on the sign-in page' }}</span>
        </div>
    </div>
</template>

<style scoped>
.toast {
    position: fixed;
    z-index: 9999;
    pointer-events: none;
}
</style>