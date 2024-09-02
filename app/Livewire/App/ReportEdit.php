<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Laporan')]
#[Layout('layouts.app')]

class ReportEdit extends Component
{
    public function render()
    {
        return view('livewire.app.report-edit');
    }
}
