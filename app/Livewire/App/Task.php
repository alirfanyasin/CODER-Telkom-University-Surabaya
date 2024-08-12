<?php

namespace App\Livewire\App;

use App\Models\Task as TaskModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tugas')]
#[Layout('layouts.app')]

class Task extends Component
{
    public function render()
    {
        $tasks = $this->getProcessedTasks();

        $groupedTasks = $this->groupTasksByMeeting($tasks);

        return view('livewire.app.task', compact('groupedTasks'));
    }

    protected function getProcessedTasks()
    {
        return TaskModel::all()->map(function ($task) {
            $slugParts = explode('-', $task->slug);
            $task->title = [
                'meeting' => $slugParts[1],
                'task' => $slugParts[3],
            ];
            return $task;
        });
    }

    protected function groupTasksByMeeting($tasks)
    {
        return $tasks->groupBy('title.meeting')->map(function ($group) {
            return $group->unique('title.task');
        });
    }
}
