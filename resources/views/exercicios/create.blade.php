@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Criar Exercício</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('exercicios.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Exercício *</label>
                    <input 
                        type="text" 
                        name="nome" 
                        id="nome"
                        class="form-control @error('nome') is-invalid @enderror" 
                        placeholder="Ex: Supino Reto"
                        value="{{ old('nome') }}"
                        required
                    >
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea 
                        name="descricao" 
                        id="descricao"
                        class="form-control @error('descricao') is-invalid @enderror" 
                        rows="4"
                        placeholder="Descreva o exercício, músculos trabalhados, execução..."
                    >{{ old('descricao') }}</textarea>
                    @error('descricao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-save"></i> Salvar
            </button>
            <a href="{{ route('exercicios.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
        </div>

    </form>

</div>
@endsection