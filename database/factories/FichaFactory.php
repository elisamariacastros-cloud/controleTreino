<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('senha123'),
            'matricula' => $this->faker->unique()->randomNumber(8),
            'data_nascimento' => $this->faker->date(),
            'telefone' => $this->faker->numerify('(##) #####-####'),
            'peso' => $this->faker->randomFloat(2, 50, 150),
            'altura' => $this->faker->randomFloat(2, 1.50, 2.00),
            'objetivo' => $this->faker->randomElement(['Hipertrofia', 'Emagrecimento', 'Definição', 'Condicionamento']),
        ];
    }
}