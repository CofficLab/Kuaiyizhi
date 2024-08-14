<x-app-layout>
    @section('title')
        知识库 - {{ config('app.name') }}
    @endsection

    <main class="container mx-auto mt-12">
        @if (count($ideas) > 0)
            <div class="flex flex-col pb-24 justify-center">
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-8">
                    @foreach ($ideas as $key => $book)
                        @livewire('book-card', ['book' => $book], key($key))
                    @endforeach
                </div>

                <div class="flex justify-center">
                    {{ $ideas->links() }}
                </div>
            </div>
        @else
            <div class="container flex justify-center items-center flex-row h-screen">
                <div class="card bg-base-100 shadow-xl w-56 smart-card">
                    <div class="card-body flex justify-center">
                        <h2 class="card-title flex justify-center">暂无数据</h2>
                    </div>
                    </figure>
                </div>
            </div>
        @endif
    </main>
</x-app-layout>
