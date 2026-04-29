<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('fichas', function (Blueprint $table) {
    $table->id();
    $table->date('dataInicio');
    $table->date('dataFim');
    $table->string('exercicio');
    $table->enum('tipo', ['a', 'b', 'c', 'd']);
    $table->integer('series');
    $table->integer('carga');
    $table->integer('repeticao');

    
    $table->foreignId('aluno_id')
          ->constrained('alunos')
          ->cascadeOnDelete();

    $table->foreignId('treino_id')
          ->constrained('treinos')
          ->cascadeOnDelete();

    $table->foreignId('personal_id')
          ->constrained('personal')
          ->cascadeOnDelete();      
    $table->timestamps();
});
    }

    
    public function down(): void
    {
         Schema::dropIfExists('fichas');
    }
};
