<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Markdown extends Component
{
    public $path;

    public $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($path = '')
    {
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $renderedBlade = Blade::render(file_get_contents(resource_path($this->path) . '.md'));
        $this->content = Str::markdown($renderedBlade);

        return <<<'blade'
            <div class="py-4">
                {!! $content !!}
            </div>
        blade;
    }
}