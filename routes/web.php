<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('layouts.home');
});
Route::get('/criarTreino', function () {
    return view('criarTreino');
});
Route::get('/treinos', function () {
    return view('treinos');
});
