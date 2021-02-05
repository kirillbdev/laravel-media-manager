<?php

use Illuminate\Support\Facades\Route;

Route::namespace('kirillbdev\MediaManager\Http\Controllers')
    ->group(function () {

        Route::get('media-manager/files', 'MediaManagerController@getFiles');

    });