<script setup lang="ts">
import { RiUserLine } from '@remixicon/vue';
import type { Models } from 'appwrite';
import { userStore } from '@/stores/userStore';
import { onMounted } from 'vue';

interface Props {
    user: Models.User<Models.Preferences> | null;
}

const props = defineProps<Props>();

// 在组件挂载时更新 store
onMounted(() => {
    if (props.user) {
        userStore.setUser(props.user);
    }
});
</script>

<template>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h1 class="card-title text-2xl font-bold mb-4">
                <RiUserLine class="mr-2" />
                Account Information
            </h1>

            <div v-if="user" class="space-y-4">
                <div class="flex items-center space-x-2">
                    <span class="font-semibold">Name:</span>
                    <span>{{ user.name }}</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="font-semibold">Email:</span>
                    <span>{{ user.email }}</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="font-semibold">Created:</span>
                    <span>{{ new Date(user.$createdAt).toLocaleDateString() }}</span>
                </div>
            </div>
            <div v-else class="alert alert-error">
                <span>Failed to load user information. Please try again later.</span>
            </div>
        </div>
    </div>
</template>