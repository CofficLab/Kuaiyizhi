<script setup lang="ts">
import { account } from '@/lib/appwrite';
import { makeSigninLink } from '@/utils/links';


const props = defineProps<{
    lang: string;
}>();

try {
    account.get().then(user => {
        console.log('获取用户成功', user);
    });
} catch (error) {
    console.error('获取用户失败', error);
}

try {
    account.getSession('current').then(session => {
        console.log('获取session成功', session);
    });
} catch (error) {
    console.error('获取session失败', error);
}

const signinURL = makeSigninLink(props.lang);
</script>

<template>
    <div>
        <h1>登录验证</h1>
        <p>登录验证</p>

        <a :href="signinURL">登录</a>
    </div>
</template>