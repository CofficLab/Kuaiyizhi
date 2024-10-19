<x-app-layout>
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Transactions</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    A better way to send money
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
                </p>
            </div>

            <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <!-- Heroicon name: outline/globe-alt -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                Competitive exchange rates
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                            </dd>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <!-- Heroicon name: outline/scale -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                No hidden fees
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                            </dd>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <!-- Heroicon name: outline/lightning-bolt -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                Transfers are instant
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                            </dd>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <!-- Heroicon name: outline/annotation -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900">
                                Mobile notifications
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                            </dd>
                        </div>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <header class="bg-white left-0 shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center border-b-0 border-gray-100 py-2 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="{{ route('home') }}">
                        <span class="sr-only">{{ config('app.name') }}</span>
                        <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                    </a>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: outline/menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <nav class="hidden md:flex space-x-10">
                    @if (request()->routeIs('home'))
                        <a href="{{ route('home') }}" class="text-base font-medium text-gray-500 text-gray-900">
                            首页
                        </a>
                    @else
                        <a href="{{ route('home') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                            首页
                        </a>
                    @endif

                    <div class="relative" x-data="{open:false}">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button @click="open=!open" @click.away="open=false"
                                type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                            <span>Solutions</span>
                            <!--
                              Heroicon name: solid/chevron-down

                              Item active: "text-gray-600", Item inactive: "text-gray-400"
                            -->
                            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!--
                          'Solutions' flyout menu, show/hide based on flyout menu state.

                          Entering: "transition ease-out duration-200"
                            From: "opacity-0 translate-y-1"
                            To: "opacity-100 translate-y-0"
                          Leaving: "transition ease-in duration-150"
                            From: "opacity-100 translate-y-0"
                            To: "opacity-0 translate-y-1"
                        -->
                        <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 translate-y-1"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="transform opacity-100 translate-y-0"
                                x-transition:leave-end="transform opacity-0 translate-y-1"
                                class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: outline/chart-bar -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Analytics
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Get a better understanding of where your traffic is coming from.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: outline/cursor-click -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Engagement
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Speak directly to your customers in a more meaningful way.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: outline/shield-check -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Security
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Your customers&#039; data will be safe and secure.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: outline/view-grid -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Integrations
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Connect with third-party tools that you&#039;re already using.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: outline/refresh -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Automations
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Build strategic funnels that will drive your customers to convert
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">
                                    <div class="flow-root">
                                        <a href="#" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                            <!-- Heroicon name: outline/play -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="ml-3">Watch Demo</span>
                                        </a>
                                    </div>

                                    <div class="flow-root">
                                        <a href="#" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                            <!-- Heroicon name: outline/phone -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <span class="ml-3">Contact Sales</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                        Pricing
                    </a>
                    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                        Docs
                    </a>

                    <div class="relative" x-data="{open:false}">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button @click="open=!open" @click.away="open=false"
                                type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                            <span>More</span>
                            <!--
                              Heroicon name: solid/chevron-down

                              Item active: "text-gray-600", Item inactive: "text-gray-400"
                            -->
                            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!--
                          'More' flyout menu, show/hide based on flyout menu state.

                          Entering: "transition ease-out duration-200"
                            From: "opacity-0 translate-y-1"
                            To: "opacity-100 translate-y-0"
                          Leaving: "transition ease-in duration-150"
                            From: "opacity-100 translate-y-0"
                            To: "opacity-0 translate-y-1"
                        -->
                        <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 translate-y-1"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="transform opacity-100 translate-y-0"
                                x-transition:leave-end="transform opacity-0 translate-y-1"
                                class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0">
                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: outline/support -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Help Center
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Get all of your questions answered in our forums or contact support.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: outline/bookmark-alt -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Guides
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Learn how to maximize our platform to get the most out of it.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: outline/calendar -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Events
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                See what meet-ups and other events we might be planning near you.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: outline/shield-check -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Security
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Understand how we take your privacy seriously.
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="px-5 py-5 bg-gray-50 sm:px-8 sm:py-8">
                                    <div>
                                        <h3 class="text-sm tracking-wide font-medium text-gray-500 uppercase">
                                            Recent Posts
                                        </h3>
                                        <ul class="mt-4 space-y-4">
                                            <li class="text-base truncate">
                                                <a href="#" class="font-medium text-gray-900 hover:text-gray-700">
                                                    Boost your conversion rate
                                                </a>
                                            </li>

                                            <li class="text-base truncate">
                                                <a href="#" class="font-medium text-gray-900 hover:text-gray-700">
                                                    How to use search engine optimization to drive traffic to your site
                                                </a>
                                            </li>

                                            <li class="text-base truncate">
                                                <a href="#" class="font-medium text-gray-900 hover:text-gray-700">
                                                    Improve your customer experience
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mt-5 text-sm">
                                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all posts <span aria-hidden="true">&rarr;</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (request()->routeIs(['dashboard', 'profile.show']))
                        <a href="{{ route('dashboard') }}" class="text-base font-medium text-gray-500 text-gray-900">
                            控制台
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                            控制台
                        </a>
                    @endif
                </nav>
                @auth
                    <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="ml-3 relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                                <div @click="open = !open">
                                    <button type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="{{ asset('images/favicon.png') }}" alt="">
                                    </button>
                                </div>

                                <!--
                                  Dropdown menu, show/hide based on menu state.

                                  Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                  Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">控制台</a>
                                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>

                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            退出
                                        </x-jet-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!--
                              Heroicon name: outline/menu

                              Menu open: "hidden", Menu closed: "block"
                            -->
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <!--
                              Heroicon name: outline/x

                              Menu open: "block", Menu closed: "hidden"
                            -->
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @else
                    <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                        <a href="{{ route('login') }}" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                            登录
                        </a>
                        <a href="{{ route('register') }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                            注册
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        <!--
          Mobile menu, show/hide based on mobile menu state.

          Entering: "duration-200 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
          Leaving: "duration-100 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
        <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                        </div>
                        <div class="-mr-2">
                            <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                <span class="sr-only">Close menu</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-6">
                        <nav class="grid gap-y-8">
                            <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <!-- Heroicon name: outline/chart-bar -->
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                Analytics
              </span>
                            </a>

                            <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <!-- Heroicon name: outline/cursor-click -->
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                Engagement
              </span>
                            </a>

                            <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <!-- Heroicon name: outline/shield-check -->
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                Security
              </span>
                            </a>

                            <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <!-- Heroicon name: outline/view-grid -->
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                Integrations
              </span>
                            </a>

                            <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <!-- Heroicon name: outline/refresh -->
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                Automations
              </span>
                            </a>
                        </nav>
                    </div>
                </div>
                <div class="py-6 px-5 space-y-6">
                    <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Pricing
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Docs
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Enterprise
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Blog
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Help Center
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Guides
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Security
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Events
                        </a>
                    </div>
                    <div>
                        {{-- <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                            Sign up
                        </a> --}}
                        <p class="mt-6 text-center text-base font-medium text-gray-500">
                            Existing customer?
                            <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">
                                Sign in
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="px-4 sm:px-6 xl:px-8 pt-10 pb-16"><h1
                class="text-5xl leading-none font-extrabold text-gray-900 tracking-tight mb-4">Getting
            started with Tailwind CSS</h1>
        <p class="text-2xl tracking-tight mb-10">Learn Tailwind the way that best matches your learning
            style.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 xl:gap-8">
            <section class="flex">
                <div class="w-full relative text-white overflow-hidden rounded-3xl flex shadow-lg">
                    <div class="w-full flex md:flex-col bg-gradient-to-br from-purple-500 to-indigo-500">
                        <div class="sm:max-w-sm sm:flex-none md:w-auto md:flex-auto flex flex-col items-start relative z-10 p-6 xl:p-8">
                            <h2 class="text-xl font-semibold mb-2 text-shadow">Read the docs</h2>
                            <p class="font-medium text-violet-100 text-shadow mb-4">Learn how to get
                                Tailwind set up in your project.</p><a
                                    class="mt-auto bg-violet-800 bg-opacity-50 hover:bg-opacity-75 transition-colors duration-200 rounded-xl font-semibold py-2 px-4 inline-flex"
                                    href="/docs/installation">Start learning</a></div>
                        <div class="docs_image__1HDuG relative md:pl-6 xl:pl-8 hidden sm:block">
                            <svg width="352" height="232" fill="none" viewBox="0 0 352 232"
                                 class="absolute top-6 left-6 md:static overflow-visible">
                                <g opacity="0.8">
                                    <g filter="url(#guides_svg__filter0_dd)">
                                        <rect width="352" height="232" fill="#fff" rx="12"></rect>
                                    </g>
                                    <path fill="#DDD6FE" d="M107 27h208v1H107z"></path>
                                    <path fill="#A78BFA" fill-rule="evenodd"
                                          d="M46 8c-2.4 0-3.9 1.212-4.5 3.637.9-1.213 1.95-1.667 3.15-1.364.685.173 1.174.675 1.716 1.23.882.905 1.903 1.952 4.134 1.952 2.4 0 3.9-1.212 4.5-3.637-.9 1.213-1.95 1.667-3.15 1.364-.685-.173-1.174-.675-1.716-1.23C49.252 9.047 48.231 8 46 8zm-4.5 5.456c-2.4 0-3.9 1.212-4.5 3.636.9-1.212 1.95-1.666 3.15-1.363.685.173 1.174.674 1.716 1.23.882.905 1.903 1.952 4.134 1.952 2.4 0 3.9-1.212 4.5-3.637-.9 1.212-1.95 1.667-3.15 1.364-.685-.173-1.174-.675-1.716-1.23-.882-.905-1.903-1.952-4.134-1.952z"
                                          clip-rule="evenodd"></path>
                                    <rect width="25" height="4" x="48" y="43" fill="#C4B5FD" rx="2"></rect>
                                    <rect width="25" height="4" x="255" y="43" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="32" height="4" x="255" y="51" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="24" height="4" x="255" y="59" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="35" height="4" x="255" y="67" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="22" height="4" x="255" y="75" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="57" height="8" x="107" y="42" fill="#A78BFA" rx="4"></rect>
                                    <rect width="121" height="4" x="107" y="54" fill="#C4B5FD"
                                          rx="2"></rect>
                                    <rect width="49" height="4" x="121" y="11" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="11" height="4" x="292" y="11" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="129" height="4" x="107" y="70" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="129" height="4" x="107" y="177" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="137" height="4" x="107" y="129" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="137" height="4" x="107" y="137" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="129" height="4" x="107" y="211" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="129" height="4" x="107" y="78" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="121" height="4" x="107" y="185" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="121" height="4" x="107" y="219" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="121" height="4" x="107" y="86" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="121" height="4" x="107" y="94" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="129" height="4" x="107" y="102" fill="#DDD6FE"
                                          rx="2"></rect>
                                    <rect width="57" height="6" x="107" y="118" fill="#A78BFA"
                                          rx="3"></rect>
                                    <rect width="57" height="6" x="107" y="201" fill="#A78BFA"
                                          rx="3"></rect>
                                    <rect width="21" height="4" x="48" y="53" fill="#C4B5FD" rx="2"></rect>
                                    <rect width="18" height="4" x="48" y="63" fill="#C4B5FD" rx="2"></rect>
                                    <rect width="13" height="4" x="48" y="73" fill="#C4B5FD" rx="2"></rect>
                                    <rect width="19" height="4" x="48" y="83" fill="#C4B5FD" rx="2"></rect>
                                    <rect width="23" height="4" x="48" y="93" fill="#C4B5FD" rx="2"></rect>
                                    <rect width="23" height="3" x="37" y="112" fill="#A78BFA"
                                          rx="1.5"></rect>
                                    <rect width="23" height="3" x="37" y="180" fill="#A78BFA"
                                          rx="1.5"></rect>
                                    <rect width="18" height="4" x="37" y="120" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="18" height="4" x="37" y="188" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="18" height="4" x="37" y="128" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="18" height="4" x="37" y="196" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="21" height="4" x="37" y="136" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="21" height="4" x="37" y="204" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="21" height="4" x="37" y="144" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="21" height="4" x="37" y="212" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="30" height="4" x="37" y="152" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="30" height="4" x="37" y="220" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="30" height="4" x="37" y="160" fill="#DDD6FE" rx="2"></rect>
                                    <rect width="24" height="4" x="37" y="168" fill="#DDD6FE" rx="2"></rect>
                                    <circle cx="40" cy="45" r="3" fill="#A78BFA"></circle>
                                    <circle cx="312" cy="13" r="3" fill="#DDD6FE"></circle>
                                    <circle cx="40" cy="55" r="3" fill="#A78BFA"></circle>
                                    <circle cx="40" cy="65" r="3" fill="#A78BFA"></circle>
                                    <circle cx="40" cy="75" r="3" fill="#A78BFA"></circle>
                                    <circle cx="40" cy="85" r="3" fill="#A78BFA"></circle>
                                    <circle cx="40" cy="95" r="3" fill="#A78BFA"></circle>
                                    <path stroke="#C4B5FD"
                                          d="M115 17.5l-2.379-2.379m0 0a3 3 0 10-4.242-4.243 3 3 0 004.242 4.243z"></path>
                                    <rect width="132" height="23" x="107" y="147" fill="#A78BFA"
                                          rx="4"></rect>
                                </g>
                                <defs>
                                    <filter id="guides_svg__filter0_dd" width="382" height="262" x="-15"
                                            y="-7" color-interpolation-filters="sRGB"
                                            filterUnits="userSpaceOnUse">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                        <feColorMatrix in="SourceAlpha"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                        <feOffset dy="3"></feOffset>
                                        <feGaussianBlur stdDeviation="3"></feGaussianBlur>
                                        <feColorMatrix
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"></feColorMatrix>
                                        <feBlend in2="BackgroundImageFix"
                                                 result="effect1_dropShadow"></feBlend>
                                        <feColorMatrix in="SourceAlpha"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                        <feOffset dy="8"></feOffset>
                                        <feGaussianBlur stdDeviation="7.5"></feGaussianBlur>
                                        <feColorMatrix
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"></feColorMatrix>
                                        <feBlend in2="effect1_dropShadow"
                                                 result="effect2_dropShadow"></feBlend>
                                        <feBlend in="SourceGraphic" in2="effect2_dropShadow"
                                                 result="shape"></feBlend>
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-20 hidden sm:block"
                         style="background-image: linear-gradient(to top, rgb(135, 94, 245), rgba(135, 94, 245, 0)); background-position: initial initial; background-repeat: initial initial;"></div>
                </div>
            </section>
            <section class="flex">
                <div class="w-full relative text-white overflow-hidden rounded-3xl flex shadow-lg">
                    <div class="w-full flex md:flex-col bg-gradient-to-br from-pink-500 to-rose-500">
                        <div class="sm:max-w-sm sm:flex-none md:w-auto md:flex-auto flex flex-col items-start relative z-10 p-6 xl:p-8">
                            <h2 class="text-xl font-semibold mb-2 text-shadow">Try it in the browser</h2>
                            <p class="font-medium text-rose-100 text-shadow mb-4">Build something with
                                Tailwind in our online playground.</p><a
                                    href="https://play.tailwindcss.com/"
                                    class="mt-auto bg-rose-900 bg-opacity-50 hover:bg-opacity-75 transition-colors duration-200 rounded-xl font-semibold py-2 px-4 inline-flex">Start
                                building</a></div>
                        <div class="docs_image__1HDuG relative md:pl-6 xl:pl-8 hidden sm:block">
                            <svg width="352" height="232" fill="none"
                                 class="absolute top-6 left-6 md:static overflow-visible">
                                <g opacity="0.8">
                                    <g filter="url(#play_svg__filter0_dd)">
                                        <rect width="352" height="232" fill="#fff" rx="12"></rect>
                                    </g>
                                    <rect width="8" height="6" x="307.5" y="10.5" stroke="#FDA4AF"
                                          rx="0.5"></rect>
                                    <path fill="#FECDD3"
                                          d="M265 11a1 1 0 011-1h4v7h-4a1 1 0 01-1-1v-5z"></path>
                                    <rect width="8" height="6" x="265.5" y="10.5" stroke="#FDA4AF"
                                          rx="0.5"></rect>
                                    <path fill="#FDA4AF" d="M269 10h1v7h-1z"></path>
                                    <path fill="#FECDD3"
                                          d="M286 11a1 1 0 011-1h7a1 1 0 011 1v3h-9v-3z"></path>
                                    <rect width="8" height="6" x="286.5" y="10.5" stroke="#FDA4AF"
                                          rx="0.5"></rect>
                                    <path fill="#FDA4AF" d="M286 13h9v1h-9z"></path>
                                    <path fill="#FDA4AF" fill-rule="evenodd"
                                          d="M335 10h-5v1h1a1 1 0 011 1v4h3v-6zm-4 6v-4h-3v4h3zm-2-5h-1a1 1 0 00-1 1v4a1 1 0 001 1h7a1 1 0 001-1v-6a1 1 0 00-1-1h-5a1 1 0 00-1 1v1z"
                                          clip-rule="evenodd"></path>
                                    <circle cx="10" cy="54" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="62" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="70" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="78" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="86" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="94" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="102" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="110" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="118" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="126" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="134" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="142" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="150" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="158" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="166" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="174" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="182" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="190" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="198" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="206" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="214" r="2" fill="#FDA4AF"></circle>
                                    <circle cx="10" cy="222" r="2" fill="#FDA4AF"></circle>
                                    <path fill="#FB7185" fill-rule="evenodd"
                                          d="M17 8c-2.4 0-3.9 1.212-4.5 3.637.9-1.213 1.95-1.667 3.15-1.364.685.173 1.174.675 1.716 1.23.882.905 1.903 1.952 4.134 1.952 2.4 0 3.9-1.212 4.5-3.637-.9 1.213-1.95 1.667-3.15 1.364-.685-.173-1.174-.675-1.716-1.23C20.252 9.047 19.231 8 17 8zm-4.5 5.456c-2.4 0-3.9 1.212-4.5 3.636.9-1.212 1.95-1.666 3.15-1.363.685.173 1.174.674 1.716 1.23.882.905 1.903 1.952 4.134 1.952 2.4 0 3.9-1.212 4.5-3.637-.9 1.212-1.95 1.667-3.15 1.364-.685-.173-1.174-.675-1.716-1.23-.882-.905-1.903-1.952-4.134-1.952z"
                                          clip-rule="evenodd"></path>
                                    <path fill="#FFF1F2"
                                          d="M177 29h175v191c0 6.627-5.373 12-12 12H177V29z"></path>
                                    <path fill="#FECDD3" d="M0 27h352v2H0zm0 16h176v1H0z"></path>
                                    <path fill="#FECDD3" d="M175 29h2v203h-2z"></path>
                                    <rect width="31" height="4" x="20" y="52" fill="#FB7185" rx="2"></rect>
                                    <rect width="15" height="4" x="8" y="34" fill="#FB7185" rx="2"></rect>
                                    <rect width="15" height="4" x="27" y="34" fill="#FECDD3" rx="2"></rect>
                                    <rect width="15" height="4" x="46" y="34" fill="#FECDD3" rx="2"></rect>
                                    <rect width="87" height="4" x="28" y="60" fill="#FB7185" rx="2"></rect>
                                    <rect width="95" height="4" x="36" y="68" fill="#FB7185" rx="2"></rect>
                                    <rect width="87" height="4" x="36" y="76" fill="#FB7185" rx="2"></rect>
                                    <rect width="15" height="4" x="36" y="84" fill="#FB7185" rx="2"></rect>
                                    <rect width="15" height="4" x="28" y="92" fill="#FB7185" rx="2"></rect>
                                    <rect width="15" height="4" x="20" y="100" fill="#FB7185" rx="2"></rect>
                                    <rect width="39" height="4" x="20" y="108" fill="#FB7185" rx="2"></rect>
                                    <rect width="63" height="4" x="28" y="116" fill="#FB7185" rx="2"></rect>
                                    <rect width="87" height="4" x="36" y="124" fill="#FB7185" rx="2"></rect>
                                    <rect width="15" height="4" x="36" y="164" fill="#FB7185" rx="2"></rect>
                                    <rect width="15" height="4" x="36" y="172" fill="#FB7185" rx="2"></rect>
                                    <path fill="#FB7185"
                                          d="M44 134a2 2 0 012-2h129v4H46a2 2 0 01-2-2zm8 8a2 2 0 012-2h121v4H54a2 2 0 01-2-2zm0 8a2 2 0 012-2h121v4H54a2 2 0 01-2-2zm-8 8a2 2 0 012-2h59a2 2 0 110 4H46a2 2 0 01-2-2zm0 24a2 2 0 012-2h19a2 2 0 110 4H46a2 2 0 01-2-2zm8 8a2 2 0 012-2h51a2 2 0 110 4H54a2 2 0 01-2-2zm0 24a2 2 0 012-2h51a2 2 0 110 4H54a2 2 0 01-2-2zm-8 8a2 2 0 012-2h35a2 2 0 110 4H46a2 2 0 01-2-2zm16-24a2 2 0 012-2h113v4H62a2 2 0 01-2-2zm0 8a2 2 0 012-2h113v4H62a2 2 0 01-2-2z"></path>
                                    <rect width="64" height="64" x="232" y="99" fill="#fff" rx="8"></rect>
                                    <rect width="48" height="4" x="240" y="115" fill="#FB7185"
                                          rx="2"></rect>
                                    <rect width="40" height="4" x="244" y="123" fill="#FB7185"
                                          rx="2"></rect>
                                    <rect width="24" height="2" x="252" y="135" fill="#FECDD3"
                                          rx="1"></rect>
                                    <rect width="48" height="10" x="240" y="145" fill="#FB7185"
                                          rx="5"></rect>
                                    <circle cx="264" cy="99" r="8" fill="#FECDD3"></circle>
                                </g>
                                <defs>
                                    <filter id="play_svg__filter0_dd" width="382" height="262" x="-15"
                                            y="-7" color-interpolation-filters="sRGB"
                                            filterUnits="userSpaceOnUse">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                        <feColorMatrix in="SourceAlpha"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                        <feOffset dy="3"></feOffset>
                                        <feGaussianBlur stdDeviation="3"></feGaussianBlur>
                                        <feColorMatrix
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"></feColorMatrix>
                                        <feBlend in2="BackgroundImageFix"
                                                 result="effect1_dropShadow"></feBlend>
                                        <feColorMatrix in="SourceAlpha"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                        <feOffset dy="8"></feOffset>
                                        <feGaussianBlur stdDeviation="7.5"></feGaussianBlur>
                                        <feColorMatrix
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"></feColorMatrix>
                                        <feBlend in2="effect1_dropShadow"
                                                 result="effect2_dropShadow"></feBlend>
                                        <feBlend in="SourceGraphic" in2="effect2_dropShadow"
                                                 result="shape"></feBlend>
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-rose-500 hidden sm:block"></div>
                </div>
            </section>
            <section class="flex">
                <div class="w-full relative text-white overflow-hidden rounded-3xl flex shadow-lg">
                    <div class="w-full flex md:flex-col bg-gradient-to-br from-yellow-400 to-orange-500">
                        <div class="sm:max-w-sm sm:flex-none md:w-auto md:flex-auto flex flex-col items-start relative z-10 p-6 xl:p-8">
                            <h2 class="text-xl font-semibold mb-2 text-shadow">Watch the screencasts</h2>
                            <p class="font-medium text-amber-100 text-shadow mb-4">Learn more about Tailwind
                                directly from the team on our channel.</p><a
                                    class="mt-auto bg-amber-900 bg-opacity-50 hover:bg-opacity-75 transition-colors duration-200 rounded-xl font-semibold py-2 px-4 inline-flex"
                                    href="https://www.youtube.com/tailwindlabs">Start watching</a></div>
                        <div class="docs_image__1HDuG relative hidden sm:block">
                            <div class="absolute left-2 bottom-3 xl:bottom-5">
                                <svg width="420" height="204" fill="none" class="overflow-visible">
                                    <g opacity="0.8">
                                        <g filter="url(#screencasts_svg__filter0_d)">
                                            <rect width="96" height="60" x="324" fill="#FFFBEB"
                                                  rx="9"></rect>
                                        </g>
                                        <path fill="#FCD34D"
                                              d="M324 49.5h96V51a9 9 0 01-9 9h-78a9 9 0 01-9-9v-1.5z"></path>
                                        <path fill="#FBBF24" d="M324 46.502h96v3h-96v-3z"></path>
                                        <path fill="#F59E0B" d="M324 46.502h36.75v3H324v-3z"></path>
                                        <circle cx="371.25" cy="23.25" r="11.25" fill="#FCD34D"></circle>
                                        <path fill="#F59E0B" fill-rule="evenodd"
                                              d="M369.042 18.927a1.5 1.5 0 011.54.075l4.5 3a1.5 1.5 0 010 2.496l-4.5 3a1.5 1.5 0 01-2.332-1.248v-6a1.5 1.5 0 01.792-1.323z"
                                              clip-rule="evenodd"></path>
                                        <g filter="url(#screencasts_svg__filter1_d)">
                                            <rect width="96" height="60" x="216" fill="#FFFBEB"
                                                  rx="9"></rect>
                                        </g>
                                        <path fill="#FCD34D"
                                              d="M216 49.5h96V51a9 9 0 01-9 9h-78a9 9 0 01-9-9v-1.5z"></path>
                                        <path fill="#FBBF24" d="M216 46.502h96v3h-96v-3z"></path>
                                        <path fill="#F59E0B" d="M216 46.502h36.75v3H216v-3z"></path>
                                        <circle cx="263.25" cy="23.25" r="11.25" fill="#FCD34D"></circle>
                                        <path fill="#F59E0B" fill-rule="evenodd"
                                              d="M261.042 18.927a1.5 1.5 0 011.54.075l4.5 3a1.5 1.5 0 010 2.496l-4.5 3a1.5 1.5 0 01-2.332-1.248v-6a1.5 1.5 0 01.792-1.323z"
                                              clip-rule="evenodd"></path>
                                        <g filter="url(#screencasts_svg__filter2_d)">
                                            <rect width="96" height="60" x="270" y="72" fill="#FFFBEB"
                                                  rx="9"></rect>
                                        </g>
                                        <path fill="#FCD34D"
                                              d="M270 121.5h96v1.5a9 9 0 01-9 9h-78a9 9 0 01-9-9v-1.5z"></path>
                                        <path fill="#FBBF24" d="M270 118.502h96v3h-96v-3z"></path>
                                        <path fill="#F59E0B" d="M270 118.502h44.75v3H270v-3z"></path>
                                        <circle cx="317.25" cy="95.25" r="11.25" fill="#FCD34D"></circle>
                                        <path fill="#F59E0B" fill-rule="evenodd"
                                              d="M315.042 90.927a1.5 1.5 0 011.54.075l4.5 3a1.5 1.5 0 010 2.496l-4.5 3a1.5 1.5 0 01-2.332-1.248v-6a1.5 1.5 0 01.792-1.323z"
                                              clip-rule="evenodd"></path>
                                        <rect width="96" height="60" x="216" y="143.998" fill="#FFFBEB"
                                              rx="9"></rect>
                                        <path fill="#FCD34D"
                                              d="M216 193.5h96v1.5a9 9 0 01-9 9h-78a9 9 0 01-9-9v-1.5z"></path>
                                        <path fill="#FBBF24" d="M216 190.5h96v3h-96v-3z"></path>
                                        <path fill="#F59E0B" d="M216 190.5h36.75v3H216v-3z"></path>
                                        <circle cx="263.254" cy="167.25" r="11.25" fill="#FCD34D"></circle>
                                        <path fill="#F59E0B" fill-rule="evenodd"
                                              d="M261.046 162.927a1.5 1.5 0 011.54.075l4.5 3a1.5 1.5 0 010 2.496l-4.5 3a1.5 1.5 0 01-2.332-1.248v-6c0-.553.304-1.061.792-1.323z"
                                              clip-rule="evenodd"></path>
                                        <g filter="url(#screencasts_svg__filter3_d)">
                                            <rect width="96" height="60" x="162" y="72.002" fill="#FFFBEB"
                                                  rx="9"></rect>
                                        </g>
                                        <path fill="#FCD34D"
                                              d="M162 121.502h96v1.5a9 9 0 01-9 9h-78a9 9 0 01-9-9v-1.5z"></path>
                                        <path fill="#FBBF24" d="M162 118.502h96v3h-96v-3z"></path>
                                        <path fill="#F59E0B" d="M162 118.502h20.75v3H162v-3z"></path>
                                        <circle cx="209.254" cy="95.252" r="11.25" fill="#FCD34D"></circle>
                                        <path fill="#F59E0B" fill-rule="evenodd"
                                              d="M207.046 90.93a1.5 1.5 0 011.54.074l4.5 3a1.5 1.5 0 010 2.496l-4.5 3a1.5 1.5 0 01-2.332-1.248v-6a1.5 1.5 0 01.792-1.323z"
                                              clip-rule="evenodd"></path>
                                        <g filter="url(#screencasts_svg__filter4_d)">
                                            <rect width="96" height="60" x="54" y="72.002" fill="#FFFBEB"
                                                  rx="9"></rect>
                                        </g>
                                        <path fill="#FCD34D"
                                              d="M54 121.502h96v1.5a9 9 0 01-9 9H63a9 9 0 01-9-9v-1.5z"></path>
                                        <path fill="#FBBF24" d="M54 118.502h96v3H54v-3z"></path>
                                        <path fill="#F59E0B" d="M54 118.502h52.75v3H54v-3z"></path>
                                        <circle cx="101.25" cy="95.252" r="11.25" fill="#FCD34D"></circle>
                                        <path fill="#F59E0B" fill-rule="evenodd"
                                              d="M99.042 90.93a1.5 1.5 0 011.54.074l4.5 3a1.5 1.5 0 010 2.496l-4.5 3a1.5 1.5 0 01-2.332-1.248v-6a1.5 1.5 0 01.792-1.323z"
                                              clip-rule="evenodd"></path>
                                        <rect width="96" height="60" x="108" y="144.002" fill="#FFFBEB"
                                              rx="9"></rect>
                                        <path fill="#FCD34D"
                                              d="M108 193.5h96v1.5a9 9 0 01-9 9h-78a9 9 0 01-9-9v-1.5z"></path>
                                        <path fill="#FBBF24" d="M108 190.502h96v3h-96v-3z"></path>
                                        <path fill="#F59E0B" d="M108 190.502h36.75v3H108v-3z"></path>
                                        <circle cx="155.25" cy="167.252" r="11.25" fill="#FCD34D"></circle>
                                        <path fill="#F59E0B" fill-rule="evenodd"
                                              d="M153.046 162.927a1.5 1.5 0 011.54.075l4.5 3a1.5 1.5 0 010 2.496l-4.5 3a1.5 1.5 0 01-2.332-1.248v-6c0-.553.304-1.061.792-1.323z"
                                              clip-rule="evenodd"></path>
                                        <rect width="96" height="60" y="144.002" fill="#FFFBEB"
                                              rx="9"></rect>
                                        <path fill="#FCD34D"
                                              d="M0 193.502h96v1.5a9 9 0 01-9 9H9a9 9 0 01-9-9v-1.5z"></path>
                                        <path fill="#FBBF24" d="M0 190.502h96v3H0v-3z"></path>
                                        <path fill="#F59E0B" d="M0 190.502h36.75v3H0v-3z"></path>
                                        <circle cx="47.25" cy="167.252" r="11.25" fill="#FCD34D"></circle>
                                        <path fill="#F59E0B" fill-rule="evenodd"
                                              d="M45.042 162.929a1.5 1.5 0 011.54.075l4.5 3a1.499 1.499 0 010 2.496l-4.5 3a1.5 1.5 0 01-2.332-1.248v-6a1.5 1.5 0 01.792-1.323z"
                                              clip-rule="evenodd"></path>
                                    </g>
                                    <defs>
                                        <filter id="screencasts_svg__filter0_d" width="105" height="69"
                                                x="319.5" y="-2.25" color-interpolation-filters="sRGB"
                                                filterUnits="userSpaceOnUse">
                                            <feFlood flood-opacity="0"
                                                     result="BackgroundImageFix"></feFlood>
                                            <feColorMatrix in="SourceAlpha"
                                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                            <feOffset dy="2.25"></feOffset>
                                            <feGaussianBlur stdDeviation="2.25"></feGaussianBlur>
                                            <feColorMatrix
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"></feColorMatrix>
                                            <feBlend in2="BackgroundImageFix"
                                                     result="effect1_dropShadow"></feBlend>
                                            <feBlend in="SourceGraphic" in2="effect1_dropShadow"
                                                     result="shape"></feBlend>
                                        </filter>
                                        <filter id="screencasts_svg__filter1_d" width="105" height="69"
                                                x="211.5" y="-2.25" color-interpolation-filters="sRGB"
                                                filterUnits="userSpaceOnUse">
                                            <feFlood flood-opacity="0"
                                                     result="BackgroundImageFix"></feFlood>
                                            <feColorMatrix in="SourceAlpha"
                                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                            <feOffset dy="2.25"></feOffset>
                                            <feGaussianBlur stdDeviation="2.25"></feGaussianBlur>
                                            <feColorMatrix
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"></feColorMatrix>
                                            <feBlend in2="BackgroundImageFix"
                                                     result="effect1_dropShadow"></feBlend>
                                            <feBlend in="SourceGraphic" in2="effect1_dropShadow"
                                                     result="shape"></feBlend>
                                        </filter>
                                        <filter id="screencasts_svg__filter2_d" width="105" height="69"
                                                x="265.5" y="69.75" color-interpolation-filters="sRGB"
                                                filterUnits="userSpaceOnUse">
                                            <feFlood flood-opacity="0"
                                                     result="BackgroundImageFix"></feFlood>
                                            <feColorMatrix in="SourceAlpha"
                                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                            <feOffset dy="2.25"></feOffset>
                                            <feGaussianBlur stdDeviation="2.25"></feGaussianBlur>
                                            <feColorMatrix
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"></feColorMatrix>
                                            <feBlend in2="BackgroundImageFix"
                                                     result="effect1_dropShadow"></feBlend>
                                            <feBlend in="SourceGraphic" in2="effect1_dropShadow"
                                                     result="shape"></feBlend>
                                        </filter>
                                        <filter id="screencasts_svg__filter3_d" width="105" height="69"
                                                x="157.5" y="69.752" color-interpolation-filters="sRGB"
                                                filterUnits="userSpaceOnUse">
                                            <feFlood flood-opacity="0"
                                                     result="BackgroundImageFix"></feFlood>
                                            <feColorMatrix in="SourceAlpha"
                                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                            <feOffset dy="2.25"></feOffset>
                                            <feGaussianBlur stdDeviation="2.25"></feGaussianBlur>
                                            <feColorMatrix
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"></feColorMatrix>
                                            <feBlend in2="BackgroundImageFix"
                                                     result="effect1_dropShadow"></feBlend>
                                            <feBlend in="SourceGraphic" in2="effect1_dropShadow"
                                                     result="shape"></feBlend>
                                        </filter>
                                        <filter id="screencasts_svg__filter4_d" width="105" height="69"
                                                x="49.5" y="69.752" color-interpolation-filters="sRGB"
                                                filterUnits="userSpaceOnUse">
                                            <feFlood flood-opacity="0"
                                                     result="BackgroundImageFix"></feFlood>
                                            <feColorMatrix in="SourceAlpha"
                                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                            <feOffset dy="2.25"></feOffset>
                                            <feGaussianBlur stdDeviation="2.25"></feGaussianBlur>
                                            <feColorMatrix
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"></feColorMatrix>
                                            <feBlend in2="BackgroundImageFix"
                                                     result="effect1_dropShadow"></feBlend>
                                            <feBlend in="SourceGraphic" in2="effect1_dropShadow"
                                                     result="shape"></feBlend>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-orange-500 hidden sm:block"></div>
                </div>
            </section>
            <section
                    class="md:col-span-3 flex flex-wrap md:flex-nowrap items-center bg-gray-800 shadow-lg rounded-2xl py-6 md:py-4 px-6 md:pr-5 space-y-4 md:space-y-0 md:space-x-8">
                <h2 class="flex-none"><span class="sr-only">Tailwind UI</span>
                    <svg width="188" height="28" fill="none" viewBox="0 0 188 28" class="w-40 h-auto">
                        <path fill="#16BDCA"
                              d="M22 2c-5.333 0-8.667 2.667-10 8 2-2.667 4.333-3.667 7-3 1.522.38 2.609 1.484 3.813 2.706C24.773 11.696 27.043 14 32 14c5.333 0 8.667-2.667 10-8-2 2.667-4.333 3.667-7 3-1.521-.38-2.609-1.484-3.813-2.706C29.227 4.304 26.957 2 22 2zM12 14c-5.333 0-8.667 2.667-10 8 2-2.667 4.333-3.667 7-3 1.521.38 2.609 1.484 3.813 2.706C14.773 23.696 17.043 26 22 26c5.333 0 8.667-2.667 10-8-2 2.667-4.333 3.667-7 3-1.521-.38-2.609-1.484-3.813-2.706C19.227 16.304 16.957 14 12 14z"></path>
                        <path fill="#FFF"
                              d="M60.26 11.12V8h-3.72V3.8l-3.24.96V8h-2.76v3.12h2.76v7.2c0 3.9 1.98 5.28 6.96 4.68v-2.91c-2.46.12-3.72.15-3.72-1.77v-7.2h3.72zM74.463 8v2.13c-1.14-1.56-2.91-2.52-5.25-2.52-4.08 0-7.47 3.42-7.47 7.89 0 4.44 3.39 7.89 7.47 7.89 2.34 0 4.11-.96 5.25-2.55V23h3.24V8h-3.24zm-4.74 12.3c-2.7 0-4.74-2.01-4.74-4.8s2.04-4.8 4.74-4.8 4.74 2.01 4.74 4.8-2.04 4.8-4.74 4.8zM83.1 5.75c1.14 0 2.07-.96 2.07-2.07 0-1.14-.93-2.07-2.07-2.07-1.14 0-2.07.93-2.07 2.07 0 1.11.93 2.07 2.07 2.07zM81.48 23h3.24V8h-3.24v15zm7.002 0h3.24V1.1h-3.24V23zm24.282-15l-2.94 10.35L106.704 8h-3.09l-3.15 10.35L97.554 8h-3.42l4.71 15h3.18l3.15-10.11 3.12 10.11h3.18l4.71-15h-3.42zm7.426-2.25c1.14 0 2.07-.96 2.07-2.07 0-1.14-.93-2.07-2.07-2.07-1.14 0-2.07.93-2.07 2.07 0 1.11.93 2.07 2.07 2.07zM118.57 23h3.24V8h-3.24v15zm14.892-15.39c-2.04 0-3.66.75-4.65 2.31V8h-3.24v15h3.24v-8.04c0-3.06 1.68-4.32 3.81-4.32 2.04 0 3.36 1.2 3.36 3.48V23h3.24v-9.21c0-3.9-2.4-6.18-5.76-6.18zM154.59 2v8.13c-1.14-1.56-2.91-2.52-5.25-2.52-4.08 0-7.47 3.42-7.47 7.89 0 4.44 3.39 7.89 7.47 7.89 2.34 0 4.11-.96 5.25-2.55V23h3.24V2h-3.24zm-4.74 18.3c-2.7 0-4.74-2.01-4.74-4.8s2.04-4.8 4.74-4.8 4.74 2.01 4.74 4.8-2.04 4.8-4.74 4.8z"></path>
                        <path fill="#FFF" fill-rule="evenodd"
                              d="M171 4h10a4 4 0 014 4v10a4 4 0 01-4 4h-10a4 4 0 01-4-4V8a4 4 0 014-4zm-6 4a6 6 0 016-6h10a6 6 0 016 6v10a6 6 0 01-6 6h-10a6 6 0 01-6-6V8zm12.816 7.293c0 2.114-1.596 3.402-3.752 3.402-2.142 0-3.738-1.288-3.738-3.402V8.7h1.918v6.44c0 .952.504 1.666 1.82 1.666s1.82-.714 1.82-1.666V8.7h1.932v6.594zm2.021 3.206V8.7h1.932v9.8h-1.932z"
                              clip-rule="evenodd"></path>
                    </svg>
                </h2>
                <p class="flex-auto text-white text-lg font-medium">Beautiful UI components, crafted by the
                    creators of Tailwind&nbsp;CSS</p><a href="https://tailwindui.com/components"
                                                        class="flex-none bg-white hover:bg-gray-100 transition-colors duration-200 text-gray-900 font-semibold rounded-lg py-3 px-4">Browse
                    components</a></section>
        </div>
        <section><h2 class="text-3xl tracking-tight font-extrabold text-gray-900 mt-16 mb-8">What’s new in
                Tailwind</h2>
            <ul class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 xl:gap-8 font-semibold text-gray-900 text-center">
                <li class="flex"><a
                            class="relative rounded-xl ring-1 ring-black ring-opacity-5 shadow-sm w-full pt-8 pb-6 px-6"
                            href="/docs/ring-width">
                        <svg width="144" height="48" fill="none" viewBox="0 0 144 48"
                             class="h-auto max-w-full mx-auto mb-3">
                            <path fill="#fff" d="M0 0h144v48H0z"></path>
                            <path fill="#A5F3FC"
                                  d="M46 11a4 4 0 00-4 4v12a4 4 0 004 4h26.638l-2.412-5.858a3 3 0 013.916-3.916l17 7A3 3 0 0193 31h5a4 4 0 004-4V15a4 4 0 00-4-4H46z"></path>
                            <path fill="#22D3EE"
                                  d="M72.293 23.293a1 1 0 011.088-.218l17 7a1 1 0 01.013 1.844l-4.653 1.994 5.673 5.673a1 1 0 010 1.414L90 42.414a1 1 0 01-1.414 0l-5.673-5.672-1.994 4.652a1 1 0 01-1.844-.013l-7-17a1 1 0 01.218-1.088z"></path>
                            <path fill="#22D3EE"
                                  d="M38 15a8 8 0 018-8h52a8 8 0 018 8v12a8 8 0 01-8 8h-8.343l-.412-.412 1.937-.83A2.994 2.994 0 0092.236 33H98a6 6 0 006-6V15a6 6 0 00-6-6H46a6 6 0 00-6 6v12a6 6 0 006 6h27.462l.823 2H46a8 8 0 01-8-8V15z"></path>
                        </svg>
                        Focus Ring Utilities<span
                                class="absolute top-2 right-2 bg-fuchsia-100 text-fuchsia-600 rounded-full text-xs py-0.5 px-2">2.0+</span></a>
                </li>
                <li class="flex"><a
                            class="relative rounded-xl ring-1 ring-black ring-opacity-5 shadow-sm w-full pt-8 pb-6 px-6"
                            href="/docs/dark-mode">
                        <svg width="144" height="48" fill="none" viewBox="0 0 144 48"
                             class="h-auto max-w-full mx-auto mb-3">
                            <path fill="#fff" d="M0 0h144v48H0z"></path>
                            <path fill="#A5F3FC" fill-rule="evenodd"
                                  d="M62 12c-6.627 0-12 5.373-12 12s5.373 12 12 12h20c6.627 0 12-5.373 12-12s-5.373-12-12-12H62zm20 22c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10z"
                                  clip-rule="evenodd"></path>
                            <path fill="#fff" d="M18 12h24v24H18z"></path>
                            <path fill="#22D3EE" fill-rule="evenodd"
                                  d="M30 14a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-7.071 2.929a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414zm14.142 0a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 0zM25 24a5 5 0 1110 0 5 5 0 01-10 0zm-5 0a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1zm17 0a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1zm-2.05 4.95a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414zm-11.314 0a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707zM30 31a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1z"
                                  clip-rule="evenodd"></path>
                            <path fill="#fff" d="M102 12h24v24h-24z"></path>
                            <path fill="#22D3EE"
                                  d="M111.353 14.94c.283.283.37.708.221 1.08a8 8 0 0010.407 10.408 1 1 0 011.301 1.3A10.003 10.003 0 01114 34c-5.523 0-10-4.477-10-10 0-4.207 2.598-7.805 6.273-9.282a1 1 0 011.08.22z"></path>
                        </svg>
                        Dark Mode<span
                                class="absolute top-2 right-2 bg-fuchsia-100 text-fuchsia-600 rounded-full text-xs py-0.5 px-2">2.0+</span></a>
                </li>
                <li class="flex"><a
                            class="relative rounded-xl ring-1 ring-black ring-opacity-5 shadow-sm w-full pt-8 pb-6 px-6"
                            href="/docs/customizing-colors#color-palette-reference">
                        <svg width="144" height="48" fill="none" viewBox="0 0 144 48"
                             class="h-auto max-w-full mx-auto mb-3">
                            <path fill="#fff" d="M0 0h144v48H0z"></path>
                            <path fill="#A5F3FC" fill-rule="evenodd"
                                  d="M63.559 48H92a4 4 0 004-4V34a4 4 0 00-4-4H81.559l-18 18zM67.898 40.498l19.943-19.942a4 4 0 000-5.657l-7.072-7.071a4 4 0 00-5.656 0L68 14.94v24.058c0 .509-.035 1.009-.102 1.499z"
                                  clip-rule="evenodd"></path>
                            <path fill="#22D3EE" fill-rule="evenodd"
                                  d="M52 0a4 4 0 00-4 4v35a9 9 0 1018 0V4a4 4 0 00-4-4H52zm5 42a3 3 0 100-6 3 3 0 000 6z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        Extended Color Palette<span
                                class="absolute top-2 right-2 bg-fuchsia-100 text-fuchsia-600 rounded-full text-xs py-0.5 px-2">2.0+</span></a>
                </li>
                <li class="flex"><a
                            class="relative rounded-xl ring-1 ring-black ring-opacity-5 shadow-sm w-full pt-8 pb-6 px-6"
                            href="/docs/configuring-variants#enabling-extra-variants">
                        <svg width="144" height="48" fill="none" viewBox="0 0 144 48"
                             class="h-auto max-w-full mx-auto mb-3">
                            <path fill="#fff" d="M0 0h144v48H0z"></path>
                            <path fill="#22D3EE"
                                  d="M71.293 26.293a1 1 0 011.088-.218l17 7a1 1 0 01.013 1.844l-4.653 1.994 5.673 5.673a1 1 0 010 1.414L89 45.414a1 1 0 01-1.414 0l-5.673-5.672-1.994 4.652a1 1 0 01-1.844-.013l-7-17a1 1 0 01.218-1.088z"></path>
                            <path fill="#22D3EE"
                                  d="M46 16a4 4 0 00-4 4v12a4 4 0 004 4h26.462l-3.236-7.858a3 3 0 013.916-3.916l17 7A3 3 0 0191.236 36H98a4 4 0 004-4V20a4 4 0 00-4-4H46z"></path>
                            <path fill="#A5F3FC"
                                  d="M54 8a4 4 0 00-4 4v2h44v-2a4 4 0 00-4-4H54zM62 2a4 4 0 00-4 4h28a4 4 0 00-4-4H62z"></path>
                        </svg>
                        Extend Variants<span
                                class="absolute top-2 right-2 bg-fuchsia-100 text-fuchsia-600 rounded-full text-xs py-0.5 px-2">2.0+</span></a>
                </li>
                <li class="flex"><a
                            class="relative rounded-xl ring-1 ring-black ring-opacity-5 shadow-sm w-full pt-8 pb-6 px-6"
                            href="/docs/breakpoints">
                        <svg width="144" height="48" fill="none" viewBox="0 0 144 48"
                             class="h-auto max-w-full mx-auto mb-3">
                            <path fill="#fff" d="M0 0h144v48H0z"></path>
                            <path fill="url(#breakpoint_svg__paint0_linear)" fill-rule="evenodd"
                                  d="M108 24a1 1 0 011-1h15.586l-2.293-2.293a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 11-1.414-1.414L124.586 25H109a1 1 0 01-1-1z"
                                  clip-rule="evenodd"></path>
                            <path fill="url(#breakpoint_svg__paint1_linear)" fill-rule="evenodd"
                                  d="M36 24a1 1 0 01-1 1H19.414l2.293 2.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L19.414 23H35a1 1 0 011 1z"
                                  clip-rule="evenodd"></path>
                            <path fill="#A5F3FC" fill-rule="evenodd"
                                  d="M48 0a4 4 0 00-4 4v40a4 4 0 004 4h48a4 4 0 004-4V4a4 4 0 00-4-4H48zm1 7a2 2 0 100-4 2 2 0 000 4zm8-2a2 2 0 11-4 0 2 2 0 014 0zm4 2a2 2 0 100-4 2 2 0 000 4z"
                                  clip-rule="evenodd"></path>
                            <defs>
                                <linearGradient id="breakpoint_svg__paint0_linear" x1="105" x2="127" y1="24"
                                                y2="24" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#A5F3FC"></stop>
                                    <stop offset="1" stop-color="#22D3EE"></stop>
                                </linearGradient>
                                <linearGradient id="breakpoint_svg__paint1_linear" x1="39" x2="17" y1="24"
                                                y2="24" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#A5F3FC"></stop>
                                    <stop offset="1" stop-color="#22D3EE"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                        Extra Wide Breakpoint<span
                                class="absolute top-2 right-2 bg-fuchsia-100 text-fuchsia-600 rounded-full text-xs py-0.5 px-2">2.0+</span></a>
                </li>
                <li class="flex"><a
                            class="relative rounded-xl ring-1 ring-black ring-opacity-5 shadow-sm w-full pt-8 pb-6 px-6"
                            href="/docs/presets">
                        <svg width="144" height="48" fill="none" viewBox="0 0 144 48"
                             class="h-auto max-w-full mx-auto mb-3">
                            <path fill="#fff" d="M0 0h144v48H0z"></path>
                            <path fill="#A5F3FC" fill-rule="evenodd"
                                  d="M56 0a8 8 0 00-8 8v32a8 8 0 008 8h32a8 8 0 008-8V8a8 8 0 00-8-8H56zm10 8a2 2 0 00-2 2v4a2 2 0 002 2h2a2 2 0 002-2v-4a2 2 0 00-2-2h-2zm8 14a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4zm-8 10a2 2 0 00-2 2v4a2 2 0 002 2h2a2 2 0 002-2v-4a2 2 0 00-2-2h-2z"
                                  clip-rule="evenodd"></path>
                            <path fill="#22D3EE" fill-rule="evenodd"
                                  d="M56 12a2 2 0 012-2h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a2 2 0 01-2-2zm2 10a2 2 0 100 4h14a1 1 0 001-1v-2a1 1 0 00-1-1H58zm0 12a2 2 0 100 4h4a1 1 0 001-1v-2a1 1 0 00-1-1h-4zm14 0a1 1 0 00-1 1v2a1 1 0 001 1h14a2 2 0 100-4H72zm-1-23a1 1 0 011-1h14a2 2 0 110 4H72a1 1 0 01-1-1v-2zm11 11a1 1 0 00-1 1v2a1 1 0 001 1h4a2 2 0 100-4h-4z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        Shareable Presets</a></li>
                <li class="flex"><a
                            class="relative rounded-xl ring-1 ring-black ring-opacity-5 shadow-sm w-full pt-8 pb-6 px-6"
                            href="/docs/gradient-color-stops">
                        <svg width="144" height="48" fill="none" viewBox="0 0 144 48"
                             class="h-auto max-w-full mx-auto mb-3">
                            <path fill="#fff" d="M0 0h144v48H0z"></path>
                            <rect width="128" height="20" x="8" y="24"
                                  fill="url(#gradients_svg__paint0_linear)" rx="4"></rect>
                            <path fill="#22D3EE" fill-rule="evenodd"
                                  d="M2 4a2 2 0 00-2 2v12a2 2 0 002 2h4l2 2 2-2h4a2 2 0 002-2V6a2 2 0 00-2-2H2zm12 2H2v12h12V6zM130 4a2 2 0 00-2 2v12a2 2 0 002 2h4l2 2 2-2h4a2 2 0 002-2V6a2 2 0 00-2-2h-12zm12 2h-12v12h12V6z"
                                  clip-rule="evenodd"></path>
                            <path fill="#A5F3FC" d="M4 8h8v8H4z"></path>
                            <path fill="#22D3EE" d="M132 8h8v8h-8z"></path>
                            <defs>
                                <linearGradient id="gradients_svg__paint0_linear" x1="136" x2="8"
                                                y1="34.476" y2="34.476" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#22D3EE"></stop>
                                    <stop offset="1" stop-color="#A5F3FC"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                        Gradients</a></li>
                <li class="flex"><a
                            class="relative rounded-xl ring-1 ring-black ring-opacity-5 shadow-sm w-full pt-8 pb-6 px-6"
                            href="/docs/animation">
                        <svg width="144" height="48" fill="none" viewBox="0 0 144 48"
                             class="h-auto max-w-full mx-auto mb-3">
                            <path fill="#fff" d="M0 0h144v48H0z"></path>
                            <rect width="24" height="24" x="26" y="13" fill="#A5F3FC" rx="4"></rect>
                            <path stroke="url(#animations_svg__paint0_linear)" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2"
                                  d="M57 25h22m0 0l-4-4m4 4l-4 4"></path>
                            <path fill="#22D3EE"
                                  d="M86.036 17.975a4 4 0 012.828-4.9l18.81-5.04a4 4 0 014.899 2.83l5.04 18.809a4 4 0 01-2.829 4.899l-18.81 5.04a4 4 0 01-4.898-2.829l-5.04-18.81z"></path>
                            <defs>
                                <linearGradient id="animations_svg__paint0_linear" x1="57" x2="79" y1="25"
                                                y2="25" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#A5F3FC"></stop>
                                    <stop offset="1" stop-color="#22D3EE"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                        Animations</a></li>
            </ul>
        </section>
        <section>
            <header class="flex items-center justify-between mt-16 mb-8"><h2
                        class="text-3xl tracking-tight font-extrabold text-gray-900">Latest Updates</h2><a
                        href="https://blog.tailwindcss.com" class="font-medium text-gray-900">View all the
                    latest updates</a></header>
            <ul class="bg-gray-50 rounded-3xl p-2 sm:p-5 xl:p-6">
                <li>
                    <article><a href="https://blog.tailwindcss.com/tailwindcss-v2"
                                class="grid md:grid-cols-8 xl:grid-cols-9 items-start relative rounded-xl p-3 sm:p-5 xl:p-6 overflow-hidden hover:bg-white">
                            <h3 class="font-semibold text-gray-900 md:col-start-3 md:col-span-6 xl:col-start-3 xl:col-span-7 mb-1 ml-9 md:ml-0">
                                Tailwind CSS v2.0</h3>
                            <time datetime="2020-11-18T17:45:00.000Z"
                                  class="md:col-start-1 md:col-span-2 row-start-1 md:row-end-3 flex items-center font-medium mb-1 md:mb-0">
                                <svg viewBox="0 0 12 12"
                                     class="w-3 h-3 mr-6 overflow-visible text-cyan-400">
                                    <circle cx="6" cy="6" r="6" fill="currentColor"></circle>
                                    <circle cx="6" cy="6" r="11" fill="none" stroke="currentColor"
                                            stroke-width="2"></circle>
                                    <path d="M 6 18 V 500" fill="none" stroke-width="2"
                                          stroke="currentColor" class="text-gray-200"></path>
                                </svg>
                                Nov 19, 2020
                            </time>
                            <p class="md:col-start-3 md:col-span-6 xl:col-span-7 ml-9 md:ml-0">Today we're
                                finally releasing Tailwind CSS v2.0, including an all-new color palette,
                                dark mode support, and tons more!</p></a></article>
                </li>
                <li>
                    <article><a href="https://blog.tailwindcss.com/tailwindcss-1-9"
                                class="grid md:grid-cols-8 xl:grid-cols-9 items-start relative rounded-xl p-3 sm:p-5 xl:p-6 overflow-hidden hover:bg-white">
                            <h3 class="font-semibold text-gray-900 md:col-start-3 md:col-span-6 xl:col-start-3 xl:col-span-7 mb-1 ml-9 md:ml-0">
                                Tailwind CSS v1.9.0</h3>
                            <time datetime="2020-10-13T18:30:00.000Z"
                                  class="md:col-start-1 md:col-span-2 row-start-1 md:row-end-3 flex items-center font-medium mb-1 md:mb-0">
                                <svg viewBox="0 0 12 12"
                                     class="w-3 h-3 mr-6 overflow-visible text-gray-300">
                                    <circle cx="6" cy="6" r="6" fill="currentColor"></circle>
                                    <path d="M 6 -6 V -30" fill="none" stroke-width="2"
                                          stroke="currentColor" class="text-gray-200"></path>
                                    <path d="M 6 18 V 500" fill="none" stroke-width="2"
                                          stroke="currentColor" class="text-gray-200"></path>
                                </svg>
                                Oct 14, 2020
                            </time>
                            <p class="md:col-start-3 md:col-span-6 xl:col-span-7 ml-9 md:ml-0">We just
                                released Tailwind CSS v1.9 which adds support for configuration presets,
                                useful new CSS grid utilities, extended border radius, rotate, and skew
                                scales, helpful accessibility improvements, and more!</p></a></article>
                </li>
                <li>
                    <article><a href="https://blog.tailwindcss.com/introducing-tailwind-play"
                                class="grid md:grid-cols-8 xl:grid-cols-9 items-start relative rounded-xl p-3 sm:p-5 xl:p-6 overflow-hidden hover:bg-white">
                            <h3 class="font-semibold text-gray-900 md:col-start-3 md:col-span-6 xl:col-start-3 xl:col-span-7 mb-1 ml-9 md:ml-0">
                                Introducing Tailwind Play</h3>
                            <time datetime="2020-10-07T13:00:00.000Z"
                                  class="md:col-start-1 md:col-span-2 row-start-1 md:row-end-3 flex items-center font-medium mb-1 md:mb-0">
                                <svg viewBox="0 0 12 12"
                                     class="w-3 h-3 mr-6 overflow-visible text-gray-300">
                                    <circle cx="6" cy="6" r="6" fill="currentColor"></circle>
                                    <path d="M 6 -6 V -30" fill="none" stroke-width="2"
                                          stroke="currentColor" class="text-gray-200"></path>
                                    <path d="M 6 18 V 500" fill="none" stroke-width="2"
                                          stroke="currentColor" class="text-gray-200"></path>
                                </svg>
                                Oct 7, 2020
                            </time>
                            <p class="md:col-start-3 md:col-span-6 xl:col-span-7 ml-9 md:ml-0">Today we're
                                excited to release the first version of Tailwind Play, an advanced online
                                playground for Tailwind CSS that lets you use all of Tailwind's build-time
                                features directly in the browser.</p></a></article>
                </li>
                <li>
                    <article>
                        <a href="https://blog.tailwindcss.com/headless-ui-unstyled-accessible-ui-components"
                           class="grid md:grid-cols-8 xl:grid-cols-9 items-start relative rounded-xl p-3 sm:p-5 xl:p-6 overflow-hidden hover:bg-white">
                            <h3 class="font-semibold text-gray-900 md:col-start-3 md:col-span-6 xl:col-start-3 xl:col-span-7 mb-1 ml-9 md:ml-0">
                                Headless UI: Unstyled, Accessible UI Components</h3>
                            <time datetime="2020-10-06T18:30:00.000Z"
                                  class="md:col-start-1 md:col-span-2 row-start-1 md:row-end-3 flex items-center font-medium mb-1 md:mb-0">
                                <svg viewBox="0 0 12 12"
                                     class="w-3 h-3 mr-6 overflow-visible text-gray-300">
                                    <circle cx="6" cy="6" r="6" fill="currentColor"></circle>
                                    <path d="M 6 -6 V -30" fill="none" stroke-width="2"
                                          stroke="currentColor" class="text-gray-200"></path>
                                </svg>
                                Oct 7, 2020
                            </time>
                            <p class="md:col-start-3 md:col-span-6 xl:col-span-7 ml-9 md:ml-0">Headless UI
                                is a set of completely unstyled, fully accessible UI components for React,
                                Vue, and Alpine.js that make it easy to build fully accessible custom UI
                                components, without sacrificing the ability to style them from scratch with
                                simple utility classes.</p></a></article>
                </li>
            </ul>
        </section>
        <section><h2 class="text-3xl tracking-tight font-extrabold text-gray-900 mt-16 mb-8">Get
                involved</h2>
            <ul class="grid sm:grid-cols-2 gap-6 xl:gap-8">
                <li><a href="https://github.com/tailwindlabs/tailwindcss/discussions"
                       class="flex items-start space-x-4">
                        <svg fill="currentColor" class="flex-none text-gray-900 w-12 h-12">
                            <rect width="48" height="48" rx="12"></rect>
                            <path d="M23.997 12a12 12 0 00-3.792 23.388c.6.12.816-.264.816-.576l-.012-2.04c-3.336.72-4.044-1.608-4.044-1.608-.552-1.392-1.332-1.764-1.332-1.764-1.08-.744.084-.72.084-.72 1.2.084 1.836 1.236 1.836 1.236 1.08 1.824 2.808 1.296 3.492.996.12-.78.42-1.308.756-1.608-2.664-.3-5.46-1.332-5.46-5.928 0-1.32.468-2.388 1.236-3.228a4.32 4.32 0 01.12-3.168s1.008-.324 3.3 1.224a11.496 11.496 0 016 0c2.292-1.56 3.3-1.224 3.3-1.224.66 1.644.24 2.88.12 3.168.768.84 1.236 1.92 1.236 3.228 0 4.608-2.808 5.616-5.484 5.916.432.372.816 1.104.816 2.22l-.012 3.3c0 .312.216.696.828.576A12 12 0 0023.997 12z"
                                  fill="currentColor" class="text-gray-50"></path>
                        </svg>
                        <div class="flex-auto"><h3 class="font-bold text-gray-900">GitHub Discussions</h3>
                            <p>Connect with members of the Tailwind CSS community.</p></div>
                    </a></li>
                <li><a href="/discord" class="flex items-start space-x-4">
                        <svg fill="currentColor" class="flex-none text-indigo-400 w-12 h-12">
                            <rect width="48" height="48" rx="12"></rect>
                            <path d="M21.637 23.57c-.745 0-1.332.653-1.332 1.45 0 .797.6 1.45 1.332 1.45.744 0 1.332-.653 1.332-1.45.013-.797-.588-1.45-1.332-1.45zm4.767 0c-.744 0-1.332.653-1.332 1.45 0 .797.6 1.45 1.332 1.45.745 0 1.332-.653 1.332-1.45 0-.797-.587-1.45-1.332-1.45z"
                                  fill="currentColor" class="text-indigo-50"></path>
                            <path d="M32.75 12.613H15.248a2.684 2.684 0 00-2.678 2.69v17.66a2.684 2.684 0 002.678 2.69h14.811l-.692-2.416 1.672 1.554 1.58 1.463 2.809 2.482V15.304a2.684 2.684 0 00-2.678-2.69zm-5.042 17.058s-.47-.561-.862-1.058c1.711-.483 2.364-1.554 2.364-1.554-.535.353-1.045.6-1.502.77a8.591 8.591 0 01-1.894.562 9.151 9.151 0 01-3.383-.013 10.964 10.964 0 01-1.92-.561 7.652 7.652 0 01-.953-.445c-.04-.026-.078-.039-.117-.065-.027-.013-.04-.026-.053-.039-.235-.13-.365-.222-.365-.222s.627 1.045 2.285 1.541c-.392.497-.875 1.084-.875 1.084-2.886-.091-3.983-1.985-3.983-1.985 0-4.206 1.88-7.615 1.88-7.615C20.211 18.661 22 18.7 22 18.7l.131.157c-2.35.679-3.435 1.71-3.435 1.71s.287-.156.77-.378c1.398-.614 2.508-.784 2.965-.823.079-.013.144-.026.223-.026a10.647 10.647 0 016.57 1.228s-1.033-.98-3.253-1.66l.183-.208s1.79-.04 3.67 1.371c0 0 1.881 3.41 1.881 7.615 0 0-1.11 1.894-3.997 1.985z"
                                  fill="currentColor" class="text-indigo-50"></path>
                        </svg>
                        <div class="flex-auto"><h3 class="font-bold text-gray-900">Discord</h3>
                            <p>Join our Discord group to chat with other Tailwind users.</p></div>
                    </a></li>
                <li><a href="https://twitter.com/tailwindcss" class="flex items-start space-x-4">
                        <svg fill="currentColor" class="flex-none text-light-blue-400 w-12 h-12">
                            <rect width="48" height="48" rx="12"></rect>
                            <path d="M37.127 15.989h-.001a11.04 11.04 0 01-3.093.836 5.336 5.336 0 002.37-2.932 10.815 10.815 0 01-3.421 1.284 5.42 5.42 0 00-3.933-1.679c-2.976 0-5.385 2.373-5.385 5.3-.003.406.044.812.138 1.207a15.351 15.351 0 01-11.102-5.54 5.235 5.235 0 00-.733 2.663c0 1.837.959 3.461 2.406 4.413a5.338 5.338 0 01-2.449-.662v.066c0 2.57 1.86 4.708 4.32 5.195a5.55 5.55 0 01-1.418.186c-.34 0-.68-.033-1.013-.099.684 2.106 2.676 3.637 5.034 3.68a10.918 10.918 0 01-6.69 2.269 11.21 11.21 0 01-1.285-.077 15.237 15.237 0 008.242 2.394c9.918 0 15.337-8.077 15.337-15.083 0-.23-.006-.459-.017-.683a10.864 10.864 0 002.686-2.746l.007.008z"
                                  fill="currentColor" class="text-light-blue-50"></path>
                        </svg>
                        <div class="flex-auto"><h3 class="font-bold text-gray-900">Twitter</h3>
                            <p>Follow the Tailwind Twitter account for news and updates.</p></div>
                    </a></li>
                <li><a href="https://www.youtube.com/tailwindlabs" class="flex items-start space-x-4">
                        <svg fill="currentColor" class="flex-none text-red-500 w-12 h-12">
                            <rect width="48" height="48" rx="12"></rect>
                            <path d="M36.83 18.556c0-2.285-1.681-4.124-3.758-4.124a184.713 184.713 0 00-8.615-.182h-.914c-2.925 0-5.799.05-8.612.183-2.072 0-3.753 1.848-3.753 4.133A75.6 75.6 0 0011 23.99a78.487 78.487 0 00.173 5.429c0 2.285 1.68 4.139 3.753 4.139 2.955.137 5.987.198 9.07.192 3.087.01 6.11-.054 9.069-.193 2.077 0 3.758-1.853 3.758-4.138.121-1.813.177-3.62.172-5.434a73.982 73.982 0 00-.165-5.428zM21.512 28.97v-9.979l7.363 4.987-7.363 4.992z"
                                  fill="currentColor" class="text-red-50"></path>
                        </svg>
                        <div class="flex-auto"><h3 class="font-bold text-gray-900">YouTube</h3>
                            <p>Watch screencasts and feature tutorials of Tailwind.</p></div>
                    </a></li>
            </ul>
        </section>
    </div>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-blue-900 rounded-lg h-96 items-center justify-center">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="relative inline-block text-left">
                    <div>
                        <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="options-menu" aria-expanded="true" aria-haspopup="true">
                            Options
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Edit</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Duplicate</a>
                        </div>
                        <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Archive</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Move</a>
                        </div>
                        <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Share</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Add to favorites</a>
                        </div>
                        <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /End replace -->
    </div>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-blue-900 rounded-lg items-center justify-center">
                <!--
                      This example requires Tailwind CSS v2.0+

                      This example requires some changes to your config:

                      ```
                      // tailwind.config.js
                      module.exports = {
                        // ...
                        plugins: [
                          // ...
                          require('@tailwindcss/forms'),
                        ]
                      }
                      ```
                    -->
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    This information will be displayed publicly so be careful what you share.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="#" method="POST">
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="company_website" class="block text-sm font-medium text-gray-700">
                                                    Website
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                  <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    http://
                  </span>
                                                    <input type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="about" class="block text-sm font-medium text-gray-700">
                                                About
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">
                                                Brief description for your profile. URLs are hyperlinked.
                                            </p>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Photo
                                            </label>
                                            <div class="mt-1 flex items-center">
                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                  <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                </span>
                                                <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Change
                                                </button>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>
                                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span>Upload a file</span>
                                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                                        </label>
                                                        <p class="pl-1">or drag and drop</p>
                                                    </div>
                                                    <p class="text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 10MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Use a permanent address where you can receive mail.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="#" method="POST">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                                <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                                <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                                <input type="text" name="email_address" id="email_address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
                                                <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option>United States</option>
                                                    <option>Canada</option>
                                                    <option>Mexico</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6">
                                                <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                                                <input type="text" name="street_address" id="street_address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                                <input type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                                                <input type="text" name="state" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                                                <input type="text" name="postal_code" id="postal_code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Notifications</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Decide which communications you'd like to receive and how.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="#" method="POST">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">By Email</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Comments</label>
                                                        <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Candidates</label>
                                                        <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="offers" name="offers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="offers" class="font-medium text-gray-700">Offers</label>
                                                        <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div>
                                                <legend class="text-base font-medium text-gray-900">Push Notifications</legend>
                                                <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p>
                                            </div>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-center">
                                                    <input id="push_everything" name="push_notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                    <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                                                        Everything
                                                    </label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input id="push_email" name="push_notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                    <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                                                        Same as email
                                                    </label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input id="push_nothing" name="push_notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                    <label for="push_nothing" class="ml-3 block text-sm font-medium text-gray-700">
                                                        No push notifications
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /End replace -->
    </div>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-blue-900 rounded-lg items-center justify-center">
                <div class="bg-gray-100">
                    <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto">

                            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Applicant Information
                                    </h3>
                                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                        Personal details and application.
                                    </p>
                                </div>
                                <div class="border-t border-gray-200">
                                    <dl>
                                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Full name
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                Margot Foster
                                            </dd>
                                        </div>
                                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Application for
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                Backend Developer
                                            </dd>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Email address
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                margotfoster@example.com
                                            </dd>
                                        </div>
                                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Salary expectation
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                $120,000
                                            </dd>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                About
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
                                            </dd>
                                        </div>
                                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Attachments
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                        <div class="w-0 flex-1 flex items-center">
                                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" x-description="Heroicon name: solid/paper-clip" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="ml-2 flex-1 w-0 truncate">
                    resume_back_end_developer.pdf
                  </span>
                                                        </div>
                                                        <div class="ml-4 flex-shrink-0">
                                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                Download
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                        <div class="w-0 flex-1 flex items-center">
                                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" x-description="Heroicon name: solid/paper-clip" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="ml-2 flex-1 w-0 truncate">
                    coverletter_back_end_developer.pdf
                  </span>
                                                        </div>
                                                        <div class="ml-4 flex-shrink-0">
                                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                Download
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-blue-900 rounded-lg items-center justify-center">
                <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ]
  }
  ```
-->
                <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
                    <div class="max-w-md w-full space-y-8">
                        <div>
                            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                                Sign in to your account
                            </h2>
                            <p class="mt-2 text-center text-sm text-gray-600">
                                Or
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    start your 14-day free trial
                                </a>
                            </p>
                        </div>
                        <form class="mt-8 space-y-6" action="#" method="POST">
                            <input type="hidden" name="remember" value="true">
                            <div class="rounded-md shadow-sm -space-y-px">
                                <div>
                                    <label for="email-address" class="sr-only">Email address</label>
                                    <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                                </div>
                                <div>
                                    <label for="password" class="sr-only">Password</label>
                                    <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                        Remember me
                                    </label>
                                </div>

                                <div class="text-sm">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Forgot your password?
                                    </a>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
                                    Sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
          <div class="flex flex-wrap w-full">
            <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
              <div class="flex relative pb-12">
                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                </div>
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 1</h2>
                  <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
                </div>
              </div>
              <div class="flex relative pb-12">
                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                </div>
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 2</h2>
                  <p class="leading-relaxed">Vice migas literally kitsch +1 pok pok. Truffaut hot chicken slow-carb health goth, vape typewriter.</p>
                </div>
              </div>
              <div class="flex relative pb-12">
                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                </div>
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <circle cx="12" cy="5" r="3"></circle>
                    <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 3</h2>
                  <p class="leading-relaxed">Coloring book nar whal glossier master cleanse umami. Salvia +1 master cleanse blog taiyaki.</p>
                </div>
              </div>
              <div class="flex relative pb-12">
                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                </div>
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 4</h2>
                  <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
                </div>
              </div>
              <div class="flex relative">
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                    <path d="M22 4L12 14.01l-3-3"></path>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">FINISH</h2>
                  <p class="leading-relaxed">Pitchfork ugh tattooed scenester echo park gastropub whatever cold-pressed retro.</p>
                </div>
              </div>
            </div>
            <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="https://dummyimage.com/1200x500" alt="step">
          </div>
        </div>
      </section>

      <div class="h-screen hidden lg:block my-4 ml-4 shadow-lg relative w-80">
        <div class="bg-white h-full rounded-2xl dark:bg-gray-700">
            <nav class="mt-6">
                <div>
                    <a class="w-full font-thin uppercase text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-r from-white to-blue-100 border-r-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-r-4 border-blue-500" href="#">
                        <span class="text-left">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                </path>
                            </svg>
                        </span>
                        <span class="mx-4 text-sm font-normal">
                            Dashboard
                        </span>
                    </a>
                    <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                        <span class="text-left">
                            <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1024 1131q0-64-9-117.5t-29.5-103-60.5-78-97-28.5q-6 4-30 18t-37.5 21.5-35.5 17.5-43 14.5-42 4.5-42-4.5-43-14.5-35.5-17.5-37.5-21.5-30-18q-57 0-97 28.5t-60.5 78-29.5 103-9 117.5 37 106.5 91 42.5h512q54 0 91-42.5t37-106.5zm-157-520q0-94-66.5-160.5t-160.5-66.5-160.5 66.5-66.5 160.5 66.5 160.5 160.5 66.5 160.5-66.5 66.5-160.5zm925 509v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm0-260v-56q0-15-10.5-25.5t-25.5-10.5h-568q-15 0-25.5 10.5t-10.5 25.5v56q0 15 10.5 25.5t25.5 10.5h568q15 0 25.5-10.5t10.5-25.5zm0-252v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm256-320v1216q0 66-47 113t-113 47h-352v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-768v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-352q-66 0-113-47t-47-113v-1216q0-66 47-113t113-47h1728q66 0 113 47t47 113z">
                                </path>
                            </svg>
                        </span>
                        <span class="mx-4 text-sm font-normal">
                            Projects
                        </span>
                    </a>
                    <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                        <span class="text-left">
                            <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M685 483q16 0 27.5-11.5t11.5-27.5-11.5-27.5-27.5-11.5-27 11.5-11 27.5 11 27.5 27 11.5zm422 0q16 0 27-11.5t11-27.5-11-27.5-27-11.5-27.5 11.5-11.5 27.5 11.5 27.5 27.5 11.5zm-812 184q42 0 72 30t30 72v430q0 43-29.5 73t-72.5 30-73-30-30-73v-430q0-42 30-72t73-30zm1060 19v666q0 46-32 78t-77 32h-75v227q0 43-30 73t-73 30-73-30-30-73v-227h-138v227q0 43-30 73t-73 30q-42 0-72-30t-30-73l-1-227h-74q-46 0-78-32t-32-78v-666h918zm-232-405q107 55 171 153.5t64 215.5h-925q0-117 64-215.5t172-153.5l-71-131q-7-13 5-20 13-6 20 6l72 132q95-42 201-42t201 42l72-132q7-12 20-6 12 7 5 20zm477 488v430q0 43-30 73t-73 30q-42 0-72-30t-30-73v-430q0-43 30-72.5t72-29.5q43 0 73 29.5t30 72.5z">
                                </path>
                            </svg>
                        </span>
                        <span class="mx-4 text-sm font-normal">
                            My tasks
                        </span>
                    </a>
                    <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                        <span class="text-left">
                            <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M960 0l960 384v128h-128q0 26-20.5 45t-48.5 19h-1526q-28 0-48.5-19t-20.5-45h-128v-128zm-704 640h256v768h128v-768h256v768h128v-768h256v768h128v-768h256v768h59q28 0 48.5 19t20.5 45v64h-1664v-64q0-26 20.5-45t48.5-19h59v-768zm1595 960q28 0 48.5 19t20.5 45v128h-1920v-128q0-26 20.5-45t48.5-19h1782z">
                                </path>
                            </svg>
                        </span>
                        <span class="mx-4 text-sm font-normal">
                            Calendar
                        </span>
                    </a>
                    <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                        <span class="text-left">
                            <svg width="20" height="20" class="m-auto" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                </path>
                            </svg>
                        </span>
                        <span class="mx-4 text-sm font-normal">
                            Time manage
                        </span>
                    </a>
                    <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                        <span class="text-left">
                            <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1024 1131q0-64-9-117.5t-29.5-103-60.5-78-97-28.5q-6 4-30 18t-37.5 21.5-35.5 17.5-43 14.5-42 4.5-42-4.5-43-14.5-35.5-17.5-37.5-21.5-30-18q-57 0-97 28.5t-60.5 78-29.5 103-9 117.5 37 106.5 91 42.5h512q54 0 91-42.5t37-106.5zm-157-520q0-94-66.5-160.5t-160.5-66.5-160.5 66.5-66.5 160.5 66.5 160.5 160.5 66.5 160.5-66.5 66.5-160.5zm925 509v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm0-260v-56q0-15-10.5-25.5t-25.5-10.5h-568q-15 0-25.5 10.5t-10.5 25.5v56q0 15 10.5 25.5t25.5 10.5h568q15 0 25.5-10.5t10.5-25.5zm0-252v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm256-320v1216q0 66-47 113t-113 47h-352v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-768v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-352q-66 0-113-47t-47-113v-1216q0-66 47-113t113-47h1728q66 0 113 47t47 113z">
                                </path>
                            </svg>
                        </span>
                        <span class="mx-4 text-sm font-normal">
                            Reports
                        </span>
                    </a>
                    <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                        <span class="text-left">
                            <svg width="20" fill="currentColor" height="20" class="h-5 w-5" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1088 1256v240q0 16-12 28t-28 12h-240q-16 0-28-12t-12-28v-240q0-16 12-28t28-12h240q16 0 28 12t12 28zm316-600q0 54-15.5 101t-35 76.5-55 59.5-57.5 43.5-61 35.5q-41 23-68.5 65t-27.5 67q0 17-12 32.5t-28 15.5h-240q-15 0-25.5-18.5t-10.5-37.5v-45q0-83 65-156.5t143-108.5q59-27 84-56t25-76q0-42-46.5-74t-107.5-32q-65 0-108 29-35 25-107 115-13 16-31 16-12 0-25-8l-164-125q-13-10-15.5-25t5.5-28q160-266 464-266 80 0 161 31t146 83 106 127.5 41 158.5z">
                                </path>
                            </svg>
                        </span>
                        <span class="mx-4 text-sm font-normal">
                            Settings
                        </span>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
          <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
              </svg>
              <span class="ml-3 text-xl">Tailblocks</span>
            </a>
            <p class="mt-2 text-sm text-gray-500">Air plant banjo lyft occupy retro adaptogen indego</p>
          </div>
          <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">First Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">First Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">First Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">First Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                </li>
              </nav>
            </div>
          </div>
        </div>
        <div class="bg-gray-100">
          <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
            <p class="text-gray-500 text-sm text-center sm:text-left">© 2020 Tailblocks —
              <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@knyttneve</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                  <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
              </a>
            </span>
          </div>
        </div>
      </footer>
</x-app-layout>
