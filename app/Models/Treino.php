<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;

    protected $table = 'treinos';

    protected $fillable = [
        'ficha_id',
        'tipo',
        'nome',
        'descricao',
    ];

    protected $casts = [
        'tipo' => 'string', // Se for ENUM, pode castar para string ou criar um enum customizado
    ];

    /**
     * Relacionamento com Ficha
     */
    public function ficha()
    {
        return $this->belongsTo(Ficha::class);
    }

    /**
     * Relacionamento com os exercícios através da tabela pivô treino_exercicios
     */
    public function exercicios()
    {
        return $this->belongsToMany(Exercicio::class, 'treino_exercicios')
                    ->withPivot('ordem', 'series', 'repeticoes', 'carga', 'descanso', 'observacoes')
                    ->withTimestamps();
    }

    /**
     * Relacionamento direto com a tabela pivô 
     */
    public function treinoExercicios()
    {
        return $this->hasMany(TreinoExercicio::class);
    }
    public function getTipoAttribute($value)
{
    return strtoupper($value);
}



}

