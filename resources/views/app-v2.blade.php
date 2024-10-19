<x-app-layout>
    @section('title')
        快易知 APP
    @endsection

    <div class="flex flex-col justify-center w-full mt-12">
        <div class="relative z-20 px-8 mx-auto xl:px-5 max-w-7xl">
            <div class="flex flex-col items-start h-full pt-0 pb-56 lg:flex-row">
                <div class="flex w-full mb-16 lg:w-2/3 lg:mb-0">
                    <img src="{{ asset('images/app-1.min.png') }}" alt="" class="rounded-3xl">
                </div>

                <div class="flex flex-col w-full lg:w-1/3 justify-center items-center my-auto">
                    <div class="mt-5 flex mx-auto flex-col gap-2">
                        <h1 class="text-6xl font-bold">快易知</h1>
                        <h2 class="mt-6 mb-4">记录灵感，本该如此简单</h2>
                        <a class="" target="_blank" href="https://apps.apple.com/app/快易知/id6457892799">
                            <img class="w-48 dark:hidden" src="{{ asset('images/mac_app_store.svg') }}" alt="">
                            <img class="w-48 hidden dark:flex" src="{{ asset('images/mac_app_store_dark.svg') }}"
                                alt="">
                        </a>

                        <p class="mt-4 text-xs">适用于 macOS 14.0 Sonoma 及以上</p>
                    </div>
                </div>
            </div>
        </div>

        <section class="relative w-full pt-24 pb-16">
            <div class="relative flex flex-col lg:flex-row justify-between px-8 mx-auto sm:items-center max-w-7xl xl:px-5">
                <div class="w-full lg:w-3/4 mb-8 lg:mb-0">
                    <img src="{{ asset('images/app-firstsight.min.png') }}" x-data="{ src: '{{ asset('images/app-runner.min.png') }}' }"
                        x-bind:src="src" alt="" class="dark:hidden shadow-lg w-full">
                    <img src="{{ asset('images/app-runner.min.png') }}" x-data="{ src: '{{ asset('images/app-runner-dark.min.png') }}' }"
                        x-bind:src="src" alt="" class="hidden dark:block w-full">
                </div>
                <div class="w-full lg:w-1/4 lg:mr-0 lg:ml-2 smart-card">
                    <h2 class="text-3xl font-bold lg:text-end">就地运行</h2>
                    <p class="mt-4 leading-6 lg:text-end">运行实验代码</p>
                    <p class="mt-4 leading-6 lg:text-end">无需编辑器</p>
                    <p class="mt-4 leading-6 lg:text-end">如此简洁</p>
                    <p class="mt-4 leading-6 lg:text-end">真方便</p>
                    <p class="mt-4 leading-6 lg:text-end">快速</p>
                    <p class="mt-4 leading-6 lg:text-end">赞</p>
                </div>
            </div>
        </section>

        <section class="relative w-full pt-24 pb-16">
            <div class="relative flex flex-col lg:flex-row justify-between px-8 mx-auto sm:items-center max-w-7xl xl:px-5">
                <div class="w-full lg:w-1/4  mb-8 lg:mb-0 smart-card mr-2">
                    <h2 class="text-3xl font-bold">万紫千红</h2>
                    <p class="mt-4 leading-6">还有暗黑模式</p>
                    <p class="mt-4 leading-6">一图胜万言</p>
                    <p class="mt-4 leading-6">印象深刻</p>
                    <p class="mt-4 leading-6">好有趣</p>
                    <p class="mt-4 leading-6">厉害</p>
                    <p class="mt-4 leading-6">酷</p>
                </div>
                <div class="w-full lg:w-3/4">
                    <img src="{{ asset('images/app-firstsight.min.png') }}" x-data="{ src: '{{ asset('images/app-colorful.min.png') }}' }"
                        x-bind:src="src" alt="" class="dark:hidden shadow-lg">
                    <img src="{{ asset('images/app-colorful.min.png') }}" x-data="{ src: '{{ asset('images/app-colorful-dark.min.png') }}' }"
                        x-bind:src="src" alt="" class="hidden dark:block">
                </div>
            </div>
        </section>

        <section class="relative w-full pt-24 pb-16">
            <div class="relative flex flex-col lg:flex-row justify-between px-8 mx-auto sm:items-center max-w-7xl xl:px-5">
                <div class="w-full lg:w-3/4 mb-8 lg:mb-0">
                    <img src="{{ asset('images/app-firstsight.min.png') }}" x-data="{ src: '{{ asset('images/app-compare.min.png') }}' }"
                        x-bind:src="src" alt="" class="dark:hidden shadow-lg">
                    <img src="{{ asset('images/app-compare.min.png') }}" x-data="{ src: '{{ asset('images/app-compare-dark.min.png') }}' }"
                        x-bind:src="src" alt="" class="hidden dark:block">
                </div>
                <div class="w-full lg:w-1/4 mr-0 ml-2 smart-card">
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
    </div>
</x-app-layout>
