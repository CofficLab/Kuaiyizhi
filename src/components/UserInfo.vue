<script setup lang="ts">
import { computed, ref } from 'vue';
import { RiGithubFill } from '@remixicon/vue';
import { userStore } from '@/stores/userStore';
import appwriteService from '@/database/AppwriteService';
import LinkDB from '@/database/LinkDB';
import ConfirmDialog from '@/components/ConfirmDialog.vue';

const props = defineProps<{
    lang: string;
}>();

const user = computed(() => userStore.getUser());
const isLoggedIn = computed(() => userStore.isLoggedIn());
const isLoggingOut = ref(false);
const showError = ref(false);
const errorMessage = ref('');
const showSigninHint = ref(false);

// 检查当前是否在登录页面
const isSigninPage = computed(() => {
    if (typeof window === 'undefined') return false;
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

const handleLogout = async () => {
    if (isLoggingOut.value) return;

    try {
        isLoggingOut.value = true;
        await appwriteService.logout();
        userStore.clearUser();
        window.location.href = LinkDB.getSigninLink(props.lang);
    } catch (error) {
        console.error('Logout failed:', error);
        errorMessage.value = props.lang === 'zh-cn'
            ? '退出登录失败，请稍后重试'
            : 'Failed to sign out, please try again later';
        showError.value = true;
        hideLogoutConfirm();
        // 3秒后自动隐藏错误提示
        setTimeout(() => {
            showError.value = false;
        }, 3000);
    } finally {
        isLoggingOut.value = false;
    }
};
</script>

<template>
    <div class="flex items-center h-full">
        <div v-if="isLoggedIn && user" class="flex items-center">
            <!-- 错误提示 -->
            <div v-if="showError" class="toast toast-top toast-end">
                <div class="alert alert-error">
                    <span>{{ errorMessage }}</span>
                </div>
            </div>

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
        </div>
        <div v-else>
            <!-- 登录提示 -->
            <div v-if="showSigninHint" class="toast toast-top toast-end">
                <div class="alert alert-warning">
                    <span>{{ lang === 'zh-cn' ? '您已经在登录页面了' : 'You are already on the sign-in page' }}</span>
                </div>
            </div>

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