<?php

namespace App\Exports;

use App\Models\ELeaning\Modul;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ModulExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Export Modul by Division
        $moduls = Modul::where("division_id", Auth::user()->division_id)->get(['name', 'description', 'section', 'created_at']);

        // Only return the specific columns
        return $moduls;
    }

    /**
     * Define the header row
     *
     * @return array
     */

    public function headings(): array
    {
        return [
            'JUDUL MODUL',
            'DESKRIPSI',
            'PERTEMUAN',
            'WAKTU'
        ];
    }
}
