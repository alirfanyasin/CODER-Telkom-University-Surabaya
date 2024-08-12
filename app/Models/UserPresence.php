<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPresence extends Model
{
    protected $table = "user_presences";
    protected $guarded = ['id'];

    public function presence():BelongsTo
    {
        return $this->belongsTo(Presence::class, 'presences_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
