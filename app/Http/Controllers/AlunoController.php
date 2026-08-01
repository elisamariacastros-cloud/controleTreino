<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    /**
     * Listar todos os alunos do personal logado
     */
    public function index()
    {
        $alunos = Aluno::where('user_id', Auth::id())->get();

        return view('alunos.index', compact('alunos'));
    }

    /**
     * Mostrar formulário de cadastro
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Cadastrar um novo aluno
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:25|unique:alunos,matricula',
            'data_nascimento' => 'nullable|date|before:today',
            'telefone' => 'nullable|string|max:20',
            'peso' => 'nullable|numeric|min:0|max:500',
            'altura' => 'nullable|numeric|min:0.5|max:3',
            'objetivo' => 'nullable|string|max:100',
        ]);

        Aluno::create([
            'user_id' => Auth::id(),
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'objetivo' => $request->objetivo,
        ]);

        return redirect('/alunos')->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Exibir um aluno específico
     */
    public function show($id)
    {
        $aluno = Aluno::with('fichas.treinos.treinoExercicios.exercicio')
            ->where('user_id', Auth::id())
            ->find($id);

        if (!$aluno) {
            return redirect('/alunos')->with('error', 'Aluno não encontrado.');
        }

        return view('alunos.show', compact('aluno'));
    }

    /**
     * Mostrar formulário de edição
     */
    public function edit($id)
    {
        $aluno = Aluno::where('user_id', Auth::id())->find($id);

        if (!$aluno) {
            return redirect('/alunos')->with('error', 'Aluno não encontrado.');
        }

        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Atualizar um aluno
     */
    public function update(Request $request, $id)
    {
        $aluno = Aluno::where('user_id', Auth::id())->find($id);

        if (!$aluno) {
            return redirect('/alunos')->with('error', 'Aluno não encontrado.');
        }

        $request->validate([
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:25|unique:alunos,matricula,' . $aluno->id,
            'data_nascimento' => 'nullable|date|before:today',
            'telefone' => 'nullable|string|max:20',
            'peso' => 'nullable|numeric|min:0|max:500',
            'altura' => 'nullable|numeric|min:0.5|max:3',
            'objetivo' => 'nullable|string|max:100',
        ]);

        $aluno->update([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'objetivo' => $request->objetivo,
        ]);

        return redirect('/alunos')->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * Excluir um aluno
     */
    public function destroy($id)
    {
        $aluno = Aluno::where('user_id', Auth::id())->find($id);

        if (!$aluno) {
            return redirect('/alunos')->with('error', 'Aluno não encontrado.');
        }

        $aluno->delete();

        return redirect('/alunos')->with('success', 'Aluno excluído com sucesso!');
    }

    /**
     * Retorna as fichas de um aluno (API)
     */
    public function fichas($alunoId)
    {
        $aluno = Aluno::with('fichas.treinos.treinoExercicios.exercicio')
            ->where('user_id', Auth::id())
            ->find($alunoId);

        if (!$aluno) {
            return response()->json([
                'message' => 'Aluno não encontrado.'
            ], 404);
        }

        return response()->json($aluno->fichas);
    }
}