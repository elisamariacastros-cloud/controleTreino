<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\User;
use App\Models\Personal; 
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition()
    {
        return [
            'matricula' => $this->faker->unique()->randomNumber(8),
            'user_id' => User::factory(),
            'personal_id' => Personal::factory(),
        ];
    }
}