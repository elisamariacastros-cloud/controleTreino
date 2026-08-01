@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container mt-5">

    <h2 class="mb-4">Criar Aluno</h2>

    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Matrícula</label>
            <input type="text" name="matricula" class="form-control" placeholder="Ex: 2025001" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome completo" required>
        </div> 

        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" required>
        </div>
      
        
       <input type="hidden" name="user_id" value="{{ auth()->user()?->id }}">
        <div class="mb-3">
    <label class="form-label">Telefone</label>
    <input type="text" name="telefone" class="form-control" placeholder="(11) 99999-9999" required>
    </div>

        <div class="mb-3">
            <label class="form-label">Peso (kg)</label>
            <input type="number" step="0.01" name="peso" class="form-control" placeholder="Ex: 75.5">
        </div>

        <div class="mb-3">
            <label class="form-label">Altura (m)</label>
            <input type="number" step="0.01" name="altura" class="form-control" placeholder="Ex: 1.75">
        </div>

        <div class="mb-3">
            <label class="form-label">Objetivo</label>
            <input type="text" name="objetivo" class="form-control" placeholder="Ex: Hipertrofia, Emagrecimento...">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">Salvar</button>
            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>

</div>
@endsection