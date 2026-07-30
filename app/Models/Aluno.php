<?php

namespace App\Models;

use App\Models\Ficha;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Aluno extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'alunos'; 

    protected $fillable = [
        'user_id',
        'personal_id',
        'matricula',
        'data_nascimento',
        'telefone',
        'peso',
        'altura',
        'objetivo',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'peso' => 'decimal:2',
        'altura' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function fichas()
    {
        return $this->hasMany(Ficha::class);
    }
}