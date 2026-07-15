<?php

namespace Database\Factories;

use App\Models\Ficha;
use App\Models\Aluno;
use App\Models\Treino;
use App\Models\Personal; 
use Illuminate\Database\Eloquent\Factories\Factory;

class FichaFactory extends Factory
{
    protected $model = Ficha::class;

    public function definition()
    {
        return [
            'dataInicio' => $this->faker->date,
            'dataFim' => $this->faker->date,
            'exercicio' => $this->faker->word,
            'tipo' => $this->faker->randomElement(['a', 'b', 'c', 'd']),
            'series' => $this->faker->numberBetween(3, 5),
            'carga' => $this->faker->numberBetween(10, 100),
            'repeticao' => $this->faker->numberBetween(8, 15),
            'aluno_id' => Aluno::factory(),
            'treino_id' => Treino::factory(),
            'personal_id' => Personal::factory(), 
        ];
    }
}