<div class="flex flex-col">
    <div wire:loading.class="opacity-40" class="z-30 flex flex-col flex-grow w-full overflow-y-auto">
        <juice-editor readonly mode="slot">
            {!! $idea->getContent() !!}
        </juice-editor>
    </div>

    <!-- Loading overlay -->
    <div wire:loading.delay.class.remove="hidden" class="fixed hidden inset-0 flex items-center justify-center z-50">
        <div class="bg-yellow-800/90 rounded-lg p-6 flex flex-col items-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div>
            <p class="mt-4">加载中...</p>
            <p class="text-sm mt-2" wire:loading.delay.longest wire:loading.remove>图片较多时加载可能会比较慢</p>
        </div>
    </div>
</div>
