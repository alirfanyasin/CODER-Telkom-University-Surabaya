<?php

namespace App\Http\Controllers;

use App\Models\ELeaning\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ZipDownload extends Controller
{
    public function download()
    {
        $zip = new ZipArchive;
        $zipFileName = 'CODER - Kumpulan Modul.zip';
        $zipFilePath = public_path($zipFileName);

        $dataFiles = Modul::where('division_id', Auth::user()->division_id)
            ->whereNotNull('file')
            ->get();

        if ($dataFiles->isEmpty()) {
            return response()->json(['error' => 'Tidak ada modul yang diupload.'], 404);
        }

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($dataFiles as $df) {
                $filePath = storage_path('app/public/file/modul/' . $df->file);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, $df->file);
                } else {
                    $zip->addFromString($df->file, 'File tidak ditemukan: ' . $df->file);
                }
            }
            $zip->close();
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Gagal membuat file zip.'], 500);
        }
    }
}
