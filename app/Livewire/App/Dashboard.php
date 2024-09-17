<?php

namespace App\Livewire\App;

use App\Charts\MonthlyActivityChart;
use App\Charts\PresenceChart;
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
        return view('livewire.app.dashboard', [
            'activityCart' => $activityCart->build(),
            'presenceChart' => $presenceChart->build(),
            'point' => $dataPoint
        ]);
    }
}
