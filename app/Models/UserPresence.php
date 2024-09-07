<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserPresence extends Model
{
    protected $table = "user_presences";
    protected $guarded = ['id'];

    public function presence(): BelongsTo
    {
        return $this->belongsTo(Presence::class, 'presences_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the userPoints for the UserPresence
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPoints(): HasMany
    {
        return $this->hasMany(UserPoints::class, 'user_presence_id');
    }
}
