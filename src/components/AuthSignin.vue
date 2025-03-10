<script setup lang="ts">
import { RiGithubFill, RiGoogleFill } from '@remixicon/vue';
import LinkDB from '@/database/LinkDB';
import GlowCard from '@/components/GlowCard.vue';
import CodeBlock from '@/components/CodeBlock.vue';
import { ref } from 'vue';
import axios from 'axios';

const props = defineProps<{
    lang: string;
}>();

const { lang } = props;
const error = ref<string | null>(null);
const technicalError = ref<string | null>(null);
const loadingProvider = ref<string | null>(null); // 跟踪正在加载的供应商

const login = async (provider: string) => {
    // 如果正在处理任何登录请求，直接返回
    if (loadingProvider.value) return;

    console.log('loginToken');
    error.value = null;
    technicalError.value = null;
    loadingProvider.value = provider; // 设置当前正在处理的供应商

    if (lang.length == 0) {
        console.error('lang is empty');
        return;
    }

    try {
        const loginLink = LinkDB.getLoginLink(window.location.origin);
        const response = await axios.get(`${loginLink}?provider=${provider}`, {
            validateStatus: (status) => status === 200,
        });

        window.location.href = response.data;
    } catch (err) {
        console.error('Error:', err);

        error.value = lang === 'zh-cn' ?
            '登录过程中发生错误' :
            'An error occurred during login';

        if (axios.isAxiosError(err)) {
            if (err.response?.data?.error) {
                technicalError.value = JSON.stringify(err.response.data.error, null, 2);
            } else {
                technicalError.value = err.message;
            }
        } else {
            technicalError.value = err instanceof Error ? err.message : String(err);
        }

        // 发生错误时重置加载状态
        loadingProvider.value = null;
    }
}
</script>

<template>
    <div class="flex items-center justify-center h-screen">
        <!-- 卡片 -->
        <GlowCard>
            <div class="items-center text-center space-y-6">
                <h2 class="card-title text-2xl font-bold">
                    {{ lang === 'zh-cn' ? '欢迎回来' : 'Welcome Back' }}
                </h2>

                <div v-if="error" class="w-full space-y-3">
                    <div class="alert alert-error shadow-lg bg-error/90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-error-content font-medium">{{ error }}</span>
                    </div>

                    <div v-if="technicalError" class="bg-base-200 rounded-lg shadow-md border-error border-2">
                        <CodeBlock :code="technicalError" language="json"
                            :title="lang === 'zh-cn' ? '错误详情' : 'Error Details'" collapsible
                            :default-open="technicalError.length < 100" />
                    </div>
                </div>

                <p class="text-base-content/70">
                    {{ lang === 'zh-cn' ? '使用以下方式登录' : 'Sign in with' }}
                </p>

                <!-- GitHub 登录按钮 -->
                <button class="btn btn-neutral w-full gap-2 hover:scale-105 transition-transform"
                    :class="{ 'btn-disabled': loadingProvider !== null }" @click="login('github')">
                    <span class="flex items-center gap-2">
                        <RiGithubFill class="w-5 h-5" />
                        <span v-if="loadingProvider === 'github'" class="loading loading-spinner loading-sm"></span>
                        {{ lang === 'zh-cn' ?
                            (loadingProvider === 'github' ? '正在处理...' : '使用 GitHub 登录') :
                            (loadingProvider === 'github' ? 'Processing...' : 'Continue with GitHub')
                        }}
                    </span>
                </button>

                <div class="divider text-xs text-base-content/50">
                    {{ lang === 'zh-cn' ? '快易知' : 'Kuaiyizhi' }}
                </div>

                <div class="text-sm text-base-content/60 space-y-1">
                    <p v-if="lang === 'zh-cn'" class="flex flex-wrap justify-center gap-x-1">
                        <span>登录即表示您同意我们的</span>
                        <a :href="LinkDB.getTermsLink(lang)" class="link link-primary font-medium">服务条款</a>
                        <span>和</span>
                        <a :href="LinkDB.getPrivacyLink(lang)" class="link link-primary font-medium">隐私政策</a>
                    </p>
                    <p v-else class="flex flex-wrap justify-center gap-x-1">
                        <span>By signing in, you agree to our</span>
                        <a :href="LinkDB.getTermsLink(lang)" class="link link-primary font-medium">Terms of Service</a>
                        <span>and</span>
                        <a :href="LinkDB.getPrivacyLink(lang)" class="link link-primary font-medium">Privacy Policy</a>
                    </p>
                </div>
            </div>
        </GlowCard>
    </div>
</template>

<style scoped>
/* 添加按钮禁用时的样式 */
.btn-disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

/* 保持 hover 效果在禁用状态下不生效 */
.btn-disabled:hover {
    transform: none !important;
}
</style>