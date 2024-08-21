<?php

namespace App\Livewire\App;

use App\Livewire\Forms\FormPresenceUpdate;
use App\Models\Presence;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Edit Presensi")]
#[Layout("layouts.app")]

class PresenceEdit extends Component
{
    public $presence;
    public $presence_number;
    public $presence_date;

    public function rules()
    {
        return [
            "presence_number" => ["required"],
            "presence_date" => ["required", "date"],
        ];
    }
    public function mount($id){
        $this->initOldData($id);
    }
    private function initOldData($id){
        $presence = Presence::where('id', $id)->first();
        $parts = explode(' ', $presence->section);
        $number = end($parts);
        $this->presence_date = Carbon::parse($presence->date_time)->format('Y-m-d\TH:i');
        $this->presence_number = $number;
        $this->presence = $presence;
    }
    public function save(){
        $this->validate();
        $this->presence->update([
            "date_time" => Carbon::parse($this->presence_date)->format('Y-m-d H:i'),
            "section" => "Pertemuan ke ". $this->presence_number,
        ]);
        return $this->redirect("/app/presence");
    }
    public function render()
    {
        return view('livewire.app.presence-edit');
    }
}
