<template>
    <div class="container mx-auto p-4">
        <!-- 上传区域 -->
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center" @drop.prevent="handleDrop"
            @dragover.prevent @click="triggerFileInput">
            <input type="file" ref="fileInput" class="hidden" accept="image/*" @change="handleFileSelect" />
            <div v-if="!selectedImage" class="text-gray-500">
                <i class="fas fa-cloud-upload-alt text-3xl mb-2"></i>
                <p>拖拽图片到这里或点击上传</p>
            </div>
            <div v-else>
                <img :src="selectedImage" class="max-w-md mx-auto rounded-lg shadow" ref="previewImage" />
                <p class="mt-2 text-sm text-gray-600" v-if="originalSize">
                    原始尺寸: {{ originalSize.width }} x {{ originalSize.height }} 像素
                </p>
            </div>
        </div>

        <!-- 预设尺寸选项 -->
        <div v-if="selectedImage" class="mt-8">
            <h3 class="text-lg font-semibold mb-4">选择目标尺寸：</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <button v-for="size in presetSizes" :key="size.name" class="btn btn-primary"
                    @click="resizeImage(size.width, size.height)">
                    {{ size.name }} ({{ size.width }}x{{ size.height }})
                </button>
            </div>
        </div>

        <!-- 转换后的图片展示 -->
        <div v-if="resizedImages.length" class="mt-8">
            <h3 class="text-lg font-semibold mb-4">转换结果：</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div v-for="(image, index) in resizedImages" :key="index" class="card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img :src="image.url" class="rounded-xl" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ image.width }}x{{ image.height }}
                        </h2>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary"
                                @click="downloadImage(image.url, image.width, image.height)">
                                下载
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const fileInput = ref(null)
const selectedImage = ref(null)
const resizedImages = ref([])
const originalSize = ref(null)

const presetSizes = [
    { name: '社交媒体封面', width: 1200, height: 630 },
    { name: '微信头像', width: 132, height: 132 },
    { name: 'Instagram方形', width: 1080, height: 1080 },
    { name: '手机壁纸', width: 1080, height: 1920 },
    { name: '6寸照片', width: 1800, height: 1200 },
]

const triggerFileInput = () => {
    fileInput.value.click()
}

const handleFileSelect = (event) => {
    const file = event.target.files[0]
    if (file) {
        loadImage(file)
    }
}

const handleDrop = (event) => {
    const file = event.dataTransfer.files[0]
    if (file && file.type.startsWith('image/')) {
        loadImage(file)
    }
}

const loadImage = (file) => {
    const reader = new FileReader()
    reader.onload = (e) => {
        selectedImage.value = e.target.result
        resizedImages.value = []

        // 获取原始尺寸
        const img = new Image()
        img.onload = () => {
            originalSize.value = {
                width: img.width,
                height: img.height
            }
        }
        img.src = e.target.result
    }
    reader.readAsDataURL(file)
}

const resizeImage = (targetWidth, targetHeight) => {
    const img = new Image()
    img.src = selectedImage.value
    img.onload = () => {
        const canvas = document.createElement('canvas')
        canvas.width = targetWidth
        canvas.height = targetHeight
        const ctx = canvas.getContext('2d')

        ctx.fillStyle = '#FFFFFF'
        ctx.fillRect(0, 0, canvas.width, canvas.height)

        const scale = Math.min(
            targetWidth / img.width,
            targetHeight / img.height
        )
        const x = (targetWidth - img.width * scale) / 2
        const y = (targetHeight - img.height * scale) / 2

        ctx.drawImage(
            img,
            x,
            y,
            img.width * scale,
            img.height * scale
        )

        const resizedUrl = canvas.toDataURL('image/jpeg', 0.9)
        resizedImages.value.push({
            url: resizedUrl,
            width: targetWidth,
            height: targetHeight
        })
    }
}

const downloadImage = (dataUrl, width, height) => {
    const link = document.createElement('a')
    link.download = `resized-${width}x${height}.jpg`
    link.href = dataUrl
    link.click()
}
</script>