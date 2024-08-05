<div class="z-40 overflow-scroll">
    <h4 class="text-center py-4 sticky top-0 z-50 bg-base-300/90">
        {{ $book->title }}</h4>
    <aside class="w-56 z-30">
        <ul class="menu menu-sm z-40 pb-24 pt-2">
            @foreach ($book->getChildren() as $child)
                @livewire('menu', ['idea' => $child, 'current' => $current])
            @endforeach
        </ul>
    </aside>
</div>
