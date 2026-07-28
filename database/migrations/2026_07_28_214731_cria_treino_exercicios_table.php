<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('treino_exercicios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('treino_id')
                  ->constrained('treinos');

            $table->foreignId('exercicio_id')
                  ->constrained('exercicios');

            $table->integer('ordem')->nullable();

            $table->integer('series')->nullable();
            $table->integer('repeticoes')->nullable();

            $table->decimal('carga', 6, 2)->nullable();

            $table->integer('descanso')->nullable();

            $table->text('observacoes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treino_exercicios');
    }
};