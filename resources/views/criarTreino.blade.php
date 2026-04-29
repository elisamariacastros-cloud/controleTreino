@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Criar Treino</h2>

    <form action="" method="POST">
        @csrf

        {{-- Nome --}}
        <div class="mb-3">
            <label class="form-label">Nome do Treino</label>
            <input 
                type="text" 
                name="nome" 
                class="form-control" 
                placeholder="Ex: Treino A"
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
            ></textarea>
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                Salvar
            </button>

            <a href="/treinosCancelar" class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
@endsection