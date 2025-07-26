<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FileController extends Controller
{
    public function index(): View
    {
        $arquivos = Storage::files('public/images');

        $urls = '';
        foreach ($arquivos as $arquivo) {
            $urls = Storage::url($arquivo); // retorna o caminho acessível tipo: /storage/fotos/nome.jpg
        }

        return view('home', compact('urls'));
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

    public function storageLocalDelete()
    {
        Storage::delete('file1.txt');
        echo 'Ficheiro removido com sucesso';

        // Eliminar todos os aqurivos
        //Storage::delete(Storage::files());
    }

    public function storageLocalCreateFolder()
    {
        Storage::disk()->makeDirectory('documents');
        Storage::disk('local')->makeDirectory('documents/teste');
        echo 'Ficheiro criado com sucesso';
    }

    public function storageLocalDeleteFolder()
    {
        //Storage::disk('local')->deleteDirectory('pasta');
        // ou
        Storage::deleteDirectory('documents');
        echo 'Ficheiro removido com sucesso';
    }

    public function listFilesWithMetadata()
    {
        $list_files = Storage::allFiles();
        $files = [];
        foreach ($list_files as $file) {
            $files[] = [
                'name' => $file,
                'size' => round(Storage::size($file) / 1024, 2) . 'kb',
                'last_modified' => Carbon::createFromTimestamp(Storage::lastModified($file))->format('d/m/Y H:i:s'),
                'mime_type' => Storage::mimeType($file),
            ];
        }

        return view('list-files-with-metadata', compact('files'));
    }

    public function listFilesForDownload()
    {
        $list_files = Storage::allFiles();
        $files = [];
        foreach ($list_files as $file) {
            $files[] = [
                'name' => $file,
                'size' => round(Storage::size($file) / 1024, 2) . 'kb',
                'file' => basename($file),
                //'file_url' => Storage::url($file),
            ];
        }

        return view('list-files-for-download', compact('files'));
    }

    public function storageLocalUploadFile(Request $request)
    {
        // soluçao para quardar o ficheiro na pasta storage/app/uploads
        //$request->file('arquivo')->store('uploads');

        // para colocar o ficheiro na pasta storage/app/public
        // $request->file('arquivo')->store('public/images');

        // guardar o ficheiro com o nome original
        //$request->file('arquivo')->storeAs('public/images', $request->file('arquivo')->getClientOriginalName());

        // ---------------------------------------------------------
        // upload de ficheiro com validaçao
        $request->validate([
           'arquivo' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $request->file('arquivo')->store('public');
        echo 'Ficheiro enviado com sucesso';
    }
}
