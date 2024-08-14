<div>
    <div class="w-full z-50 mx-auto">
        <div class="mt-0 hero smart-card">
            <div class="text-center hero-content">
                <div class="max-w-md">
                    <h1 class="text-3xl font-bold">也许，这是一番成就的开始</h1>
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-center gap-4">
            <a class="self-center w-56 mt-12 smart-link btn btn-lg" href="/ideas">在线学习</a>
            <a class="self-center w-56 mt-12 smart-link btn btn-lg"
                href="https://apps.apple.com/app/快易知/id6457892799">macOS APP</a>
        </div>
    </div>

    <hr class="border-cyan-500/10 my-12">

    <div class="z-50 flex flex-col justify-center gap-4 py-8">
        <a href="/" class="flex items-center self-center w-auto text-lg font-bold smart-link">
            <div class="flex flex-row items-center w-full">
                <img src="/logo.png" alt="" class="h-8 mt-1 fill-current">
                <span class="w-full ml-4 text-xl font-bold">快易知</span>
            </div>
        </a>

        <div class="flex flex-col w-full">
            <div class="flex flex-row justify-center w-full gap-16 p-8">
                <ul class="flex flex-col gap-8">
                    <li>
                        <a href="{{ route('privacy') }}" class="smart-link" target="_blank">隐私条款</a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}" class="smart-link" target="_blank">服务条款</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="smart-link">关于我们</a>
                    </li>
                    <li>
                        <a href="{{ route('advice') }}" class="smart-link">留言</a>
                    </li>
                </ul>

                <ul class="flex flex-col gap-8">
                    <li>
                        <a href="https://www.kuaiyc.com" class="smart-link" target="_blank">快易查</a>
                    </li>
                    <li>
                        <a href="https://www.kuaiyc.com/products" class="smart-link" target="_blank">API 产品</a>
                    </li>
                    <li>
                        <a href="https://www.kuaiyizhi.cn/ideas" class="smart-link" target="_blank">系列教程</a>
                    </li>
                    <li>
                        <a href="https://cofficlab.github.io" class="smart-link" target="_blank">Coffic 系列软件</a>
                    </li>
                </ul>
                <ul class="flex flex-col gap-8">
                    <li>
                        <a href="https://github.com/cofficlab" class="smart-link" target="_blank">GitHub</a>
                    </li>
                    <li>
                        <a href="https://github.com/CofficLab/JuiceEditor" class="smart-link"
                            target="_blank">JuiceEditor</a>
                    </li>
                    <li>
                        <a href="https://apps.apple.com/cn/app/%E5%BF%AB%E6%98%93%E7%9F%A5/id6457892799"
                            class="smart-link" target="_blank">快易知笔记 APP</a>
                    </li>
                    <li>
                        <a href="https://apps.apple.com/cn/app/cisum/id6466401036" class="smart-link"
                            target="_blank">Cisum
                            音乐与有声书播放器</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="self-center my-4">
            <a href="http://beian.miit.gov.cn" class="smart-link" id="beian-www.kuaiyc.com"
                target="_blank">鲁ICP备2022009149号-2</a>
        </div>

        <div class="self-center">
            <a href="javascript:void(0)" class="smart-link">&copy; {{ date('Y') }}
                {{ config('app.company') }}</a>
        </div>
    </div>

</div>
