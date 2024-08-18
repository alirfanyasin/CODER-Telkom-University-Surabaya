<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Divisi')]
#[Layout('layouts.app')]

class DivisionDetail extends Component
{
    public function render()
    {
        return view('livewire.app.division-detail');
    }
}
