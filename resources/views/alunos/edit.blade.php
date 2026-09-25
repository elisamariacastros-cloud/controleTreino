@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Editar Aluno</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- user_id (hidden - não editável) -->
        <input type="hidden" name="user_id" value="{{ $aluno->user_id }}">

        <!-- Nome (obrigatório) -->
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input
                type="text"
                name="nome"
                class="form-control"
                value="{{ old('nome', $aluno->nome) }}"
                required>
        </div>

                <!-- E-mail (obrigatório e único) - login do aluno no app -->
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="aluno@email.com" required>
        </div>

        <!-- Senha (obrigatória) - o personal define, o aluno pode trocar depois -->
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" placeholder="Mínimo 6 caracteres" required minlength="6">
        </div>

        <!-- Matrícula (obrigatório e único) -->
        <div class="mb-3">
            <label class="form-label">Matrícula</label>
            <input
                type="text"
                name="matricula"
                class="form-control"
                value="{{ old('matricula', $aluno->matricula) }}"
                required>
        </div>

        <!-- Data de Nascimento (opcional) -->
        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input
                type="date"
                name="data_nascimento"
                class="form-control"
                value="{{ old('data_nascimento', $aluno->data_nascimento) }}">
        </div>

        <!-- Telefone (opcional) -->
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input
                type="text"
                name="telefone"
                class="form-control"
                value="{{ old('telefone', $aluno->telefone) }}"
                placeholder="(11) 99999-9999">
        </div>

        <!-- Peso (opcional) -->
        <div class="mb-3">
            <label class="form-label">Peso (kg)</label>
            <input
                type="number"
                step="0.01"
                name="peso"
                class="form-control"
                value="{{ old('peso', $aluno->peso) }}"
                placeholder="Ex: 75.5">
        </div>

        <!-- Altura (opcional) -->
        <div class="mb-3">
            <label class="form-label">Altura (m)</label>
            <input
                type="number"
                step="0.01"
                name="altura"
                class="form-control"
                value="{{ old('altura', $aluno->altura) }}"
                placeholder="Ex: 1.75">
        </div>

        <!-- Objetivo (opcional) -->
        <div class="mb-3">
            <label class="form-label">Objetivo</label>
            <input
                type="text"
                name="objetivo"
                class="form-control"
                value="{{ old('objetivo', $aluno->objetivo) }}"
                placeholder="Ex: Hipertrofia, Emagrecimento...">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                Atualizar
            </button>

            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
@endsection