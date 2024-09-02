<?php

namespace App\Livewire\Forms;

use App\Models\Meeting;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormMeetingUpdate extends Form
{
    public $name;
    public $date_time;
    public $end_time;
    public $type;
    public $location;
    public $link;
    public $description;

    public function setData(Meeting $meeting){
        $timeReversed = $this->reverseTimeFormated($meeting);
        $this->name = $meeting->name;
        $this->date_time = $timeReversed["date_time"];
        $this->end_time = $timeReversed["end_time"];
        $this->type = $meeting->type;
        $this->location = $meeting->location ?? "";
        $this->link = $meeting->link ?? "";
        $this->description = $meeting->description;
    }
    private function reverseTimeFormated(Meeting $meeting){
        $dateTimeCarbon = Carbon::parse($meeting->date_time);
        $endTime = null;

        if ($meeting->end_time) {
            $endTimeCarbon = Carbon::parse($meeting->end_time);
            $endTime = $endTimeCarbon->format('H:i');
        }

        $dateTime = $dateTimeCarbon->format('Y-m-d\TH:i');
        return ["date_time" => $dateTime, "end_time" => $endTime];
    }

    public function rules(){
        return [
            "name" => ["required"],
            "date_time" => ["required", "date"],
            "end_time" => ["nullable","date"],
            "type" => ["required"],
            "location" => ["required_without:link"],
            "link" => ["required_without:location"],
            "description" => ["required"],
        ];
    }
}
