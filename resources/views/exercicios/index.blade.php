@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Exercícios</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('exercicios.create') }}" class="btn btn-danger">
            + Novo Exercício
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-danger table-striped table-hover">
            <thead>
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
@endsection