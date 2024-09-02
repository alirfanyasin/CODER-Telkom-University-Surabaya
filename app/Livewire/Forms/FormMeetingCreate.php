<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FormMeetingCreate extends Form
{
    public $name;
    public $date_time;
    public $end_time;
    public $type;
    public $location;
    public $link;
    public $description;

    public function rules(){
        return [
            "name" => ["required"],
            "date_time" => ["required"],
            "end_time" => ["nullable"],
            "type" => ["required"],
            "location" => ["required_without:link"],
            "link" => ["required_without:location"],
            "description" => ["required"],
        ];
    }
}
