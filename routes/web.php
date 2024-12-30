<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\MicroserviceLoginMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Define a route for microservice login
Route::get('/microservice-login', [AuthController::class, 'loginFromMicroservice']);


Route::get('/login', [AuthController::class, 'login']);

// Route::get('/protected-route', function (\Illuminate\Http\Request $request) {
//     return response()->json([
//         'success' => true,
//         'message' => 'Middleware executed successfully.',
//         'data' => $request->get('microservice_response'),
//     ]);
// })->middleware(MicroserviceLoginMiddleware::class);


Route::get('/protected-route', function (\Illuminate\Http\Request $request) {
    return response()->json([
        'success' => true,
        'message' => 'Middleware executed successfully.',
        'data' => $request->get('microservice_response'),
    ]);
})->middleware('microservice.login');