<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ficha extends Model
{
    use HasFactory;

    protected $table = 'fichas';

    protected $fillable = ['dataInicio', 'dataFim', 'exercicio', 'tipo', 'series', 'carga', 'repeticao', 'aluno_id', 'treino_id', 'personal_id' ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function treino()
    {
        return $this->belongsTo(Treino::class);
    }
}