<?php

namespace App\Services\Zip;

use App\Models\Image;

use Illuminate\Support\Str;

final class ZipService
{
    public function make(
        int $id,
        string $zipFileName
    )
    {
        $file = Image::where('id', '=', $id)->first();
        $zip = new \ZipArchive();
        $zipFilePath = public_path($zipFileName);

        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE)) {
            $extension = pathinfo($file->name, PATHINFO_EXTENSION);
            $zip->addFile(storage_path('app/public/' . $file->name), Str::random(5) . '.' . $extension);
        }

        $zip->close();

        return $zipFilePath;
    }

}
