<?php

namespace App\Livewire\App;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Laporan')]
#[Layout('layouts.app')]

class ReportEdit extends Component
{
    use WithFileUploads, LivewireAlert;

    public $reportId;
    public $type;
    #[Validate('required', message: 'Tanggal wajib diisi')]
    public $date;
    #[Validate('nullable', message: 'File wajib diisi')]
    public $file;


    public function mount($id)
    {
        $reportData = Report::findOrFail($id);
        $this->reportId = $id;

        $this->type = $reportData->type;
        $this->date = $reportData->date;
        $this->file = $reportData->file;
    }


    public function update($id)
    {
        $this->validate();
        $data = Report::findOrFail($id);


        if ($this->file instanceof \Illuminate\Http\UploadedFile) {
            if ($data->file) {
                Storage::disk('public')->delete('report/' . $data->file);
            }

            $fileName = 'Report - ' . Auth::user()->division->name . ' - ' . $this->date . ' - ' . Str::random(5) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('report', $fileName, 'public');
        } else {
            $fileName = $data->file;
        }


        $data->update([
            'type' => $this->type,
            'date' => $this->date,
            'file' => $fileName
        ]);

        $this->alert('success', 'Data berhasil diperbarui', [
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
        $data = Report::findOrFail($this->reportId);
        return view('livewire.app.report-edit', [
            'data' => $data
        ]);
    }
}
