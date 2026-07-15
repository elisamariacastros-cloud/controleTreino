<?php

namespace Database\Factories;

use App\Models\Treino;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreinoFactory extends Factory
{
    protected $model = Treino::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'descricao' => $this->faker->sentence,
        ];
    }
}