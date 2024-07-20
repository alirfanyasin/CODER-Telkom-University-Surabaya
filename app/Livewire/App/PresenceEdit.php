<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Edit Presensi")]
#[Layout("layouts.app")]

class PresenceEdit extends Component
{
    public function render()
    {
        return view('livewire.app.presence-edit');
    }
}
