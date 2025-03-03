<template>
    <div class="card w-full bg-base-100 shadow-xl my-4">
        <div class="card-body">
            <div class="relative h-[200px] bg-base-200 rounded-lg">
                <!-- 指针变量 -->
                <div class="absolute left-5 top-5 p-4 rounded-lg"
                    :class="isNil ? 'bg-error/20 border-2 border-error' : 'bg-primary/20 border-2 border-primary'">
                    <div class="text-sm opacity-70">指针变量</div>
                    <div class="font-mono">{{ isNil ? 'nil' : '0x' + address }}</div>
                </div>

                <!-- 内存块 -->
                <div v-if="!isNil" class="absolute top-[100px] p-4 bg-success/20 border-2 border-success rounded-lg"
                    :style="{ left: (parseInt(address) % 300 + 50) + 'px' }">
                    <div class="text-sm opacity-70">内存地址: 0x{{ address }}</div>
                    <div class="font-mono">{{ value }}</div>
                </div>
            </div>

            <div class="card-actions justify-end mt-4">
                <button @click="toggleNil" class="btn btn-primary">
                    切换 nil 状态
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isNil: false,
            address: '1234',
            value: 'Hello World'
        }
    },
    methods: {
        toggleNil() {
            this.isNil = !this.isNil
        }
    }
}
</script>