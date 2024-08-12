<?php

namespace App\Livewire\App;

use App\Models\Presence as ModelsPresence;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Presensi')]
#[Layout('layouts.app')]

class Presence extends Component
{
    public $presences;
    public function mount(){
        $this->callAgain();
    }
    private function callAgain(){
        $this->presences = ModelsPresence::where("division_id", Auth::user()->division_id)->get();
    }
    public function delete($id){
        $presence = ModelsPresence::where("id", $id)->first()->delete();
        if ($presence) {
            $this->callAgain();
        }
    }
    public function render()
    {
        return view('livewire.app.presence',[
            "presences" => $this->presences
        ]);
    }
}
