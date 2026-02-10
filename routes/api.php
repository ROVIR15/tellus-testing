<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FileUploadController;

Route::post('/upload-file', [FileUploadController::class, 'store']);
