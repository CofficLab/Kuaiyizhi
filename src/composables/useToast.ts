import { ref } from 'vue';

interface ToastOptions {
    message: string;
    type?: 'success' | 'error' | 'warning' | 'info';
    duration?: number;
    shake?: boolean;
}

interface ToastState {
    id: number;
    message: string;
    type: 'success' | 'error' | 'warning' | 'info';
    visible: boolean;
    shake: boolean;
}

const toasts = ref<ToastState[]>([]);
let toastId = 0;

export function useToast() {
    const show = (options: ToastOptions) => {
        const id = toastId++;
        const toast: ToastState = {
            id,
            message: options.message,
            type: options.type || 'info',
            visible: true,
            shake: options.shake || false
        };

        toasts.value.push(toast);

        // 设置自动关闭
        setTimeout(() => {
            const index = toasts.value.findIndex(t => t.id === id);
            if (index !== -1) {
                toasts.value[index].visible = false;
                setTimeout(() => {
                    toasts.value = toasts.value.filter(t => t.id !== id);
                }, 300); // 等待动画结束
            }
        }, options.duration || 3000);
    };

    const remove = (id: number) => {
        const index = toasts.value.findIndex(t => t.id === id);
        if (index !== -1) {
            toasts.value[index].visible = false;
            setTimeout(() => {
                toasts.value = toasts.value.filter(t => t.id !== id);
            }, 300);
        }
    };

    return {
        toasts,
        show,
        remove
    };
} 