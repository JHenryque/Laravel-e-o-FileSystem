<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('home');
});

Route::get('/public', function () {
    $contents = Storage::disk('public')->get('teste.txt');
    echo $contents;
});
