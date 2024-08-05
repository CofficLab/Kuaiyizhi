<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Menu extends Component
{
    public $idea;
    public $current;
    public $link;
    public $active;
    public $expand = false;

    public function mount()
    {
        $this->active = $this->current->uuid == $this->idea->uuid;
        $this->link   = route('ideas.show', $this->idea->uuid);
        $this->expand = $this->current->getRoutes()->contains($this->idea->uuid);
    }

    public function render()
    {
        return view('livewire.menu');
    }

    public function goto ()
    {
        $this->current   = $this->idea;
        $contentInBase64 = base64_encode($this->current->content);
        $this->active    = true;
        // 发出livewire事件
        $this->dispatch("current_changed", $this->idea->uuid);
        // 改地址栏
        $this->js("history.pushState({}, '', '{$this->link}');");
        $this->js("updateUUIDAndContent('{$this->current->uuid}', '{$contentInBase64}');");
    }

    // 监听livewire事件
    #[On('current_changed')]
    public function changeCurrent($ideaId)
    {
        $this->active = $ideaId == $this->idea->uuid;
    }

    public function toggleExpand()
    {
        $this->expand = !$this->expand;
    }
}
