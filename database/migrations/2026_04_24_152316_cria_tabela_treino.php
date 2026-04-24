<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
         Schema::create('treino', function(Blueprint $table){
            $table->id();
            $table->varchar('descricao');
            $table->varchar('nome');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('treino');
    }
};
