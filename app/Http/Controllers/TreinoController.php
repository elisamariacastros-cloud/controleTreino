<?php

namespace App\Http\Controllers;

use App\Models\Treino;
use Illuminate\Http\Request;

class TreinoController extends Controller
{
    public function index()
    {
        $treinos = Treino::all();
        return view('treinos.index', compact('treinos'));
    }

    public function create()
    {
        return view('treinos.create');
    }

    public function store(Request $request)
    {
        Treino::create($request->all());
        return redirect()->route('treinos.index');
    }

    public function edit(Treino $treino)
    {
        return view('treinos.edit', compact('treino'));
    }

    public function update(Request $request, Treino $treino)
    {
        $treino->update($request->all());
        return redirect()->route('treinos.index');
    }

    public function destroy(Treino $treino)
    {
        $treino->delete();
        return redirect()->route('treinos.index');
    }
}