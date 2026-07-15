<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Personal;
use App\Models\Aluno;
use App\Models\Treino;
use App\Models\Ficha;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Usuario::factory(5)->create();
        Personal::factory(3)->create();
        Aluno::factory(10)->create();
        Treino::factory(5)->create();
        Ficha::factory(20)->create();
    }
}