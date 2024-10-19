<blockquote
    class="mt-4 flex flex-row-reverse items-center justify-between w-full col-span-1 p-6 bg-base-300/10 rounded-lg shadow sm:flex-row">
    <div class="flex flex-col pl-5 sm:pr-10">
        <div class="relative sm:pl-12">
            <svg class="absolute left-0 hidden w-10 h-10 fill-current sm:block text-wave-500"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                <path
                    d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z" />
            </svg>
            <p class="mt-2"> {{ $words }}</p>
        </div>

        <h3 class="mt-3 font-medium leading-5  truncate sm:pl-12 flex justify-start">
            <span class="mt-1 text-sm leading-5 truncate">{{ $speakerTitle }} - {{ $speakerName }}</span>
        </h3>
        <p class="mt-1 text-sm leading-5 truncate"></p>
    </div>
    <div class="avatar rounded-2xl">
        <a class="w-24 block rounded-2xl" href="#">
            <img class="dark:hidden rounded-2xl" src="{{ $image }}" />
            <img class="hidden dark:block rounded-2xl" src="{{ $imageDark ?? '' }}" />
        </a>
    </div>
</blockquote>
