<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Str;

class ZipController extends Controller
{
    public function zip(int $id): BinaryFileResponse
    {
        $file = Image::where('id', '=', $id)->first();
        $zip = new \ZipArchive();
        $zipFileName = 'image.zip';
        $zipFilePath = public_path($zipFileName);

        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE)) {
            $extension = pathinfo($file->name, PATHINFO_EXTENSION);
            $zip->addFile(storage_path('app/public/' . $file->name), Str::random(5) . '.' . $extension);
        }

        $zip->close();

        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

}
