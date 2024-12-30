<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function login()
    {

         // API endpoint URL
         $url = 'http://127.0.0.1:8000/api/login';

        
         $response = Http::asForm()
             ->withHeaders([
                 'Accept' => 'application/json',
             ])
             ->post($url, [
                 'email' => 'aye@gmail.com',
                 'password' => 'Asd123!@#',
             ]);
 
        
         if ($response->successful()) {
             return response()->json([
                 'success' => true,
                 'data' => $response->json(),
             ]);
         }
 
        
         return response()->json([
             'success' => false,
             'message' => $response->body(),
         ], $response->status());
    }
        
    public function loginFromMicroservice()
    {
        // API endpoint URL
        $url = 'http://127.0.0.1:8000/api/login';

        // Request data
        $data = [
            'email' => 'aye@gmail.com',
            'password' => 'Asd123!@#',
        ];

        // Sending POST request to microservice
        $response = Http::asForm()
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->post($url, $data);

        // Check if the request was successful
        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'data' => $response->json(),
            ]);
        }

        // Return error response
        return response()->json([
            'success' => false,
            'message' => $response->body(),
        ], $response->status());
    }
}
