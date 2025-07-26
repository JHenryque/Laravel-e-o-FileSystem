<x-main-layout>

    <div class="container">
        <p class="display-6 mt-5">Ficheiros/Arquivos para Download</p>
        <hr>
        <div class="row">

            @foreach($files as $file)

                <div class="col-12 card-p-2">
                    <ul>
                        <li>Nome: <strong>{{ $file['name'] }}</strong></li>
                        <li>Size: <strong>{{ $file['size'] }}</strong></li>
{{--                        <li>File url: <a href="{{ $file['file_url'] }}">Downloads</a></li>--}}
                        <li>File url: <a href="{{ route('download.file', ['file' => $file['file']]) }}">Downloads</a></li>
                        <br>
                    </ul>
                </div>

            @endforeach
        </div>
    </div>

</x-main-layout>
