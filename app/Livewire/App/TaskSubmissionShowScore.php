<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Lihat Nilai')]
#[Layout('layouts.app')]

class TaskSubmissionShowScore extends Component
{
    public function render()
    {
        return view('livewire.app.task-submission-show-score');
    }
}
