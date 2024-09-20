<?php

namespace App\Livewire\App;

use App\Models\ActivityLetter;
use App\Models\User;
use App\Models\UserPoints;
use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;
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
        $letter = ActivityLetter::find(1);

        $data = [
            'reference_number' => $letter->reference_number,
            'date_published' => $letter->date_published,
            'length_of_service' => $letter->length_of_service,
            'leaders_name' => $letter->leaders_name,
            'nim' => $letter->nim
        ];

        // dd($data);

        $pdf = Pdf::loadView('pdf.activityLetter', $data);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, Auth::user()->name . ' - ' . 'Surat Keaktifan CODER.pdf');

        return $pdf->download('coder.pdf');

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
