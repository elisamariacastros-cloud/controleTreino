<?php

namespace Database\Factories;

use App\Models\Personal;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalFactory extends Factory
{
    protected $model = Personal::class;

    public function definition()
    {
        return [
            'cref' => $this->faker->bothify('??####'),
            'usuario_id' => Usuario::factory(),
        ];
    }
}