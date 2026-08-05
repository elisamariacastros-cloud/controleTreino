<?php

namespace App\Http\Controllers;

use App\Models\Treino;
use App\Models\Ficha;
use App\Models\Exercicio;
use App\Models\TreinoExercicio;
use Illuminate\Http\Request;

class TreinoController extends Controller
{
    /**
     * Lista todos os treinos.
     */
    public function index()
    {
        $treinos = Treino::with(['ficha.aluno', 'exercicios'])->get();
        return view('treinos.index', compact('treinos'));
    }

    /**
     * Mostra formulário para criar treino.
     */
    public function create()
    {
        $fichas = Ficha::with('aluno')->get();
        $exercicios = Exercicio::orderBy('nome')->get();
        return view('treinos.create', compact('fichas', 'exercicios'));
    }

    /**
     * Salva o treino com seus exercícios.
     */
    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'ficha_id' => 'required|exists:fichas,id',
            'tipo' => 'required|in:A,B,C,D',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'exercicios' => 'nullable|array',
            'exercicios.*.exercicio_id' => 'required|exists:exercicios,id',
            'exercicios.*.series' => 'required|integer|min:1|max:10',
            'exercicios.*.repeticoes' => 'required|string|max:20',
            'exercicios.*.carga' => 'nullable|string|max:20',
            'exercicios.*.descanso' => 'nullable|string|max:20',
            'exercicios.*.observacoes' => 'nullable|string',
            'exercicios.*.ordem' => 'nullable|integer|min:1',
        ]);

        // Cria o treino
        $treino = Treino::create([
            'ficha_id' => $request->ficha_id,
            'tipo' => $request->tipo,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        // Salva os exercícios
        if ($request->has('exercicios')) {
            foreach ($request->exercicios as $index => $exercicioData) {
                TreinoExercicio::create([
                    'treino_id' => $treino->id,
                    'exercicio_id' => $exercicioData['exercicio_id'],
                    'series' => $exercicioData['series'],
                    'repeticoes' => $exercicioData['repeticoes'],
                    'carga' => $exercicioData['carga'] ?? null,
                    'descanso' => $exercicioData['descanso'] ?? null,
                    'observacoes' => $exercicioData['observacoes'] ?? null,
                    'ordem' => $exercicioData['ordem'] ?? ($index + 1),
                ]);
            }
        }

        return redirect()->route('fichas.show', $treino->ficha_id)
            ->with('success', 'Treino criado com sucesso!');
    }

    /**
     * Mostra formulário para editar treino.
     */
    public function edit($id)
    {
        $treino = Treino::with(['ficha.aluno', 'exercicios'])->findOrFail($id);
        $fichas = Ficha::with('aluno')->get();
        $exercicios = Exercicio::orderBy('nome')->get();
        
        return view('treinos.edit', compact('treino', 'fichas', 'exercicios'));
    }

    /**
     * Atualiza o treino com seus exercícios.
     */
    public function update(Request $request, $id)
    {
        $treino = Treino::findOrFail($id);

        // Validação
        $request->validate([
            'ficha_id' => 'required|exists:fichas,id',
            'tipo' => 'required|in:A,B,C,D',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'exercicios' => 'nullable|array',
            'exercicios.*.id' => 'nullable|exists:treino_exercicios,id',
            'exercicios.*.exercicio_id' => 'required|exists:exercicios,id',
            'exercicios.*.series' => 'required|integer|min:1|max:10',
            'exercicios.*.repeticoes' => 'required|string|max:20',
            'exercicios.*.carga' => 'nullable|string|max:20',
            'exercicios.*.descanso' => 'nullable|string|max:20',
            'exercicios.*.observacoes' => 'nullable|string',
            'exercicios.*.ordem' => 'nullable|integer|min:1',
        ]);

        // Atualiza o treino
        $treino->update([
            'ficha_id' => $request->ficha_id,
            'tipo' => $request->tipo,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        // Pega os IDs dos exercícios existentes
        $existingIds = $treino->treinoExercicios->pluck('id')->toArray();
        $submittedIds = [];

        // Atualiza ou cria os exercícios
        if ($request->has('exercicios')) {
            foreach ($request->exercicios as $index => $exercicioData) {
                if (isset($exercicioData['id']) && in_array($exercicioData['id'], $existingIds)) {
                    // Atualiza existente
                    $treinoExercicio = TreinoExercicio::find($exercicioData['id']);
                    $treinoExercicio->update([
                        'exercicio_id' => $exercicioData['exercicio_id'],
                        'series' => $exercicioData['series'],
                        'repeticoes' => $exercicioData['repeticoes'],
                        'carga' => $exercicioData['carga'] ?? null,
                        'descanso' => $exercicioData['descanso'] ?? null,
                        'observacoes' => $exercicioData['observacoes'] ?? null,
                        'ordem' => $exercicioData['ordem'] ?? ($index + 1),
                    ]);
                    $submittedIds[] = $exercicioData['id'];
                } else {
                    // Cria novo
                    $novo = TreinoExercicio::create([
                        'treino_id' => $treino->id,
                        'exercicio_id' => $exercicioData['exercicio_id'],
                        'series' => $exercicioData['series'],
                        'repeticoes' => $exercicioData['repeticoes'],
                        'carga' => $exercicioData['carga'] ?? null,
                        'descanso' => $exercicioData['descanso'] ?? null,
                        'observacoes' => $exercicioData['observacoes'] ?? null,
                        'ordem' => $exercicioData['ordem'] ?? ($index + 1),
                    ]);
                    $submittedIds[] = $novo->id;
                }
            }
        }

        // Remove exercícios que não foram enviados
        $toDelete = array_diff($existingIds, $submittedIds);
        if (!empty($toDelete)) {
            TreinoExercicio::whereIn('id', $toDelete)->delete();
        }

        return redirect()->route('fichas.show', $treino->ficha_id)
            ->with('success', 'Treino atualizado com sucesso!');
    }

    /**
     * Remove o treino (soft delete).
     */
    public function destroy($id)
    {
        $treino = Treino::findOrFail($id);
        $ficha_id = $treino->ficha_id;
        
        // Remove os exercícios relacionados
        $treino->treinoExercicios()->delete();
        
        // Remove o treino
        $treino->delete();

        return redirect()->route('fichas.show', $ficha_id)
            ->with('success', 'Treino excluído com sucesso!');
    }

    /**
     * Reordenar exercícios (AJAX).
     */
    public function reorder(Request $request, $id)
    {
        $request->validate([
            'ordens' => 'required|array',
        ]);

        foreach ($request->ordens as $exercicioId => $ordem) {
            TreinoExercicio::where('id', $exercicioId)
                ->where('treino_id', $id)
                ->update(['ordem' => $ordem]);
        }

        return response()->json(['success' => true]);
    }
}