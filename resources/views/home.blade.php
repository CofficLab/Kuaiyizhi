<x-app-layout>
    <div class="flex flex-col justify-center w-full">
        <div class="relative z-20 px-8 mx-auto xl:px-5 max-w-7xl">
            <div class="flex flex-col items-start h-full pt-0 pb-56 lg:flex-row gap-6">
                <div class="flex flex-col w-full lg:w-1/3">
                    <div class="smart-card flex flex-col items-start  mt-4">
                        <h1 class="text-left mt-4 text-5xl text-primary">快易知</h1>
                        <h2 class="text-left mt-4 text-lg">沉浸式学习平台</h2>
                        <p class="text-left mt-4">多编程语言教程</p>
                        <p class="text-left mt-4">软件工程之旅</p>
                        <p class="text-left mt-4">从这里开始</p>
                    </div>
                </div>

                <div class="flex w-full mb-16 lg:w-2/3 lg:mb-0">
                    @if (count($ideas) > 0)
                        <div class="flex flex-col pb-24 justify-center">
                            <div
                                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-8">
                                @foreach ($ideas as $key => $book)
                                    @livewire('book-card', ['book' => $book], key($key))
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <section class="relative w-full pt-24 pb-16">
            <div class="relative flex flex-row justify-between px-8 mx-auto sm:items-center max-w-7xl xl:px-5">
                <div class="w-3/4">
                    <img src="{{ asset('images/app-firstsight.min.png') }}" x-data="{ src: '{{ asset('images/app-runner.min.png') }}' }"
                        x-bind:src="src" alt="" class="dark:hidden shadow-lg">
                    <img src="{{ asset('images/app-runner.min.png') }}" x-data="{ src: '{{ asset('images/app-runner-dark.min.png') }}' }"
                        x-bind:src="src" alt="" class="hidden dark:block">
                </div>
                <div class="w-1/4 mr-0 ml-2 smart-card">
                    <h2 class="text-3xl font-bold mr-0 text-end">就地运行</h2>
                    <p class="mt-4 leading-6 text-end">运行实验代码</p>
                    <p class="mt-4 leading-6 text-end">无需编辑器</p>
                    <p class="mt-4 leading-6 text-end">如此简洁</p>
                    <p class="mt-4 leading-6 text-end">真方便</p>
                    <p class="mt-4 leading-6 text-end">快速</p>
                    <p class="mt-4 leading-6 text-end">赞</p>
                </div>
            </div>
        </section>

        <section class="relative w-full pt-24 pb-16">
            <div class="relative flex flex-row justify-between px-8 mx-auto sm:items-center max-w-7xl xl:px-5">
                <div class="w-1/4 smart-card mr-2">
                    <h2 class="text-3xl font-bold">万紫千红</h2>
                    <p class="mt-4 leading-6">还有暗黑模式</p>
                    <p class="mt-4 leading-6">一图胜万言</p>
                    <p class="mt-4 leading-6">印象深刻</p>
                    <p class="mt-4 leading-6">好有趣</p>
                    <p class="mt-4 leading-6">厉害</p>
                    <p class="mt-4 leading-6">酷</p>
                </div>
                <div class="w-3/4">
                    <img src="{{ asset('images/app-firstsight.min.png') }}" x-data="{ src: '{{ asset('images/app-colorful.min.png') }}' }"
                        x-bind:src="src" alt="" class="dark:hidden shadow-lg">
                    <img src="{{ asset('images/app-colorful.min.png') }}" x-data="{ src: '{{ asset('images/app-colorful-dark.min.png') }}' }"
                        x-bind:src="src" alt="" class="hidden dark:block">
                </div>
            </div>
        </section>

        <section class="relative w-full pt-24 pb-16">
            <div class="relative flex flex-row justify-between px-8 mx-auto sm:items-center max-w-7xl xl:px-5">
                <div class="w-3/4">
                    <img src="{{ asset('images/app-firstsight.min.png') }}" x-data="{ src: '{{ asset('images/app-compare.min.png') }}' }"
                        x-bind:src="src" alt="" class="dark:hidden shadow-lg">
                    <img src="{{ asset('images/app-compare.min.png') }}" x-data="{ src: '{{ asset('images/app-compare-dark.min.png') }}' }"
                        x-bind:src="src" alt="" class="hidden dark:block">
                </div>
                <div class="w-1/4 mr-0 ml-2 smart-card">
                    <h2 class="text-3xl font-bold mr-0 text-end">对比学习</h2>
                    <p class="mt-4 leading-6 text-end">同时学多语言</p>
                    <p class="mt-4 leading-6 text-end">印象更深刻</p>
                    <p class="mt-4 leading-6 text-end">事半功倍</p>
                    <p class="mt-4 leading-6 text-end">真不错</p>
                    <p class="mt-4 leading-6 text-end">快来</p>
                    <p class="mt-4 leading-6 text-end">看</p>
                </div>
            </div>
        </section>

        <div class="hero w-full my-36">
            <div class="hero-content text-center">
                <div class="w-full">
                    <div class="smart-card">
                        <h1 class="text-5xl font-bold">深入浅出</h1>
                        <p class="pt-6">知其然，知其所以然</p>
                        <p class="py-1">这就是</p>
                        <div class="mt-2 text-3xl flex flex-col gap-2">
                            <div class="text-primary hover:scale-105 transition duration-200 ease-in-out">快</div>
                            <div class="text-primary hover:scale-105 transition duration-200 ease-in-out">易</div>
                            <div class="text-primary hover:scale-105 transition duration-200 ease-in-out">知</div>
                        </div>
                    </div>

                    <img src="{{ asset('images/app-firstsight.min.png') }}" x-data="{ src: '{{ asset('images/app-easy.min.png') }}' }"
                        x-bind:src="src" alt="" class="dark:hidden">
                    <img src="{{ asset('images/app-easy.min.png') }}" x-data="{ src: '{{ asset('images/app-easy-dark.min.png') }}' }"
                        x-bind:src="src" alt="" class="hidden dark:block">
                </div>
            </div>
        </div>


        <div class="hero w-full mt-0 pt-12 mb-12 smart-card">
            <div class="hero-content text-center">
                <div class="w-full">
                    <h1 class="text-5xl font-bold mb-24">客户评价</h1>
                    <x-speak>
                        <x-slot name="speakerName">小猿猿</x-slot>
                        <x-slot name="speakerTitle">软件工程师</x-slot>
                        <x-slot name="image">{{ 'images/book.png' }}</x-slot>
                        <x-slot name="words">
                            {{ config('app.name') }}</b>
                            简单易用，没有过多步骤，给我节省了大量时间，正是我期待的用户体验
                        </x-slot>
                    </x-speak>

                    <x-speak>
                        <x-slot name="speakerName">扫地师</x-slot>
                        <x-slot name="speakerTitle">大学老师</x-slot>
                        <x-slot name="image">{{ 'images/book.png' }}</x-slot>
                        <x-slot name="words">
                            偶尔偷个懒，让学生来这里学习，我可以沉醉在知识的海洋中了。
                        </x-slot>
                    </x-speak>
                    <x-speak>
                        <x-slot name="speakerName">HENRY</x-slot>
                        <x-slot name="speakerTitle">研究生</x-slot>
                        <x-slot name="image">{{ 'images/book.png' }}</x-slot>
                        <x-slot name="words">
                            我需要学编程来画一些图表，<b>{{ config('app.name') }}</b>
                            完全满足需要甚至超出预期，节省的时间去谈恋爱喽～
                        </x-slot>
                    </x-speak>
                    <x-speak>
                        <x-slot name="speakerName">非常奶妈</x-slot>
                        <x-slot name="speakerTitle">自媒体从业者</x-slot>
                        <x-slot name="image">{{ 'images/book.png' }}</x-slot>
                        <x-slot name="words">
                            娃去了幼儿园我就在这里学习，真的很棒，适合零基础，学到了很多东西。
                        </x-slot>
                    </x-speak>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
