<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Idea;

class BookCard extends Component
{
    public Idea $book;
    public string $link;
    public int $childrenCount = 0;

    public function mount($book)
    {
        $this->book = $book;
        $this->link = $this->makeLink();
        $this->childrenCount = $book->children->count();
    }

    public function render()
    {
        return view('livewire.book-card');
    }

    private function makeLink() {
        return route('ideas.show', ['idea' => $this->book->uuid]);
    }
}
