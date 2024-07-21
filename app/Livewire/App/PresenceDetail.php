<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Presensi')]
#[Layout('layouts.app')]

class PresenceDetail extends Component
{
    public function render()
    {
        return view('livewire.app.presence-detail');
    }
}
