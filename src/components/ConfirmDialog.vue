<script setup lang="ts">
import { RiLoader4Line } from '@remixicon/vue';

const props = defineProps<{
    id: string;
    title: string;
    message: string;
    confirmText: string;
    cancelText: string;
    loading?: boolean;
    type?: 'error' | 'warning' | 'info' | 'success';
}>();

const emit = defineEmits<{
    confirm: [];
    cancel: [];
}>();

const handleConfirm = () => {
    emit('confirm');
};

const handleCancel = () => {
    emit('cancel');
};
</script>

<template>
    <dialog :id="id" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg">
                {{ title }}
            </h3>
            <p class="py-4">
                {{ message }}
            </p>
            <div class="modal-action">
                <form method="dialog" class="flex gap-2">
                    <!-- 取消按钮 -->
                    <button class="btn" @click="handleCancel">
                        {{ cancelText }}
                    </button>
                    <!-- 确认按钮 -->
                    <button class="btn" :class="{
                        'btn-error': type === 'error',
                        'btn-warning': type === 'warning',
                        'btn-info': type === 'info',
                        'btn-success': type === 'success',
                        'btn-disabled': loading
                    }" @click="handleConfirm">
                        <RiLoader4Line v-if="loading" class="animate-spin w-5 h-5" />
                        <span v-else>{{ confirmText }}</span>
                    </button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button @click="handleCancel">{{ cancelText }}</button>
        </form>
    </dialog>
</template>