<?php

namespace kirillbdev\MediaManager\Http\Controllers;

use Illuminate\Routing\Controller;
use kirillbdev\MediaManager\Core\Scanner;
use kirillbdev\MediaManager\Services\FileSyncService;

class MediaManagerController extends Controller
{
    public function getFiles(Scanner $scanner, FileSyncService $fileSyncService)
    {
        $files = $scanner->scanDir(public_path('image/uploads'));
        $fileSyncService->syncFiles($files);

        return response()->json([
            'success' => true,
            'data' => $files
        ]);
    }
}
