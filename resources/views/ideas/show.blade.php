<x-app-layout>
    @section('title')
        {{ $idea->title }} - {{ config('app.name') }}
    @endsection

    <div class="flex flex-row flex-grow">
        @if ($children = $idea->getBook()->getChildren())
            @if ($children->count() > 0)
                <div class="fixed z-40 hidden lg:flex">
                    @livewire('side-bar', ['current' => $idea])
                </div>
            @endif
        @endif

        @livewire('idea-show', ['idea' => $idea])
    </div>
</x-app-layout>
