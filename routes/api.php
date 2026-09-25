<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // dados da tela de perfil
    Route::get('/me', fn (Request $request) => $request->user());

    // fichas do aluno logado
    Route::get('/minha-ficha', function (Request $request) {
        return $request->user()
            ->fichas()
            ->with('treinos.treinoExercicios.exercicio')
            ->get();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});