<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="知识, 学习, 资源, 教育">
    <meta name="description" content="{{ config('app.name') }}是一个提供丰富知识和资源的平台，帮助用户探索和学习各种主题。">
    <meta property="og:title" content="一棵知识大树">
    <meta property="og:description" content="丰富的知识和资源平台">
    <meta property="og:image" content="https://www.kuaiyizhi.cn/logo.png">
    <meta property="og:url" content="https://www.kuaiyizhi.cn">

    <title>@yield('title', config('app.name') . ' - 一棵知识大树')</title>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="fixed top-0 z-50 w-full h-12">
        @include('layouts.header')
    </div>

    <main class="flex justify-center h-auto min-h-screen px-2 pt-12 lg:px-24 bg-gradient-to-b from-base-100/30">
        {{ $slot }}
    </main>

    <footer class="p-16 mt-48">
        <div class="flex flex-col gap-16 shadow-2xl bg-base-100/40 backdrop-blur rounded-3xl">
            @include('layouts.footer')
        </div>
    </footer>

    @stack('modals')
    @livewireScripts
    @stack('scripts')

    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "{{ config('app.name') }}",
    "url": "https://www.kuaiyizhi.cn",
    "description": "提供丰富知识和资源的平台"
    }
    </script>

</body>

</html>
