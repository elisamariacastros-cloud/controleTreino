<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExercicioController;


Auth::routes(); 

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/acessar', function () {
    return view('home');
})->name('acessar')->middleware('auth');

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/concluido', function () {
    return view('login');
});

// CRUD Treino 
Route::resource('treinos', TreinoController::class)->middleware('auth');

// CRUD Ficha 
Route::resource('fichas', FichaController::class)->middleware('auth');

// CRUD Aluno
Route::resource('alunos', AlunoController::class)->middleware('auth');

// CRUD Exercicio
Route::resource('exercicios', ExercicioController::class)->middleware('auth');

// Criar treino com ficha_id
Route::get('treinos/create/{ficha_id}', [TreinoController::class, 'create'])->name('treinos.create')->middleware('auth');

// Reordenar exercícios do treino (AJAX)
Route::post('treinos/{id}/reorder', [TreinoController::class, 'reorder'])->name('treinos.reorder')->middleware('auth');