<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos'; 

    protected $fillable = ['matricula','usuario_id']; 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}