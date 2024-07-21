<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Presensi')]
#[Layout('layouts.app')]

class Presence extends Component
{
    public function render()
    {
        return view('livewire.app.presence');
    }
}
