<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition()
    {
        return [
            'matricula' => $this->faker->unique()->randomNumber(8),
            'usuario_id' => Usuario::factory(),
        ];
    }
}