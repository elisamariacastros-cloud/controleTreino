@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Alunos</h2>

    <div class="d-flex justify-content-between mb-3">
        <input type="text" id="buscaAluno" class="form-control w-50" placeholder="Buscar aluno..." onkeyup="filtrarAlunos()">
        <a href="{{ route('alunos.create') }}" class="btn btn-danger ms-3">
            Criar aluno
        </a>
    </div>

    <table class="table table-danger table-striped" id="tabelaAlunos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Data Nasc.</th>
                <th>Peso (kg)</th>
                <th>Altura (m)</th>
                <th>Objetivo</th>
                <th style="width: 150px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->matricula }}</td>
                <td class="nome-aluno">{{ $aluno->nome }}</td>
                <td>{{ $aluno->telefone ?? '-' }}</td>
                <td>{{ $aluno->data_nascimento ? date('d/m/Y', strtotime($aluno->data_nascimento)) : '-' }}</td>
                <td>{{ $aluno->peso ?? '-' }}</td>
                <td>{{ $aluno->altura ?? '-' }}</td>
                <td>{{ $aluno->objetivo ?? '-' }}</td>
                <td>
                    <!-- Ver -->
                    <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-sm btn-link text-danger" title="Ver">
                        <i class="bi bi-eye"></i>
                    </a>

                    <!-- Editar -->
                    <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-sm btn-link text-danger" title="Editar">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <!-- Excluir -->
                    <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-link text-danger" title="Excluir" onclick="return confirm('Atenção: ao excluir este aluno, todas as fichas e treinos associados a ele também serão excluídos permanentemente. Esta ação não pode ser desfeita. Deseja continuar?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
function filtrarAlunos() {
    const termo = document.getElementById('buscaAluno').value.toLowerCase();
    const linhas = document.querySelectorAll('#tabelaAlunos tbody tr');

    linhas.forEach(function (linha) {
        const nome = linha.querySelector('.nome-aluno').textContent.toLowerCase();
        linha.style.display = nome.includes(termo) ? '' : 'none';
    });
}
</script>
@endsection