<?php

namespace App\Livewire\App;

use App\Models\Submission;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Pengumpulan Tugas X')]
#[Layout('layouts.app')]

class TaskSubmission extends Component
{
    use LivewireAlert;

    public $submission_link;
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        // Check if the user is an admin
        if (Auth::user()->hasRole('admin')) {
            return $this->renderForAdmin();
        }

        return $this->renderForUser();
    }

    private function renderForAdmin()
    {
        $divisionId = Auth::user()->division->id;
        $task = $this->getTask();

        $users = User::where('division_id', $divisionId)
            ->where('id', '!=', Auth::user()->id)
            ->with(['submissions' => function ($query) use ($task) {
                $query->where('task_id', $task->id);
            }])
            ->get();

        $data = [
            'users' => $users->map(function ($user) {
                $user->submission = $user->submissions->first() ?? null;
                return $user;
            }),
            'count' => [
                'done' => Submission::where('task_id', $task->id)->count(),
                'not_done' => $users->count() - Submission::where('task_id', $task->id)->count(),
            ],
        ];

        return view('livewire.app.task-submission', ['data' => $data]);
    }

    private function renderForUser()
    {
        $task = $this->getTask();
        $submission = Submission::where('task_id', $task->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        return view('livewire.app.task-submission', ['data' => $submission]);
    }

    private function getTask()
    {
        return Task::where('slug', $this->slug)->first();
    }


    public function store()
    {
        $this->validate([
            'submission_link' => 'required',
        ]);

        $task = Task::where('slug', $this->slug)->first();

        Submission::create([
            'task_id' => $task->id,
            'user_id' => Auth::user()->id,
            'submission' => $this->submission_link,
            'grade' => null,
        ]);

        $this->reset();

        $this->alert('success', 'Berhasil Mengumpulkan Tugas', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);

        $this->redirect('/app/e-learning/task');
    }
}
