<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personal;
use App\Models\Aluno;
use App\Models\Treino;
use App\Models\Ficha;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(5)->create();
        Personal::factory(3)->create();
        Aluno::factory(10)->create();
        Treino::factory(5)->create();
        Ficha::factory(20)->create();
    }
}