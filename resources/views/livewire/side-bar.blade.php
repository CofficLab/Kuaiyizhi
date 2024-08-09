<div class="z-40 overflow-scroll">
    <h4 class="text-center py-4 sticky top-0 z-50 bg-info/30 w-56">
        {{ $book->title }}</h4>
    <aside class="w-56 z-30">
        <ul class="menu menu-sm z-40 pb-24 pt-0 pr-0">
            <div class="border-r border-info/30 dark:border-gray-700 shadow-inner pr-2 pt-1">
                @foreach ($book->getChildren() as $child)
                    @livewire('menu', ['idea' => $child, 'current' => $current])
                @endforeach
            </div>
        </ul>
    </aside>
</div>
