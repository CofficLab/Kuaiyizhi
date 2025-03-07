<script setup lang="ts">
import { computed, ref, onMounted } from 'vue';
import { RiGithubFill } from '@remixicon/vue';
import { userStore } from '@/stores/userStore';
import appwriteService from '@/database/AppwriteService';
import LinkDB from '@/database/LinkDB';
import ConfirmDialog from '@/components/ConfirmDialog.vue';
import SigninHintToast from '@/components/SigninHintToast.vue';

const props = defineProps<{
    lang: string;
}>();

const user = computed(() => userStore.getUser());
const isLoggedIn = computed(() => userStore.isLoggedIn());
const isLoggingOut = ref(false);
const showError = ref(false);
const errorMessage = ref('');
const errorDetails = ref('');
const showSigninHint = ref(false);
const isClient = ref(false);

// 在组件挂载后设置 isClient
onMounted(() => {
    isClient.value = true;
});

// 检查当前是否在登录页面
const isSigninPage = computed(() => {
    if (!isClient.value) return false;
    const currentPath = window.location.pathname;
    return currentPath === LinkDB.getSigninLink(props.lang);
});

const handleSigninClick = (e: MouseEvent) => {
    if (isSigninPage.value) {
        e.preventDefault();
        showSigninHint.value = true;
        setTimeout(() => {
            showSigninHint.value = false;
        }, 3000);
    }
};

const showLogoutConfirm = () => {
    const modal = document.getElementById('logout_confirm') as HTMLDialogElement;
    if (modal) modal.showModal();
};

const hideLogoutConfirm = () => {
    const modal = document.getElementById('logout_confirm') as HTMLDialogElement;
    if (modal) modal.close();
};

const showErrorModal = () => {
    const modal = document.getElementById('error_modal') as HTMLDialogElement;
    if (modal) modal.showModal();
};

const hideErrorModal = () => {
    const modal = document.getElementById('error_modal') as HTMLDialogElement;
    if (modal) modal.close();
};

const handleLogout = async () => {
    if (isLoggingOut.value) return;

    try {
        isLoggingOut.value = true;
        await appwriteService.logout();
        userStore.clearUser();
        window.location.href = LinkDB.getSigninLink(props.lang);
    } catch (error) {
        console.error('Logout failed:', error);

        // 检查是否是已经退出登录的情况
        if (error instanceof Error && error.message.includes('Already signed out')) {
            // 如果已经退出登录，直接清除状态并跳转
            userStore.clearUser();
            window.location.href = LinkDB.getSigninLink(props.lang);
            return;
        }

        errorMessage.value = props.lang === 'zh-cn'
            ? '退出登录失败'
            : 'Failed to sign out';
        errorDetails.value = error instanceof Error
            ? `${error.name}: ${error.message}\n\nStack trace:\n${error.stack}`
            : String(error);
        hideLogoutConfirm();
        showErrorModal();
    } finally {
        isLoggingOut.value = false;
    }
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
                        <button @click="showLogoutConfirm" class="text-error">
                            {{ lang === 'zh-cn' ? '退出登录' : 'Sign out' }}
                        </button>
                    </li>
                </ul>
            </div>

            <!-- 登出确认对话框 -->
            <ConfirmDialog id="logout_confirm" :title="lang === 'zh-cn' ? '确认退出' : 'Confirm Sign Out'"
                :message="lang === 'zh-cn' ? '确定要退出登录吗？' : 'Are you sure you want to sign out?'"
                :confirm-text="lang === 'zh-cn' ? '确认退出' : 'Sign Out'" :cancel-text="lang === 'zh-cn' ? '取消' : 'Cancel'"
                :loading="isLoggingOut" type="error" @confirm="handleLogout" @cancel="hideLogoutConfirm" />

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
            <SigninHintToast :lang="lang" :show="showSigninHint" />
            <a :href="LinkDB.getSigninLink(lang)" class="btn btn-ghost btn-sm p-1" @click="handleSigninClick">
                <RiGithubFill class="w-5 h-5" />
                <span class="font-medium">{{ lang === 'zh-cn' ? '登录' : 'Sign in' }}</span>
            </a>
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