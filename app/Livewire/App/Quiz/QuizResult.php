<?php

namespace App\Livewire\App\Quiz;

use App\Models\Quiz\Question;
use App\Models\Quiz\UserAnswerQuiz;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Hasil Kuis')]
#[Layout('layouts.app')]

class QuizResult extends Component
{

    public $quizId;

    public function mount($id)
    {
        $this->quizId = $id;
    }



    public function render()
    {
        $dataResults = UserAnswerQuiz::where('quiz_id', $this->quizId)->where('user_id', Auth::user()->id)->first();
        $questionCount =  Question::where('quiz_id', $this->quizId)->count();
        $dataQuestions = Question::where('quiz_id', $this->quizId)->get();

        return view('livewire.app.quiz.quiz-result', [
            'dataResults' => $dataResults,
            'questionCount' => $questionCount,
            'dataQuestions' => $dataQuestions
        ]);
    }
}
