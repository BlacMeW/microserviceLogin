<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\MicroserviceLoginMiddleware;

// API Route with Middleware
Route::post('/protected-route', function (Request $request) {
    return response()->json([
        'success' => true,
        'message' => 'API Route executed successfully.',
        'data' => $request->all(),
    ]);
})->middleware('microservice.login')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);


// // API Route with Middleware
// Route::get('/protected-route', function (Request $request) {
//     return response()->json([
//         'success' => true,
//         'message' => 'API Route executed successfully.',
//         'data' => $request->all(),
//     ]);
// })->middleware('microservice.login');


Route::get('/protected-route', function (\Illuminate\Http\Request $request) {
    return response()->json([
        'success' => true,
        'message' => 'Middleware executed successfully.',
        'data' => $request->get('microservice_response'),
    ]);
})->middleware('microservice.login');