<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DeveloperTeamCard extends Component
{
    public $name;
    public $image;
    public $role;
    public $whatsapp;
    public $github;
    public $linkedin;

    public function mount($name, $image, $role, $whatsapp = '', $github = '', $linkedin = '')
    {
        $this->name = $name;
        $this->image = $image;
        $this->role = $role;
        $this->whatsapp = $whatsapp;
        $this->github = $github;
        $this->linkedin = $linkedin;
    }

    public function render()
    {
        return view('livewire.components.developer-team-card');
    }
}
