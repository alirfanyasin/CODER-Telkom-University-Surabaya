<?php

namespace App\Livewire\App;

use App\Models\Elearning\Task;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Elearning\TaskSubmission;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Edit Jawaban')]
#[Layout('layouts.app')]

class TaskSubmissionEdit extends Component
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
        $task = Task::where('slug', $slug)->first();

        if ($task) {
            $this->taskId = $task->id;
            $this->slug = $slug;

            $submission = TaskSubmission::where('task_id', $this->taskId)
                ->where('user_id', Auth::id()) // Asumsi hanya submission user saat ini
                ->first();

            if ($submission) {
                $this->submission = $submission->submission;
            }
        }
    }

    public function update()
    {
        $this->validate();

        $submission = TaskSubmission::where('user_id', Auth::user()->id)
            ->where('task_id', $this->taskId)
            ->first();

        if ($submission) {
            $submission->update([
                'submission' => $this->submission,
            ]);

            $this->alert('success', 'Jawaban Berhasil Diupdate', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
        return redirect()->route('app.e-learning.task');
    }
    public function render()
    {
        $task = Task::where('slug', $this->slug)->first();

        return view('livewire.app.task-submission-edit', [
            'task' => $task
        ]);
    }
}
