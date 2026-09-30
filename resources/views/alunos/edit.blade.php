@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">
        <i class="bi bi-pencil-square"></i> Editar Aluno
    </h2>

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

        <div class="card">
            <div class="card-header bg-danger text-white">
                <i class="bi bi-person-badge"></i> Dados do Aluno
            </div>
            <div class="card-body table-light">

                <input type="hidden" name="user_id" value="{{ $aluno->user_id }}">

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control"
                        value="{{ old('nome', $aluno->nome) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $aluno->user->email ?? '') }}"
                        placeholder="aluno@email.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control"
                        placeholder="Mínimo 6 caracteres" minlength="6">
                    <small class="text-muted">Deixe em branco para manter a senha atual.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Matrícula</label>
                    <input type="text" name="matricula" class="form-control"
                        value="{{ old('matricula', $aluno->matricula) }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Data de Nascimento</label>
                        <input type="date" name="data_nascimento" class="form-control"
                            value="{{ old('data_nascimento', $aluno->data_nascimento) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control"
                            value="{{ old('telefone', $aluno->telefone) }}"
                            placeholder="(11) 99999-9999">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Peso (kg)</label>
                        <input type="number" step="0.01" name="peso" class="form-control"
                            value="{{ old('peso', $aluno->peso) }}" placeholder="Ex: 75.5">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Altura (m)</label>
                        <input type="number" step="0.01" name="altura" class="form-control"
                            value="{{ old('altura', $aluno->altura) }}" placeholder="Ex: 1.75">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Objetivo</label>
                        <input type="text" name="objetivo" class="form-control"
                            value="{{ old('objetivo', $aluno->objetivo) }}"
                            placeholder="Ex: Hipertrofia">
                    </div>
                </div>

            </div>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-save"></i> Atualizar
            </button>
            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
        </div>

    </form>

</div>
@endsection