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
             $table->string('matricula');
             $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            $table->unsignedBigInteger('personal_id')->nullable(); 
            $table->foreign('personal_id')->references('id')->on('personals');
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('alunos');
    }
};
