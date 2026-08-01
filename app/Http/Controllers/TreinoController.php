<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Treino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreinoController extends Controller
{
    /**
     * Listar todos os treinos (View)
     */
    public function index(Request $request)
    {
        $query = Treino::with(['ficha.aluno.user', 'treinoExercicios.exercicio']);
        
        if ($request->has('ficha_id')) {
            $query->where('ficha_id', $request->ficha_id);
        }

        $treinos = $query->get();

        // Retorna a view 'treinos.index' com a lista de treinos
        return view('treinos.index', compact('treinos'));
    }

    /**
     * Mostrar o formulário para criar um novo treino (View)
     */
    public function create()
    {
        // Carregar todas as fichas para o usuário escolher no select
        $fichas = Ficha::with('aluno.user')->get();
        
        return view('treinos.create', compact('fichas'));
    }

    /**
     * Cadastrar um novo treino (Processa e redireciona)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ficha_id' => 'required|exists:fichas,id',
            'tipo' => 'required|in:A,B,C,D,E,F,G,ABCDE',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ficha = Ficha::find($request->ficha_id);
        if (!$ficha) {
            return redirect()->back()->with('error', 'Ficha não encontrada')->withInput();
        }

        Treino::create($request->all());

        return redirect()->route('treinos.index')->with('success', 'Treino cadastrado com sucesso!');
    }

    /**
     * Exibir um treino específico (View)
     */
    public function show($id)
    {
        $treino = Treino::with(['ficha.aluno.user', 'treinoExercicios.exercicio'])->find($id);
        
        if (!$treino) {
            return redirect()->route('treinos.index')->with('error', 'Treino não encontrado');
        }

        return view('treinos.show', compact('treino'));
    }

    /**
     * Mostrar o formulário para editar um treino (View)
     */
    public function edit($id)
    {
        $treino = Treino::with(['ficha.aluno.user', 'treinoExercicios.exercicio'])->find($id);
        
        if (!$treino) {
            return redirect()->route('treinos.index')->with('error', 'Treino não encontrado');
        }

        // Carrega as fichas para o select
        $fichas = Ficha::with('aluno.user')->get();
        // Carrega todos os exercícios disponíveis para adicionar ao treino
        $exerciciosDisponiveis = \App\Models\Exercicio::all();

        return view('treinos.edit', compact('treino', 'fichas', 'exerciciosDisponiveis'));
    }

    /**
     * Atualizar um treino (Processa e redireciona)
     */
    public function update(Request $request, $id)
    {
        $treino = Treino::find($id);
        
        if (!$treino) {
            return redirect()->route('treinos.index')->with('error', 'Treino não encontrado');
        }

        $validator = Validator::make($request->all(), [
            'tipo' => 'sometimes|in:A,B,C,D,E,F,G,ABCDE',
            'nome' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'ficha_id' => 'sometimes|exists:fichas,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $treino->fill($request->only([
            'tipo', 'nome', 'descricao', 'ficha_id'
        ]));
        $treino->save();

        return redirect()->route('treinos.index')->with('success', 'Treino atualizado com sucesso!');
    }

    /**
     * Deletar um treino (soft delete)
     */
    public function destroy($id)
    {
        $treino = Treino::find($id);
        
        if (!$treino) {
            return redirect()->route('treinos.index')->with('error', 'Treino não encontrado');
        }

        $treino->delete();

        return redirect()->route('treinos.index')->with('success', 'Treino deletado com sucesso!');
    }

    /**
     * Adicionar exercício ao treino
     */
    public function addExercicio(Request $request, $treinoId)
    {
        $treino = Treino::find($treinoId);
        
        if (!$treino) {
            return redirect()->route('treinos.index')->with('error', 'Treino não encontrado');
        }

        $validator = Validator::make($request->all(), [
            'exercicio_id' => 'required|exists:exercicios,id',
            'ordem' => 'required|integer|min:1',
            'series' => 'required|integer|min:1|max:10',
            'repetições' => 'required|integer|min:1|max:100',
            'carga' => 'nullable|numeric|min:0',
            'descanso' => 'nullable|integer|min:0|max:300',
            'observacoes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            // Redireciona de volta para a página de EDIÇÃO do treino com os erros
            return redirect()->route('treinos.edit', $treinoId)->withErrors($validator)->withInput();
        }

        $treino->treinoExercicios()->create($request->all());

        // Volta para a página de edição do treino com mensagem de sucesso
        return redirect()->route('treinos.edit', $treinoId)->with('success', 'Exercício adicionado ao treino com sucesso!');
    }

    /**
     * Remover exercício do treino
     */
    public function removeExercicio($treinoId, $exercicioId)
    {
        $treino = Treino::find($treinoId);
        
        if (!$treino) {
            return redirect()->route('treinos.index')->with('error', 'Treino não encontrado');
        }

        $treinoExercicio = $treino->treinoExercicios()->where('exercicio_id', $exercicioId)->first();
        
        if (!$treinoExercicio) {
            return redirect()->route('treinos.edit', $treinoId)->with('error', 'Exercício não encontrado neste treino');
        }

        $treinoExercicio->delete();

        // Volta para a página de edição do treino
        return redirect()->route('treinos.edit', $treinoId)->with('success', 'Exercício removido do treino com sucesso!');
    }

    /**
     * Atualizar exercício no treino
     */
    public function updateExercicio(Request $request, $treinoId, $exercicioId)
    {
        $treino = Treino::find($treinoId);
        
        if (!$treino) {
            return redirect()->route('treinos.index')->with('error', 'Treino não encontrado');
        }

        $treinoExercicio = $treino->treinoExercicios()->where('exercicio_id', $exercicioId)->first();
        
        if (!$treinoExercicio) {
            return redirect()->route('treinos.edit', $treinoId)->with('error', 'Exercício não encontrado neste treino');
        }

        $validator = Validator::make($request->all(), [
            'ordem' => 'sometimes|integer|min:1',
            'series' => 'sometimes|integer|min:1|max:10',
            'repetições' => 'sometimes|integer|min:1|max:100',
            'carga' => 'nullable|numeric|min:0',
            'descanso' => 'nullable|integer|min:0|max:300',
            'observacoes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('treinos.edit', $treinoId)->withErrors($validator)->withInput();
        }

        $treinoExercicio->fill($request->only([
            'ordem', 'series', 'repetições', 'carga', 'descanso', 'observacoes'
        ]));
        $treinoExercicio->save();

        return redirect()->route('treinos.edit', $treinoId)->with('success', 'Exercício atualizado no treino com sucesso!');
    }
}