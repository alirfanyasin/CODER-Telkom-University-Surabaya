<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tambah Presensi')]
#[Layout('layouts.app')]

class PresenceCreate extends Component
{
    public function render()
    {
        return view('livewire.app.presence-create');
    }
}
