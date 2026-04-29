<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('login');
});
Route::get('/criarTreino', function () {
    return view('criarTreino');
});


Route::get('/acessar', function () {
    return view('home');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/concluido', function () {
    return view('login');
});




Route::get('/treinos22', function () {
    return view('treinos');
});
Route::get('/fichas22', function () {
    return view('fichas');
});





Route::get('/home22', function () {
    return view('home');
});

Route::get('/criarTreino', function () {
    return view('criarTreino');
});
Route::get('/criarFicha', function () {
    return view('criarFicha');
});
Route::get('/editarTreino', function () {
    return view('editarTreino');
});

Route::get('/treinosCancelar', function () {
    return view('treinos');
});
Route::get('/fichaCancelar', function () {
    return view('treinos');
});