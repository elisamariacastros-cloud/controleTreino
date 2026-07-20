@extends('layouts.app')
@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Criar Ficha</h2>

    <form action="{{ route('fichas.store') }}" method="POST">
        @csrf

        {{-- Tipo (A, B, C, D) --}}
        <div class="mb-3">
            <label class="form-label">Tipo da Ficha</label>
            <select name="tipo" class="form-control" required>
                <option value="">Selecione</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>

        {{-- Datas --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Data Início</label>
                <input type="date" name="dataInicio" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Data Fim</label>
                <input type="date" name="dataFim" class="form-control">
            </div>
        </div>
        {{-- Aluno --}}
<div class="mb-3">
    <label class="form-label">Aluno</label>
    <select name="aluno_id" class="form-control" required>
        <option value="">Selecione</option>
        @foreach($alunos as $aluno)
            <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
        @endforeach
    </select>
</div>

{{-- Treino --}}
<div class="mb-3">
    <label class="form-label">Treino</label>
    <select name="treino_id" class="form-control" required>
        <option value="">Selecione</option>
        @foreach($treinos as $treino)
            <option value="{{ $treino->id }}">{{ $treino->nome }}</option>
        @endforeach
    </select>
</div>

{{-- Personal --}}
<div class="mb-3">
    <label class="form-label">Personal</label>
    <select name="personal_id" class="form-control" required>
        <option value="">Selecione</option>
        @foreach($personals as $personal)
            <option value="{{ $personal->id }}">{{ $personal->nome }}</option>
        @endforeach
    </select>
</div>
        {{-- Exercício --}}
        <div class="mb-3">
            <label class="form-label">Exercício</label>
            <input 
                type="text" 
                name="exercicio" 
                class="form-control" 
                placeholder="Ex: Supino reto"
                required
            >
        </div>


        {{-- Séries, carga e repetição --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Séries</label>
                <input type="number" name="series" class="form-control" placeholder="Ex: 3">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Carga (kg)</label>
                <input type="number" name="carga" class="form-control" placeholder="Ex: 20">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Repetições</label>
                <input type="number" name="repeticao" class="form-control" placeholder="Ex: 12">
            </div>
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                Salvar
            </button>

            <a href="{{ route('fichas.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
@endsection