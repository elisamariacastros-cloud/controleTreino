<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => 'senha123', 
            'matricula' => $this->faker->unique()->randomNumber(8),
            'data_nascimento' => $this->faker->date(),
            'telefone' => $this->faker->phoneNumber(),
            'peso' => $this->faker->randomFloat(2, 50, 150),
            'altura' => $this->faker->randomFloat(2, 1.50, 2.00),
            'objetivo' => $this->faker->randomElement(['Hipertrofia', 'Emagrecimento', 'Definição', 'Condicionamento']),
        ];
    }
}