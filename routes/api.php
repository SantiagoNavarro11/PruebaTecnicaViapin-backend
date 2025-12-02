<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);          // Listar todos
    Route::get('{id}', [UserController::class, 'show']);       // Ver usuario
    Route::post('/', [UserController::class, 'store']);        // Crear usuario
    Route::put('{id}', [UserController::class, 'update']);    // Actualizar usuario
    Route::delete('{id}', [UserController::class, 'destroy']); // Eliminar usuario
});
