<?php

namespace App\Livewire\App\Quiz;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kuis Live')]
#[Layout('layouts.app')]

class QuizLive extends Component
{
    public function render()
    {
        return view('livewire.app.quiz.quiz-live');
    }
}
