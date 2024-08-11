<div class="z-30 w-56 overflow-scroll rounded-3xl">
    <h4 class="sticky top-0 z-30 py-4 text-center bg-info/20">
        {{ $book->title }}</h4>

    <aside class="z-30">
        <ul class="z-30 px-0 pt-0 pb-24 menu menu-sm">
            <div class="px-2 pt-1 pb-2 shadow-inner bg-info/10">
                @foreach ($book->getChildren() as $child)
                    @livewire('menu', ['idea' => $child, 'current' => $current])
                @endforeach
            </div>
        </ul>
    </aside>
</div>
