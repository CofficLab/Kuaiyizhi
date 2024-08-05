<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;

    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $name
     * @param  mixed  $placeholder
     */
    public function __construct($name = '', $placeholder = '')
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.textarea');
    }
}
