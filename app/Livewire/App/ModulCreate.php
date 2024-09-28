<?php

namespace App\Livewire\App;

use App\Models\ELeaning\Modul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
    public $type;
    #[Validate('nullable', message: "Link tidak wajib di isi", translate: true)]
    public $link;
    #[Validate('nullable', message: "Jenis File tidak wajib di isi", translate: true)]
    #[Validate('file', message: "Wajib file yang di upload", translate: true)]
    #[Validate('mimes:pptx,pdf,ppt,xlsx,docx,doc,txt', message: "File yang di upload salah", translate: true)]
    #[Validate('max:5120', message: "Maksimum 5 MB", translate: true)]
    public $file;

    public function mount()
    {
        $this->type = 'vscode-icons:file-type-powerpoint';
    }

    public function store()
    {
        $this->validate();

        $fileName = null;

        if ($this->file) {
            $extension = $this->file->getClientOriginalExtension();
            $fileName = 'modul_' . Str::random(5) . '.' . $extension;

            $path = $this->file->storeAs('file/modul', $fileName, 'public');

            if (!Storage::disk('public')->exists('file/modul/' . $fileName)) {
                $this->alert('error', 'Gagal upload file', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => '',
                    'timerProgressBar' => true,
                ]);

                return;
            }
        }


        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'section' => $this->section,
            'type' => $this->type,
            'file' => $fileName,
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

        return redirect()->route('app.e-learning.modul');
    }

    public function render()
    {
        return view('livewire.app.modul-create');
    }
}
