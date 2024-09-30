<?php

namespace App\Livewire\App;

use App\Charts\MonthlyActivityChart;
use App\Charts\PresenceChart;
use App\Models\Meeting;
use App\Models\Quiz\Quiz;
use App\Models\UserActive;
use App\Models\UserPoints;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
#[Layout('layouts.app')]

class Dashboard extends Component
{
    public function render(MonthlyActivityChart $activityCart, PresenceChart $presenceChart)
    {
        $dataPoint = UserPoints::where('user_id', Auth::user()->id)->sum('points');
        $userActive = UserActive::whereNot('user_id', Auth::id())
            ->orderByRaw("FIELD(status, 'active') DESC")
            ->orderBy('updated_at', 'DESC')
            ->get();

        $meeting = Meeting::where('division_id', Auth::user()->division_id)->count();
        $totalMeeting = str_pad($meeting, 2, '0', STR_PAD_LEFT);

        $quiz = Quiz::where('division_id', Auth::user()->division_id)->count();
        $totalQuiz = str_pad($quiz, 2, '0', STR_PAD_LEFT);

        $meetingData = Meeting::where('division_id', Auth::user()->division_id)->get();

        return view('livewire.app.dashboard', [
            'activityCart' => $activityCart->build(),
            'presenceChart' => $presenceChart->build(),
            'point' => $dataPoint,
            'userActive' => $userActive,
            'totalMeeting' => $totalMeeting,
            'totalQuiz' => $totalQuiz,
            'meetingData' => $meetingData

        ]);
    }
}
