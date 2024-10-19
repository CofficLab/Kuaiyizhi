@props(['class' => ''])

{{-- 为子元素增加背景色，并且适配暗黑模式 --}}
<div class="shadow-lg bg-white/50 dark:bg-gray-800 {{ $class }} rounded-xl">
    {{ $slot }}
</div>
