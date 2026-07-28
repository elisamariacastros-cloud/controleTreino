<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ficha extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'fichas';

     protected $fillable = [
        'aluno_id',
        'nome',
        'data_inicio',
        'data_fim',
        'observacoes',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function treinos()
    {
        return $this->hasMany(Treino::class);
    }
}