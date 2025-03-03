<script setup lang="ts">
import { ref, onMounted } from 'vue';

interface IpInfo {
    query: string;
    country: string;
    city: string;
    isp: string;
    regionName: string;
}

const ipInfo = ref<IpInfo | null>(null);
const error = ref<string | null>(null);
const loading = ref(false);

const fetchIpInfo = async () => {
    loading.value = true;
    error.value = null;

    try {
        const startTime = Date.now();
        const response = await fetch('/api/ip-info');
        const endTime = Date.now();

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error || '获取 IP 信息失败');
        }

        ipInfo.value = await response.json();
    } catch (e) {
        error.value = e instanceof Error ? e.message : '未知错误';
    } finally {
        loading.value = false;
    }
};

const handleRefresh = async (e: Event) => {
    e.preventDefault();
    await fetchIpInfo();
};

onMounted(fetchIpInfo);
</script>

<template>
    <div id="ip-info-container" class="not-content my-8 p-6 bg-white rounded-xl shadow-md border border-gray-200">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-800">IP 信息展示</h3>
            <button type="button" @click="handleRefresh"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors"
                :disabled="loading">
                {{ loading ? '加载中...' : '刷新' }}
            </button>
        </div>

        <div v-if="error" class="p-4 bg-red-50 text-red-600 rounded-md mb-4">
            {{ error }}
        </div>

        <div v-if="ipInfo" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="text-sm text-gray-500 mb-1">IP 地址</div>
                <div class="text-lg font-medium text-gray-900">{{ ipInfo.query }}</div>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="text-sm text-gray-500 mb-1">国家/地区</div>
                <div class="text-lg font-medium text-gray-900">{{ ipInfo.country }}</div>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="text-sm text-gray-500 mb-1">省份</div>
                <div class="text-lg font-medium text-gray-900">{{ ipInfo.regionName }}</div>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="text-sm text-gray-500 mb-1">城市</div>
                <div class="text-lg font-medium text-gray-900">{{ ipInfo.city }}</div>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg md:col-span-2">
                <div class="text-sm text-gray-500 mb-1">网络服务商 (ISP)</div>
                <div class="text-lg font-medium text-gray-900">{{ ipInfo.isp }}</div>
            </div>
        </div>
    </div>
</template>