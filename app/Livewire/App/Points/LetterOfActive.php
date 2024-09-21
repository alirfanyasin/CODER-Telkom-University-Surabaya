<?php

namespace App\Livewire\App\Points;

use App\Models\ActivityLetter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Buat Surat Keaktifan')]
#[Layout('layouts.app')]

class LetterOfActive extends Component
{
    use LivewireAlert, WithFileUploads;

    public $reference_number;
    public $date_published;
    public $length_of_service;
    public $leaders_name;
    public $nim;
    public $signature;

    protected $rules = [
        'reference_number' => 'required',
        'date_published' => 'required',
        'length_of_service' => 'required',
        'leaders_name' => 'required',
        'nim' => 'required',
        'signature' => 'nullable|mimes:png|max:2048',
    ];

    protected $messages = [
        'reference_number.required' => 'Masukkan nomor surat',
        'date_published.required' => 'Masukkan tanggal surat',
        'length_of_service.required' => 'Pilih masa jabatan',
        'leaders_name.required' => 'Masukkan nama ketua',
        'nim.required' => 'Masukkan nim ketua',
        'signature.mimes' => 'File wajib .png',
        'signature.max' => 'Maksimal 2 MB',
    ];

    public function mount()
    {
        $this->length_of_service = (date('Y') - 1) . '/' . date('Y');

        $letter = ActivityLetter::find(1);
        $this->reference_number = $letter->reference_number;
        $this->date_published = $letter->date_published;
        $this->length_of_service = $letter->length_of_service;
        $this->leaders_name = $letter->leaders_name;
        $this->nim = $letter->nim;
        $this->signature = $letter->signature;
    }

    public function update($id)
    {
        $this->validate();

        $data = ActivityLetter::find($id);

        if ($this->signature instanceof \Illuminate\Http\UploadedFile) {
            // If there's an old signature, delete it
            if ($data->signature) {
                Storage::disk('public')->delete('signature/' . $data->signature);
            }
            // Store new signature
            $signatureName = 'Signature_' . Str::random(5) . '.' . $this->signature->getClientOriginalExtension();
            $this->signature->storeAs('signature', $signatureName, 'public');
        } else {
            $signatureName = $this->signature;
        }

        $data->update([
            'reference_number' => $this->reference_number,
            'date_published' => $this->date_published,
            'length_of_service' => $this->length_of_service,
            'leaders_name' => $this->leaders_name,
            'nim' => $this->nim,
            'signature' => $signatureName,
        ]);

        $this->alert('success', 'Surat berhasil dipublish', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        return redirect()->to('/app/system-points');
    }


    public function render()
    {
        return view('livewire.app.points.letter-of-active', [
            'data' => ActivityLetter::find(1)
        ]);
    }
}
