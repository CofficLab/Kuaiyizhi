<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;

class Editor extends Component
{
    public $page;
    public $html;

    public function mount($page)
    {
        $this->page = $page;
        $this->html = $page->html;
    }

    public function render()
    {
        return view('livewire.editor');
    }

    public function autosave()
    {
        $page       = Page::find($this->page->id);
        $page->html = $this->html;
        $page->save();
    }
}
