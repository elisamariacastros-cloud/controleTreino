@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Fichas</h2>

    <div class="d-flex justify-content-between mb-3">
        <input
            type="text"
            class="form-control w-50"
            placeholder="Buscar fichas..."
            id="searchFicha"
            onkeyup="filterTable()">

        <a href="{{ route('fichas.create') }}" class="btn btn-danger ms-3">
            Criar Ficha
        </a>
    </div>

    <table class="table table-light table-striped table-hover" id="fichasTable">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Nome da Ficha</th>
                <th>Aluno</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Observações</th>
                <th style="width: 220px;">Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse($fichas as $ficha)
                <tr>
                    <td>{{ $ficha->id }}</td>

                    <td>{{ $ficha->nome }}</td>

                    <td>{{ $ficha->aluno->nome ?? '-' }}</td>

                    <td>
                        {{ $ficha->data_inicio ? \Carbon\Carbon::parse($ficha->data_inicio)->format('d/m/Y') : '-' }}
                    </td>

                    <td>
                        {{ $ficha->data_fim ? \Carbon\Carbon::parse($ficha->data_fim)->format('d/m/Y') : '-' }}
                    </td>

                    <td>{{ $ficha->observacoes ?? '-' }}</td>

                    <td>
                        <div class="d-flex gap-2">

                            <a href="{{ route('fichas.edit', $ficha->id) }}"
                               class="btn btn-sm text-danger">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <div class="d-flex gap-2">

                                <a href="{{ route('fichas.show', $ficha->id) }}"
                                   class="btn btn-sm btn-link text-danger"
                                   title="Visualizar">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <form action="{{ route('fichas.destroy', $ficha->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Deseja excluir esta ficha?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-link text-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            </div>
                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Nenhuma ficha cadastrada.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

<script>
function filterTable() {
    const termo = document.getElementById('searchFicha').value.toLowerCase();
    const linhas = document.querySelectorAll('#fichasTable tbody tr');

    linhas.forEach(function (linha) {
        const texto = linha.textContent.toLowerCase();
        linha.style.display = texto.includes(termo) ? '' : 'none';
    });
}
</script>

@endsection