<?php

// routes/api.php
use App\Http\Controllers\Api\AuthController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',     [AuthController::class, 'me']);
    Route::post('/logout',[AuthController::class, 'logout']);

    // suas rotas protegidas
    Route::get('/tasks', fn() => Task::latest()->paginate());
});

