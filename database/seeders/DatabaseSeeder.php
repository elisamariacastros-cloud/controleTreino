<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Aluno;
use App\Models\Exercicio;
use App\Models\Ficha;
use App\Models\Treino;
use App\Models\TreinoExercicio;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 5 personals
        User::factory(5)->create();

        // Aluno de teste, com login conhecido
        $aluno = Aluno::factory()->create([
            'nome'     => 'Aluno Teste',
            'email'    => 'aluno@teste.com',
            'password' => Hash::make('12345678'),
        ]);

        // Outros 19 alunos
        Aluno::factory(19)->create();

        // 15 exercícios
        Exercicio::factory(15)->create();

        // Ficha completa do aluno de teste: 1 ficha, 3 treinos, 4 exercícios em cada
        $ficha = Ficha::factory()->create(['aluno_id' => $aluno->id]);

        Treino::factory(3)->create(['ficha_id' => $ficha->id])
            ->each(function ($treino) {
                TreinoExercicio::factory(4)->create(['treino_id' => $treino->id]);
            });

       
        Ficha::factory(5)->create();
    }
}