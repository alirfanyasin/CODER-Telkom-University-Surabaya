<?php

namespace App\Livewire\App;

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
    public function mount(){
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
    }
    private function renderData(){
        $this->meetings = ModelsMeeting::where("division_id", Auth::user()->division_id)->get();
    }
    public function render()
    {
        return view('livewire.app.meeting', ["meetings" => $this->meetings]);
    }

    public function delete($id){
        $meeting = ModelsMeeting::where("slug", $id)->first()->delete();
        if ($meeting) {
            $this->renderData();
        }
    }
}
