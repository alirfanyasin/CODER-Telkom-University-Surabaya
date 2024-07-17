<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pengumpulan Tugas X')]
#[Layout('layouts.app')]

class TaskSubmission extends Component
{
    public function render()
    {
        return view('livewire.app.task-submission');
    }
}
