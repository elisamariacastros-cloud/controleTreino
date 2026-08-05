@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detalhes do Aluno</h1>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $aluno->id }}</p>
                    <p><strong>Nome:</strong> {{ $aluno->nome }}</p>
                    <p><strong>Matrícula:</strong> {{ $aluno->matricula }}</p>
                    <p><strong>Data Nascimento:</strong> {{ $aluno->data_nascimento ? date('d/m/Y', strtotime($aluno->data_nascimento)) : '-' }}</p>
                    <p><strong>Telefone:</strong> {{ $aluno->telefone ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Peso:</strong> {{ $aluno->peso ?? '-' }} kg</p>
                    <p><strong>Altura:</strong> {{ $aluno->altura ?? '-' }} m</p>
                    <p><strong>Objetivo:</strong> {{ $aluno->objetivo ?? '-' }}</p>
                    <p><strong>Data Cadastro:</strong> {{ $aluno->created_at ? date('d/m/Y H:i', strtotime($aluno->created_at)) : '-' }}</p>
                    <p><strong>Última Atualização:</strong> {{ $aluno->updated_at ? date('d/m/Y H:i', strtotime($aluno->updated_at)) : '-' }}</p>
                </div>
            </div>

            @if($aluno->deleted_at)
                <div class="alert alert-warning mt-3">
                    <strong>⚠️ Aluno deletado em:</strong> {{ date('d/m/Y H:i', strtotime($aluno->deleted_at)) }}
                </div>
            @endif

            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-danger">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <a href="{{ route('alunos.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection