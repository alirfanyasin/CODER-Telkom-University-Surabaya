<?php

namespace App\Livewire\Forms;

use App\Models\Presence;
use Carbon\Carbon;
use Livewire\Form;

class FormPresenceUpdate extends Form
{
    public Presence $presence;
    public $presence_number;
    public $user_presence;
    public $presence_date;

    public function setData(Presence $presence){
        $this->presence = $presence;
        $parts = explode(' ', $this->presence->section);
        $number = end($parts);
        $this->presence_date = Carbon::parse($this->presence->date_time)->format('Y-m-d\TH:i');
        $this->user_presence = $this->initUserPresence();
        $this->presence_number = $number;

    }

    private function initUserPresence(){
        $user_presence = $this->presence->userPresences->toArray() ?? [];
        $result = [];
        if (count($user_presence) != 0) {
            foreach ($user_presence as $value) {
                array_push($result, ["id"=>$value["id"], "name"=>$value["user"]["name"], "major"=> $value["user"]["major"] ?? "program studi", "status"=>$value["status"]]);
            }
        }
        return $result;
    }

    public function rules(){
        return [
            "presence_number" => ["required"],
            'user_presence' => 'required|array',
            'user_presence.*.id' => 'required|integer|exists:users,id',
            'user_presence.*.status' => 'required|string|in:hadir,izin,alpha',
            "presence_date" => ["required", "date"],
        ];
    }
}
