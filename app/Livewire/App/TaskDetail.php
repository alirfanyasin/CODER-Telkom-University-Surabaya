<?php

namespace App\Livewire\App;

use App\Models\Task as TaskModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Tugas X')]
#[Layout('layouts.app')]

class TaskDetail extends Component
{

    public function render()
    {
        return view('livewire.app.task-detail');
    }
}
