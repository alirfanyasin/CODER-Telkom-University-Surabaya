<?php

namespace App\Livewire\App;

use App\Models\ELeaning\Modul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

#[Title("Edit Modul")]
#[Layout("layouts.app")]

class ModulEdit extends Component
{
    use WithFileUploads, LivewireAlert;

    public $id;

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
    #[Validate('max:5120', message: "Maksimum 5 MB", translate: true)]
    public $file;

    public function mount($id)
    {
        $this->id = $id;

        $data = Modul::findOrFail($id);
        $this->name = $data->name;
        $this->section = $data->section;
        $this->description = $data->description;
        if ($data->type === "vscode-icons:file-type-powerpoint") {
            $this->type === "vscode-icons:file-type-powerpoint";
        } else {
            $this->type = $data->type;
        }
        $this->file = $data->file;
        $this->link = $data->link;
    }

    public function update()
    {
        $this->validate();

        $modul = Modul::findOrFail($this->id);

        if ($this->type != 'bi:github' && $this->type != 'logos:blogger') {
            $this->handleFileUpload($modul);
        }

        $modul->update([
            'name' => $this->name,
            'slug' => Str::of($this->name)->slug('-'),
            'description' => $this->description,
            'section' => $this->section,
            'type' => $this->type,
            'link' => $this->type == 'bi:github' || $this->type == 'logos:blogger' ? $this->link : null,
            // 'file' => $this->type != 'bi:github' && $this->type != 'logos:blogger' ? $modul->file : null,
            'file' => ($this->type != 'bi:github' && $this->type != 'logos:blogger' && $this->file)
                ? $modul->file
                : null,
        ]);

        $this->alert('success', 'Data berhasil diperbarui', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);

        $this->redirect('/app/e-learning/modul');
    }

    private function handleFileUpload($modul)
    {
        if ($this->file instanceof \Illuminate\Http\UploadedFile) {
            if ($modul->file) {
                Storage::disk('public')->delete('file/modul/' . $modul->file);
            }
            $fileName = 'modul_' . Str::random(5) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('file/modul', $fileName, 'public');
            $modul->file = $fileName;
        }
    }

    public function render()
    {

        return view('livewire.app.modul-edit');
    }
}
