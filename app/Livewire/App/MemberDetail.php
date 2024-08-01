<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Anggota')]
#[Layout('layouts.app')]

class MemberDetail extends Component
{
    public function render()
    {
        return view('livewire.app.member-detail');
    }
}
