@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Fichas</h2>

    {{--  Pesquisa + botão criar --}}
    <div class="d-flex justify-content-between mb-3">
        <input 
            type="text" 
            class="form-control w-50" 
            placeholder="Buscar fichas...">

        <a href="{{ route('fichas.create') }}" class="btn btn-danger ms-3">
            Criar ficha
        </a>
    </div>

    {{--  Tabela --}}
    <table class="table table-danger">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Exercício</th>
                <th>Séries</th>
                <th>Carga</th>
                <th>Repetições</th>
                <th>Início</th>
                <th>Fim</th>
                <th style="width: 180px;">Ações</th>
            </tr>
        </thead>
        <tbody>
           @foreach($fichas as $ficha)
<tr>
    <td>{{ $ficha->id }}</td>
    <td>{{ $ficha->tipo }}</td>
    <td>{{ $ficha->exercicio }}</td>
    <td>{{ $ficha->series }}</td>
    <td>{{ $ficha->carga }}kg</td>
    <td>{{ $ficha->repeticao }}</td>
    <td>{{ \Carbon\Carbon::parse($ficha->dataInicio)->format('d/m') }}</td>
    <td>{{ \Carbon\Carbon::parse($ficha->dataFim)->format('d/m') }}</td>
    <td>
        <div class="d-flex gap-2">
            <a href="{{ route('fichas.edit', $ficha->id) }}" class="btn btn-sm btn-link">
                <i class="bi bi-pencil"></i>
            </a>
            <form action="{{ route('fichas.destroy', $ficha->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-link">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </div>
    </td>
</tr>
@endforeach
        </tbody>
    </table>

</div>
@endsection