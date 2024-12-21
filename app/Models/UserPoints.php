<?php

namespace App\Models;

use App\Models\Elearning\TaskSubmission;
use App\Models\Quiz\UserAnswerQuiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPoints extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the user that owns the UserPoints
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the userPresence that owns the UserPoints
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userPresence(): BelongsTo
    {
        return $this->belongsTo(UserPresence::class, 'user_presence_id');
    }

    /**
     * Get the userAnswereQuiz that owns the UserPoints
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userAnswereQuiz(): BelongsTo
    {
        return $this->belongsTo(UserAnswerQuiz::class, 'user_answere_quiz_id');
    }

    /**
     * Get the taskSubmission that owns the UserPoints
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taskSubmission(): BelongsTo
    {
        return $this->belongsTo(TaskSubmission::class, 'taks_submission_id');
    }
    /**
     * Get the points that owns the UserPoints
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function points(): BelongsTo
    {
        return $this->belongsTo(Points::class, 'points_id');
    }
}
