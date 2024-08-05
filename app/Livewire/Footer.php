<?php

namespace App\Livewire;

use Livewire\Component;

// #[Lazy]
class Footer extends Component
{
    public $centered = false;

    public function render()
    {
        return view('livewire.footer');
    }
}
