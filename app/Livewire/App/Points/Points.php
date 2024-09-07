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
    public $points;
    public $times;
    public $selectedPointId;

    public function mount()
    {
        $this->points = null;
        $this->times = null;
        $this->selectedPointId = null;
    }

    public function openModal($id)
    {
        $data = ModelsPoints::find($id);
        $this->points = $data->points;
        $this->times = $data->times;

        $this->selectedPointId = $id;
    }

    public function update()
    {
        if ($this->selectedPointId) {
            ModelsPoints::find($this->selectedPointId)->update(['points' => $this->points, 'times' => $this->times]);
        }
    }

    public function render()
    {
        $data = ModelsPoints::all();
        return view('livewire.app.points.points', [
            'datas' => $data
        ]);
    }
}
