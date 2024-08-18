<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Buat Divisi')]
#[Layout('layouts.app')]

class DivisionCreate extends Component
{
    public function render()
    {
        return view('livewire.app.division-create');
    }
}
