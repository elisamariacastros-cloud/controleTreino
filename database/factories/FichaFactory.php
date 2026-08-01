<?php

namespace Database\Factories;

use App\Models\Ficha;
use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class FichaFactory extends Factory
{
    protected $model = Ficha::class;

    public function definition()
    {
        return [
            'aluno_id' => Aluno::factory(),
            'name' => $this->faker->randomElement(['Ficha A', 'Ficha B', 'Ficha C', 'Ficha C']),
            'data_inicio' => $this->faker->date(),
            'data_fim' => $this->faker->date(),
            'observacoes' => $this->faker->optional()->sentence(),
        ];
    }
}