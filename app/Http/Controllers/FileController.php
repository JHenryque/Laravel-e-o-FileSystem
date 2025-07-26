<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FileController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function storageLocalCreate()
    {
        //Storage::put('public/file1.txt', 'conteudo do ficheiro local 1');
        Storage::disk()->put('file2.txt', 'conteudo do ficheiro local 2');
    }

    public function storageLocalAppend()
    {
        //Storage::append('file3.txt', Str::random(100));
        Storage::disk('local')->append('file3.txt', Str::random(100));

        return redirect()->route('home');
    }
}
