<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function index()
    {
        // Pega o usuário logado
        $user = Auth::user();
        
        // Se não tiver usuário, redireciona
        if (!$user) {
            return redirect('/login');
        }

        // Busca os alunos do personal logado
        $alunos = Aluno::where('personal_id', $user->id)->get();
        
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['personal_id'] = Auth::id(); // Usa Auth::id()
        Aluno::create($dados);
        return redirect()->route('alunos.index');
    }

    public function edit(Aluno $aluno)
    {
        if ($aluno->personal_id != Auth::id()) {
            return redirect()->route('alunos.index');
        }
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        if ($aluno->personal_id != Auth::id()) {
            return redirect()->route('alunos.index');
        }
        $aluno->update($request->all());
        return redirect()->route('alunos.index');
    }

    public function destroy(Aluno $aluno)
    {
        if ($aluno->personal_id != Auth::id()) {
            return redirect()->route('alunos.index');
        }
        $aluno->delete();
        return redirect()->route('alunos.index');
    }
}