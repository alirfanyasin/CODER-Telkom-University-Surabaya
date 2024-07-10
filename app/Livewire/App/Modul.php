<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Modul')]
#[Layout('layouts.app')]

class Modul extends Component
{
    public function render()
    {
        return view('livewire.app.modul');
    }
}
