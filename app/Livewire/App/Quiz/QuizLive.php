<?php

namespace App\Livewire\App\Quiz;

use App\Models\Points;
use App\Models\Quiz\Question;
use App\Models\Quiz\UserAnswerQuiz;
use App\Models\UserPoints;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kuis Live')]
#[Layout('layouts.app')]

class QuizLive extends Component
{
    public $quizId;
    public $currentQuestionIndex = 0;
    public $selectedAnswer = null;
    public $answers = [];
    public $totalScore = 0;
    public $currentPoint = 0;
    public $correctAnswers = 0;
    public $wrongAnswers = 0;
    // public $countdown = 10;

    public function mount($id)
    {
        $this->quizId = $id;
    }

    // #[On('timeUp')]
    // public function timeUp()
    // {
    //     $this->nextQuestion(null);
    // }

    public function nextQuestion($selectedAnswer)
    {
        $currentQuestion = Question::where('quiz_id', $this->quizId)
            ->skip($this->currentQuestionIndex)
            ->first();

        // Simpan jawaban yang dipilih
        $this->answers[$this->currentQuestionIndex] = $selectedAnswer;

        // Tambahkan poin dan hitung jawaban benar/salah
        if ($selectedAnswer === $currentQuestion->is_correct) {
            $this->totalScore += $this->currentPoint;
            $this->correctAnswers++;
        } else {
            $this->wrongAnswers++;
        }

        // Pindah ke pertanyaan berikutnya jika masih ada
        if ($this->currentQuestionIndex < $this->getQuestionCount() - 1) {
            $this->currentQuestionIndex++;
            $this->currentPoint = $currentQuestion->point; // Set poin untuk pertanyaan berikutnya
        } else {
            // Simpan jawaban dan skor, lalu arahkan ke halaman hasil
            $this->saveAnswers();

            // Simpan Poin User
            $point = Points::where('name', 'Kuis')->first();
            $userAnswereQuiz = UserAnswerQuiz::where('user_id', Auth::user()->id)
                ->where('quiz_id', $this->quizId)
                ->latest()
                ->first();
            UserPoints::create([
                'user_id' => Auth::user()->id,
                'user_answer_quizzes_id' => $userAnswereQuiz->id,
                'points' => $point->points
            ]);
            return redirect()->route('app.e-learning.quiz-result', ['id' => $this->quizId]);
        }
    }


    public function saveAnswers()
    {

        $grade = $this->calculateGrade($this->totalScore);

        UserAnswerQuiz::create([
            'score' => $this->totalScore,
            'grade' => $grade,
            'correct_answer' => $this->correctAnswers,
            'wrong_answer' => $this->wrongAnswers,
            'quiz_id' => $this->quizId,
            'user_id' => Auth::id(),
        ]);
    }

    public function calculateGrade($score)
    {
        // dd($score);
        if ($score >= 90) {
            return 'A';
        } elseif ($score >= 80) {
            return 'B';
        } elseif ($score >= 70) {
            return 'C';
        } elseif ($score >= 60) {
            return 'D';
        } else {
            return 'F';
        }
    }

    public function getQuestionCount()
    {
        return Question::where('quiz_id', $this->quizId)->count();
    }

    public function render()
    {
        $dataQuestion = Question::where('quiz_id', $this->quizId)
            ->skip($this->currentQuestionIndex)
            ->first();

        if ($dataQuestion) {
            $this->currentPoint = $dataQuestion->point;
        }

        return view('livewire.app.quiz.quiz-live', [
            'question' => $dataQuestion
        ]);
    }
}
