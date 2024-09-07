<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presence extends Model
{
    use HasFactory;

    protected $table = "presences";

    protected $guarded = ['id'];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function userPresences(): HasMany
    {
        return $this->hasMany(UserPresence::class, 'presences_id');
    }
}
