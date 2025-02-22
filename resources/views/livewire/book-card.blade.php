<a href="{{ $link }}" class="justify-center flex" wire:navigate>
    <div class="w-56 h-80">
        {{-- 背景层 --}}
        <div class="bg-gradient-to-br w-full h-full from-green-900/90 to-cyan-900/40 rounded-3xl shadow-lg">
            {{-- 遮罩 --}}
            <div
                class="bg-base-100/40 w-full h-full rounded-3xl border border-white/50
        hover:scale-105 hover:shadow-2xl transform duration-200">
                {{-- 内容 --}}
                <div class="card-body p-1 h-full">
                    <img src="{{ asset('images/book2.png') }}" alt="" class="h-3/5">
                    <div class="">
                        <h2 class="text-2xl text-center">{{ $book->title }}</h2>
                        <p class="text-center text-sm">共 {{ $childrenCount }} 篇章节</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
