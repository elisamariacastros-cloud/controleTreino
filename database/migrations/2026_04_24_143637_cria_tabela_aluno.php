<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('alunos',function (Blueprint $table) {
             $table->id();

        // Personal responsável pelo aluno
        $table->foreignId('user_id')
        ->constrained('users');
       $table->string('nome');
        $table->string('matricula')->unique();
        $table->date('data_nascimento')->nullable();
        $table->string('telefone', 20)->nullable();
        $table->decimal('peso', 5, 2)->nullable();
        $table->decimal('altura', 3, 2)->nullable();
        $table->string('objetivo', 100)->nullable();
        $table->softDeletes();
        $table->timestamps();
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('alunos');
    }
};
