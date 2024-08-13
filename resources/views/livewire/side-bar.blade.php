<div class="z-30 w-full h-full overflow-hidden">
    <h4 class="sticky top-0 z-30 py-4 text-center bg-green-800/40">
        {{ $book->title }}</h4>

    <aside class="z-30 overflow-y-scroll h-full pb-12">
        <ul class="z-30 px-0 pt-0 menu menu-sm ">
            <div class="px-2 py-2 shadow-inner bg-gradient-to-r from-info/20 to-info/40">
                @foreach ($book->getChildren() as $child)
                    @livewire('menu', ['idea' => $child, 'current' => $current])
                @endforeach
            </div>
        </ul>
    </aside>
</div>
