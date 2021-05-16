<?php

namespace kirillbdev\MediaManager\Http\Controllers;

use Illuminate\Routing\Controller;
use kirillbdev\MediaManager\Services\MediaManagerService;

class MediaManagerController extends Controller
{
    public function getFiles(MediaManagerService $mediaManagerService)
    {
        return [
            'success' => true,
            'data' => $mediaManagerService->getFiles(public_path('image/uploads'))
        ];
    }
}
