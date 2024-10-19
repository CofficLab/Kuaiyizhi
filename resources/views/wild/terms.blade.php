<x-app-layout>
    @section('title')
        服务条款 | {{ config('app.name') }}
    @endsection

    <x-article title="服务条款">
        <x-markdown path="markdown/terms"></x-markdown>
    </x-article>
</x-app-layout>
