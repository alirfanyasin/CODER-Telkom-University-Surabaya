<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Buat Modul')]
#[Layout('layouts.app')]

class ModulCreate extends Component
{
    public function render()
    {
        return view('livewire.app.modul-create');
    }
}
