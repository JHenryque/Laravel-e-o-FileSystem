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

    public function storageLocalRead()
    {
        //$contents = Storage::disk('local')->get('file1.txt');
        $contents = Storage::get('file3.txt');

        echo $contents;
    }

    public function storageLocalReadMulti()
    {
        $lines = Storage::get('file3.txt');
        //$lines = explode("\n", $lines);
        $lines = explode(PHP_EOL, $lines);

        foreach ($lines as $line) {
            echo "<p>$line</p>";
        }
    }

    public function storageLocalCheckFile()
    {
        $exists = Storage::exists('file3.txt');
        //ou
        //$exists = Storage::disk('local')->exists('file3.txt');

        if ($exists) {
            echo "exists";
        } else {
            echo "no exists";
        }

        echo '<br>';

        if (Storage::missing('file3.txt')) {
            echo "no exists";
        } else {
            echo "exists";
        }
    }

    public function storageLocalStoreJson()
    {
        $data = [
          [
            'name' => 'Joao',
            'email' => 'joao@gmail.com',
          ],
            [
                'name' => 'ana',
                'email' => 'ana@gmail.com',
            ],
            [
                'name' => 'Jose',
                'email' => 'jose@gmail.com',
            ],
        ];

        Storage::put('data.json', json_encode($data));
        echo '<script>alert("Ficheiro JSON Criado")</script>';

    }

    public function storageLocalReadJson()
    {
        //$data = json_decode(Storage::get('data.json'), true);
        $data = Storage::json('data.json');
        echo '<pre>';
        print_r($data);
    }

    public function storageLocalListFiles()
    {
        $files = Storage::files('meus_arquivos');
        // por arquivo
        $files = Storage::disk('local')->files();
        // por pastas
        $files = Storage::disk('local')->directories();
        echo '<pre>';
        print_r($files);
    }
}
