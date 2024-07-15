<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tugas X')]
#[Layout('layouts.app')]

class TaskCreate extends Component
{
    public function render()
    {
        return view('livewire.app.task-create');
    }
}
