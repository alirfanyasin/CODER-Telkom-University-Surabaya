<?php

namespace App\Livewire\App;

use App\Models\Elearning\Task;
use App\Models\Elearning\TaskSubmission;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Lihat Jawaban')]
#[Layout('layouts.app')]

class TaskSubmissionShowAnswer extends Component
{
    public $taskId;

    public function mount($slug)
    {
        $dataTask = Task::where('slug', $slug)->first();
        $this->taskId = $dataTask->id;
    }
    public function render()
    {
        $data = TaskSubmission::where('task_id', $this->taskId)->get();

        return view('livewire.app.task-submission-show-answer', [
            'datas' => $data
        ]);
    }
}
