@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Editar Ficha</h2>

    <form action="{{ route('fichas.update', $ficha->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nome --}}
        <div class="mb-3">
            <label class="form-label">Nome da Ficha</label>
    <input
        type="text"
        name="nome"
        class="form-control"
        value="{{ $ficha->nome }}"
        required>
        </div>

        {{-- Aluno --}}
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

        {{-- Datas --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Data Início</label>
                <input
                    type="date"
                    name="data_inicio"
                    class="form-control"
                    value="{{ $ficha->data_inicio }}"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Data Fim</label>
                <input
                    type="date"
                    name="data_fim"
                    class="form-control"
                    value="{{ $ficha->data_fim }}">
            </div>
        </div>

        {{-- Observações --}}
        <div class="mb-3">
            <label class="form-label">Observações</label>
            <textarea
                name="observacoes"
                class="form-control"
                rows="4">{{ $ficha->observacoes }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                Atualizar
            </button>

            <a href="{{ route('fichas.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
@endsection