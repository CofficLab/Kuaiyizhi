<div class="flex flex-col justify-center gap-4 py-8">
    <a href="/" class="smart-link flex items-center w-auto text-lg font-bold self-center">
        <div class="flex flex-row items-center w-full">
            <img src="/logo.png" alt="" class="h-8 mt-1 fill-current">
            <span class="ml-4 text-xl font-bold w-full">快易知</span>
        </div>
    </a>

    <div class="w-full flex flex-col">
        <div class="flex flex-row justify-center gap-16 p-8 w-full">
            <ul class="gap-8 flex flex-col">
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

            <ul class="gap-8 flex flex-col">
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
        </div>
    </div>

    <div class="self-center my-4">
        <a href="http://beian.miit.gov.cn" class="smart-link" id="beian-www.kuaiyc.com"
            target="_blank">鲁ICP备2022009149号-2</a>
    </div>

    <div class="self-center">
        <a href="javascript:void(0)" class="smart-link">&copy; {{ date('Y') }} {{ config('app.company') }}</a>
    </div>
</div>
