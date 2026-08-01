<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Ficha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FichaController extends Controller
{
    /**
     * Listar todas as fichas (View)
     */
    public function index(Request $request)
    {
        $query = Ficha::with(['aluno.user', 'treinos']);
        
        if ($request->has('aluno_id')) {
            $query->where('aluno_id', $request->aluno_id);
        }

        $fichas = $query->get();
        
        // Retorna a view 'fichas.index' com a lista de fichas
        return view('fichas.index', compact('fichas'));
    }

    /**
     * Mostrar o formulário para criar uma nova ficha (View)
     */
    public function create()
    {
        // Precisamos carregar a lista de alunos para o usuário escolher no formulário
        $alunos = Aluno::with('user')->get();
        
        return view('fichas.create', compact('alunos'));
    }

    /**
     * Cadastrar uma nova ficha (Processa o formulário e redireciona)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aluno_id' => 'required|exists:alunos,id',
            'name' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'observacoes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            // Volta para o formulário com os erros e os dados que o usuário já digitou
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $aluno = Aluno::find($request->aluno_id);
        if (!$aluno) {
            return redirect()->back()->with('error', 'Aluno não encontrado')->withInput();
        }

        Ficha::create($request->all());

        // Redireciona para a listagem com uma mensagem de sucesso
        return redirect()->route('fichas.index')->with('success', 'Ficha cadastrada com sucesso!');
    }

    /**
     * Exibir uma ficha específica (View)
     */
    public function show($id)
    {
        $ficha = Ficha::with(['aluno.user', 'treinos.treinoExercicios.exercicio'])->find($id);
        
        if (!$ficha) {
            return redirect()->route('fichas.index')->with('error', 'Ficha não encontrada');
        }

        return view('fichas.show', compact('ficha'));
    }

    /**
     * Mostrar o formulário para editar uma ficha (View)
     */
    public function edit($id)
    {
        $ficha = Ficha::with('aluno')->find($id);
        
        if (!$ficha) {
            return redirect()->route('fichas.index')->with('error', 'Ficha não encontrada');
        }

        // Carrega todos os alunos para o select do formulário
        $alunos = Aluno::with('user')->get();

        return view('fichas.edit', compact('ficha', 'alunos'));
    }

    /**
     * Atualizar uma ficha (Processa o formulário de edição)
     */
    public function update(Request $request, $id)
    {
        $ficha = Ficha::find($id);
        
        if (!$ficha) {
            return redirect()->route('fichas.index')->with('error', 'Ficha não encontrada');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'data_inicio' => 'sometimes|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'observacoes' => 'nullable|string',
            'aluno_id' => 'sometimes|exists:alunos,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ficha->fill($request->only([
            'name', 'data_inicio', 'data_fim', 'observacoes', 'aluno_id'
        ]));
        $ficha->save();

        return redirect()->route('fichas.index')->with('success', 'Ficha atualizada com sucesso!');
    }

    /**
     * Deletar uma ficha (soft delete)
     */
    public function destroy($id)
    {
        $ficha = Ficha::find($id);
        
        if (!$ficha) {
            return redirect()->route('fichas.index')->with('error', 'Ficha não encontrada');
        }

        $ficha->delete();

        return redirect()->route('fichas.index')->with('success', 'Ficha deletada com sucesso!');
    }
}