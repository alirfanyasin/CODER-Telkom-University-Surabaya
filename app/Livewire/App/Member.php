<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Anggota')]
#[Layout('layouts.app')]

class Member extends Component
{
    public function render()
    {
        return view('livewire.app.member');
    }
}
