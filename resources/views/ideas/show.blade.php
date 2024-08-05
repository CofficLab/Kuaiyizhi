<x-app-layout>
    <div class="flex flex-row flex-grow w-full h-screen">
        <div class="fixed z-40 hidden h-screen pt-12 lg:flex bg-info/10">
            @livewire('side-bar', ['current' => $idea])
        </div>

        <juice-editor monaco="/editor/monaco/index.html"
            class="z-30 flex flex-col flex-grow w-full h-screen pt-12 overflow-scroll">{!! $idea->content !!}</juice-editor>
    </div>
</x-app-layout>
