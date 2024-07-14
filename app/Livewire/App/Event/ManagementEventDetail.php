<?php

namespace App\Livewire\App\Event;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Tugas')]
#[Layout('layouts.app')]

class ManagementEventDetail extends Component
{
    public function addTask()
    {
        session(['addTask' => true]);
        // dd('hello');
    }


    public function save()
    {
        session()->forget('addTask');
    }


    public function cancel()
    {
        session()->forget('addTask');
    }


    public function render()
    {
        return view('livewire.app.event.management-event-detail');
    }
}
