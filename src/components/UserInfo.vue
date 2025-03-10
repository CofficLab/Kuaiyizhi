<script setup lang="ts">
import { computed, ref, onMounted } from 'vue';
import { RiGithubFill } from '@remixicon/vue';
import { userStore } from '@/stores/userStore';
import LinkUtil from '@/utils/link';
import { useToast } from '@/composables/useToast';
import { useConfirmDialog } from '@/composables/useConfirmDialog';

const props = defineProps<{
    lang: string;
}>();

const user = computed(() => userStore.getUser());
const isLoggedIn = computed(() => userStore.isLoggedIn());
const isLoggingOut = ref(false);
const errorMessage = ref('');
const errorDetails = ref('');
const isClient = ref(false);
const { show: showToast } = useToast();
const { show: showConfirmDialog } = useConfirmDialog();

// 在组件挂载后设置 isClient
onMounted(() => {
    isClient.value = true;
    fetchUserInfo();
});

// 检查当前是否在登录页面
const isSigninPage = computed(() => {
    if (!isClient.value) return false;
    const currentPath = window.location.pathname;
    return currentPath === LinkUtil.getSigninLink(props.lang);
});

const handleSigninClick = (e: MouseEvent) => {
    if (isSigninPage.value) {
        e.preventDefault();
        showToast({
            message: props.lang === 'zh-cn' ? '您已经在登录页面了' : 'You are already on the sign-in page',
            type: 'info',
            duration: 3000,
            shake: true
        });
    }
};

const handleLogout = async () => {
    if (isLoggingOut.value) return;

    const confirmed = await showConfirmDialog({
        title: props.lang === 'zh-cn' ? '确认退出' : 'Confirm Sign Out',
        message: props.lang === 'zh-cn' ? '确定要退出登录吗？' : 'Are you sure you want to sign out?',
        confirmText: props.lang === 'zh-cn' ? '确认退出' : 'Sign Out',
        cancelText: props.lang === 'zh-cn' ? '取消' : 'Cancel',
        type: 'error'
    });

    if (!confirmed) return;

    try {
        isLoggingOut.value = true;
        // 调用新的登出 API
        const response = await fetch('/api/logout');
        if (!response.ok) {
            throw new Error('Logout failed');
        }
        userStore.clearUser();
        window.location.href = LinkUtil.getSigninLink(props.lang);
    } catch (error) {
        console.error('Logout failed:', error);
        showToast({
            message: props.lang === 'zh-cn' ? '退出登录失败' : 'Failed to sign out',
            type: 'error',
            duration: 3000
        });
    } finally {
        isLoggingOut.value = false;
    }
};

// 添加获取用户信息的函数
const fetchUserInfo = async () => {
    try {
        const response = await fetch('/api/whoami');
        const userData = await response.json();

        if (userData.user === null) {
            userStore.clearUser();
        } else {
            userStore.setUser(userData);
        }
    } catch (error) {
        console.error('Failed to fetch user info:', error);
        errorMessage.value = props.lang === 'zh-cn' ? '获取用户信息失败' : 'Failed to fetch user information';
        errorDetails.value = error instanceof Error ? error.message : String(error);
        showErrorModal();
    }
};

const showErrorModal = () => {
    const modal = document.getElementById('error_modal') as HTMLDialogElement;
    if (modal) modal.showModal();
};

const hideErrorModal = () => {
    const modal = document.getElementById('error_modal') as HTMLDialogElement;
    if (modal) modal.close();
};
</script>

<template>
    <div class="flex items-center h-full">
        <div v-if="isLoggedIn && user" class="flex items-center">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-sm p-1">
                    <RiGithubFill class="w-5 h-5" />
                    <span class="font-medium">{{ user.name }}</span>
                </label>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-lg bg-base-100 rounded-box w-52">
                    <li>
                        <button @click="handleLogout" class="text-error">
                            {{ lang === 'zh-cn' ? '退出登录' : 'Sign out' }}
                        </button>
                    </li>
                </ul>
            </div>

            <!-- 错误模态框 -->
            <dialog id="error_modal" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg text-error mb-2">
                        {{ errorMessage }}
                    </h3>
                    <p class="text-sm mb-4" v-if="lang === 'zh-cn'">
                        发生了一个错误。如果问题持续存在，请联系管理员并提供以下错误详情：
                    </p>
                    <p class="text-sm mb-4" v-else>
                        An error occurred. If the problem persists, please contact the administrator with the following
                        error details:
                    </p>
                    <div class="bg-base-200 rounded-lg p-4 mb-4">
                        <pre class="text-xs whitespace-pre-wrap break-words font-mono">{{ errorDetails }}</pre>
                    </div>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn" @click="hideErrorModal">
                                {{ lang === 'zh-cn' ? '关闭' : 'Close' }}
                            </button>
                        </form>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>{{ lang === 'zh-cn' ? '关闭' : 'Close' }}</button>
                </form>
            </dialog>
        </div>
        <div v-else>
            <a :href="LinkUtil.getSigninLink(lang)" class="btn btn-ghost btn-sm p-1" @click="handleSigninClick">
                <RiGithubFill class="w-5 h-5" />
                <span class="font-medium">{{ lang === 'zh-cn' ? '登录' : 'Sign in' }}</span>
            </a>
        </div>
    </div>
</template>