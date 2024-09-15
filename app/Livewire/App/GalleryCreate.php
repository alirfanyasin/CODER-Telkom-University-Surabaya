<?php

namespace App\Livewire\App;

use App\Models\Gallery;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

#[Title('Tambah Galeri')]
#[Layout('layouts.app')]

class GalleryCreate extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $image;
    public $caption;

    public function rules(){
        return [
            'caption' => 'required',
            'image' => 'Image|required|max:3072',
        ];
    }
    public function render()
    {
        return view('livewire.app.gallery-create');
    }
    public function save() {
        $this->validate();
        try {
            $filename = $this->generateFileName(). '.' . $this->image->extension();
            Gallery::create([
                "img" => $filename,
                "caption" => $this->caption
            ]);
            $this->image->storeAs('gallery', $filename, 'public');
            return redirect()->to("/app/content/gallery");
        } catch (\Throwable $th) {
            $this->alert('error', "Gallery gagal ditambahkan", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => false,
            ]);
        }

    }
    private function generateFileName()
    {
        while (true) {
            $filename = Str::lower(Str::random(16));
            $slug_count = DB::table("galleries")->where('img', $filename)->count();
            if ($slug_count == 0) {
                break;
            }
        }
        return $filename;
    }
}
