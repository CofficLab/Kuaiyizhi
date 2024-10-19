<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Attributes\On;
use Livewire\Component;

class IdeaShow extends Component
{
    public $idea;
    public function render()
    {
        return view('livewire.idea-show');
    }

    // 监听livewire事件
    #[On('current_changed')]
    public function changeCurrent($ideaId)
    {
        $this->idea = Idea::find($ideaId);
    }
}
