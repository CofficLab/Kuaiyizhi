<?php

namespace App\Livewire;

use Livewire\Component;

class Advice extends Component
{
    public $showForm = true;

    public $showResult = false;

    public $content;

    public $name;

    public $contact;

    public function render()
    {
        return view('livewire.advice');
    }

    public function rules()
    {
        return [
            'name' => 'nullable|max:40',
            'contact' => 'nullable|max:200',
            'content' => 'required|min:5|max:500',
        ];
    }

    public function save()
    {
        $this->validate();

        $advice = new \App\Models\Advice();
        $advice->name = $this->name;
        $advice->contact = $this->contact;
        $advice->content = $this->content;
        $advice->save();

        $this->showForm = false;
        $this->showResult = true;
    }
}