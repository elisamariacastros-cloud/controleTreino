@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Editar Treino</h2>

    <form action="{{ route('treinos.update', $treino->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nome --}}
        <div class="mb-3">
            <label class="form-label">Nome do Treino</label>
            <input 
                type="text" 
                name="nome" 
                class="form-control" 
                placeholder="Ex: Treino A"
                value="{{ $treino->nome }}"
                required
            >
        </div>

        {{-- Descrição --}}
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea 
                name="descricao" 
                class="form-control" 
                rows="3"
                placeholder="Ex: Peito e tríceps"
            >{{ $treino->descricao }}</textarea>
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                Atualizar
            </button>

            <a href="{{ route('treinos.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
@endsection