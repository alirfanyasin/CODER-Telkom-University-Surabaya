<?php

namespace App\Exports;

use App\Models\Presence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PresenceResultExport implements FromCollection, WithHeadings
{
    public $presence_id;
    public function __construct($id)
    {
        $this->presence_id = $id;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $presenceResult = Presence::join('user_presences', 'user_presences.presences_id', '=', 'presences.id')
        ->join('users', 'users.id', '=', 'user_presences.user_id')
        ->join(DB::raw('(SELECT @row_number := 0) AS nomor_urut'), DB::raw('1'), '=', DB::raw('1'))
        ->where('presences.id', $this->presence_id)
        ->select(
            DB::raw('CAST(@row_number := @row_number + 1 AS UNSIGNED) AS nomor_urut'),
            'users.name',
            'user_presences.status'
        )
        ->get();
        return $presenceResult;
    }

    /**
     * Define the header row
     *
     * @return array
     */

    public function headings(): array
    {
        return [
            'NOMOR',
            'NAMA',
            'STATUS',

        ];
    }
}
