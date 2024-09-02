<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Buat Laporan')]
#[Layout('layouts.app')]

class ReportCreate extends Component
{
    public function render()
    {
        return view('livewire.app.report-create');
    }
}
