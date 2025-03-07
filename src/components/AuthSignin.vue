<script setup lang="ts">
import { RiGithubFill } from '@remixicon/vue';
import { loginWithGitHub } from '@/lib/appwrite';

const props = defineProps<{
    lang: string;
}>();

const { lang } = props;

const login = async () => {
    console.log('login');
    try {
        await loginWithGitHub();
    } catch (error) {
        console.error('GitHub login failed:', error);
        // 可以在这里添加错误提示UI
    }
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-base-200">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body items-center text-center space-y-6">
                <h2 class="card-title text-2xl font-bold">
                    {{ lang === 'zh-cn' ? '欢迎回来' : 'Welcome Back' }}
                </h2>
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

                <p class="text-sm text-base-content/70">
                    {{
                        lang === 'zh-cn'
                            ? '登录即表示您同意我们的服务条款和隐私政策'
                            : 'By signing in, you agree to our Terms of Service and Privacy Policy'
                    }}
                </p>
            </div>
        </div>
    </div>
</template>