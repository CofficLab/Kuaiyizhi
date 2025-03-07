<script setup lang="ts">
import { RiGithubFill } from '@remixicon/vue';
import appwriteService from '@/database/AppwriteService';
import LinkDB from '@/database/LinkDB';
import GlowCard from '@/components/GlowCard.vue';
import { ref } from 'vue';

const props = defineProps<{
    lang: string;
}>();

const { lang } = props;
const error = ref<string | null>(null);
const technicalError = ref<string | null>(null);

const login = async () => {
    console.log('login');
    error.value = null; // Reset error state before attempting login
    technicalError.value = null; // Reset technical error

    try {
        await appwriteService.loginWithGitHub(lang);
    } catch (err) {
        console.error('GitHub login failed:', err);
        error.value = lang === 'zh-cn'
            ? '登录失败，请稍后重试'
            : 'Login failed, please try again later';
        technicalError.value = err instanceof Error ? err.message : String(err);
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

                <div v-if="error" class="w-full space-y-2">
                    <div class="alert alert-error text-sm">
                        <span>{{ error }}</span>
                    </div>
                    <div v-if="technicalError" class="collapse bg-base-200">
                        <input type="checkbox" />
                        <div class="collapse-title text-xs text-left">
                            {{ lang === 'zh-cn' ? '查看技术详情' : 'View technical details' }}
                        </div>
                        <div class="collapse-content">
                            <pre class="text-xs text-left whitespace-pre-wrap break-words">{{ technicalError }}</pre>
                        </div>
                    </div>
                </div>

                <p class="text-base-content/70">
                    {{ lang === 'zh-cn' ? '使用以下方式登录' : 'Sign in with' }}
                </p>

                <button class="btn btn-neutral w-full gap-2 hover:scale-105 transition-transform" @click="login">
                    <RiGithubFill class="w-5 h-5" />
                    {{ lang === 'zh-cn' ? '使用 GitHub 登录' : 'Continue with GitHub' }}
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