<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Edit Modul")]
#[Layout("layouts.app")]

class ModulEdit extends Component
{
    public function render()
    {
        return view('livewire.app.modul-edit');
    }
}
