<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aluno_id')
                  ->constrained('alunos');

            $table->string('nome');

            $table->date('data_inicio');
            $table->date('data_fim')->nullable();

            $table->text('observacoes')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fichas');
    }
};