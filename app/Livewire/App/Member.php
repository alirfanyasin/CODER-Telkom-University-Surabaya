<?php

namespace App\Livewire\App;

use App\Models\Division;
use App\Models\Label;
use App\Models\Points;
use App\Models\Quiz\UserAnswerQuiz;
use App\Models\User;
use App\Models\UserPoints;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Anggota')]
#[Layout('layouts.app')]

class Member extends Component
{
    use LivewireAlert;

    public function makeALeader($id, $divisionId = NULL)
    {
        $user = User::findOrFail($id);
        $user->removeRole('guest');
        $user->removeRole('user');
        $user->removeRole('alumni');
        $user->assignRole('admin');
        if (Auth::user()->label !== 'Super Admin') {
            $user->division_id = Auth::user()->division_id;
            $user->label = Label::LABEL_NAME['admin'] . Auth::user()->division->name;
        } else {
            $user->division_id = $divisionId;
            $divisionName = Division::where('id', $divisionId)->first()->name ?? '';
            $user->label = Label::LABEL_NAME['admin'] . $divisionName;
        }
        $user->identity_code =  'ID-' . strtoupper(Str::random(10));
        $user->save();
    }

    public function makeAlumni($id)
    {
        $user = User::findOrFail($id);
        $user->removeRole('guest');
        $user->removeRole('user');
        $user->removeRole('admin');
        $user->assignRole('alumni');
        $user->division_id = NULL;
        $user->identity_code =  NULL;
        $user->label = Label::LABEL_NAME['alumni'];
        $user->save();
    }


    public function removeAsAMember($id)
    {
        $user = User::findOrFail($id);
        $user->removeRole('user');
        $user->removeRole('admin');
        $user->removeRole('alumni');
        $user->assignRole('guest');
        $user->division_id = NULL;
        $user->identity_code =  NULL;
        $user->label = Label::LABEL_NAME['guest'];
        $user->save();
    }



    public function givePointCommitee($id)
    {
        $point = Points::where('name', 'Kepanitiaan')->first();
        UserPoints::create([
            'user_id' => $id,
            'commitee' => 1,
            'points' => $point->points
        ]);
        $this->alert('success', 'Poin berhasil diberikan', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);
    }

    public function destroy($id)
    {
        UserAnswerQuiz::where('user_id', $id)->delete();
        User::find($id)->delete();
    }

    public function render()
    {
        if (Auth::user()->label !== 'Super Admin') {
            if (Auth::user()->label === 'Alumni' || Auth::user()->label === 'User Coder') {
                $data = User::all();
            } else {
                $data = User::where('division_id', Auth::user()->division_id)->get();
            }
        } else {
            $data = User::all();
        }

        return view('livewire.app.member', [
            'datas' => $data,
            'allDivision' => Division::withCount('user')->get()
        ]);
    }
}
