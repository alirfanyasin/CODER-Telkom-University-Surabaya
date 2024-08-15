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
    public $task;
    public $task_name;
    public $task_due_date;
    public $task_meeting;
    public $task_description;

    public function render()
    {
        return view('livewire.app.task-detail', ['task' => $this->task]);
    }

    public function mount()
    {
        $this->task = TaskModel::where('slug', request()->slug)->first();

        $this->task_name = $this->task->name;
        $this->task_due_date = $this->task->due_date;
        $this->task_meeting = $this->operateTaskSection($this->task->section);
        $this->task_description = $this->task->description;
    }

    protected function operateTaskSection($section)
    {
        return strtolower(str_replace(' ', '-', $section));
    }
}
