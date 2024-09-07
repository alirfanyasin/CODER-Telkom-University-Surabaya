<?php

namespace App\Models\Quiz;

use App\Models\User;
use App\Models\UserPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserAnswerQuiz extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    /**
     * Get the quiz that owns the UserAnswerQuiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    /**
     * Get the user that owns the UserAnswerQuiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the userPoints for the UserAnswerQuiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPoints(): HasMany
    {
        return $this->hasMany(UserPoints::class, 'user_answere_quiz_id');
    }
}
