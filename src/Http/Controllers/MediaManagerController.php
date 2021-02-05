<?php

namespace kirillbdev\MediaManager\Http\Controllers;

use Illuminate\Routing\Controller;

class MediaManagerController extends Controller
{
    public function getFiles()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'files' => [
                    [
                        'name' => 'file1.jpg'
                    ],
                    [
                        'name' => 'file2.jpg'
                    ]
                ]
            ]
        ]);
    }
}