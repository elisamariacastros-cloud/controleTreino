@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Treinos</h2>

    <div class="d-flex justify-content-between mb-3">
        <input 
            type="text" 
            class="form-control w-50" 
            placeholder="Buscar treino...">
        <a href="{{ route('treinos.create') }}" class="btn btn-danger ms-3">
            Criar treino
        </a>
    </div>

    <table class="table table-danger">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th style="width: 150px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($treinos as $treino)
            <tr>
                <td>{{ $treino->id }}</td>
                <td>{{ $treino->nome }}</td>
                <td>{{ $treino->descricao }}</td>
                <td>
                    <a href="{{ route('treinos.edit', $treino->id) }}" class="btn btn-sm btn-link">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('treinos.destroy', $treino->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-link">
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