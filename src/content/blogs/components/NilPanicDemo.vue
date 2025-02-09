<template>
    <div class="card w-full bg-base-100 shadow-xl my-4">
        <div class="card-body p-4">
            <div class="bg-neutral rounded-lg p-4">
                <pre><code class="text-neutral-content">{{ code }}</code></pre>
                <button @click="runCode" :disabled="isRunning" class="btn btn-primary mt-4 min-w-[120px]">
                    {{ buttonText }}
                </button>
            </div>
            <div class="mt-4 p-4 rounded-lg min-h-[50px]" :class="hasPanic ? 'bg-error/10' : 'bg-base-200'">
                <div v-if="hasPanic" class="text-error font-mono">
                    panic: runtime error: invalid memory address or nil pointer dereference
                </div>
                <div v-else class="text-success font-mono">
                    {{ output }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        code: {
            type: String,
            required: true
        },
        willPanic: {
            type: Boolean,
            default: true
        }
    },
    data() {
        return {
            hasPanic: false,
            output: '点击"运行代码"查看结果',
            isRunning: false,
            buttonText: '运行代码'
        }
    },
    methods: {
        async runCode() {
            this.isRunning = true
            this.buttonText = '运行中...'
            this.hasPanic = false
            this.output = '运行中...'

            await new Promise(resolve => setTimeout(resolve, 500))

            if (this.willPanic) {
                this.hasPanic = true
                this.output = ''
            } else {
                this.hasPanic = false
                this.output = '程序正常运行完成'
            }

            this.isRunning = false
            this.buttonText = '运行代码'
        }
    }
}
</script>

<style scoped>
.nil-panic-demo {
    border: 1px solid #ddd;
    border-radius: 4px;
    margin: 20px 0;
}

.code-window {
    background: #1e1e1e;
    padding: 15px;
    border-radius: 4px 4px 0 0;
}

.code-window pre {
    margin: 0;
    color: #d4d4d4;
    white-space: pre-wrap;
    word-wrap: break-word;
}

.output {
    padding: 15px;
    background: #f5f5f5;
    border-radius: 0 0 4px 4px;
    min-height: 50px;
}

.output.has-error {
    background: #ffebee;
}

.panic-message {
    color: #d32f2f;
    font-family: monospace;
}

.normal-output {
    color: #2e7d32;
    font-family: monospace;
}

button {
    margin-top: 10px;
    padding: 8px 16px;
    background: #2196f3;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    min-width: 100px;
}

button:hover:not(:disabled) {
    background: #1976d2;
}

button:disabled {
    background: #90caf9;
    cursor: not-allowed;
}
</style>