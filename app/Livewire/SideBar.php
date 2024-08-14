<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;

// 如果懒加载，爬虫抓不到
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
