<?php

namespace App\Livewire\App;

use App\Models\ELeaning\Modul;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Tambah Modul')]
#[Layout('layouts.app')]

class ModulCreate extends Component
{

    use WithFileUploads, LivewireAlert;

    #[Validate('required', message: "Nama Modul wajib di isi", translate: true)]
    public $name;
    #[Validate('required', message: "Pertemuan wajib di isi", translate: true)]
    public $section;
    #[Validate('required', message: "Deskripsi wajib di isi", translate: true)]
    public $description;
    #[Validate('required', message: "Jenis File wajib di isi", translate: true)]
    public $type = "vscode-icons:file-type-powerpoint";
    #[Validate('nullable', message: "Link tidak wajib di isi", translate: true)]
    public $link;
    #[Validate('nullable', message: "Jenis File tidak wajib di isi", translate: true)]
    #[Validate('file', message: "Wajib file yang di upload", translate: true)]
    #[Validate('mimes:pdf,pptx,ppt,xlsx,docx,doc,txt', message: "File yang di upload salah", translate: true)]
    #[Validate('max:5120', message: "Maksimum 5 MB", translate: true)]
    public $file;

    public function store()
    {
        $this->validate();
        if ($this->file) {
            $fileName = 'modul_' . Str::random(5) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('file/modul', $fileName, 'public');
        }

        $data = [
            'name' => $this->name,
            'slug' => Str::of($this->name)->slug('-'),
            'description' => $this->description,
            'section' => $this->section,
            'type' => $this->type,
            'file' => ($this->file ? $fileName : null),
            'link' => $this->link,
            'division_id' => Auth::user()->division_id,
        ];

        Modul::create($data);
        $this->alert('success', 'Berhasil Tambah Data', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);
        $this->redirect('/app/e-learning/modul');
    }

    public function render()
    {
        return view('livewire.app.modul-create');
    }
}
