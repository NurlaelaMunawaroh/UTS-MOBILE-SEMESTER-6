<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Api\MatkulController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\DeadlineController;
use App\Http\Controllers\Api\SearchController;

Route::get('/search', [SearchController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('matkul', MatkulController::class);
Route::apiResource('deadline', DeadlineController::class);
Route::apiResource('jadwal', JadwalController::class);
Route::put('/deadline/{id}/status', [DeadlineController::class, 'updateStatus']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [TaskController::class, 'dashboard']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
});