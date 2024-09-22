<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DivisionCard extends Component
{
    public $logo;
    public $name;
    public $description;

    public function mount($logo, $name, $description)
    {
        $this->logo = $logo;
        $this->name = $name;
        $this->description = $description;
    }

    public function render()
    {
        return view('livewire.components.division-card');
    }
}
