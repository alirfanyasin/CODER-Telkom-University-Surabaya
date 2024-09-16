<?php

namespace App\Livewire\App;

use App\Livewire\Forms\FormPresenceUpdate;
use App\Models\Points;
use App\Models\Presence;
use App\Models\UserPoints;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Presensi')]
#[Layout('layouts.app')]

class PresenceDetail extends Component
{
    public FormPresenceUpdate $form;
    public $user_presence;
    public function mount($id)
    {
        $presence = Presence::where('id', $id)->with("userPresences", "userPresences.user")->first();
        $this->form->setData($presence);
        $this->user_presence = $this->form->user_presence;
    }
    public function render()
    {
        return view('livewire.app.presence-detail', [
            "members" => $this->user_presence
        ]);
    }
    public function status($id, $status)
    {
        foreach ($this->user_presence as $index => $value) {
            if ($value["id"] == $id) {
                $this->user_presence[$index]["status"] = $status;
                break;
            }
        }
    }

    public function save()
    {
        $this->form->user_presence = $this->user_presence;
        // $this->validate();
        $point = Points::where('name', 'Pertemuan')->first();
        DB::beginTransaction();
        try {
            $this->form->presence->update([
                "status" => "inActive"
            ]);
            foreach ($this->form->presence->userPresences as $index => $value) {
                $value->update([
                    "status" => $this->form->user_presence[$index]["status"]
                ]);
                if ($this->form->user_presence[$index]["status"] == "hadir") {
                    UserPoints::create([
                        'user_id' => $value->user_id,
                        'user_presence_id' => $value->id,
                        'points' => $point->points
                    ]);
                }
            }
            DB::commit();
            return $this->redirect("/app/presence");
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
        }
    }
}
