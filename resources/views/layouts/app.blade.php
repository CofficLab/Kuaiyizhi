<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="fixed top-0 z-50 w-full h-12">
        @livewire('header')
    </div>

    @if (Route::currentRouteName() != 'ideas.show')
        <main class="flex justify-center h-auto min-h-screen px-2 pt-24 lg:px-24 bg-gradient-to-b from-base-100/60">
            {{ $slot }}
        </main>
    @else
        <main class="flex flex-col bg-base-100/60">
            {{ $slot }}
        </main>
    @endif

    @if (Route::currentRouteName() != 'ideas.show')
        <footer class="p-16 mt-96">
            <div class="shadow-2xl bg-base-100/40 backdrop-blur rounded-3xl">
                @livewire('footer')
            </div>
        </footer>
    @endif

    @stack('modals')
    @livewireScripts
    @stack('scripts')

    @php
        $files = glob(public_path('/editor/juice-editor/assets') . '/index*.js');
        $js = basename($files[0]);
    @endphp

    <script type="module" crossorigin src="/editor/juice-editor/assets/{{ $js }}"></script>
</body>

</html>
