<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("posts", PostController::class)->except('index', 'show')->middleware('auth:sanctum');
Route::apiResource("posts", PostController::class)->only('index', 'show');

Route::post("/register", [AuthController::class, 'register'] );
Route::post("/login", [AuthController::class, 'login'] );
Route::post("/logout", [AuthController::class, 'logout'] )->middleware('auth:sanctum');
