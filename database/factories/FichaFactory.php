<?php

namespace Database\Factories;
use App\Models\Ficha;
use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class FichaFactory extends Factory
{
    protected $model = Ficha::class;

    public function definition(): array
    {
        return [
            'aluno_id' => Aluno::factory(),
            'nome' => 'Ficha ' . $this->faker->word(),
            'data_inicio' => $this->faker->date(),
            'data_fim' => $this->faker->optional()->date(),
            'observacoes' => $this->faker->optional()->sentence(),
        ];
    }
}