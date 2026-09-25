<?php

namespace App\Models;

use App\Models\Ficha;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Aluno extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'alunos'; 

    protected $fillable = [
        'user_id', 'matricula', 'nome', 'email', 'password',
        'data_nascimento', 'telefone', 'peso', 'altura', 'objetivo',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'data_nascimento' => 'date',
        'peso' => 'decimal:2',
        'altura' => 'decimal:2',
        'password' => 'hashed',
    ];


   public function user()
{
    return $this->belongsTo(User::class);
}

    public function fichas()
    {
        return $this->hasMany(Ficha::class);
    }
}