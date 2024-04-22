<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ZipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/download-zip/{id}', [ZipController::class, 'zip'])->name('download.zip');
Route::get('/upload-image', [ImageController::class, 'showUploadForm'])->name('images.show.form');
Route::post('/save-image', [ImageController::class, 'saveImage'])->name('images.uploads.file');
Route::get('/', [ImageController::class, 'index'])->name('images.index');
