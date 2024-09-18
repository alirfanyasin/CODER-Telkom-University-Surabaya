<?php

namespace App\Livewire\App\Quiz;

use App\Models\Division;
use App\Models\Label;
use App\Models\Quiz\Quiz as QuizModel;
use App\Models\Quiz\UserAnswerQuiz;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Exports\QuizResultExport;

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

    public function exportQuizResult()
    {
        $quizByDivision = QuizModel::where('division_id', Auth::user()->division_id)->first();
        if ($quizByDivision) {
            $this->alert('success', 'Berhasil Export Data', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => true,
            ]);
            return Excel::download(new QuizResultExport, 'Nilai Kuis - ' . Auth::user()->division->name . ' - ' . Str::random(5) . '.xlsx',  \Maatwebsite\Excel\Excel::XLSX);
        } else {
            $this->alert('error', 'Tidak Ada Kuis', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }


    public function render()
    {

        if (Auth::user()->label === Label::LABEL_NAME['user'] . Division::DIVISION_NAMES[Auth::user()->division_id - 1]) {
            $quizzes = QuizModel::orderBy('id', 'DESC')->where('division_id', Auth::user()->division_id)->where('status', 'public')->get();
        } else {
            $quizzes = QuizModel::orderBy('id', 'DESC')->where('division_id', Auth::user()->division_id)->get();
        }

        $finishedQuizIds = UserAnswerQuiz::where('user_id', Auth::id())->pluck('quiz_id')->toArray();

        return view('livewire.app.quiz.quiz', [
            'datas' => $quizzes,
            'finishedQuizIds' => $finishedQuizIds
        ]);
    }
}
