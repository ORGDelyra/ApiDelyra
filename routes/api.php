<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Rol;

Route::apiResource('rol', RolController::class);
Route::apiResource('user',UserController::class);
Route::apiResource('branch', BranchController::class);
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/inicio/sesion', [AuthController::class, 'login']);