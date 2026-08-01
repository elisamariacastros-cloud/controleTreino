<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Aluno;
use App\Models\Treino;
use App\Models\Ficha;   
use App\Models\TreinoExercicio;   

class DatabaseSeeder extends Seeder
{
   public function run()
{
    // Cria 5 personals (cada um com seu user)
    User::factory(5)->create();
    // Cria 20 alunos (cada um com seu user e personal aleatório)
    Aluno::factory(20)->create();
    // Cria 30 fichas (cada uma com aluno aleatório)
    Ficha::factory(5)->create();
    // Cria 50 treinos (cada um com ficha aleatória)
    Treino::factory(10)->create();
    // Cria 100 treino_exercicios (com treino e exercício aleatórios)
    TreinoExercicio::factory(20)->create();
}
}