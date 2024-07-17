<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Perbarui Tugas X')]
#[Layout('layouts.app')]

class TaskEdit extends Component
{
    public function render()
    {
        return view('livewire.app.task-edit');
    }
}
