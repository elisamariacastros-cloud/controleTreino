@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Visualizar Ficha</h2>
        <a href="{{ route('fichas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    {{-- Informações da Ficha --}}
    <div class="card">
        <div class="card-header bg-danger text-white">Informações da Ficha</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"><strong>Nome:</strong> {{ $ficha->nome }}</div>
                <div class="col-md-6"><strong>Aluno:</strong> {{ $ficha->aluno->nome }}</div>
                <div class="col-md-6"><strong>Início:</strong> {{ date('d/m/Y', strtotime($ficha->data_inicio)) }}</div>
                <div class="col-md-6"><strong>Fim:</strong> {{ $ficha->data_fim ? date('d/m/Y', strtotime($ficha->data_fim)) : '—' }}</div>
                <div class="col-12 mt-2"><strong>Obs:</strong> {{ $ficha->observacoes ?? 'Nenhuma' }}</div>
            </div>
        </div>
    </div>

    {{-- Treinos da Ficha --}}
    <div class="card mt-4">
        <div class="card-header bg-danger text-white d-flex justify-content-between">
            <span>Treinos</span>
            <a href="{{ route('treinos.create') }}" class="btn btn-light btn-sm">+ Novo Treino</a>
        </div>
        <div class="card-body">
            @if($ficha->treinos->count() > 0)
                @foreach($ficha->treinos as $treino)
                    <div class="card mb-3">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <div>
                                <strong>{{ $treino->nome }}</strong>
                                <span class="badge bg-danger ms-2">{{ $treino->tipo }}</span>
                            </div>
                            <div>
                                <a href="{{ route('treinos.edit', $treino->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($treino->exercicios->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
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
                                        <tbody>
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
                                <p class="text-muted">Nenhum exercício neste treino.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-muted">Nenhum treino cadastrado para esta ficha.</p>
            @endif
        </div>
    </div>

</div>
@endsection