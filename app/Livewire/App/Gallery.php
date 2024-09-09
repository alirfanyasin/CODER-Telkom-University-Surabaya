<?php

namespace App\Livewire\App;

use App\Models\Gallery as ModelsGallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Gallery')]
#[Layout('layouts.app')]

class Gallery extends Component
{
    public $galleries;
    public $selectedId;
    public function mount(){
        $this->galleries = ModelsGallery::all();
    }
    public function render()
    {
        return view('livewire.app.gallery', ["galleries" => $this->galleries]);
    }
    public function delete(){
        $picture = ModelsGallery::where("id", $this->selectedId)->first();
        try {
            if (Storage::disk("public")->exists('gallery/'.$picture->img)) {
                Storage::disk('public')->delete('gallery/' . $picture->img);
            }
            $picture->delete();
            return redirect()->to("/app/content/gallery");
        } catch (\Throwable $th) {
            $this->alert('error', "gallery gagal diHapus", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => false,
            ]);
        }
    }
}
