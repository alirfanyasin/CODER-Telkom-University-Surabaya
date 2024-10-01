<?php

namespace App\Livewire\App;

use App\Models\Task as TaskModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

#[Title('Tugas')]
#[Layout('layouts.app')]

class Task extends Component
{
    public function render()
    {
        return view('livewire.app.task');
    }
}
