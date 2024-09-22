<?php

namespace App\Livewire\App;

use App\Models\User;
use App\Models\UserPoints;
use App\Models\UserPresence;
use Illuminate\Support\Facades\Auth;
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
        $dataPoint = UserPoints::where('user_id', $this->userId)->sum('points');

        $totalMeetings = UserPresence::where('user_id', $this->userId)->count();
        $dataPresence = UserPresence::where('user_id', $this->userId)
            ->where('status', 'hadir')
            ->count();
        $presencePercentage = $totalMeetings > 0 ? ($dataPresence / $totalMeetings) * 100 : 0;
        $presencePercentage = floor(number_format($presencePercentage, 2));

        return view('livewire.app.member-detail', [
            'data' => $dataUser,
            'point' => $dataPoint,
            'presence' => $presencePercentage
        ]);
    }
}
