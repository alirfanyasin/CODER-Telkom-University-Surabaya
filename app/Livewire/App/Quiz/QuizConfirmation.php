<?php

namespace App\Livewire\App\Quiz;

use App\Models\Quiz\Quiz;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Konfirmasi')]
#[Layout('layouts.app')]

class QuizConfirmation extends Component
{
    public $slug;
    public $code;

    public function mount($code, $slug)
    {
        $this->slug = $slug;
        $this->code = $code;
    }

    public function render()
    {
        $dataQuiz = Quiz::where('slug', $this->slug)->orWhere('code', $this->code)->first();
        return view('livewire.app.quiz.quiz-confirmation', [
            'data' => $dataQuiz
        ]);
    }
}
