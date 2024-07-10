<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pertemuan')]
#[Layout('layouts.app')]

class Meeting extends Component
{
    public function render()
    {
        return view('livewire.app.meeting');
    }
}
