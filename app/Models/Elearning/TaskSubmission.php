<?php

namespace App\Models\Elearning;

use App\Models\User;
use App\Models\UserPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskSubmission extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the user that owns the TaskSubmission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the task that owns the TaskSubmission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    /**
     * Get all of the userPoints for the UserAnswerQuiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPoints(): HasMany
    {
        return $this->hasMany(UserPoints::class, 'task_submission_id');
    }
}
