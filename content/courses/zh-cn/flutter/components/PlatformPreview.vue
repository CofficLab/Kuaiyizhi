<script setup lang="ts">
import { ref } from 'vue';

const activePlatform = ref('android');
</script>

<template>
  <div class="my-8 p-4 border border-gray-300 rounded-lg bg-white not-content">
    <div class="flex mb-4 gap-1 flex-row">
      <button :class="[
        'flex-1 flex items-center justify-center h-12 px-4 py-2 border rounded-md cursor-pointer transition-all duration-300',
        activePlatform === 'android'
          ? 'bg-green-600 text-white border-green-600'
          : 'bg-gray-100 border-gray-300'
      ]" @click="activePlatform = 'android'">
        Android
      </button>
      <button :class="[
        'flex-1 flex items-center justify-center h-12 px-4 py-2 border rounded-md cursor-pointer transition-all duration-300',
        activePlatform === 'ios'
          ? 'bg-blue-600 text-white border-blue-600'
          : 'bg-gray-100 border-gray-300'
      ]" @click="activePlatform = 'ios'">
        iOS
      </button>
      <button :class="[
        'flex-1 flex items-center justify-center h-12 px-4 py-2 border rounded-md cursor-pointer transition-all duration-300',
        activePlatform === 'web'
          ? 'bg-purple-600 text-white border-purple-600'
          : 'bg-gray-100 border-gray-300'
      ]" @click="activePlatform = 'web'">
        Web
      </button>
    </div>

    <div class="flex justify-center">
      <div v-if="activePlatform === 'android'" class="relative w-[280px] h-[500px] bg-black rounded-xl overflow-hidden">
        <div class="absolute top-0 w-full h-6 bg-black flex justify-center items-center">
          <div class="w-20 h-4 bg-black rounded-full"></div>
        </div>
        <div class="absolute top-6 w-full h-[calc(100%-6px)] bg-white p-2">
          <div class="w-full h-full bg-blue-50 rounded-lg flex flex-col">
            <div class="h-12 bg-blue-500 rounded-t-lg flex items-center px-4">
              <div class="text-white font-bold">Flutter Demo</div>
            </div>
            <div class="flex-1 p-4 flex flex-col items-center justify-center">
              <div class="text-6xl mb-4">🎯</div>
              <div class="text-center text-gray-800">同一套代码，完美运行在 Android 平台</div>
            </div>
            <div class="h-12 flex border-t border-gray-300">
              <div class="flex-1 flex justify-center items-center">🏠</div>
              <div class="flex-1 flex justify-center items-center">⚙️</div>
              <div class="flex-1 flex justify-center items-center">👤</div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="activePlatform === 'ios'" class="relative w-[280px] h-[500px] bg-black rounded-3xl overflow-hidden">
        <div class="absolute top-0 w-full h-8 bg-black flex justify-center items-center">
          <div class="w-32 h-5 bg-black rounded-full"></div>
        </div>
        <div class="absolute top-8 w-full h-[calc(100%-8px)] bg-white">
          <div class="w-full h-full bg-blue-50 flex flex-col">
            <div class="h-12 bg-blue-500 flex items-center px-4">
              <div class="text-white font-bold">Flutter Demo</div>
            </div>
            <div class="flex-1 p-4 flex flex-col items-center justify-center">
              <div class="text-6xl mb-4">🎯</div>
              <div class="text-center text-gray-800">同一套代码，完美运行在 iOS 平台</div>
            </div>
            <div class="h-16 flex border-t border-gray-300">
              <div class="flex-1 flex justify-center items-center">🏠</div>
              <div class="flex-1 flex justify-center items-center">⚙️</div>
              <div class="flex-1 flex justify-center items-center">👤</div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="activePlatform === 'web'" class="relative w-[500px] h-[400px] border border-gray-300 rounded-md overflow-hidden">
        <div class="h-8 bg-gray-100 flex items-center px-4 border-b border-gray-300">
          <div class="flex space-x-2">
            <div class="w-3 h-3 rounded-full bg-red-500"></div>
            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
            <div class="w-3 h-3 rounded-full bg-green-500"></div>
          </div>
          <div class="flex-1 text-center text-xs text-gray-600">https://flutter-web-demo.app</div>
        </div>
        <div class="w-full h-[calc(100%-32px)] bg-white">
          <div class="w-full h-full bg-blue-50 flex flex-col">
            <div class="h-12 bg-blue-500 flex items-center px-4">
              <div class="text-white font-bold">Flutter Demo</div>
            </div>
            <div class="flex-1 p-4 flex flex-col items-center justify-center">
              <div class="text-6xl mb-4">🎯</div>
              <div class="text-center text-gray-800">同一套代码，完美运行在 Web 平台</div>
            </div>
            <div class="h-12 flex border-t border-gray-300">
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