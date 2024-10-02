<?php

namespace App\Livewire\App;

use App\Models\Elearning\Task;
use App\Models\Elearning\TaskSubmission as ElearningTaskSubmission;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pengumpulan Tugas')]
#[Layout('layouts.app')]

class TaskSubmission extends Component
{
    use LivewireAlert;

    public $slug;
    public $taskId;
    public $submission;

    protected $rules = [
        'submission' => 'required'
    ];

    public function messages()
    {
        return [
            'submission.required' => 'Link wajib diisi'
        ];
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store()
    {
        $this->validate();

        $data = [
            'submission' => $this->submission,
            'user_id' => Auth::user()->id,
            'task_id' => $this->taskId
        ];

        ElearningTaskSubmission::create($data);

        $this->alert('success', 'Tugas Berhasil Dikumpulkan', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        return redirect()->route('app.e-learning.task');
    }

    public function render()
    {

        $task = Task::where('slug', $this->slug)->first();
        $this->taskId = $task->id;

        return view('livewire.app.task-submission', [
            'task' => $task
        ]);
    }
}
