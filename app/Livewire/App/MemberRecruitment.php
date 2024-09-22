<?php

namespace App\Livewire\App;

use App\Models\Label;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Rekrut Anggota')]
#[Layout('layouts.app')]

class MemberRecruitment extends Component
{

    public function makeALeader($id)
    {
        $user = User::findOrFail($id);
        $user->removeRole('guest');
        $user->removeRole('user');
        $user->assignRole('admin');
        $user->division_id = Auth::user()->division_id;
        $user->identity_code =  'ID-' . strtoupper(Str::random(10));
        $user->label = Label::LABEL_NAME['admin'] . Auth::user()->division->name;
        $user->save();
    }


    public function makeAMember($id)
    {
        $user = User::findOrFail($id);
        $user->removeRole('guest');
        $user->assignRole('user');
        $user->division_id = Auth::user()->division_id;
        $user->identity_code =  'ID-' . strtoupper(Str::random(10));
        $user->label = Label::LABEL_NAME['user'] . Auth::user()->division->name;
        $user->save();
    }

    public function render()
    {
        $data = User::where('division_id', NULL)
            ->whereNot('tag', NULL)
            ->whereNot('label', 'Super Admin')
            ->get();
        return view('livewire.app.member-recruitment', [
            'datas' => $data
        ]);
    }
}
