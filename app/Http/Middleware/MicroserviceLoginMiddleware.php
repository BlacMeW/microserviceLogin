<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MicroserviceLoginMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $url = 'http://127.0.0.1:8000/api/login';

        $response = Http::asForm()
            ->withHeaders([
                'Accept' => 'application/json',
            ])
            ->post($url, $request->only('email', 'password'));

        if (!$response->successful()) {
            return response()->json([
                'success' => false,
                'message' => 'Microservice authentication failed.',
                'details' => $response->body(),
            ], $response->status());
        }

        $request->merge(['microservice_response' => $response->json()]);
        return $next($request);
    }
}
