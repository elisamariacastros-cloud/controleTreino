<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TreinoExercicio extends Model
{
    use HasFactory;

    protected $table = 'treino_exercicios';

    protected $fillable = [
        'treino_id',
        'exercicio_id',
        'series',
        'repeticoes',
        'carga',
        'descanso',
        'observacoes',
        'ordem',
    ];

    public function treino(): BelongsTo
    {
        return $this->belongsTo(Treino::class);
    }

    public function exercicio(): BelongsTo
    {
        return $this->belongsTo(Exercicio::class);
    }
}