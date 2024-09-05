<?php

namespace App\Livewire\App;

use App\Models\Division;
use App\Models\Meeting as ModelsMeeting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pertemuan')]
#[Layout('layouts.app')]

class Meeting extends Component
{
    public $meetings;
    public $divisionId = 1;


    public function mount()
    {
        // $this->renderData();
        // $timezone = "Asia/Jakarta";
        // foreach ($this->meetings as $meet) {
        //     if (Carbon::now($timezone)->greaterThan(Carbon::parse($meet->date_time, $timezone)) && $meet->status == "aktif") {
        //         $meet->update([
        //             "status" => "berlangsung"
        //         ]);
        //     }
        //     if ($meet->end_time) {
        //         if (Carbon::now($timezone)->greaterThan(Carbon::parse($meet->end_time, $timezone)) && $meet->status == "berlangsung") {
        //             $meet->update([
        //                 "status" => "selesai"
        //             ]);
        //         }
        //     }
        // }
    }

    public function selectDivision($id)
    {
        $this->divisionId = $id;
        session()->put('active-meeting', $this->divisionId);
    }


    private function renderData()
    {
        if (Auth::user()->label !== 'Super Admin') {
            $this->meetings = ModelsMeeting::where("division_id", Auth::user()->division_id)->get();
        } else {
            $this->meetings = ModelsMeeting::where("division_id", session('active-meeting') ?? $this->divisionId)->get();
        }
    }


    public function render()
    {
        $this->renderData();
        $timezone = "Asia/Jakarta";
        foreach ($this->meetings as $meet) {
            if (Carbon::now($timezone)->greaterThan(Carbon::parse($meet->date_time, $timezone)) && $meet->status == "aktif") {
                $meet->update([
                    "status" => "berlangsung"
                ]);
            }
            if ($meet->end_time) {
                if (Carbon::now($timezone)->greaterThan(Carbon::parse($meet->end_time, $timezone)) && $meet->status == "berlangsung") {
                    $meet->update([
                        "status" => "selesai"
                    ]);
                }
            }
        }

        return view('livewire.app.meeting', [
            "meetings" => $this->meetings,
            "allDivision" => Division::all()
        ]);
    }


    public function delete($id)
    {
        $meeting = ModelsMeeting::where("slug", $id)->first()->delete();
        if ($meeting) {
            $this->renderData();
        }
    }
}
