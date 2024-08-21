<x-app-layout>
    @section('title')
        关于我们 | {{ config('app.name') }}
    @endsection

    <x-article title="关于我们">
        <x-markdown path="markdown/about"></x-markdown>
    </x-article>
</x-app-layout>
