<script setup lang="ts">
import { ref } from 'vue';

const activeTab = ref('traditional');
</script>

<template>
  <div class="my-8 p-4 border border-gray-300 rounded-lg bg-white not-content">
    <div class="flex mb-4 gap-1 flex-row">
      <button :class="[
        'flex-1 flex items-center justify-center h-12 px-4 py-2 border rounded-md cursor-pointer transition-all duration-300',
        activeTab === 'traditional'
          ? 'bg-indigo-600 text-white border-indigo-600'
          : 'bg-gray-100 border-gray-300'
      ]" @click="activeTab = 'traditional'">
        传统前后端分离架构
      </button>
      <button :class="[
        'flex-1 flex items-center justify-center h-12 px-4 py-2 border rounded-md cursor-pointer transition-all duration-300',
        activeTab === 'astro'
          ? 'bg-indigo-600 text-white border-indigo-600'
          : 'bg-gray-100 border-gray-300'
      ]" @click="activeTab = 'astro'">
        Astro 服务端组件架构
      </button>
    </div>

    <div v-if="activeTab === 'traditional'" class="flex flex-col items-center gap-4">
      <div
        class="w-[200px] p-4 rounded-lg bg-sky-50 border-2 border-sky-300 text-center flex flex-col items-center gap-2">
        <div class="text-2xl">🌐</div>
        <div>浏览器</div>
      </div>
      <div class="text-sm text-gray-600">↓ API 请求</div>
      <div
        class="w-[200px] p-4 rounded-lg bg-amber-50 border-2 border-amber-300 text-center flex flex-col items-center gap-2">
        <div class="text-2xl">🖥️</div>
        <div>后端服务</div>
      </div>
      <div class="text-sm text-gray-600">↓ 转发请求</div>
      <div
        class="w-[200px] p-4 rounded-lg bg-green-50 border-2 border-green-300 text-center flex flex-col items-center gap-2">
        <div class="text-2xl">🔌</div>
        <div>第三方 API</div>
      </div>
      <div class="text-sm text-gray-600">↑ 返回数据</div>
      <div
        class="w-[200px] p-4 rounded-lg bg-amber-50 border-2 border-amber-300 text-center flex flex-col items-center gap-2">
        <div class="text-2xl">🖥️</div>
        <div>后端服务</div>
      </div>
      <div class="text-sm text-gray-600">↑ 返回数据</div>
      <div
        class="w-[200px] p-4 rounded-lg bg-sky-50 border-2 border-sky-300 text-center flex flex-col items-center gap-2">
        <div class="text-2xl">🌐</div>
        <div>浏览器</div>
      </div>
    </div>

    <div v-if="activeTab === 'astro'" class="flex flex-col items-center gap-4">
      <div
        class="w-[200px] p-4 rounded-lg bg-sky-50 border-2 border-sky-300 text-center flex flex-col items-center gap-2">
        <div class="text-2xl">🌐</div>
        <div>浏览器</div>
      </div>
      <div class="text-sm text-gray-600">↓ 页面请求</div>
      <div
        class="w-[200px] p-4 rounded-lg bg-purple-50 border-2 border-purple-300 text-center flex flex-col items-center gap-2">
        <div class="text-2xl">🚀</div>
        <div>Astro 服务端组件</div>
      </div>
      <div class="text-sm text-gray-600">↔️ 直接调用</div>
      <div
        class="w-[200px] p-4 rounded-lg bg-green-50 border-2 border-green-300 text-center flex flex-col items-center gap-2">
        <div class="text-2xl">🔌</div>
        <div>第三方 API</div>
      </div>
      <div class="text-sm text-gray-600">↑ 返回完整 HTML</div>
      <div
        class="w-[200px] p-4 rounded-lg bg-sky-50 border-2 border-sky-300 text-center flex flex-col items-center gap-2">
        <div class="text-2xl">🌐</div>
        <div>浏览器</div>
      </div>
    </div>
  </div>
</template>