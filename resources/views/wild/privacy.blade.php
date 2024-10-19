<x-app-layout>
    @section('title')
        隐私政策 | {{ config('app.name') }}
    @endsection

    <x-article title="隐私政策">
        <x-markdown path="markdown/privacy"></x-markdown>
    </x-article>
</x-app-layout>
