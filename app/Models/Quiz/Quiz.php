<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get all of the question for the Quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function question(): HasMany
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }

    /**
     * Get all of the userAnswerQuiz for the Quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userAnswerQuiz(): HasMany
    {
        return $this->hasMany(UserAnswerQuiz::class, 'quiz_id');
    }
}
