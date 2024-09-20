<?php

namespace App\Livewire\App\Points;

use App\Models\ActivityLetter;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Buat Surat Keaktifan')]
#[Layout('layouts.app')]

class LetterOfActive extends Component
{
    use LivewireAlert;

    #[Validate('required', message: 'Masukkan nomor surat')]
    public $reference_number;

    #[Validate('required', message: 'Masukkan tanggal surat')]
    public $date_published;

    #[Validate('required', message: 'Pilih masa jabatan')]
    public $length_of_service;

    #[Validate('required', message: 'Masukkan nama ketua')]
    public $leaders_name;

    #[Validate('required', message: 'Masukkan nim ketua')]
    public $nim;

    public function mount()
    {
        $this->length_of_service = (date('Y') - 1) . '/' . date('Y');

        $letter = ActivityLetter::find(1);
        $this->reference_number = $letter->reference_number;
        $this->date_published = $letter->date_published;
        $this->length_of_service = $letter->length_of_service;
        $this->leaders_name = $letter->leaders_name;
        $this->nim = $letter->nim;
    }

    public function update($id)
    {
        $data = ActivityLetter::find($id);
        $data->update([
            'reference_number' => $this->reference_number,
            'date_published' => $this->date_published,
            'length_of_service' => $this->length_of_service,
            'leaders_name' => $this->leaders_name,
            'nim' => $this->nim,
        ]);
        $this->alert('success', 'Surat berhasil dipublish', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->redirect('/app/system-points');
    }


    public function render()
    {
        return view('livewire.app.points.letter-of-active', [
            'data' => ActivityLetter::find(1)
        ]);
    }
}
