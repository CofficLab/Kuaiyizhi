<x-app-layout>
    <div class="flex flex-row flex-grow w-full h-screen">
        <div class="fixed z-40 hidden h-screen pt-12 lg:flex bg-info/10">
            @livewire('side-bar', ['current' => $idea])
        </div>

        @livewire('idea-show', ['idea' => $idea])
    </div>
</x-app-layout>
