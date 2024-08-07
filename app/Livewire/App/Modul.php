<?php

namespace App\Livewire\App;

use App\Models\Division;
use App\Models\ELeaning\Modul as ELeaningModul;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Modul')]
#[Layout('layouts.app')]

class Modul extends Component
{

    public function render()
    {
        $allDataByDivision = ELeaningModul::with('division')
            ->where('division_id', Auth::user()->division_id)
            ->orderBy('section', 'ASC')
            ->get();

        $groupedDataBySection = $allDataByDivision->groupBy('section');

        return view('livewire.app.modul', [
            'groupedDataBySection' => $groupedDataBySection,
        ]);
    }
}
