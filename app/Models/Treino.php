<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treino extends Model
{
    use HasFactory;

    protected $table = 'treinos'; 

    protected $fillable = ['nome', 'descricao'];
}