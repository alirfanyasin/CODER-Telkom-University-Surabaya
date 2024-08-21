<?php

namespace App\Livewire\App;

use App\Livewire\Forms\FormPresenceCreate;
use App\Models\Presence;
use App\Models\User;
use App\Models\UserPresence;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tambah Presensi')]
#[Layout('layouts.app')]

class PresenceCreate extends Component
{
    public FormPresenceCreate $form;
    public $user_presence;

    public function mount(){
        $member = User::where('division_id', Auth::user()->division_id)->whereDoesntHave('roles', function($query) {
            $query->where('name', 'admin');
        })->get();
        $this->form->presence_number = Presence::where("division_id", Auth::user()->division_id)->get()->count()+1;
        $this->user_presence = $this->initUserPresence($member);
    }

    public function render()
    {
        return view('livewire.app.presence-create');
    }

    public function save(){
        $data = $this->validate();
        DB::beginTransaction();
        try {
            $presence = Presence::create([
                "date_time" => Carbon::parse($data["presence_date"])->format('Y-m-d H:i'),
                "section" => "Pertemuan ke ". $data["presence_number"],
                "status" => "active",
                "division_id" => Auth::user()->division_id
            ]);
            foreach ($this->user_presence as $value) {
                UserPresence::create([
                    "user_id" => $value["id"],
                    "presences_id" => $presence->id,
                    "status" => $value["status"]
                ]);
            }
            DB::commit();
            return $this->redirect("/app/presence");
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function status($id, $status){
        foreach ($this->user_presence as $index => $value) {
            if ($value["id"] == $id) {
                $this->user_presence[$index]["status"] = $status;
                break;
            }
        }
    }

    private function initUserPresence($member){
        $member = $member->toArray();
        $presence = [];
        foreach ($member as $value) {
            array_push($presence, ["id"=>$value["id"], "status"=>"alpha"]);
        }
        return $presence;
    }
}
