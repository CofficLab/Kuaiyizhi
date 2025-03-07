<script setup lang="ts">
import { ref, onMounted } from 'vue';
import appwriteService from '@/database/AppwriteService';
import GlowCard from '@/components/GlowCard.vue';
import { RiLoader4Line, RiCheckboxCircleLine, RiCloseCircleLine, RiGithubFill, RiMailLine } from '@remixicon/vue';
import type { Models } from 'appwrite';
import { userStore } from '@/stores/userStore';

const props = defineProps<{
    lang: string;
}>();

const status = ref<'loading' | 'success' | 'error'>('loading');
const error = ref<string | null>(null);
const technicalError = ref<string | null>(null);
const userInfo = ref<Models.User<Models.Preferences> | null>(null);

onMounted(async () => {
    try {
        // 尝试获取用户信息
        const user = await appwriteService.getCurrentUser();
        if (!user) {
            throw new Error('Failed to get user info');
        }
        userInfo.value = user;
        // 保存用户信息到 store
        userStore.setUser(user);
        status.value = 'success';
    } catch (err) {
        console.error('Failed to get user info:', err);
        status.value = 'error';
        error.value = props.lang === 'zh-cn'
            ? '登录失败，无法获取用户信息'
            : 'Login failed, unable to get user info';
        technicalError.value = err instanceof Error ? err.message : String(err);
    }
});

const handleBackToSignin = () => {
    window.location.href = `/${props.lang}/signin`;
};
</script>

<template>
    <div class="flex items-center justify-center h-screen">
        <GlowCard>
            <div class="items-center text-center space-y-6">
                <!-- 加载状态 -->
                <div v-if="status === 'loading'" class="space-y-4">
                    <RiLoader4Line class="w-12 h-12 mx-auto text-primary animate-spin" />
                    <h2 class="text-xl font-medium">
                        {{ lang === 'zh-cn' ? '正在登录...' : 'Signing in...' }}
                    </h2>
                </div>

                <!-- 成功状态 -->
                <div v-if="status === 'success' && userInfo" class="space-y-6">
                    <div class="space-y-4">
                        <RiCheckboxCircleLine class="w-12 h-12 mx-auto text-success" />
                        <h2 class="text-xl font-medium">
                            {{ lang === 'zh-cn' ? '登录成功' : 'Sign in successful' }}
                        </h2>
                    </div>

                    <!-- 用户信息卡片 -->
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body items-center gap-3">
                            <!-- 用户名 -->
                            <div class="flex items-center gap-2">
                                <RiGithubFill class="w-5 h-5" />
                                <span class="font-medium">{{ userInfo.name }}</span>
                            </div>

                            <!-- 邮箱 -->
                            <div v-if="userInfo.email" class="flex items-center gap-2 text-base-content/70">
                                <RiMailLine class="w-4 h-4" />
                                <span>{{ userInfo.email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 错误状态 -->
                <div v-if="status === 'error'" class="space-y-4">
                    <RiCloseCircleLine class="w-12 h-12 mx-auto text-error" />
                    <h2 class="text-xl font-medium text-error">
                        {{ error }}
                    </h2>

                    <!-- 技术错误详情 -->
                    <div v-if="technicalError" class="collapse bg-base-200 w-full">
                        <input type="checkbox" />
                        <div class="collapse-title text-xs text-left">
                            {{ lang === 'zh-cn' ? '查看技术详情' : 'View technical details' }}
                        </div>
                        <div class="collapse-content">
                            <pre class="text-xs text-left whitespace-pre-wrap break-words">{{ technicalError }}</pre>
                        </div>
                    </div>

                    <!-- 重试按钮 -->
                    <button class="btn btn-primary" @click="handleBackToSignin">
                        {{ lang === 'zh-cn' ? '返回登录' : 'Back to Sign in' }}
                    </button>
                </div>
            </div>
        </GlowCard>
    </div>
</template>