<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Divisi')]
#[Layout('layouts.app')]

class DivisionEdit extends Component
{
    public function render()
    {
        return view('livewire.app.division-edit');
    }
}
