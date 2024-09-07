<?php

namespace App\Livewire\App;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Anggota')]
#[Layout('layouts.app')]

class MemberDetail extends Component
{
    public $userId;

    public function mount($id, $name)
    {
        $this->userId = $id;
    }

    public function render()
    {
        $dataUser = User::findOrFail($this->userId);

        return view('livewire.app.member-detail', [
            'data' => $dataUser
        ]);
    }
}
