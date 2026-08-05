<?php

namespace App\Http\Controllers;

use App\Models\Exercicio;
use Illuminate\Http\Request;

class ExercicioController extends Controller
{
    /**
     * Lista todos os exercícios.
     */
    public function index()
    {
        // Pega todos os exercicios
        $exercicios = Exercicio::all();

        // Retorna a view 'exercicios.index' passando a lista de exercicios
        return view('exercicios.index', compact('exercicios'));
    }

    /**
     * Mostra formulário para criar exercício.
     */
    public function create()
    {
        return view('exercicios.create');
    }

    /**
     * Salva um novo exercício.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:exercicios',
            'descricao' => 'nullable|string',
        ]);

        Exercicio::create($request->all());

        return redirect()->route('exercicios.index')
            ->with('success', 'Exercício criado com sucesso!');
    }

    /**
     * Mostra um exercício específico.
     */
    public function show($id)
    {
        $exercicio = Exercicio::findOrFail($id);
        return view('exercicios.show', compact('exercicio'));
    }

    /**
     * Mostra formulário para editar exercício.
     */
    public function edit($id)
    {
        $exercicio = Exercicio::findOrFail($id);
        return view('exercicios.edit', compact('exercicio'));
    }

    /**
     * Atualiza um exercício.
     */
    public function update(Request $request, $id)
    {
        $exercicio = Exercicio::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255|unique:exercicios,nome,' . $id,
            'descricao' => 'nullable|string',
        ]);

        $exercicio->update($request->all());

        return redirect()->route('exercicios.index')
            ->with('success', 'Exercício atualizado com sucesso!');
    }

    /**
     * Remove um exercício.
     */
    public function destroy($id)
    {
        $exercicio = Exercicio::findOrFail($id);
        $exercicio->delete();

        return redirect()->route('exercicios.index')
            ->with('success', 'Exercício excluído com sucesso!');
    }
}