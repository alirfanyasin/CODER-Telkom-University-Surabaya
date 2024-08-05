<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Profil')]
#[Layout('layouts.app')]

class ProfileEdit extends Component
{
    public function render()
    {
        return view('livewire.app.profile-edit');
    }
}
