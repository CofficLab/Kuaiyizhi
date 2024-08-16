<header id="header" class="z-50 backdrop-filter backdrop-blur-lg">
    <div
        class="navbar p-0
            bg-opacity-80 bg-gradient-to-r 
            from-emerald-900/80 to-indigo-900/70 
            text-neutral-content min-h-6">

        <div class="navbar-start p-0 m-0">
            <img src=" /logo.png" alt="" class="w-10 h-10 mx-2">
            <a href="{{ url('/') }}" class="-ml-2 btn btn-ghost normal-case text-lg">快易知</a>
        </div>

        <div class="gap-4 navbar-center p-0">
            <a class="smart-link" href="{{ url('/') }}" wire:navigate>首页</a>
            <a class="smart-link" href="{{ url('/app') }}" wire:navigate>APP</a>
            <a class="smart-link" href="{{ route('ideas.index') }}" wire:navigate>知识库</a>
        </div>

        <div class="navbar-end">
            <livewire:nav-end lazy />
        </div>
    </div>
</header>
