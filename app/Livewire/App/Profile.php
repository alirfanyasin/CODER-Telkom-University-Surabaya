<?php

namespace App\Livewire\App;

use App\Models\ActivityLetter;
use App\Models\Points;
use App\Models\User;
use App\Models\UserPoints;
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
        $points = Points::where('name', 'Minimal Poin')->first();
        $totalUserPoints = UserPoints::where('user_id', Auth::user()->id)->sum('points');

        // Update data
        $data = [
            'reference_number' => $letter->reference_number,
            'date_published' => $letter->date_published,
            'length_of_service' => $letter->length_of_service,
            'leaders_name' => $letter->leaders_name,
            'nim' => $letter->nim,
            'signature' => $letter->signature
        ];


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
        if (intval($totalUserPoints) < $points->points) {
            $this->alert('error', 'Poin tidak cukup', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => true,
            ]);
            return;
        }

        // Download sertificate
        $pdf = Pdf::loadView('pdf.activityLetter', $data);
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

        return view('livewire.app.profile', [
            'point' => $dataPoint,
            'data' => $data
        ]);
    }
}
