<script setup lang="ts">
import { RiLoader4Line } from '@remixicon/vue';
import { useConfirmDialog } from '@/composables/useConfirmDialog';

const { isVisible, options, loading, confirm, cancel } = useConfirmDialog();
</script>

<template>
    <dialog :open="isVisible" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg">
                {{ options.title }}
            </h3>
            <p class="py-4">
                {{ options.message }}
            </p>
            <div class="modal-action">
                <form method="dialog" class="flex gap-2">
                    <!-- 取消按钮 -->
                    <button class="btn" @click="cancel">
                        {{ options.cancelText }}
                    </button>
                    <!-- 确认按钮 -->
                    <button class="btn" :class="{
                        'btn-error': options.type === 'error',
                        'btn-warning': options.type === 'warning',
                        'btn-info': options.type === 'info',
                        'btn-success': options.type === 'success',
                        'btn-disabled': loading
                    }" @click="confirm">
                        <RiLoader4Line v-if="loading" class="animate-spin w-5 h-5" />
                        <span v-else>{{ options.confirmText }}</span>
                    </button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button @click="cancel">{{ options.cancelText }}</button>
        </form>
    </dialog>
</template>