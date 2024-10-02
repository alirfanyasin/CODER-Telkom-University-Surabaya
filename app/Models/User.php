<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Elearning\TaskSubmission;
use App\Models\Quiz\UserAnswerQuiz;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'label',
        'major',
        'nim',
        'batch',
        'phone_number',
        'avatar',
        'github',
        'identity_code',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Get the division that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    /**
     * Get all of the chatting for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chatting(): HasMany
    {
        return $this->hasMany(Chatting::class, 'from_user_id');
    }

    /**
     * Get all of the userAnswerQuiz for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userAnswerQuiz(): HasMany
    {
        return $this->hasMany(UserAnswerQuiz::class, 'user_id');
    }

    /**
     * Get all of the userPoints for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPoints(): HasMany
    {
        return $this->hasMany(UserPoints::class, 'user_id');
    }


    /**
     * Get all of the userActive for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userActive(): HasMany
    {
        return $this->hasMany(UserActive::class, 'user_id');
    }


    /**
     * Get all of the taskSubmission for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taskSubmission(): HasMany
    {
        return $this->hasMany(TaskSubmission::class, 'user_id');
    }
}
