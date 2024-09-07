<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Points extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get all of the userPoints for the Points
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPoints(): HasMany
    {
        return $this->hasMany(UserPoints::class, 'points_id');
    }
}
