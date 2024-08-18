<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Divisi')]
#[Layout('layouts.app')]

class Division extends Component
{
    public function render()
    {
        return view('livewire.app.division');
    }
}
