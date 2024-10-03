<?php

namespace App\Livewire\App;

use App\Charts\MonthlyActivityChart;
use App\Models\Elearning\Task;
use App\Models\Elearning\TaskSubmission;
use App\Models\Meeting;
use App\Models\Quiz\Quiz;
use App\Models\UserActive;
use App\Models\UserPoints;
use App\Models\UserPresence;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
#[Layout('layouts.app')]

class Dashboard extends Component
{
    public function render(MonthlyActivityChart $activityCart)
    {
        // General
        $userActive = UserActive::whereNot('user_id', Auth::id())
            ->orderByRaw("FIELD(status, 'active') DESC")
            ->orderBy('updated_at', 'DESC')
            ->get();

        // Admin
        $meeting = Meeting::where('division_id', Auth::user()->division_id)->count();
        $totalMeeting = str_pad($meeting, 2, '0', STR_PAD_LEFT);

        $task = Task::where('division_id', Auth::user()->division_id)->count();
        $totalTask = str_pad($task, 2, '0', STR_PAD_LEFT);

        $quiz = Quiz::where('division_id', Auth::user()->division_id)->count();
        $totalQuiz = str_pad($quiz, 2, '0', STR_PAD_LEFT);

        $meetingData = Meeting::orderBy('date_time', 'ASC')->where('division_id', Auth::user()->division_id)->where('status', 'aktif')->get();
        $taskData = Task::orderBy('due_date', 'ASC')->where('division_id', Auth::user()->division_id)->get();


        // User
        $dataPoint = UserPoints::where('user_id', Auth::user()->id)->sum('points');
        $totalPointUser = str_pad($dataPoint, 2, '0', STR_PAD_LEFT);

        $checkSubmission = TaskSubmission::where('user_id', Auth::id())->pluck('task_id')->toArray();

        $presenceUser = UserPresence::where('user_id', Auth::user()->id)->where('status', 'hadir')->count();
        $totalPresenceUser = str_pad($presenceUser, 2, '0', STR_PAD_LEFT);

        $taskUser = TaskSubmission::where('user_id', Auth::user()->id)->count();
        $totaltaskUser = str_pad($taskUser, 2, '0', STR_PAD_LEFT);


        return view('livewire.app.dashboard', [
            'activityCart' => $activityCart->build(),
            'point' => $totalPointUser,
            'userActive' => $userActive,
            'totalMeeting' => $totalMeeting,
            'totalTask' => $totalTask,
            'totalQuiz' => $totalQuiz,
            'meetingData' => $meetingData,
            'taskData' => $taskData,
            'checkSubmission' => $checkSubmission,
            'totalPresenceUser' => $totalPresenceUser,
            'totaltaskUser' => $totaltaskUser
        ]);
    }
}
