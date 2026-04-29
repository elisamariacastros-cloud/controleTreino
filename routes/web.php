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


Route::get('/criarTreino22', function () {
    return view('criarTreino');
});



Route::get('/treinos22', function () {
    return view('treinos');
});





Route::get('/home22', function () {
    return view('home');
});

