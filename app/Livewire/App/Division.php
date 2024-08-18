<?php

namespace App\Livewire\App;

use App\Models\Division as ModelsDivision;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Divisi')]
#[Layout('layouts.app')]

class Division extends Component
{
    public function render()
    {
        $divisions = ModelsDivision::all();   
        return view('livewire.app.division', [
            'divisions' => $divisions
        ]);
    }
}
