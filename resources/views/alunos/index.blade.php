@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Alunos</h2>

    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control w-50" placeholder="Buscar aluno...">
        <a href="{{ route('alunos.create') }}" class="btn btn-danger ms-3">
            Criar aluno
        </a>
    </div>

    <table class="table table-danger">
        <thead>
            <tr>
                <th>ID</th>
                <th>Matrícula</th>
                <th style="width: 150px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
<tr>
    <td>{{ $aluno->id }}</td>
    <td>{{ $aluno->matricula }}</td>
    <td>
        <!-- Ver -->
        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-sm btn-link" title="Ver">
            <i class="bi bi-eye"></i>
        </a>

        <!-- Editar -->
        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-sm btn-link" title="Editar">
            <i class="bi bi-pencil"></i>
        </a>

        <!-- Excluir -->
        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-link" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    </td>
</tr>
@endforeach
        </tbody>
    </table>

</div>
@endsection