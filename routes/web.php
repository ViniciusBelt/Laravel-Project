<?php

use App\Http\Controllers\{
    PostController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::post('/', [PostController::class, 'salvar']);

Route::delete('/{id}', [PostController::class, 'destroy']);

Route::get('/edit/{id}', [PostController::class, 'edit']);

Route::post('/update/{id}', [PostController::class, 'update']);

Route::get('/login', function () {
    return view('welcome');
});
