import { ref } from 'vue';

interface ConfirmDialogOptions {
    title: string;
    message: string;
    confirmText: string;
    cancelText: string;
    type?: 'error' | 'warning' | 'info' | 'success';
}

const isVisible = ref(false);
const options = ref<ConfirmDialogOptions>({
    title: '',
    message: '',
    confirmText: '',
    cancelText: '',
    type: 'info'
});
const loading = ref(false);
const resolvePromise = ref<((value: boolean) => void) | null>(null);

export function useConfirmDialog() {
    const show = (dialogOptions: ConfirmDialogOptions): Promise<boolean> => {
        options.value = dialogOptions;
        isVisible.value = true;
        loading.value = false;

        return new Promise((resolve) => {
            resolvePromise.value = resolve;
        });
    };

    const confirm = async () => {
        if (loading.value) return;
        loading.value = true;
        try {
            resolvePromise.value?.(true);
        } finally {
            isVisible.value = false;
            loading.value = false;
            resolvePromise.value = null;
        }
    };

    const cancel = () => {
        resolvePromise.value?.(false);
        isVisible.value = false;
        resolvePromise.value = null;
    };

    return {
        isVisible,
        options,
        loading,
        show,
        confirm,
        cancel
    };
} 