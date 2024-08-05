<div class="flex flex-col items-center pt-2 mb-48 sm:pt-0 gap-4">
    <x-hero>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="noSearch">true</x-slot>
    </x-hero>

    <div class="w-full sm:max-w-2xl md:max-w-3xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl prose">
        <x-card>
            <div class="px-8 py-0">{{ $slot }}</div>
        </x-card>
    </div>
</div>