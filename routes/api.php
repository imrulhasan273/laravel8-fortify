<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('/tasks', TaskController::class)->middleware('auth:api');
# Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/tasks/search/{title}', [TaskController::class, 'search']);
