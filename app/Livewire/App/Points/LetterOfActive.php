<?php

namespace App\Livewire\App\Points;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Buat Surat Keaktifan')]
#[Layout('layouts.app')]

class LetterOfActive extends Component
{
    public function render()
    {
        return view('livewire.app.points.letter-of-active');
    }
}
