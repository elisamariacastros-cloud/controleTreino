@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Criar Treino</h2>

    {{-- Exibe erros gerais de validação se houver --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('treinos.store') }}" method="POST">
        @csrf

        {{-- 1. Selecionar a Ficha (Obrigatório) --}}
        <div class="mb-3">
            <label for="ficha_id" class="form-label">Ficha do Aluno</label>
            <select name="ficha_id" id="ficha_id" class="form-control @error('ficha_id') is-invalid @enderror" required>
                <option value="">Selecione uma ficha</option>
                @foreach($fichas as $ficha)
                    <option value="{{ $ficha->id }}" {{ old('ficha_id') == $ficha->id ? 'selected' : '' }}>
                        {{ $ficha->aluno->user->name ?? 'Aluno Desconhecido' }} - {{ $ficha->name }}
                    </option>
                @endforeach
            </select>
            @error('ficha_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo do Treino (Letra)</label>
            <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                <option value="">Selecione o tipo</option>
                <option value="A" {{ old('tipo') == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('tipo') == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ old('tipo') == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ old('tipo') == 'D' ? 'selected' : '' }}>D</option>
                
            </select>
            @error('tipo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Treino</label>
            <input 
                type="text" 
                name="nome" 
                id="nome"
                class="form-control @error('nome') is-invalid @enderror" 
                placeholder="Ex: Posterior de coxa"
                value="{{ old('nome') }}"
                required
            >
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- 4. Descrição (Opcional) --}}
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea 
                name="descricao" 
                id="descricao"
                class="form-control @error('descricao') is-invalid @enderror" 
                rows="3"
                placeholder="Obs:"
            >{{ old('descricao') }}</textarea>
            @error('descricao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                Salvar
            </button>

            <a href="{{ route('treinos.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
@endsection