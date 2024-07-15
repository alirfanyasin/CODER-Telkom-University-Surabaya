<?php

namespace App\Livewire\App\Event;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Rekrutmen Panitia')]
#[Layout('layouts.app')]


class Reqrutment extends Component
{
    public function render()
    {
        return view('livewire.app.event.reqrutment');
    }
}
