<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercicio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'exercicios';

    protected $fillable = [
        'nome',
        'descricao',
    ];

    /**
     * Relacionamento com os treinos através da tabela pivô treino_exercicios
     */
    public function treinos()
    {
        return $this->belongsToMany(Treino::class, 'treino_exercicios')
                    ->withPivot('ordem', 'series', 'repeticoes', 'carga', 'descanso', 'observacoes')
                    ->withTimestamps();
    }

    /**
     * Relacionamento direto com a tabela pivô (caso precise de mais detalhes)
     */
    public function treinoExercicios()
    {
        return $this->hasMany(TreinoExercicio::class);
    }
}