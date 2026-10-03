@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Visualizar Treino</h2>
        <a href="{{ route('fichas.show', $treino->ficha_id) }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    {{-- Informações do Treino --}}
    <div class="card">
        <div class="card-header bg-danger text-white">
            <i class="bi bi-clipboard-check"></i> Informações do Treino
        </div>
        <div class="card-body table-light">
            <div class="row">
                <div class="col-md-6"><strong>Nome:</strong> {{ $treino->nome }}</div>
                <div class="col-md-6">
                    <strong>Tipo:</strong>
                    <span class="badge bg-danger">{{ $treino->tipo }}</span>
                </div>
                <div class="col-md-6"><strong>Aluno:</strong> {{ $treino->ficha->aluno->nome ?? '—' }}</div>
                <div class="col-md-6"><strong>Ficha:</strong> {{ $treino->ficha->nome ?? '—' }}</div>
                <div class="col-12 mt-2"><strong>Descrição:</strong> {{ $treino->descricao ?? 'Nenhuma' }}</div>
            </div>
        </div>
    </div>

    {{-- Exercícios do Treino --}}
    <div class="card mt-4">
        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
            <span><i class="bi bi-bar-chart-fill"></i> Exercícios</span>
            <div class="btn-group" role="group">
                <a href="{{ route('treinos.edit', $treino->id) }}" class="btn btn-light btn-sm" title="Editar Treino">
                    <i class="bi bi-pencil"></i> Editar
                </a>
            </div>
        </div>
        <div class="card-body table-light">
            @if($treino->exercicios->count() > 0)
                <div class="table-responsive">
                    <table class="table table-light table-striped table-hover">
                        <thead class="table-danger">
                            <tr>
                                <th>Ordem</th>
                                <th>Exercício</th>
                                <th>Séries</th>
                                <th>Repetições</th>
                                <th>Carga</th>
                                <th>Descanso</th>
                                <th>Obs</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            @foreach($treino->exercicios->sortBy('pivot.ordem') as $exercicio)
                            <tr>
                                <td>{{ $exercicio->pivot->ordem }}</td>
                                <td>{{ $exercicio->nome }}</td>
                                <td>{{ $exercicio->pivot->series }}</td>
                                <td>{{ $exercicio->pivot->repeticoes }}</td>
                                <td>{{ $exercicio->pivot->carga ?? '-' }}</td>
                                <td>{{ $exercicio->pivot->descanso ?? '-' }}</td>
                                <td>{{ $exercicio->pivot->observacoes ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">Nenhum exercício cadastrado neste treino.</p>
            @endif
        </div>
    </div>

</div>
@endsection