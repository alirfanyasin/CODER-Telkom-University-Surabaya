<?php

namespace App\Livewire\App;

use App\Models\Label;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Anggota')]
#[Layout('layouts.app')]

class Member extends Component
{

    public function removeAsAMember($id)
    {
        $user = User::findOrFail($id);
        $user->removeRole('user');
        $user->assignRole('guest');
        $user->division_id = NULL;
        $user->identity_code =  NULL;
        $user->label = Label::LABEL_NAME['guest'];
        $user->save();
    }

    public function render()
    {
        $data = User::where('division_id', Auth::user()->division_id)->get();
        return view('livewire.app.member', [
            'datas' => $data
        ]);
    }
}
