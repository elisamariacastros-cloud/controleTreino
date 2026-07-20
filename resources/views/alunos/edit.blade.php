@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Editar Aluno</h2>

    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Matrícula</label>
            <input type="text" name="matricula" class="form-control" value="{{ $aluno->matricula }}" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">Atualizar</button>
            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>

</div>
@endsection