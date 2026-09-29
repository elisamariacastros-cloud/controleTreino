<?php

namespace Database\Factories;

use App\Models\Exercicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExercicioFactory extends Factory
{
    protected $model = Exercicio::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->randomElement([
                'Supino reto', 'Supino inclinado', 'Agachamento', 'Leg press',
                'Puxada frontal', 'Remada baixa', 'Rosca direta', 'Tríceps corda',
            ]),
            'descricao' => $this->faker->optional()->sentence(),
        ];
    }
}