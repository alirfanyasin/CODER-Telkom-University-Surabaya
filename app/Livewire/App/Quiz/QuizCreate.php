<?php

namespace App\Livewire\App\Quiz;

use App\Models\Quiz\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Buat Kuis')]
#[Layout('layouts.app')]

class QuizCreate extends Component
{
    use LivewireAlert;

    #[Validate('required', message: "Judul wajib diisi")]
    public $title;
    #[Validate('required', message: "Thumbnail wajib diisi")]
    public $thumbnail;
    public $status;

    public function store()
    {
        $this->validate();

        $randomNumber = random_int(100, 99999);
        $quizCode = Str::random(10);

        $data = [
            'id' => $randomNumber,
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'thumbnail' => $this->thumbnail,
            'status' => $this->status,
            'code' => $quizCode,
            'division_id' => Auth::user()->division_id
        ];

        Quiz::create($data);
        $this->alert('success', 'Berhasil Tambah Data', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);
        session(['quiz_id' => $randomNumber]);
        return redirect()->route('app.e-learning.quiz.question-create');
    }



    public function render()
    {
        return view('livewire.app.quiz.quiz-create');
    }
}
