<?php

namespace Database\Factories;

use App\Models\Treino;
use App\Models\Ficha;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreinoFactory extends Factory
{
    protected $model = Treino::class;

    public function definition()
    {
        return [
            'ficha_id' => Ficha::factory(),
            'tipo' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'nome' => $this->faker->randomElement(['Treino A', 'Treino B', 'Treino C', 'Treino D']),
            'descricao' => $this->faker->optional()->sentence(),
        ];
    }
}