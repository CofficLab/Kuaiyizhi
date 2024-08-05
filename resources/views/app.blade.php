<x-app-layout>
    <div class="flex flex-col justify-center w-full">
        <div class="relative z-20 px-8 mx-auto xl:px-5 max-w-7xl">
            <div class="flex flex-col items-start h-full pt-0 pb-56 lg:flex-row">
                <div class="flex flex-col w-full lg:w-1/3">
                    <div class="smart-card flex flex-col items-start  mt-4">
                        <h1 class="text-left mt-4 text-5xl text-primary">快易知</h1>
                        <h2 class="text-left mt-4 text-lg">沉浸式学习平台</h2>
                        <p class="text-left mt-4">多编程语言教程</p>
                        <p class="text-left mt-4">软件工程之旅</p>
                        <p class="text-left mt-4">从这里开始</p>
                        <p class="text-left mt-4">轻松愉快</p>
                        <p class="text-left mt-4">爱学习</p>
                        <p class="text-left mt-4">就来</p>
                        <p class="text-left mt-4">看</p>
                    </div>

                    <div class="mt-5 flex mx-auto flex-col gap-2">
                        <a class="smart-link btn w-48" href="{{ route('ideas.index') }}">在线学习</a>
                        <a class="" target="_blank" href="https://apps.apple.com/app/快易知/id6457892799">
                            <img class="w-48 dark:hidden" src="{{ asset('images/mac_app_store.svg') }}" alt="">
                            <img class="w-48 hidden dark:flex" src="{{ asset('images/mac_app_store_dark.svg') }}"
                                alt="">
                        </a>
                    </div>
                </div>

                <div class="flex w-full mb-16 lg:w-2/3 lg:mb-0">
                    <img src="{{ asset('images/app-firstsight.min.png') }}" alt="" class="dark:hidden">
                    <img src="{{ asset('images/app-firstsight.min.png') }}" x-data="{ src: '{{ asset('images/app-firstsight-dark.min.png') }}' }"
                        x-bind:src="src" alt="" class="hidden dark:block">
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

        <div class="hero mt-24 smart-card">
            <div class="hero-content text-center">
                <div class="max-w-md ">
                    <h1 class="text-3xl font-bold">也许，这是一番成就的开始</h1>
                </div>
            </div>
        </div>

        <a class="smart-link btn btn-lg mt-12 w-56 self-center" href="/ideas">在线学习</a>

    </div>
</x-app-layout>
