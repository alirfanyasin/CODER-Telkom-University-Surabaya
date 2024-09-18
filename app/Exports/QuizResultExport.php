<?php

namespace App\Exports;

use App\Models\Quiz\UserAnswerQuiz as QuizUserAnswerQuiz;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QuizResultExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $quizResult = QuizUserAnswerQuiz::join('users', 'users.id', '=', 'user_answer_quizzes.user_id')
            ->join('quizzes', 'quizzes.id', '=', 'user_answer_quizzes.quiz_id')
            ->where('users.division_id', Auth::user()->division_id)
            ->select('users.name', 'quizzes.title', 'user_answer_quizzes.grade', 'user_answer_quizzes.score')
            ->get();

        return $quizResult;
    }

    /**
     * Define the header row
     *
     * @return array
     */

    public function headings(): array
    {
        return [
            'NAMA',
            'JUDUL KUIS',
            'GRADE',
            'NILAI',

        ];
    }
}
