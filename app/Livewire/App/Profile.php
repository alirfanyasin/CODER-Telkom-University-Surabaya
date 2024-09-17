<?php

namespace App\Livewire\App;

use App\Models\User;
use App\Models\UserPoints;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profil')]
#[Layout('layouts.app')]

class Profile extends Component
{

    public function render()
    {
        $data = User::where('id', Auth::user()->id)->first();
        $dataPoint = UserPoints::where('user_id', Auth::user()->id)->sum('points');

        return view('livewire.app.profile', [
            'point' => $dataPoint,
            'data' => $data
        ]);
    }
}
