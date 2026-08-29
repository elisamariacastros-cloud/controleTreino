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
      ->constrained('treinos')
      ->cascadeOnDelete();

            $table->foreignId('exercicio_id')
                  ->constrained('exercicios');

            $table->integer('series')->default(3);
            $table->string('repeticoes')->default('12');
            $table->string('carga')->nullable();
            $table->string('descanso')->nullable();;
            $table->text('observacoes')->nullable();
            $table->integer('ordem')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treino_exercicios');
    }
};