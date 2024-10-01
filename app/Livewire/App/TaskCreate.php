<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Task as TaskModel;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Buat Tugas')]
#[Layout('layouts.app')]

class TaskCreate extends Component
{

    public function render()
    {
        return view('livewire.app.task-create');
    }
}
