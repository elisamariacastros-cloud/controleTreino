@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Exercícios</h2>

    <div class="d-flex justify-content-between mb-3">
        <input
            type="text"
            class="form-control w-50"
            placeholder="Buscar exercício..."
            id="searchExercicio"
            onkeyup="filterTable()">

        <a href="{{ route('exercicios.create') }}" class="btn btn-danger ms-3">
            + Novo Exercício
        </a>
    </div>

    <table class="table table-light table-striped table-hover" id="exerciciosTable">
    <thead class="table-danger">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($exercicios as $exercicio)
                <tr>
                    <td>{{ $exercicio->id }}</td>
                    <td><strong>{{ $exercicio->nome }}</strong></td>
                    <td>{{ $exercicio->descricao ?? '-' }}</td>
                    <td>
                        <a href="{{ route('exercicios.edit', $exercicio->id) }}" class="btn btn-sm text-danger">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('exercicios.destroy', $exercicio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-link text-danger" onclick="return confirm('Tem certeza?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Nenhum exercício cadastrado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<script>
function filterTable() {
    const termo = document.getElementById('searchExercicio').value.toLowerCase();
    const linhas = document.querySelectorAll('#exerciciosTable tbody tr');

    linhas.forEach(function (linha) {
        const texto = linha.textContent.toLowerCase();
        linha.style.display = texto.includes(termo) ? '' : 'none';
    });
}
</script>

@endsection