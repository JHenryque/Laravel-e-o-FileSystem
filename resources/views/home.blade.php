<x-main-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <p class="text-center display-3">Laboratório de Filesystem</p>

                <hr>

                <div class="d-flex gap-5 mb-5">
                    <a href="{{ route('storage.local.create') }}" class="btn btn-primary">Criar arquivo no Storage Local</a>
                    <a href="{{ route('storage.local.append') }}" class="btn btn-primary">Acrescentar Conteúndo no Storage Local</a>
                    <a href="{{ route('storage.local.read') }}" class="btn btn-primary">Ler Conteúdo do Storage Local</a>
                    <a href="{{ route('storage.local.read.multi') }}" class="btn btn-primary">Ler Arquivo com Múltiplas Linhas</a>
                </div>

                <div class="d-flex gap-5 mb-5">
                    <a href="{{ route('storage.local.check.file') }}" class="btn btn-primary">Verificar a Existência de Arquivo</a>
                    <a href="{{ route('storage.local.store.json') }}" class="btn btn-primary">Guardar JSON</a>
                    <a href="{{ route('storage.local.read.json') }}" class="btn btn-primary">Ler JSON</a>
                    <a href="{{ route('storage.local.list') }}" class="btn btn-primary">Listar Arquivo</a>
                    <a href="{{ route('storage.local.delete') }}" class="btn btn-primary">Eliminar Arquivo</a>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
