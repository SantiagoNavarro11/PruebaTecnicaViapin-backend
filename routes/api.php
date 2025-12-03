<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas API para tu aplicación.
| Se utiliza el middleware 'api' por defecto.
|
*/

// Agrupación de todas las rutas de gestión de usuarios bajo el prefijo 'users'.
Route::prefix('users')->group(function () {
    // GET /api/users
    // Muestra una lista de todos los colaboradores.
    Route::get('/', [UserController::class, 'index']);

    // GET /api/users/{id}
    // Muestra la información de un colaborador específico.
    Route::get('{id}', [UserController::class, 'show']);

    // POST /api/users
    // Crea un nuevo colaborador. Delega la validación a UserRequest.
    Route::post('/', [UserController::class, 'store']);

    // PUT /api/users/{id}
    // Actualiza los datos de un colaborador existente.
    Route::put('{id}', [UserController::class, 'update']);

    // DELETE /api/users/{id}
    // Elimina un colaborador.
    Route::delete('{id}', [UserController::class, 'destroy']);
});