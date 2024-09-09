<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use App\Models\Gallery as ModelsGallery;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Galeri')]
#[Layout('layouts.guest')]

class Gallery extends Component
{
    public $galleries;
    public function mount(){
        $this->galleries = ModelsGallery::all();
    }
    public function render()
    {
        return view('livewire.pages.gallery', ["galleries" => $this->galleries]);
    }
}
