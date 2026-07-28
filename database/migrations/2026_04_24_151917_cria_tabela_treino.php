<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('treinos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ficha_id')
                  ->constrained('fichas');

            $table->enum('tipo', ['a', 'b', 'c', 'd']);

            $table->string('nome');
            $table->text('descricao')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treinos');
    }
};