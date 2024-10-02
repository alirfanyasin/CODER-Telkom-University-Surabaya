<?php

namespace App\Livewire\App;

use App\Models\Elearning\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

#[Title('Buat Tugas')]
#[Layout('layouts.app')]

class TaskCreate extends Component
{
    use LivewireAlert, WithFileUploads;

    public $name;
    public $due_date;
    public $section;
    public $description;
    public $file;


    protected $rules = [
        'name' => 'required|min:3|max:255',
        'due_date' => 'required',
        'section' => 'required',
        'description' => 'required|min:10',
        'file' => 'nullable|mimes:pdf|max:5120'
    ];

    public function messages()
    {
        return [
            'name.required' => 'Nama tugas wajib diisi',
            'name.min' => 'Nama tuga terlalu sedikit',
            'name.max' => 'Nama tugas terlalu banyak',
            'due_date.required' => 'Batas waktu pengumpulan wajib diisi',
            'section.required' => 'Pertemuan wajib diisis',
            'description.required' => 'Deskripsi wajiob diisi',
            'description.min' => 'Deskripsi terlalu sedikit',
            'file.mimes' => 'File wajib berupa PDF',
            'file.max' => 'File maksimal 5 MB'
        ];
    }


    public function store()
    {
        $this->validate();

        if ($this->file) {
            $filename = 'task_' . Str::random(5) . '.' .  $this->file->getClientOriginalExtension();
            $this->file->storeAs('file/task', $filename, 'public');
        }

        $data = [
            'name' => $this->name,
            'due_date' => $this->due_date,
            'section' => $this->section,
            'description' => $this->description,
            'file' => $filename ?? null,
            'division_id' => Auth::user()->division_id
        ];

        Task::create($data);

        $this->alert('success', 'Berhasil Tambah Data', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        return redirect()->route('app.e-learning.task');
    }
    public function render()
    {
        return view('livewire.app.task-create');
    }
}
