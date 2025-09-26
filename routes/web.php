<?php

use Illuminate\Support\Facades\Route;
use App\Models\Rol;

Route::get('/', function () {
    return view('welcome');
});