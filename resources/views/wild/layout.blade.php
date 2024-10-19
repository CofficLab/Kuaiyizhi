<x-app-layout>
    <x-slot name="noGoodbye">
    </x-slot>

    <x-slot name="noLivewire">
    </x-slot>

    <x-slot name="title">
        {{ $title ?: config('app.name', 'Laravel') }}
    </x-slot>
</x-app-layout>
