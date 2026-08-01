<?php

namespace App\Http\Controllers;

use App\Models\Exercicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExercicioController extends Controller
{
    /**
     * Listar todos os exercícios (View)
     */
    public function index()
    {
        // Pega todos os exercícios (se usar soft delete, pode adicionar ->withTrashed() se quiser ver os deletados)
        $exercicios = Exercicio::all();
        
        // Retorna a view 'exercicios.index' passando a lista de exercícios
        return view('exercicios.index', compact('exercicios'));
    }

    /**
     * Mostrar o formulário para criar um novo exercício (View)
     */
    public function create()
    {
        return view('exercicios.create');
    }

    /**
     * Cadastrar um novo exercício (Processa o formulário e redireciona)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255|unique:exercicios,nome',
            'descricao' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            // Se falhar, volta para a página anterior com os erros e os dados preenchidos
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Exercicio::create($request->all());

        // Redireciona para a listagem com uma mensagem de sucesso
        return redirect()->route('exercicios.index')->with('success', 'Exercício cadastrado com sucesso!');
    }

    /**
     * Exibir um exercício específico (View)
     */
    public function show($id)
    {
        $exercicio = Exercicio::find($id);
        
        if (!$exercicio) {
            return redirect()->route('exercicios.index')->with('error', 'Exercício não encontrado');
        }

        return view('exercicios.show', compact('exercicio'));
    }

    /**
     * Mostrar o formulário para editar um exercício (View)
     */
    public function edit($id)
    {
        $exercicio = Exercicio::find($id);
        
        if (!$exercicio) {
            return redirect()->route('exercicios.index')->with('error', 'Exercício não encontrado');
        }

        return view('exercicios.edit', compact('exercicio'));
    }

    /**
     * Atualizar um exercício (Processa o formulário de edição)
     */
    public function update(Request $request, $id)
    {
        $exercicio = Exercicio::find($id);
        
        if (!$exercicio) {
            return redirect()->route('exercicios.index')->with('error', 'Exercício não encontrado');
        }

        $validator = Validator::make($request->all(), [
            // O 'unique' ignora o ID atual para não dar erro de nome duplicado
            'nome' => 'sometimes|string|max:255|unique:exercicios,nome,' . $id,
            'descricao' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $exercicio->fill($request->only(['nome', 'descricao']));
        $exercicio->save();

        return redirect()->route('exercicios.index')->with('success', 'Exercício atualizado com sucesso!');
    }

    /**
     * Deletar um exercício (Processa a exclusão e redireciona)
     */
    public function destroy($id)
    {
        $exercicio = Exercicio::find($id);
        
        if (!$exercicio) {
            return redirect()->route('exercicios.index')->with('error', 'Exercício não encontrado');
        }

        $exercicio->delete();

        return redirect()->route('exercicios.index')->with('success', 'Exercício deletado com sucesso!');
    }
}