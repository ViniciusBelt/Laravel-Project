<?php

use App\Http\Controllers\{
    PostController,
    CreateUserController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registrar', function () {
    return view('registrar');
})->name('registrar');

Route::get('/registrando', 'App\Http\Controllers\CreateUserController@criarUsuario')->name('registrando');

Route::post('/', [PostController::class, 'salvar']);

Route::delete('/{id}', [PostController::class, 'destroy']);

Route::get('/edit/{id}', [PostController::class, 'edit']);

Route::post('/update/{id}', [PostController::class, 'update']);