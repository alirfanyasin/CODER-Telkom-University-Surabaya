<?php

namespace App\Livewire\App\Quiz;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Hasil Kuis')]
#[Layout('layouts.app')]

class QuizResult extends Component
{
    public function render()
    {
        return view('livewire.app.quiz.quiz-result');
    }
}
