<?php

namespace App\Livewire\App;

use App\Models\Elearning\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Perbarui Tugas X')]
#[Layout('layouts.app')]

class TaskEdit extends Component
{
    use LivewireAlert, WithFileUploads;

    public $slug;
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
        'file' => 'nullable|max:5120'
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
            'file.max' => 'File maksimal 5 MB'
        ];
    }


    public function mount($slug)
    {
        $data = Task::where('slug', $slug)->first();
        $this->slug = $slug;
        $this->name = $data->name;
        $this->due_date = $data->due_date;
        $this->section = $data->section;
        $this->description = $data->description;
        $this->file = $data->file;
    }


    public function update()
    {
        $this->validate();

        $task = Task::where('slug', $this->slug)->first();

        if ($this->file && $this->file instanceof \Illuminate\Http\UploadedFile) {
            if ($task->file) {
                Storage::disk('public')->delete('file/task/' . $task->file);
            }
            $filename = 'task_' . Str::random(5) . '.' .  $this->file->getClientOriginalExtension();
            $this->file->storeAs('file/task', $filename, 'public');
        } else {
            $filename =  $task->file;
        }

        $task->update([
            'name' => $this->name,
            'due_date' => $this->due_date,
            'section' => $this->section,
            'description' => $this->description,
            'file' => $filename,
        ]);


        $this->alert('success', 'Data berhasil diperbarui', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        return redirect()->route('app.e-learning.task');
    }


    public function render()
    {
        return view('livewire.app.task-edit');
    }
}
