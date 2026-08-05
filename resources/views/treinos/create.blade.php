@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Criar Treino</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('treinos.store') }}" method="POST" id="formTreino">
        @csrf

        {{-- Dados do Treino --}}
        <div class="card mb-4">
            <div class="card-header bg-danger text-white">
                <strong>Informações do Treino</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="ficha_id" class="form-label">Ficha do Aluno *</label>
                        <select name="ficha_id" id="ficha_id" class="form-control @error('ficha_id') is-invalid @enderror" required>
                            <option value="">Selecione uma ficha</option>
                            @foreach($fichas as $ficha)
                                <option value="{{ $ficha->id }}" {{ old('ficha_id') == $ficha->id ? 'selected' : '' }}>
                                    {{ $ficha->aluno->nome }} - {{ $ficha->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('ficha_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tipo" class="form-label">Tipo do Treino *</label>
                        <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                            <option value="">Selecione</option>
                            <option value="A" {{ old('tipo') == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('tipo') == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ old('tipo') == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ old('tipo') == 'D' ? 'selected' : '' }}>D</option>
                        </select>
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="nome" class="form-label">Nome do Treino *</label>
                        <input 
                            type="text" 
                            name="nome" 
                            id="nome"
                            class="form-control @error('nome') is-invalid @enderror" 
                            placeholder="Ex: Treino A - Peito e Tríceps"
                            value="{{ old('nome') }}"
                            required
                        >
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea 
                            name="descricao" 
                            id="descricao"
                            class="form-control @error('descricao') is-invalid @enderror" 
                            rows="2"
                            placeholder="Observações sobre o treino..."
                        >{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Exercícios do Treino --}}
        <div class="card mb-4">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <span><strong>Exercícios do Treino</strong></span>
                <button type="button" class="btn btn-light btn-sm" onclick="adicionarExercicio()">
                    <i class="bi bi-plus-circle"></i> Adicionar Exercício
                </button>
            </div>
            <div class="card-body">
                <div id="exercicios-container">
                    <div class="alert alert-info" id="sem-exercicios">
                        <i class="bi bi-info-circle"></i> Nenhum exercício adicionado. Clique em "Adicionar Exercício" para começar.
                    </div>
                </div>
            </div>
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-save"></i> Salvar Treino
            </button>
            <a href="{{ route('treinos.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
        </div>

    </form>

</div>

{{-- Template para exercício (usado pelo JavaScript) --}}
<template id="template-exercicio">
    <div class="exercicio-item card mb-3 border-danger">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <label class="form-label">Exercício *</label>
                    <select name="exercicios[0][exercicio_id]" class="form-control" required>
                        <option value="">Selecione</option>
                        @foreach($exercicios as $exercicio)
                            <option value="{{ $exercicio->id }}">{{ $exercicio->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <label class="form-label">Séries *</label>
                    <input type="number" name="exercicios[0][series]" class="form-control" placeholder="Ex: 4" min="1" max="10" required>
                </div>
                <div class="col-md-2 mb-2">
                    <label class="form-label">Repetições *</label>
                    <input type="text" name="exercicios[0][repeticoes]" class="form-control" placeholder="Ex: 12" required>
                </div>
                <div class="col-md-2 mb-2">
                    <label class="form-label">Carga</label>
                    <input type="text" name="exercicios[0][carga]" class="form-control" placeholder="Ex: 20kg">
                </div>
                <div class="col-md-2 mb-2">
                    <label class="form-label">Descanso</label>
                    <input type="text" name="exercicios[0][descanso]" class="form-control" placeholder="Ex: 60s">
                </div>
                <div class="col-md-10 mb-2">
                    <label class="form-label">Observações</label>
                    <input type="text" name="exercicios[0][observacoes]" class="form-control" placeholder="Observações sobre o exercício...">
                </div>
                <div class="col-md-2 mb-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger w-100" onclick="removerExercicio(this)">
                        <i class="bi bi-trash"></i> Remover
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let exercicioIndex = 0;

    function adicionarExercicio() {
        const template = document.getElementById('template-exercicio');
        const container = document.getElementById('exercicios-container');
        const semExercicios = document.getElementById('sem-exercicios');
        
        // Remove a mensagem "sem exercícios" se existir
        if (semExercicios) {
            semExercicios.remove();
        }

        // Clone o template
        const clone = template.content.cloneNode(true);
        
        // Atualiza os índices dos inputs
        const inputs = clone.querySelectorAll('[name]');
        inputs.forEach(input => {
            input.name = input.name.replace('[0]', `[${exercicioIndex}]`);
        });

        // Adiciona um campo hidden para ordem
        const ordemInput = document.createElement('input');
        ordemInput.type = 'hidden';
        ordemInput.name = `exercicios[${exercicioIndex}][ordem]`;
        ordemInput.value = exercicioIndex + 1;
        clone.querySelector('.card-body').appendChild(ordemInput);

        // Adiciona ao container
        container.appendChild(clone);
        
        exercicioIndex++;
    }

    function removerExercicio(button) {
        if (confirm('Remover este exercício do treino?')) {
            const item = button.closest('.exercicio-item');
            item.remove();
            
            // Se não tiver mais exercícios, mostra mensagem
            const container = document.getElementById('exercicios-container');
            if (container.children.length === 0) {
                container.innerHTML = `
                    <div class="alert alert-info" id="sem-exercicios">
                        <i class="bi bi-info-circle"></i> Nenhum exercício adicionado.
                    </div>
                `;
            }
            
            // Reordena os exercícios
            reordenarExercicios();
        }
    }

    function reordenarExercicios() {
        const items = document.querySelectorAll('.exercicio-item');
        items.forEach((item, index) => {
            const ordemInput = item.querySelector('input[name$="[ordem]"]');
            if (ordemInput) {
                ordemInput.value = index + 1;
            }
        });
    }

    // Reordenar quando mudar a ordem (arrastar)
    document.addEventListener('DOMContentLoaded', function() {
        // Se quiser adicionar drag-and-drop, pode implementar depois
    });
</script>

@endsection