<?php

namespace App\Livewire\App;

use App\Exports\ModulExport;
use App\Models\Division;
use App\Models\ELeaning\Modul as ELeaningModul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;

#[Title('Modul')]
#[Layout('layouts.app')]

class Modul extends Component
{

    use LivewireAlert;

    public $itemToDelete;
    public $divisionId = 1;

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


    public function downloadZip()
    {
        $zip = new ZipArchive;
        $zipFileName = 'CODER - Kumpulan Modul.zip';
        $zipFilePath = public_path($zipFileName);

        $dataFiles = ELeaningModul::where('division_id', Auth::user()->division_id)
            ->whereNotNull('file')
            ->get();

        if ($dataFiles->isEmpty()) {
            $this->alert('error', 'Belum Ada File', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            return response()->json(['error' => 'Tidak ada modul yang diupload.'], 404);
        }

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($dataFiles as $df) {
                $filePath = storage_path('app/public/file/modul/' . $df->file);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, $df->file);
                } else {
                    $this->alert('error', 'File Tidak Ditemukan', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'timerProgressBar' => true,
                    ]);
                    $zip->addFromString($df->file, 'File tidak ditemukan: ' . $df->file);
                }
            }
            $zip->close();
            $this->alert('success', 'Berhasil Download File', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            $this->alert('error', 'Terjadi Kesalahan', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            return response()->json(['error' => 'Gagal membuat file zip.'], 500);
        }
    }


    public function exportModul()
    {
        $dataModul = ELeaningModul::where('division_id', Auth::user()->division_id)->get();

        if ($dataModul->count() == 0) {
            $this->alert('error', 'Belum ada modul', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            return;
        }
        return Excel::download(new ModulExport, 'Modul - ' . Auth::user()->division->name . '.xlsx',  \Maatwebsite\Excel\Excel::XLSX);
    }


    public function selectDivision($id)
    {
        $this->divisionId = $id;
        session()->put('active-modul', $this->divisionId);
    }


    public function render()
    {
        if (Auth::user()->label !== 'Super Admin') {
            $allDataByDivision = ELeaningModul::with('division')
                ->where('division_id', Auth::user()->division_id)
                ->orderBy('section', 'ASC')
                ->get();
        } else {
            $allDataByDivision = ELeaningModul::with('division')
                ->where('division_id', session('active-modul') ?? $this->divisionId)
                ->orderBy('section', 'ASC')
                ->get();
        }

        $groupedDataBySection = $allDataByDivision->groupBy('section');

        return view('livewire.app.modul', [
            'groupedDataBySection' => $groupedDataBySection,
            'allDivision' => Division::all()
        ]);
    }
}
