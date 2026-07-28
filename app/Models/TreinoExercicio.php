<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinoExercicio extends Model
{
    use HasFactory;

    protected $table = 'treino_exercicios';

    protected $fillable = [
        'treino_id',
        'exercicio_id',
        'ordem',
        'series',
        'repeticoes',
        'carga',
        'descanso',
        'observacoes',
    ];

    protected $casts = [
        'ordem' => 'integer',
        'series' => 'integer',
        'repeticoes' => 'integer',
        'carga' => 'decimal:2',
        'descanso' => 'integer',
    ];

    /**
     * Relacionamento com Treino
     */
    public function treino()
    {
        return $this->belongsTo(Treino::class);
    }

    /**
     * Relacionamento com Exercicio
     */
    public function exercicio()
    {
        return $this->belongsTo(Exercicio::class);
    }
}