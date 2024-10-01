<?php

namespace App\Livewire\App;

use App\Models\Task as TaskModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Perbarui Tugas X')]
#[Layout('layouts.app')]

class TaskEdit extends Component
{


    public function render()
    {
        return view('livewire.app.task-edit', ['task' => $this->task]);
    }
}
