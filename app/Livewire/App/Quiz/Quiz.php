<?php

namespace App\Livewire\App\Quiz;

use App\Models\Quiz\Quiz as QuizModel;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kuis')]
#[Layout('layouts.app')]

class Quiz extends Component
{
    use LivewireAlert;

    public $quizId;

    protected $listeners = [
        'confirmedDeletion',
    ];


    public function destroy($id)
    {
        $this->quizId = $id;

        $this->alert('warning', 'Yakin ingin menghapus data?', [
            'position' => 'top-end',
            'timer' => null,
            'toast' => true,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmedDeletion',
            'showDenyButton' => true,
            'onDenied' => '',
            'denyButtonText' => 'Tidak',
            'width' => '400',
            'confirmButtonText' => 'Iya',
        ]);
    }

    public function confirmedDeletion()
    {
        $data = QuizModel::findOrFail($this->quizId);
        if ($data) {
            $data->delete();
            $this->alert('success', 'Berhasil Menghapus Data', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Gagal Menghapus Data', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }

        $this->quizId = null;
        return redirect()->back();
    }

    public function render()
    {
        $quizzes = QuizModel::where('division_id', Auth::user()->division_id)->get();
        return view('livewire.app.quiz.quiz', [
            'datas' => $quizzes
        ]);
    }
}
