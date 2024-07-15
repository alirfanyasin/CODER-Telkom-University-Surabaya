<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tugas')]
#[Layout('layouts.app')]

class Task extends Component
{
    public function render()
    {
        return view('livewire.app.task');
    }
}
