<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\TaskController;
 
// Route::get('/tasks', [TaskController::class, 'index']);
// Route::post('/tasks', [TaskController::class, 'store']);
// Route::get('/tasks/{id}', [TaskController::class, 'show']);
// Route::put('/tasks/{id}', [TaskController::class, 'update']);
// Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

// //new routes
// Route::apiResource('tasks', TaskController::class)
//     ->where(['task' => '[0-9]+']);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
 
Route::prefix('v1')->name('api.v1.')->group(function () {
 
    Route::apiResource('tasks', TaskController::class)
        ->where(['task' => '[0-9]+'])
        ->only(['index', 'show']);
 
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('tasks', TaskController::class)
            ->where(['task' => '[0-9]+'])
            ->except(['index', 'show']);
    });
});
