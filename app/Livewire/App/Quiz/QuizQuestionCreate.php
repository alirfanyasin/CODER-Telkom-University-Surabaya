<?php

namespace App\Livewire\App\Quiz;

use Illuminate\Support\Str;
use App\Models\Quiz\Question;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Buat Pertanyaan')]
#[Layout('layouts.app')]


class QuizQuestionCreate extends Component
{
    use LivewireAlert;

    public $number_of_question;
    public $quiz_id;

    public $points = [];
    public $questions = [];
    public $options = [];
    public $correct_answers = [];

    public function create_number_of_question()
    {
        $this->number_of_question = (int) $this->number_of_question;
        session(['number_of_question' => $this->number_of_question]);
    }


    public function store()
    {
        foreach ($this->questions as $index => $questionText) {
            $slug = Str::slug($questionText, '-') . '-' . uniqid();
            $code = Str::random(10);

            if (isset($this->options[$index]) && count($this->options[$index]) >= 4 && isset($this->correct_answers[$index])) {
                Question::create([
                    'slug' => $slug,
                    'question' => $questionText,
                    'point' => $this->points[$index] ?? 0,
                    'option_1' => $this->options[$index][0] ?? '',
                    'option_2' => $this->options[$index][1] ?? '',
                    'option_3' => $this->options[$index][2] ?? '',
                    'option_4' => $this->options[$index][3] ?? '',
                    'is_correct' => $this->correct_answers[$index],
                    'code' => $code,
                    'quiz_id' => session('quiz_id'),
                ]);
            }
        }

        $this->alert('success', 'Berhasil Tambah Data', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);

        $this->reset(['points', 'questions', 'options', 'correct_answers']);
        session()->forget('quiz_id');
        session()->forget('number_of_question');
        return redirect()->route('app.e-learning.quiz');
    }






    public function render()
    {
        return view('livewire.app.quiz.quiz-question-create');
    }
}
