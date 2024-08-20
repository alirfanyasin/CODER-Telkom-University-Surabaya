<?php

namespace App\Livewire\App\Quiz;

use App\Models\Quiz\Question;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kuis Live')]
#[Layout('layouts.app')]

class QuizLive extends Component
{
    // public $slug;
    public $quizId;

    public function mount($id)
    {
        // $this->slug = $slug;
        $this->quizId = $id;
    }

    public function render()
    {
        $dataQuestion = Question::where('quiz_id', $this->quizId)->get();
        return view('livewire.app.quiz.quiz-live', [
            'dataQuestions' => $dataQuestion
        ]);
    }
}
