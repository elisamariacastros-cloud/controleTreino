<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('login');
})->name('login'); 

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/acessar', function () {
    return view('home');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/concluido', function () {
    return view('login');
});

// CRUD Treino 
Route::resource('treinos', TreinoController::class);

// CRUD Ficha 
 Route::resource('fichas', FichaController::class);

// CRUD Aluno
Route::resource('alunos', AlunoController::class)->middleware('auth');


