<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Laporan')]
#[Layout('layouts.app')]

class Report extends Component
{
    public function render()
    {
        return view('livewire.app.report');
    }
}
