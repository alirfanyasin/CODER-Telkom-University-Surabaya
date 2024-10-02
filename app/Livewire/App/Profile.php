<?php

namespace App\Livewire\App;

use App\Models\ActivityLetter;
use App\Models\Meeting;
use App\Models\Points;
use App\Models\Quiz\Quiz;
use App\Models\Task;
use App\Models\User;
use App\Models\UserPoints;
use App\Models\UserPresence;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profil')]
#[Layout('layouts.app')]

class Profile extends Component
{
    use LivewireAlert;

    public function downloadActivityLetter()
    {
        // Get data
        $letter = ActivityLetter::find(1);
        $minPoints = Points::where('name', 'Minimal Poin')->first();
        $totalUserPoints = UserPoints::where('user_id', Auth::user()->id)->sum('points');
        $points = Points::all();


        $meetingCount = Meeting::where('division_id', Auth::user()->division_id)->count();
        $quizCount = Quiz::where('division_id', Auth::user()->division_id)->count();
        // $finalProjectCount = Task::where('division_id', Auth::user()->division_id)->get();

        // Update data
        $data = [
            'reference_number' => $letter->reference_number,
            'date_published' => $letter->date_published,
            'length_of_service' => $letter->length_of_service,
            'leaders_name' => $letter->leaders_name,
            'nim' => $letter->nim,
            'signature' => $letter->signature
        ];

        // Check user
        if (Auth::user()->hasRole('user')) {
            // Check published
            if (is_null($letter) || is_null($letter->reference_number)) {
                $this->alert('error', 'Sertifikat belum dipublish', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => '',
                    'timerProgressBar' => true,
                ]);
                return;
            }

            // Check data compeleted
            if (is_null(Auth::user()->nim) || is_null(Auth::user()->major) || is_null(Auth::user()->batch)) {
                $this->alert('error', 'Profile wajib dilengkapi', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => '',
                    'timerProgressBar' => true,
                ]);
                return;
            }

            // Check user points
            if (intval($totalUserPoints) < $minPoints->points) {
                $this->alert('error', 'Poin tidak cukup', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => '',
                    'timerProgressBar' => true,
                ]);
                return;
            }
        }

        // Check Admin
        if (Auth::user()->hasRole('admin')) {
            $dataPoint = [
                $meetingCount,
                $quizCount,
            ];

            $message = [
                'Jumlah pertemuan tidak memenuhi syarat',
                'Jumlah tugas tidak memenuhi syarat',
                'Jumlah kuis tidak memenuhi syarat',
            ];

            foreach ($points as $key => $point) {
                if ($key === 2) {

                    if ($dataPoint[$key] < $point->times) {
                        $this->alert('error', $message[$key], [
                            'position' => 'top-end',
                            'timer' => 3000,
                            'toast' => true,
                            'text' => '',
                            'timerProgressBar' => true,
                        ]);
                        return;
                    }
                }
                break;
            }
        }


        // Download sertificate
        $pdf = Pdf::loadView(public_path('pdf.activityLetter'), $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, Auth::user()->name . ' - ' . 'Surat Keaktifan CODER.pdf');
        return $pdf->download('coder.pdf');


        // Success alert
        $this->alert('success', 'Berhasil download sertifikat', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $data = User::where('id', Auth::user()->id)->first();
        $dataPoint = UserPoints::where('user_id', Auth::user()->id)->sum('points');

        $totalMeetings = UserPresence::where('user_id', Auth::user()->id)->count();
        $dataPresence = UserPresence::where('user_id', Auth::user()->id)
            ->where('status', 'hadir')
            ->count();
        $presencePercentage = $totalMeetings > 0 ? ($dataPresence / $totalMeetings) * 100 : 0;
        $presencePercentage = floor(number_format($presencePercentage, 2));

        return view('livewire.app.profile', [
            'point' => $dataPoint,
            'data' => $data,
            'presence' => $presencePercentage
        ]);
    }
}
