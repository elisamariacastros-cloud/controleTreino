@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Aluno</h1>
    
    <div class="card">
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $aluno->user->name }}</p>
            <p><strong>Email:</strong> {{ $aluno->user->email }}</p>
            <p><strong>Personal:</strong> {{ $aluno->personal->user->name }}</p>
            <p><strong>Matrícula:</strong> {{ $aluno->matricula }}</p>
            <p><strong>Data Nascimento:</strong> {{ $aluno->data_nascimento }}</p>
            <p><strong>Telefone:</strong> {{ $aluno->telephone }}</p>
            <p><strong>Peso:</strong> {{ $aluno->peso }} kg</p>
            <p><strong>Altura:</strong> {{ $aluno->altura }} m</p>
            <p><strong>Objetivo:</strong> {{ $aluno->objetivo }}</p>
        </div>
    </div>
    
    <a href="/alunos" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection