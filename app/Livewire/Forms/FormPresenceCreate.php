<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FormPresenceCreate extends Form
{
    public $presence_number;
    public $presence_date;

    public function rules(){
        return [
            "presence_number" => ["required"],
            "presence_date" => ["required", "date"],
        ];
    }
}
