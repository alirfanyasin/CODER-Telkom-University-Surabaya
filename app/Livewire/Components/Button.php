<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Button extends Component
{
    public $title;
    public $route;

    public function mount($title, $route)
    {
        $this->title = $title;
        $this->route = $route;
    }

    public function render()
    {
        return view('livewire.components.button');
    }
}
