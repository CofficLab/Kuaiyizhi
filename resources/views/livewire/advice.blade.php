<div class="flex flex-wrap self-center mb-4 w-full justify-center">
    @if ($showForm)
    <form wire:submit="save" class="w-96">
        <div class="p-2 flex justify-center w-full">
            <div class="relative w-full justify-center flex">
                <div class="label">
                    <span class="label-text text-error">
                        @error('name') {{ $message }} @enderror
                    </span>
                </div>
                <input type="text" placeholder="称呼，选填" wire:model="name" class="input input-bordered w-full max-w-xs" />
            </div>
        </div>
        <div class="p-2 flex justify-center w-full">
            <div class="relative w-full flex justify-center">
                <div class="label">
                    <span class="label-text text-error">
                        @error('contact') {{ $message }} @enderror
                    </span>
                </div>
                <input type="text" placeholder="联系方式，选填" wire:model="contact" class="input input-bordered w-full max-w-xs" />
            </div>
        </div>
        <div class="p-2 flex justify-center">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-error">
                        @error('content') {{ $message }} @enderror
                    </span>
                </div>
                <textarea class="textarea textarea-bordered h-24" wire:model="content" placeholder="反馈内容"></textarea>
            </label>
        </div>
        <div class="p-2 w-full justify-center flex">
            <button class="btn" type="submit">提交</button>
        </div>
    </form>
    @endif

    @if ($showResult)
    <div class="h-full w-full px-8 my-16 rounded-lg overflow-hidden text-center relative">
        <h2 class="mb-3 text-blue-500">提交成功，感谢反馈！</h2>
    </div>
    @endif

</div>