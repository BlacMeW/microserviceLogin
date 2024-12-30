<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Define a route for microservice login
Route::get('/microservice-login', [AuthController::class, 'loginFromMicroservice']);


Route::get('/login', [AuthController::class, 'login']);