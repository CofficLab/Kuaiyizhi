<?php

namespace App\Livewire;

use App\Models\Idea;
use Illuminate\Http\Request;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

#[Lazy]
class SideBar extends Component
{
    public $root;
    public $current;
    public $book;

    public function mount()
    {
        $this->root = Idea::find('remote_root');
        $this->book = $this->current->getBook();
    }

    public function render()
    {
        return view('livewire.side-bar');
    }
}
