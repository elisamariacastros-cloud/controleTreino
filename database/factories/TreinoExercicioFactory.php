<?php

namespace Database\Factories;

use App\Models\TreinoExercicio;
use App\Models\Treino;
use App\Models\Exercicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreinoExercicioFactory extends Factory
{
    protected $model = TreinoExercicio::class;

    public function definition()
    {
        return [
            'treino_id' => Treino::factory(),
            'exercicio_id' => Exercicio::factory(),
            'ordem' => $this->faker->numberBetween(1, 8),
            'series' => $this->faker->numberBetween(3, 5),
            'repeticoes' => $this->faker->numberBetween(8, 15),
            'carga' => $this->faker->randomFloat(2, 5, 100),
            'descanso' => $this->faker->numberBetween(30, 90),
            'observacoes' => $this->faker->optional()->sentence(),
        ];
    }
}