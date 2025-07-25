<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FileController;

Route::get('/', [FileController::class, 'index'])->name('home');

Route::get('/storage_local_create', [FileController::class, 'storageLocalCreate'])->name('storage.local.create');
Route::get('/storage_local_append', [FileController::class, 'storageLocalAppend'])->name('storage.local.append');
Route::get('/storage_local_read', [FileController::class, 'storageLocalRead'])->name('storage.local.read');
Route::get('/storage_local_read_multi', [FileController::class, 'storageLocalReadMulti'])->name('storage.local.read.multi');
Route::get('/storage_local_check_file', [FileController::class, 'storageLocalCheckFile'])->name('storage.local.check.file');
Route::get('/storage_local_store_json', [FileController::class, 'storageLocalStoreJson'])->name('storage.local.store.json');
Route::get('/storage_local_read_json', [FileController::class, 'storageLocalReadJson'])->name('storage.local.read.json');

Route::get('/public', function () {
    $contents = Storage::disk('public')->get('teste.txt');
    echo $contents;
});
