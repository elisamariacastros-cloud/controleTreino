@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Fichas</h2>

    {{-- 🔍 Pesquisa + botão criar --}}
    <div class="d-flex justify-content-between mb-3">
        <input 
            type="text" 
            class="form-control w-50" 
            placeholder="Buscar fichas...">

        <a href="/criarFicha" class="btn btn-danger ms-3">
            Criar ficha
        </a>
    </div>

    {{-- 📋 Tabela --}}
    <table class="table table-danger">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Exercício</th>
                <th>Séries</th>
                <th>Carga</th>
                <th>Repetições</th>
                <th>Início</th>
                <th>Fim</th>
                <th style="width: 180px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>A</td>
                <td>Supino reto</td>
                <td>3</td>
                <td>20kg</td>
                <td>12</td>
                <td>01/05</td>
                <td>30/05</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="" class="btn btn-sm btn-link w-50">
                        <i class="bi bi-pencil"></i>
                        </a>
                        <a href="" class="btn btn-sm btn-link w-50">
                        <i class="bi bi-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endsection