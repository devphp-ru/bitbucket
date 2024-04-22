<?php

namespace App\Http\Controllers;

use App\Services\Zip\ZipService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ZipController extends Controller
{
    public function __construct(private ZipService $zipService) {}

    public function zip(int $id): BinaryFileResponse
    {
        $zipFileName = 'image.zip';
        $zipFilePath = $this->zipService->make($id, $zipFileName);

        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

}
