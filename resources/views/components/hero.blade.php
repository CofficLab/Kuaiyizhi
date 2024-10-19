@props(['title' => '', 'description' => ''])

<div class="flex flex-col space-x-2 w-full">
    <div class="w-full flex flex-col mt-2 mx-auto px-auto text-center">
        <h1 class="flex flex-col md:flex-row justify-center">
            {{ $title }}
        </h1>

        <div class="flex mt-2 w-full justify-center">
            <p class="leading-relaxed mb-2">{{ $description }}</p>
        </div>
    </div>
</div>
