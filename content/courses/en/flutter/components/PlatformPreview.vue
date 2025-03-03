<script setup lang="ts">
import { ref, computed } from 'vue';

const activePlatform = ref('android');

// 平台颜色配置
const platformColors: Record<string, { light: string; dark: string }> = {
  android: {
    light: 'bg-green-600 text-white border-green-600',
    dark: 'dark:bg-green-500 dark:text-white dark:border-green-500'
  },
  ios: {
    light: 'bg-blue-600 text-white border-blue-600',
    dark: 'dark:bg-blue-500 dark:text-white dark:border-blue-500'
  },
  web: {
    light: 'bg-purple-600 text-white border-purple-600',
    dark: 'dark:bg-purple-500 dark:text-white dark:border-purple-500'
  }
};

// 获取平台按钮样式
const getPlatformStyle = (platform: string) => {
  const baseStyle = 'flex-1 flex items-center justify-center h-12 px-4 py-2 border rounded-md cursor-pointer transition-all duration-300';

  if (activePlatform.value === platform) {
    return [
      baseStyle,
      platformColors[platform].light,
      platformColors[platform].dark
    ].join(' ');
  } else {
    return [
      baseStyle,
      'bg-gray-100 border-gray-300',
      'dark:bg-gray-800 dark:border-gray-700'
    ].join(' ');
  }
};
</script>

<template>
  <div
    class="my-8 p-4 border rounded-lg not-content transition-colors duration-300 bg-white border-gray-300 dark:bg-gray-900 dark:border-gray-700">
    <!-- 平台选择按钮 -->
    <div class="flex mb-4 gap-1 flex-row flex-wrap sm:flex-nowrap">
      <button :class="getPlatformStyle('android')" @click="activePlatform = 'android'">
        <span class="hidden sm:inline">Android</span>
        <span class="sm:hidden">📱 A</span>
      </button>
      <button :class="getPlatformStyle('ios')" @click="activePlatform = 'ios'">
        <span class="hidden sm:inline">iOS</span>
        <span class="sm:hidden">📱 i</span>
      </button>
      <button :class="getPlatformStyle('web')" @click="activePlatform = 'web'">
        <span class="hidden sm:inline">Web</span>
        <span class="sm:hidden">🌐</span>
      </button>
    </div>

    <!-- 平台预览区域 -->
    <div class="flex justify-center">
      <!-- Android 预览 -->
      <div v-if="activePlatform === 'android'"
        class="relative w-[280px] h-[500px] bg-black rounded-xl overflow-hidden max-w-full">
        <div class="absolute top-0 w-full h-6 bg-black flex justify-center items-center">
          <div class="w-20 h-4 bg-black rounded-full"></div>
        </div>
        <div class="absolute top-6 w-full h-[calc(100%-6px)] p-2 bg-white dark:bg-gray-800">
          <div class="w-full h-full rounded-lg flex flex-col bg-blue-50 dark:bg-gray-700">
            <div class="h-12 rounded-t-lg flex items-center px-4 bg-blue-500 dark:bg-blue-700">
              <div class="text-white font-bold">Flutter Demo</div>
            </div>
            <div class="flex-1 p-4 flex flex-col items-center justify-center">
              <div class="text-6xl mb-4">🎯</div>
              <div class="text-center text-gray-800 dark:text-gray-200">
                同一套代码，完美运行在 Android 平台
              </div>
            </div>
            <div class="h-12 flex border-t border-gray-300 dark:border-gray-600">
              <div class="flex-1 flex justify-center items-center">🏠</div>
              <div class="flex-1 flex justify-center items-center">⚙️</div>
              <div class="flex-1 flex justify-center items-center">👤</div>
            </div>
          </div>
        </div>
      </div>

      <!-- iOS 预览 -->
      <div v-if="activePlatform === 'ios'"
        class="relative w-[280px] h-[500px] bg-black rounded-3xl overflow-hidden max-w-full">
        <div class="absolute top-0 w-full h-8 bg-black flex justify-center items-center">
          <div class="w-32 h-5 bg-black rounded-full"></div>
        </div>
        <div class="absolute top-8 w-full h-[calc(100%-8px)] bg-white dark:bg-gray-800">
          <div class="w-full h-full flex flex-col bg-blue-50 dark:bg-gray-700">
            <div class="h-12 flex items-center px-4 bg-blue-500 dark:bg-blue-700">
              <div class="text-white font-bold">Flutter Demo</div>
            </div>
            <div class="flex-1 p-4 flex flex-col items-center justify-center">
              <div class="text-6xl mb-4">🎯</div>
              <div class="text-center text-gray-800 dark:text-gray-200">
                同一套代码，完美运行在 iOS 平台
              </div>
            </div>
            <div class="h-16 flex border-t border-gray-300 dark:border-gray-600">
              <div class="flex-1 flex justify-center items-center">🏠</div>
              <div class="flex-1 flex justify-center items-center">⚙️</div>
              <div class="flex-1 flex justify-center items-center">👤</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Web 预览 -->
      <div v-if="activePlatform === 'web'"
        class="relative w-full sm:w-[500px] h-[400px] overflow-hidden border border-gray-300 rounded-md dark:border-gray-700">
        <div
          class="h-8 flex items-center px-4 border-b bg-gray-100 border-gray-300 dark:bg-gray-800 dark:border-gray-700">
          <div class="flex space-x-2">
            <div class="w-3 h-3 rounded-full bg-red-500"></div>
            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
            <div class="w-3 h-3 rounded-full bg-green-500"></div>
          </div>
          <div class="flex-1 text-center text-xs text-gray-600 dark:text-gray-400">
            https://flutter-web-demo.app
          </div>
        </div>
        <div class="w-full h-[calc(100%-32px)] bg-white dark:bg-gray-800">
          <div class="w-full h-full flex flex-col bg-blue-50 dark:bg-gray-700">
            <div class="h-12 flex items-center px-4 bg-blue-500 dark:bg-blue-700">
              <div class="text-white font-bold">Flutter Demo</div>
            </div>
            <div class="flex-1 p-4 flex flex-col items-center justify-center">
              <div class="text-6xl mb-4">🎯</div>
              <div class="text-center text-gray-800 dark:text-gray-200">
                同一套代码，完美运行在 Web 平台
              </div>
            </div>
            <div class="h-12 flex border-t border-gray-300 dark:border-gray-600">
              <div class="flex-1 flex justify-center items-center">🏠</div>
              <div class="flex-1 flex justify-center items-center">⚙️</div>
              <div class="flex-1 flex justify-center items-center">👤</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>