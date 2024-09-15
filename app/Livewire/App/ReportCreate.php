<?php

namespace App\Livewire\App;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Buat Laporan')]
#[Layout('layouts.app')]

class ReportCreate extends Component
{
    use WithFileUploads, LivewireAlert;

    public $type = "Modul";
    #[Validate('required', message: 'Tanggal wajib diisi')]
    public $date;
    #[Validate('required', message: 'File wajib diisi')]
    #[Validate('mimes:xlsx', message: 'File wajib bertipe .xlsx')]
    #[Validate('max:5120', message: 'Maksimal 5 MB')]
    public $file;


    public function store()
    {
        $this->validate();

        if ($this->file) {
            $nameFile = 'Report - ' . Auth::user()->division->name . ' - ' . $this->date . ' - ' . Str::random(5) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('report', $nameFile, 'public');
        }

        $data = [
            'type' => $this->type,
            'date' => $this->date,
            'file' => $nameFile,
            'division_id' => Auth::user()->division_id
        ];

        Report::create($data);
        $this->alert('success', 'Berhasil Tambah Data', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);
        $this->redirect('/app/report');
    }


    public function render()
    {
        return view('livewire.app.report-create');
    }
}
