<div class="z-40 overflow-scroll rounded-3xl w-56">
    <h4 class="text-center py-4 sticky top-0 z-50 bg-info/20">
        {{ $book->title }}</h4>

    <aside class="z-30">
        <ul class="menu menu-sm z-40 pb-24 pt-0 px-0">
            <div class="shadow-inner px-2 pt-1 bg-info/10 pb-2">
                @foreach ($book->getChildren() as $child)
                    @livewire('menu', ['idea' => $child, 'current' => $current])
                @endforeach
            </div>
        </ul>
    </aside>
</div>
