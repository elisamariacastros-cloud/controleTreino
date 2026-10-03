@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">
        <i class="bi bi-pencil-square"></i> Editar Ficha
    </h2>

    <form action="{{ route('fichas.update', $ficha->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header bg-danger text-white">
                <i class="bi bi-clipboard-check"></i> Dados da Ficha
            </div>
            <div class="card-body table-light">

                <div class="mb-3">
                    <label class="form-label">Nome da Ficha</label>
                    <input type="text" name="nome" class="form-control"
                        value="{{ old('nome', $ficha->nome) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Aluno</label>
                    <select name="aluno_id" class="form-control" required>
                        @foreach($alunos as $aluno)
                            <option value="{{ $aluno->id }}"
                                {{ $ficha->aluno_id == $aluno->id ? 'selected' : '' }}>
                                {{ $aluno->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Data Início</label>
        <input type="date" name="data_inicio" class="form-control"
            value="{{ old('data_inicio', $ficha->data_inicio ? \Carbon\Carbon::parse($ficha->data_inicio)->format('Y-m-d') : '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Data Fim</label>
        <input type="date" name="data_fim" class="form-control"
            value="{{ old('data_fim', $ficha->data_fim ? \Carbon\Carbon::parse($ficha->data_fim)->format('Y-m-d') : '') }}">
    </div>
</div>

                <div class="mb-3">
                    <label class="form-label">Observações</label>
                    <textarea name="observacoes" class="form-control" rows="4">{{ old('observacoes', $ficha->observacoes) }}</textarea>
                </div>

            </div>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-save"></i> Atualizar
            </button>
            <a href="{{ route('fichas.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
        </div>

    </form>

</div>
@endsection