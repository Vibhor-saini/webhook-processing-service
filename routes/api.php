<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/webhook/{key}', function ($key) {
    return response()->json([
        'message' => 'Webhook endpoint reached',
        'key' => $key
    ]);
});