<div class="flex flex-col">
    <juice-editor wire:loading.class="opacity-50" drawio="/editor/drawio/index.html?" readonly class="z-30 flex flex-col flex-grow w-full overflow-y-auto">
        {!! $idea->content !!}
    </juice-editor>

    <!-- Loading overlay -->
    <div wire:loading.delay.class.remove="hidden" class="fixed inset-0 hidden flex items-center justify-center z-50">
        <div class="bg-yellow-300/30 rounded-lg p-6 flex flex-col items-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div>
            <p class="mt-4 text-gray-700">加载中...</p>
        </div>
    </div>
</div>