<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Menu extends Component
{
    public $idea;
    public $current;
    public $link;
    public $expand = false;

    public function mount()
    {
        $this->link   = route('ideas.show', $this->idea->uuid);
        $this->expand = $this->current->getRoutes()->contains($this->idea->uuid);
    }

    public function render()
    {
        return view('livewire.menu');
    }

    public function goto ()
    {
        $this->current = $this->idea;
        // 发出livewire事件
        $this->dispatch("current_changed", $this->idea->uuid);
        // 改地址栏
        $this->js("history.pushState({}, '', '{$this->link}');");
    }

    public function toggleExpand()
    {
        $this->expand = !$this->expand;
    }
}
