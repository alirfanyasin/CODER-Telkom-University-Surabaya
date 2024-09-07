<?php

namespace App\Livewire\App\Points;

use App\Models\Points as ModelsPoints;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Sistem Poin')]
#[Layout('layouts.app')]

class Points extends Component
{
    public function render()
    {
        $data = ModelsPoints::all();
        return view('livewire.app.points.points', [
            'datas' => $data
        ]);
    }
}
