<?php

namespace App\Livewire\App;

use App\Models\Elearning\Task as ElearningTask;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

#[Title('Tugas')]
#[Layout('layouts.app')]

class Task extends Component
{
    use LivewireAlert;

    public $itemToDelete;

    protected $listeners = [
        'confirmedDeletion',
    ];

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
        $data = ElearningTask::find($this->itemToDelete);
        if ($data) {
            Storage::disk('public')->delete('file/task/' . $data->file);
            $data->delete();
            $this->alert('success', 'Berhasil Menghapus Data', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Gagal Menghapus Data', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
        $this->itemToDelete = null;
        return redirect()->back();
    }

    public function isExpired()
    {
        $this->alert('error', 'Tugas Sudah Ditutup', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function groupedDataBySection()
    {
        $allDataByDivision = ElearningTask::with('division')
            ->where('division_id', Auth::user()->division_id)
            ->orderBy('section', 'ASC')
            ->get();

        return $allDataByDivision->groupBy('section');
    }

    public function render()
    {
        return view('livewire.app.task', [
            'groupedDataBySection' => $this->groupedDataBySection(),
        ]);
    }
}
