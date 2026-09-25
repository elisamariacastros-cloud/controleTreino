<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::where('user_id', Auth::id())->get();

        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email',
            'password' => 'required|string|min:6',
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
            'email' => $request->email,
            'password' => $request->password, // o cast "hashed" do model faz o hash
            'matricula' => $request->matricula,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'objetivo' => $request->objetivo,
        ]);

        return redirect('/alunos')->with('success', 'Aluno cadastrado com sucesso!');
    }

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

    public function edit($id)
    {
        $aluno = Aluno::where('user_id', Auth::id())->find($id);

        if (!$aluno) {
            return redirect('/alunos')->with('error', 'Aluno não encontrado.');
        }

        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::where('user_id', Auth::id())->find($id);

        if (!$aluno) {
            return redirect('/alunos')->with('error', 'Aluno não encontrado.');
        }

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'password' => 'nullable|string|min:6',
            'matricula' => 'required|string|max:25|unique:alunos,matricula,' . $aluno->id,
            'data_nascimento' => 'nullable|date|before:today',
            'telefone' => 'nullable|string|max:20',
            'peso' => 'nullable|numeric|min:0|max:500',
            'altura' => 'nullable|numeric|min:0.5|max:3',
            'objetivo' => 'nullable|string|max:100',
        ]);

        $dados = [
            'nome' => $request->nome,
            'email' => $request->email,
            'matricula' => $request->matricula,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'objetivo' => $request->objetivo,
        ];

        // só troca a senha se o personal digitou uma nova
        if ($request->filled('password')) {
            $dados['password'] = $request->password;
        }

        $aluno->update($dados);

        return redirect('/alunos')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $aluno = Aluno::where('user_id', Auth::id())->find($id);

        if (!$aluno) {
            return redirect('/alunos')->with('error', 'Aluno não encontrado.');
        }

        $aluno->delete();

        return redirect('/alunos')->with('success', 'Aluno excluído com sucesso!');
    }

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