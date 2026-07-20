@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Editar Ficha</h2>

    <form action="{{ route('fichas.update', $ficha->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Tipo --}}
        <div class="mb-3">
            <label class="form-label">Tipo da Ficha</label>
            <select name="tipo" class="form-control" required>
                <option value="">Selecione</option>
                @foreach(['A','B','C','D'] as $tipo)
                    <option value="{{ $tipo }}" {{ $ficha->tipo == $tipo ? 'selected' : '' }}>
                        {{ $tipo }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Datas --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Data Início</label>
                <input type="date" name="dataInicio" class="form-control" value="{{ $ficha->dataInicio }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Data Fim</label>
                <input type="date" name="dataFim" class="form-control" value="{{ $ficha->dataFim }}">
            </div>
        </div>

        {{-- Aluno --}}
        <div class="mb-3">
            <label class="form-label">Aluno</label>
            <select name="aluno_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ $ficha->aluno_id == $aluno->id ? 'selected' : '' }}>
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Treino --}}
        <div class="mb-3">
            <label class="form-label">Treino</label>
            <select name="treino_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach($treinos as $treino)
                    <option value="{{ $treino->id }}" {{ $ficha->treino_id == $treino->id ? 'selected' : '' }}>
                        {{ $treino->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Personal --}}
        <div class="mb-3">
            <label class="form-label">Personal</label>
            <select name="personal_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach($personals as $personal)
                    <option value="{{ $personal->id }}" {{ $ficha->personal_id == $personal->id ? 'selected' : '' }}>
                        {{ $personal->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Exercício --}}
        <div class="mb-3">
            <label class="form-label">Exercício</label>
            <input type="text" name="exercicio" class="form-control" value="{{ $ficha->exercicio }}" required>
        </div>

        {{-- Séries, carga e repetição --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Séries</label>
                <input type="number" name="series" class="form-control" value="{{ $ficha->series }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Carga (kg)</label>
                <input type="number" name="carga" class="form-control" value="{{ $ficha->carga }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Repetições</label>
                <input type="number" name="repeticao" class="form-control" value="{{ $ficha->repeticao }}">
            </div>
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">Atualizar</button>
            <a href="{{ route('fichas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>

</div>
@endsection