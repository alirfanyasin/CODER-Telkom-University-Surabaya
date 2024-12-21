<?php

namespace App\Livewire\App;

use App\Models\Division;
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
    public $divisionId = 1;
    public function mount()
    {
        $this->getPresence($this->divisionId);
    }

    private function getPresence($divisionId)
    {
        if (Auth::user()->label !== 'Super Admin') {
            $this->presences = ModelsPresence::with('division')->where('division_id', Auth::user()->division_id)
                ->orderBy('section', 'ASC')
                ->get();
        } else {
            $this->presences = ModelsPresence::with('division')->where('division_id', session('active-presence') ?? $divisionId)
                ->orderBy('section', 'ASC')
                ->get();
        }
    }

    public function delete($id)
    {
        $presence = ModelsPresence::where("id", $id)->first()->delete();
        if ($presence) {
            $this->callAgain();
        }
    }

    public function selectDivision($id)
    {
        $this->divisionId = $id;
        session()->put('active-presence', $this->divisionId);
        $this->getPresence($this->divisionId);
    }

    public function render()
    {

        return view('livewire.app.presence', [
            "presences" => $this->presences,
            'allDivision' => Division::all()

        ]);
    }
}
