<?php

use App\Http\Controllers\{
    PostController,
    CreateUserController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/registrar', function () {
    return view('registrar');
})->name('registrar');

Route::get('/registrando', 'App\Http\Controllers\Authenticate@criarUsuario')->name('registrando');

Route::get('/login', function () {
    return view('login');
})->name('pgLogin');

Route::get('/objetivo', [PostController::class, 'objetivo'])->name('objetivo');

Route::get('/editObjetivo', [PostController::class, 'editObjetivo'])->name('editObjetivo');

Route::post('/updateObjetivo/{id}', [PostController::class, 'updateObjetivo']);

Route::get('/loginFunc', 'App\Http\Controllers\Authenticate@login')->name('login');

Route::get('/logout', 'App\Http\Controllers\Authenticate@logout')->name('logout');

Route::post('/', [PostController::class, 'salvar']);

Route::delete('/{id}', [PostController::class, 'destroy']);

Route::get('/edit/{id}', [PostController::class, 'edit']);

Route::post('/update/{id}', [PostController::class, 'update']);

Route::get('/solicitacoes', [PostController::class, 'solicitacoes'])->name('solicitacoes');

Route::get('/acessos', [PostController::class, 'acessos'])->name('acessos');

Route::delete('/excluirUser/{id}', [PostController::class, 'destroyUser']);

Route::get('/editUser/{id}', [PostController::class, 'editUser']);

Route::post('/updateUser/{id}', [PostController::class, 'updateUser']);