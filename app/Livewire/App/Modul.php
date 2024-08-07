<?php

namespace App\Livewire\App;

use App\Models\Division;
use App\Models\ELeaning\Modul as ELeaningModul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Modul')]
#[Layout('layouts.app')]

class Modul extends Component
{

    use LivewireAlert;

    public $itemToDelete;

    protected $listeners = [
        'confirmedDeletion',
    ];


    public function destroy($id)
    {
        $this->itemToDelete = $id;

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
        $id = $this->itemToDelete;

        $data = ELeaningModul::find($id);
        if ($data) {
            Storage::disk('public')->delete('file/modul/' . $data->file);
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

        $this->itemToDelete = null;
        return redirect()->back();
    }


    public function render()
    {
        $allDataByDivision = ELeaningModul::with('division')
            ->where('division_id', Auth::user()->division_id)
            ->orderBy('section', 'ASC')
            ->get();

        $groupedDataBySection = $allDataByDivision->groupBy('section');

        return view('livewire.app.modul', [
            'groupedDataBySection' => $groupedDataBySection,
        ]);
    }
}
