<?php

namespace App\Livewire\App\Points;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Sistem Poin')]
#[Layout('layouts.app')]

class Points extends Component
{
    public function render()
    {
        return view('livewire.app.points.points');
    }
}
