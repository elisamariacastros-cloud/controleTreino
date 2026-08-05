@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Criar Ficha</h2>

    <form action="{{ route('fichas.store') }}" method="POST">
        @csrf

        {{-- Nome da ficha --}}
        <div class="mb-3">
             <label class="form-label">Nome da Ficha</label>
    <input
        type="text"
        name="nome"
        class="form-control"
        placeholder="Ex: Ficha da Elisa"
        required>
        </div>

        {{-- Aluno --}}
        <div class="mb-3">
            <label class="form-label">Aluno</label>
            <select name="aluno_id" class="form-control" required>
                <option value="">Selecione</option>

                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">
                        {{ $aluno->nome }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Data início e fim --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Data Início</label>
                <input type="date" name="data_inicio" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Data Fim</label>
                <input type="date" name="data_fim" class="form-control">
            </div>
        </div>

        {{-- Observações --}}
        <div class="mb-3">
            <label class="form-label">Observações</label>
            <textarea name="observacoes" class="form-control" rows="4"></textarea>
        </div>

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