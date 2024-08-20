<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Gallery')]
#[Layout('layouts.app')]

class Gallery extends Component
{
    public function render()
    {
        return view('livewire.app.gallery');
    }
}
