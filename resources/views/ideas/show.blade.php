<x-app-layout>
    @section('title')
        {{ $idea->title }} - {{ config('app.name') }}
    @endsection

    <div class="flex flex-row flex-grow w-full h-screen">
        <div class="fixed z-40 hidden h-screen pt-12 lg:flex">
            @livewire('side-bar', ['current' => $idea])
        </div>

        @livewire('idea-show', ['idea' => $idea])
    </div>
</x-app-layout>
