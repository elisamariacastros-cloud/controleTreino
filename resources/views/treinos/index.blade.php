@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Gerenciar Treinos</h2>

    <div class="d-flex justify-content-between mb-3">
        <input 
            type="text" 
            class="form-control w-50" 
            placeholder="Buscar treino..."
            id="searchTreino"
            onkeyup="filterTable()">
        <a href="{{ route('treinos.create') }}" class="btn btn-danger ms-3">
            + Novo Treino
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-danger table-striped table-hover" id="treinosTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ficha</th>
                    <th>Aluno</th>
                    <th>Tipo</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    
                    <th style="width: 150px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($treinos as $treino)
                <tr>
                    <td>{{ $treino->id }}</td>
                    <td>{{ $treino->ficha->nome ?? '-' }}</td>
                    <td>{{ $treino->ficha->aluno->nome ?? '-' }}</td>
                    <td>
                        <span class="badge bg-dark">{{ $treino->tipo }}</span>
                    </td>
                    <td>{{ $treino->nome }}</td>
                    <td>{{ $treino->descricao ?? '-' }}</td>
                    
                    <td>
                        <div class="btn-group" role="group">
                            <!-- Ver-->
                            <a href="{{ route('fichas.show', $treino->ficha_id) }}" class="btn btn-sm btn-link text-danger" title="Ver na Ficha">
                                <i class="bi bi-eye"></i>
                            </a>

                            <!-- Editar -->
                            <a href="{{ route('treinos.edit', $treino->id) }}" class="btn btn-sm btn-link text-danger" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- Adicionar Exercício -->
                            <a href="{{ route('treinos.create', $treino->id) }}" class="btn btn-sm btn-link text-success" title="Adicionar Exercício">
                                <i class="bi bi-plus-circle"></i>
                            </a>

                            <!-- Excluir -->
                            <form action="{{ route('treinos.destroy', $treino->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-link text-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este treino?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">
                        Nenhum treino cadastrado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginação --}}
    @if(method_exists($treinos, 'links'))
        <div class="d-flex justify-content-center mt-3">
            {{ $treinos->links() }}
        </div>
    @endif

</div>



@endsection