<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register')]
#[layout('layouts.auth')]

class Register extends Component
{
    public function render()
    {
        return view('livewire.auth.register');
    }
}
