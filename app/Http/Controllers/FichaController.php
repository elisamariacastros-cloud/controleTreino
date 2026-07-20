<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Aluno;
use App\Models\Treino;
use App\Models\Personal;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    public function index()
    {
        $fichas = Ficha::with(['aluno', 'treino', 'personal'])->get();
        return view('fichas.index', compact('fichas'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        $treinos = Treino::all();
        $personals = Personal::all();
        return view('fichas.create', compact('alunos', 'treinos', 'personals'));
    }

    public function store(Request $request)
    {
        Ficha::create($request->all());
        return redirect()->route('fichas.index');
    }

    public function edit(Ficha $ficha)
    {
        $alunos = Aluno::all();
        $treinos = Treino::all();
        $personals = Personal::all();
        return view('fichas.edit', compact('ficha', 'alunos', 'treinos', 'personals'));
    }

    public function update(Request $request, Ficha $ficha)
    {
        $ficha->update($request->all());
        return redirect()->route('fichas.index');
    }

    public function destroy(Ficha $ficha)
    {
        $ficha->delete();
        return redirect()->route('fichas.index');
    }
}