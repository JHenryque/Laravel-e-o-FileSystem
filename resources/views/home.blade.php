<x-main-layout title="homesss">
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <p class="text-center display-3">Laboratório de Filesystem</p>

                <hr>

                <div class="d-flex gap-5">
                    <a href="{{ route('storage.local.create') }}" class="btn btn-primary">Criar arquivo no Storage Local</a>
                    <a href="{{ route('storage.local.append') }}" class="btn btn-primary">Acrescentar Conteúndo no Storage Local</a>
                    <a href="{{ route('storage.local.read') }}" class="btn btn-primary">Ler Conteúdo do Storage Local</a>
                    <a href="{{ route('storage.local.read.multi') }}" class="btn btn-primary">Ler Arquivo com Múltiplas Linhas</a>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
