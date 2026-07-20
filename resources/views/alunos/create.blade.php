@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Criar Aluno</h2>

    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Matrícula</label>
            <input type="text" name="matricula" class="form-control" placeholder="Ex: 2025001" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">Salvar</button>
            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>

</div>
@endsection