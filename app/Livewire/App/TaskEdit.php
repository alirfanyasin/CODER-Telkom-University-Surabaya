<?php

namespace App\Livewire\App;

use App\Models\Task as TaskModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Perbarui Tugas X')]
#[Layout('layouts.app')]

class TaskEdit extends Component
{
    use WithFileUploads;

    public $task;
    public $task_name;
    public $task_due_date;
    public $task_meeting;
    public $task_description;
    public $task_file;

    public function render()
    {
        return view('livewire.app.task-edit', ['task' => $this->task]);
    }

    public function mount()
    {
        $this->task = TaskModel::where('slug', request()->slug)->firstOrFail();

        $this->task_name = $this->task->name;
        $this->task_due_date = $this->task->due_date;
        $this->task_meeting = $this->operateTaskSection($this->task->section);
        $this->task_description = $this->task->description;
    }

    public function update()
    {
        $this->validate([
            'task_name' => 'required',
            'task_due_date' => 'required',
            'task_meeting' => 'required',
            'task_description' => 'required',
            'task_file' => 'nullable|mimes:pdf|max:5120',
        ]);

        $this->task_meeting = $this->operateTaskMeeting();

        if ($this->task_file) {
            if ($this->task->file_name) {
                unlink(storage_path('app/public/' . $this->task->file_name));
            }
            $filePath = $this->task_file->store('uploads/tasks', 'public');
            $this->task->update([
                'file_name' => $filePath,
            ]);
        }

        $this->task->update([
            'slug' => $this->changeSlug(),
            'name' => $this->task_name,
            'due_date' => $this->task_due_date,
            'section' => $this->task_meeting,
            'description' => $this->task_description,
        ]);

        session()->flash('message', 'Tugas berhasil diperbarui.');

        return redirect()->route('app.e-learning.task');
    }

    protected function changeSlug()
    {
        $tasks = TaskModel::where('section', $this->task_meeting)->get();
        $taskCount = $tasks->count() + 1;
        $taskMeeting = preg_replace('/[^0-9]/', '', $this->task_meeting);

        return strtolower("pertemuan-{$taskMeeting}-tugas-{$taskCount}");
    }

    protected function operateTaskSection($section)
    {
        return strtolower(str_replace(' ', '-', $section));
    }

    protected function operateTaskMeeting()
    {
        return ucwords(str_replace('-', ' ', $this->task_meeting));
    }
}
