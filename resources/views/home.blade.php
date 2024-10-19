<x-app-layout>
    <div class="flex flex-col justify-center w-full">
        <div class="hero w-full pb-24 pt-12  bg-gradient-to-r from-transparent via-indigo-500/20">
            <div class="hero-content text-center flex flex-col items-center ">
                <div class="w-full">
                    <h1
                        class="text-6xl font-bold mb-6 bg-gradient-to-r from-blue-500 to-green-500 text-transparent bg-clip-text transition duration-300 ease-in-out transform hover:scale-105">
                        快易知</h1>
                    <p
                        class="text-2xl mb-6 bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-transparent bg-clip-text transition duration-300 ease-in-out transform hover:scale-105">
                        沉浸式学习平台，帮您构建完整的知识网络</p>

                    <div class="flex flex-row justify-center gap-4">
                        <a class="self-center w-56 mt-12 smart-link btn btn-lg btn-info transition duration-300 ease-in-out transform hover:scale-105"
                            href="/ideas" wire:navigate>在线学习</a>
                    </div>
                </div>

                <div class="relative flex flex-row justify-center">
                    <img src="{{ asset('images/doc.png') }}" alt=""
                        class="w-2/3 my-12 shadow-2xl ring-1 ring-indigo-500 rounded-xl transition duration-300 ease-in-out transform hover:scale-105">
                </div>
            </div>
        </div>

        <div class="  bg-gradient-to-r from-blue-400/20 via-blue-500/20 mb-12 rounded-2xl">
            <div class="hero w-full mt-0 pt-12 smart-card">
                <div class="hero-content flex items-center ">
                    <div class="w-1/2">
                        <h2 class="text-4xl font-bold mb-12">全面、立体的知识体系</h2>
                        <p class="text-lg mb-6">
                            我们的平台致力于提供一个全面、立体的知识体系。每个节点都是一篇详细的文章，包含图片、文字和代码块，帮助您深入理解每个知识点。
                        </p>
                    </div>
                    <div class="w-1/2">
                        <svg class="mx-auto mb-6" width="200" height="200" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="1" y="1" width="22" height="22" rx="2" stroke="#4A5568"
                                stroke-width="2" />
                            <path d="M4 4H20V20H4V4Z" fill="#A0AEC0" />
                            <path d="M6 6H18V18H6V6Z" fill="#EDF2F7" />
                            <path d="M8 8H16V16H8V8Z" fill="#E2E8F0" />
                            <path d="M10 10H14V14H10V10Z" fill="#CBD5E0" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="  bg-gradient-to-l from-blue-400/20 via-green-500/20 mb-12 rounded-2xl">
            <div class="hero w-full mt-0 pt-12 smart-card">
                <div class="hero-content flex items-center">
                    <div class="w-1/2">
                        <svg class="mx-auto mb-6" width="200" height="200" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#4A5568" stroke-width="2" />
                            <path d="M12 2V12H22" stroke="#4A5568" stroke-width="2" />
                            <path d="M12 12L16 16" stroke="#4A5568" stroke-width="2" />
                            <path d="M12 12L8 16" stroke="#4A5568" stroke-width="2" />
                        </svg>
                    </div>
                    <div class="w-1/2">
                        <h2 class="text-4xl font-bold mb-12">知识的关联性</h2>
                        <p class="text-lg mb-6">
                            知识是相互关联的，单独学习一个知识点可能会让您错过整个知识体系。我们鼓励您探索知识的各个方面，构建一个完整的知识网络。
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="  bg-gradient-to-r from-blue-400/20 via-yellow-500/20 mb-12 rounded-2xl">
            <div class="hero w-full mt-0 pt-12 smart-card">
                <div class="hero-content flex items-center">
                    <div class="w-1/2">
                        <h2 class="text-4xl font-bold mb-12">高质量的内容与用户体验</h2>
                        <p class="text-lg mb-6">
                            我们的平台不仅提供高质量的内容，还注重用户体验。通过精心设计的界面和功能，我们希望为您提供一个愉快的学习过程。
                        </p>
                    </div>
                    <div class="w-1/2">
                        <svg class="mx-auto mb-6" width="200" height="200" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4H20V20H4V4Z" fill="#A0AEC0" />
                            <path d="M6 6H18V18H6V6Z" fill="#EDF2F7" />
                            <path d="M8 8H16V16H8V8Z" fill="#E2E8F0" />
                            <path d="M10 10H14V14H10V10Z" fill="#CBD5E0" />
                            <path d="M12 2V12H22" stroke="#4A5568" stroke-width="2" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="  bg-gradient-to-r from-blue-400/20 via-indigo-500/20 mb-12 rounded-2xl">
            <div class="hero w-full mt-0 pt-12 smart-card">
                <div class="hero-content flex items-center">
                    <div class="w-1/2">
                        <svg class="mx-auto mb-6" width="200" height="200" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20Z"
                                fill="#A0AEC0" />
                            <path
                                d="M12 6C9.79 6 8 7.79 8 10C8 12.21 9.79 14 12 14C14.21 14 16 12.21 16 10C16 7.79 14.21 6 12 6ZM12 12C10.9 12 10 11.1 10 10C10 8.9 10.9 8 12 8C13.1 8 14 8.9 14 10C14 11.1 13.1 12 12 12Z"
                                fill="#4A5568" />
                        </svg>
                    </div>
                    <div class="w-1/2">
                        <h2 class="text-4xl font-bold mb-12">适合所有用户</h2>
                        <p class="text-lg mb-6">
                            无论您是初学者还是有经验的专业人士，我们的平台都能满足您的需求，帮助您在知识的海洋中畅游。
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-bl from-green-400/50 via-cyan-500/20 mb-12 rounded-2xl">
            <div class="hero w-full mt-0 pt-12 smart-card">
                <div class="hero-content text-center">
                    <div class="w-full">
                        <h2 class="text-5xl font-bold mb-24 bg-clip-text">
                            客户评价</h2>
                        <x-speak>
                            <x-slot name="speakerName">小猿猿</x-slot>
                            <x-slot name="speakerTitle">软件工程师</x-slot>
                            <x-slot name="image">{{ '/images/book.png' }}</x-slot>
                            <x-slot name="words">
                                {{ config('app.name') }}</b>
                                简单易用，没有过多步骤，给我节省了大量时间，正是我期待的用户体验
                            </x-slot>
                        </x-speak>

                        <x-speak>
                            <x-slot name="speakerName">扫地师</x-slot>
                            <x-slot name="speakerTitle">大学老师</x-slot>
                            <x-slot name="image">{{ '/images/book.png' }}</x-slot>
                            <x-slot name="words">
                                偶尔偷个懒，让学生来这里学习，我可以沉醉在知识的海洋中了。
                            </x-slot>
                        </x-speak>
                        <x-speak>
                            <x-slot name="speakerName">HENRY</x-slot>
                            <x-slot name="speakerTitle">研究生</x-slot>
                            <x-slot name="image">{{ '/images/book.png' }}</x-slot>
                            <x-slot name="words">
                                我需要学编程来画一些图表，<b>{{ config('app.name') }}</b>
                                完全满足需要甚至超出预期，节省的时间去谈恋爱喽～
                            </x-slot>
                        </x-speak>
                        <x-speak>
                            <x-slot name="speakerName">非常奶妈</x-slot>
                            <x-slot name="speakerTitle">自媒体从业者</x-slot>
                            <x-slot name="image">{{ '/images/book.png' }}</x-slot>
                            <x-slot name="words">
                                娃去了幼儿园我就在这里学习，真的很棒，适合零基础，学到了很多东西。
                            </x-slot>
                        </x-speak>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
