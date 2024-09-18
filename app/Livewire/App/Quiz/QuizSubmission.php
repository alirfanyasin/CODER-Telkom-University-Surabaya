<?php

namespace App\Livewire\App\Quiz;


use App\Models\Quiz\Question;
use App\Models\Quiz\UserAnswerQuiz;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Jawaban Kuis')]
#[Layout('layouts.app')]

class QuizSubmission extends Component
{
    public $quizId;
    public $quizCode;

    public function mount($code, $id)
    {
        $this->quizId = $id;
        $this->quizCode = $code;
    }



    public function render()
    {
        $dataSubmissions = UserAnswerQuiz::where('quiz_id', $this->quizId)->get();
        $questionCount =  Question::where('quiz_id', $this->quizId)->count();
        return view('livewire.app.quiz.quiz-submission', [
            'dataSubmissions' => $dataSubmissions,
            'questionCount' => $questionCount,
        ]);
    }
}
