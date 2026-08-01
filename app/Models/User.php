<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; 

    protected $fillable = ['nome', 'email', 'cref','password'];
    protected $hidden = ['password', 'remember_token'];


    protected function casts(): array
{
    return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // ← mudou de 'senha' para 'password'
    ];
}
 
public function alunos()
{
    return $this->hasMany(Aluno::class);
}
}