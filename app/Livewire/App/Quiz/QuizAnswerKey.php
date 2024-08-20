<?php

namespace App\Livewire\App\Quiz;

use App\Models\Quiz\AnswerKey;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kunci Jawaban')]
#[Layout('layouts.app')]

class QuizAnswerKey extends Component
{
    use LivewireAlert;
    public $keys = [];

    public function store()
    {
        $numberOfQuestions = session('number_of_question');

        for ($index = 1; $index <= $numberOfQuestions; $index++) {
            if (isset($this->keys[$index])) {
                $code = session('code.' . $index);
                if ($code) {
                    AnswerKey::create([
                        'key' => $this->keys[$index],
                        'code' => $code,
                    ]);
                } else {
                    // dd("Kode untuk pertanyaan ke-" . $index . " tidak ditemukan.");
                    return redirect()->back();
                }
            } else {
                session()->flash('error', "Pertanyaan ke-" . $index . " tidak memiliki data opsi yang lengkap.");
                return redirect()->back();
            }
        }


        $this->alert('success', 'Berhasil Tambah Data', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);

        // Reset data setelah menyimpan
        $this->reset(['keys']);
        session()->forget(['number_of_question',]);
        session()->forget(['code.*',]);
        return redirect()->route('app.e-learning.quiz');
    }

    public function render()
    {
        return view('livewire.app.quiz.quiz-answer-key');
    }
}
