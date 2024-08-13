<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Lupa Kata Sandi')]
#[Layout('layouts.auth')]


class ForgotPassword extends Component
{
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
