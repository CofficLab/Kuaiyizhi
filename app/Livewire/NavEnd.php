<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavEnd extends Component
{
    public $auth = false;
    public $name = "xxx";
    public $email;

    public function render()
    {
        $user = Auth::user();

        $this->auth = $user != null;
        $this->name = $user ? $user->name : "";
        $this->email = $user ? $user->email : "";

        return view('livewire.nav-end');
    }
}
