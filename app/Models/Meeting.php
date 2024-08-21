<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $table = "meetings";
    protected $guarded = ["id"];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

}
