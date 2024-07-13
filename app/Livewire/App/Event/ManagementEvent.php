<?php

namespace App\Livewire\App\Event;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Management Event')]
#[Layout('layouts.app')]

class ManagementEvent extends Component
{
    public function render()
    {
        return view('livewire.app.event.management-event');
    }
}
