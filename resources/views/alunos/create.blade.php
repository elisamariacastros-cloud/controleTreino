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

        <!-- user_id (hidden) -->
        <input type="hidden" name="user_id" value="{{ auth()->user()?->id }}">

        <!-- Matrícula (obrigatório e único) -->
        <div class="mb-3">
            <label class="form-label">Matrícula</label>
            <input type="text" name="matricula" class="form-control" placeholder="Ex: 2025001" required>
        </div>

        <!-- Nome (obrigatório) -->
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome completo" required>
        </div>

        <!-- E-mail (obrigatório e único) -->
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="aluno@email.com" required>
        </div>

        <!-- Senha (obrigatória) -->
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" placeholder="Mínimo 6 caracteres" required minlength="6">
        </div>
        
        <!-- Data de Nascimento (opcional) -->
        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control">
        </div>

        <!-- Telefone (opcional) -->
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" placeholder="(11) 99999-9999">
        </div>

        <!-- Peso (opcional) -->
        <div class="mb-3">
            <label class="form-label">Peso (kg)</label>
            <input type="number" step="0.01" name="peso" class="form-control" placeholder="Ex: 75.5">
        </div>

        <!-- Altura (opcional) -->
        <div class="mb-3">
            <label class="form-label">Altura (m)</label>
            <input type="number" step="0.01" name="altura" class="form-control" placeholder="Ex: 1.75">
        </div>

        <!-- Objetivo (opcional) -->
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