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
    use LivewireAlert;

    public $itemToDelete;

    protected $listeners = [
        'confirmedDeletion',
    ];

    public function render()
    {
        $tasks = $this->getProcessedTasks();

        $groupedTasks = $this->groupTasksByMeeting($tasks);

        return view('livewire.app.task', compact('groupedTasks'));
    }

    public function destroy($id)
    {
        $this->itemToDelete = $id;

        $this->alert('warning', 'Yakin ingin menghapus data?', [
            'position' => 'top-end',
            'timer' => null,
            'toast' => true,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmedDeletion',
            'showDenyButton' => true,
            'onDenied' => '',
            'denyButtonText' => 'Tidak',
            'width' => '400',
            'confirmButtonText' => 'Iya',
        ]);
    }

    public function confirmedDeletion()
    {
        $task = TaskModel::find($this->itemToDelete);

        if ($task) {
            if ($task->file_name) {
                unlink(storage_path('app/public/' . $task->file_name));
            }
            $task->delete();
            $this->updateTasksList($task);
            $this->alert('success', 'Tugas berhasil dihapus', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'showCancelButton' => false,
            ]);
        } else {
            $this->alert('error', 'Gagal menghapus tugas', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'showCancelButton' => false,
            ]);
        }
    }

    protected function updateTasksList($task)
    {
        $slugParts = explode('-', $task->slug);
        $meeting = $slugParts[1];
        $taskNumber = $slugParts[3];

        $tasks = TaskModel::where('slug', 'like', "%pertemuan-$meeting-tugas-%")->get();

        foreach ($tasks as $task) {
            $slugParts = explode('-', $task->slug);
            $currentTaskNumber = $slugParts[3];

            if ($currentTaskNumber > $taskNumber) {
                $slugParts[3] = $currentTaskNumber - 1;
                $task->slug = implode('-', $slugParts);
                $task->save();
            }
        }
    }

    protected function getProcessedTasks()
    {
        // sort by section
        $userDivision = Auth::user()->division_id;

        return TaskModel::where('division_id', $userDivision)->orderBy('section', 'ASC')->orderBy('slug', 'ASC')->get()->map(function ($task) {
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
