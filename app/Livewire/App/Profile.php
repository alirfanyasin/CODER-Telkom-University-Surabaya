<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profil')]
#[Layout('layouts.app')]

class Profile extends Component
{
    public function render()
    {
        return view('livewire.app.profile');
    }
}
