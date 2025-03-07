<script setup lang="ts">
import { RiCheckLine, RiErrorWarningLine, RiInformationLine, RiCloseLine } from '@remixicon/vue';
import { useToast } from '@/composables/useToast';

const { toasts, remove } = useToast();

const getIcon = (type: string) => {
    switch (type) {
        case 'success':
            return RiCheckLine;
        case 'error':
        case 'warning':
            return RiErrorWarningLine;
        default:
            return RiInformationLine;
    }
};

const getToastClass = (type: string) => {
    switch (type) {
        case 'success':
            return 'alert-success';
        case 'error':
            return 'alert-error';
        case 'warning':
            return 'alert-warning';
        default:
            return 'alert-info';
    }
};
</script>

<template>
    <div class="fixed top-20 right-4 z-50 flex flex-col gap-2">
        <TransitionGroup name="toast" tag="div">
            <div v-for="toast in toasts" :key="toast.id" class="alert shadow-lg transition-all duration-300" :class="[
                getToastClass(toast.type),
                toast.visible ? 'translate-x-0 opacity-100' : 'translate-x-full opacity-0',
                toast.shake ? 'animate-shake' : ''
            ]">
                <component :is="getIcon(toast.type)" class="w-5 h-5" />
                <span>{{ toast.message }}</span>
                <button class="btn btn-sm btn-ghost btn-circle" @click="remove(toast.id)">
                    <RiCloseLine class="w-4 h-4" />
                </button>
            </div>
        </TransitionGroup>
    </div>
</template>

<style scoped>
.toast-enter-active,
.toast-leave-active {
    transition: all 0.3s ease;
}

.toast-enter-from,
.toast-leave-to {
    opacity: 0;
    transform: translateX(100%);
}

@keyframes shake {

    0%,
    100% {
        transform: translateX(0);
    }

    25% {
        transform: translateX(-4px);
    }

    75% {
        transform: translateX(4px);
    }
}

.animate-shake {
    animation: shake 0.5s ease-in-out;
}
</style>