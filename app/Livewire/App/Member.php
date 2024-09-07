<?php

namespace App\Livewire\App;

use App\Models\Division;
use App\Models\Label;
use App\Models\Quiz\UserAnswerQuiz;
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
    public function makeALeader($id)
    {
        $user = User::findOrFail($id);
        $user->removeRole('user');
        $user->assignRole('admin');
        $user->division_id = Auth::user()->division_id;
        $user->identity_code =  'ID-' . strtoupper(Str::random(10));
        $user->label = Label::LABEL_NAME['admin'] . Auth::user()->division->name;
        $user->save();
    }


    public function removeAsAMember($id)
    {
        $user = User::findOrFail($id);
        $user->removeRole('user');
        $user->removeRole('admin');
        $user->assignRole('guest');
        $user->division_id = NULL;
        $user->identity_code =  NULL;
        $user->label = Label::LABEL_NAME['guest'];
        $user->save();
    }

    public function destroy($id)
    {
        UserAnswerQuiz::where('user_id', $id)->delete();
        User::find($id)->delete();
    }

    public function render()
    {
        if (Auth::user()->label !== 'Super Admin') {
            $data = User::where('division_id', Auth::user()->division_id)->get();
        } else {
            $data = User::all();
        }
        return view('livewire.app.member', [
            'datas' => $data,
            'allDivision' => Division::withCount('user')->get()
        ]);
    }
}
