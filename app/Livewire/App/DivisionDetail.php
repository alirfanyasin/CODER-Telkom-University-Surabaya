<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Division as DivisionModel;

#[Title('Detail Divisi')]
#[Layout('layouts.app')]

class DivisionDetail extends Component
{
    public function render()
    {
        // https://coder-tus.test/app/division/web-development/detail
        $slug = request()->segment(3);
        $division = DivisionModel::where('slug', $slug)->with(['user'])->first();
        return view('livewire.app.division-detail', compact('division', 'slug'));
    }
}
