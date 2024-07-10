<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Beranda')]
#[Layout('layouts.guest')]

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home');
    }
}
