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

    protected $table = 'users'; // ← confirme que a tabela é 'users'

    protected $fillable = [
        'nome',
        'email',
        'senha',        
    ];

    protected $hidden = [
        'senha',       
        'remember_token',
    ];

    public function getAuthPassword() 
    {
        return $this->senha;
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'senha' => 'hashed', // 
        ];
    }
}