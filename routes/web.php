<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FileController;

Route::get('/', [FileController::class, 'index'])->name('home');

Route::get('/storage_local_create', [FileController::class, 'storageLocalCreate'])->name('storage.local.create');

Route::get('/public', function () {
    $contents = Storage::disk('public')->get('teste.txt');
    echo $contents;
});
