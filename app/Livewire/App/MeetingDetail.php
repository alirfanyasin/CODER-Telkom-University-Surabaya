<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Pertemuan')]
#[Layout('layouts.app')]

class MeetingDetail extends Component
{
    public $selectTypeMeeting = "online";

    public function render()
    {
        return view('livewire.app.meeting-detail');
    }
}
