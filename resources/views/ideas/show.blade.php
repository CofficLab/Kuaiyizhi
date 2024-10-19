<x-app-layout>
    @section('title')
        {{ $idea->title }} | {{ config('app.name') }}
    @endsection

    <div class="flex flex-row flex-grow">
        @if ($children = $idea->getBook()->getChildren())
            @if ($children->count() > 0)
                <div class="fixed hidden w-56 h-screen pt-16 pb-24 top-12 lg:flex">
                    @livewire('side-bar', ['current' => $idea])
                </div>
            @endif
        @endif

        <div class="lg:ml-72 w-full">
            @livewire('idea-show', ['idea' => $idea])
        </div>
    </div>
</x-app-layout>
