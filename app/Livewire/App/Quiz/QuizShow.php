<?php

namespace App\Livewire\App\Quiz;

use App\Models\Quiz\Question;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Detail Kuis')]
#[Layout('layouts.app')]

class QuizShow extends Component
{
    public $code;
    public $id;
    public function mount($code, $id)
    {
        $this->code = $code;
        $this->id = $id;
    }

    public function render()
    {
        $datas = Question::where('code', $this->code)
            ->orWhere('quiz_id', $this->id)->get();
        return view('livewire.app.quiz.quiz-show', [
            'datas' => $datas
        ]);
    }
}
