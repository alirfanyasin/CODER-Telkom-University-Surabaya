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
use Illuminate\Support\Facades\Storage;

#[Title('Edit Galeri')]
#[Layout('layouts.app')]

class GalleryEdit extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public Gallery $gallery;
    public $image;
    public $oldImage;
    public $caption;

    public function rules(){
        return [
            'caption' => 'required',
            'image' => 'Image|nullable|max:3072',
        ];
    }
    public function mount($id){
        $this->gallery = Gallery::where("id", $id)->first();
        $this->oldImage = $this->gallery->img;
        $this->caption = $this->gallery->caption;
    }
    public function render()
    {
        return view('livewire.app.gallery-edit');
    }
    public function save() {
        $this->validate();
        $data = [
            "caption" => $this->caption,
        ];
        try {
            if ($this->image) {
                $filename = $this->generateFileName(). '.' . $this->image->extension();
                $data['img'] = $filename;
                if (Storage::disk("public")->exists('gallery/'.$this->gallery->img)) {
                    Storage::disk('public')->delete('gallery/' . $this->gallery->img);
                }
                $this->image->storeAs('gallery', $filename, 'public');
            }
            $this->gallery->update($data);
            return redirect()->to("/app/content/gallery");
        } catch (\Throwable $th) {
            $this->alert('error', "gallery gagal diubah", [
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
