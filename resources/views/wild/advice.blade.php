<x-app-layout>
    @section('title')
        反馈建议 | {{ config('app.name') }}
    @endsection

    <div class="flex flex-col container mx-auto">
        <x-hero title="反馈建议" description="您可以反馈用户体验、咨询各类问题等" />
        <section class="w-full flex justify-center ">
            @livewire('advice')
        </section>
    </div>
</x-app-layout>
