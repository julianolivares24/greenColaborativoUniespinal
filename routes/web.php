<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;

Route::get('/saludo', [SaludoController::class, 'index']);

