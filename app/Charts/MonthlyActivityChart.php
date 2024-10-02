<?php

namespace App\Charts;

use App\Models\Elearning\Task;
use App\Models\Meeting;
use App\Models\Presence;
use App\Models\Quiz\Quiz;
use Illuminate\Support\Facades\Auth;
use marineusde\LarapexCharts\Charts\BarChart as OriginalBarChart;
use marineusde\LarapexCharts\Options\XAxisOption;
use Carbon\Carbon;

class MonthlyActivityChart
{
    public function build(): OriginalBarChart
    {
        $year = Carbon::now()->year; // Mengambil tahun ini
        $division_id = Auth::user()->division_id;

        // Ambil jumlah meeting per bulan
        $meeting = Meeting::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->where('division_id', $division_id)
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Ambil jumlah task per bulan
        $task = Task::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->where('division_id', $division_id)
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Ambil jumlah quiz per bulan
        $quiz = Quiz::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->where('division_id', $division_id)
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Ambil jumlah presence per bulan
        $presence = Presence::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->where('division_id', $division_id)
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Buat array data per bulan dari Januari sampai Desember
        $months = range(1, 12);
        $meetingData = array_map(fn($month) => $meeting->get($month, 0), $months);
        $taskData = array_map(fn($month) => $task->get($month, 0), $months);
        $quizData = array_map(fn($month) => $quiz->get($month, 0), $months);
        $presenceData = array_map(fn($month) => $presence->get($month, 0), $months);

        return (new OriginalBarChart)
            ->addData('Pertemuan', $meetingData)
            ->addData('Tugas', $taskData)
            ->addData('Kuis', $quizData)
            ->addData('Presensi', $presenceData)
            ->setColors(['#002FED', '#680000', '#FFFFFF', '#565656'])
            ->setFontColor('#FFFFFF')
            ->setHeight(300)
            ->setXAxisOption(new XAxisOption(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agust', 'Sept', 'Okt', 'Nov', 'Des']));
    }
}
