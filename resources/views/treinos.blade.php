@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Treinos</h2>

    {{-- 🔍 Pesquisa + botão criar --}}
    <div class="d-flex justify-content-between mb-3">
        <input 
            type="text" 
            class="form-control w-50" 
            placeholder="Buscar treino...">
        <a href="/criarTreino" class="btn btn-danger ms-3">
            Criar treino
        </a>
    </div>
    <table class="table table-danger">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th style="width: 150px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Treino A</td>
                <td>Peito e tríceps</td>
                <td>
                <a href="" class="btn btn-sm btn-link">
                <i class="bi bi-pencil"></i>
                </a>
                    <a href="" class="btn btn-sm btn-link w-50">
                <i class="bi bi-trash"></i>
                </a>
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endsection