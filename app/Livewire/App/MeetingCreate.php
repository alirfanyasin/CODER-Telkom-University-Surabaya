<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Buat Pertemuan')]
#[Layout('layouts.app')]

class MeetingCreate extends Component
{
    public $selectTypeMeeting = "online";

    public function render()
    {
        return view('livewire.app.meeting-create');
    }
}
