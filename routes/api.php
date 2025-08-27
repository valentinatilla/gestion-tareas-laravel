<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Middleware\EnsureTokenIsValid;

// Rutas públicas que no necesitan token
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}/tasks', [UserController::class, 'userTasks']);

// Grupo de rutas protegidas por el middleware del token
Route::middleware(EnsureTokenIsValid::class)->group(function () {
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
});