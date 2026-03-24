<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Admin\WebhookAdminController;


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('admin-token')->plainTextToken;
    return response()->json([
        'token' => $token
    ]);
});



Route::prefix('webhook')->middleware('webhook.verify')->group(function () {
    Route::post('/{key}', [WebhookController::class, 'receive']);
});


Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/events', [WebhookAdminController::class, 'index']);
    Route::get('/events/failed', [WebhookAdminController::class, 'failed']);
    Route::post('/events/{id}/retry', [WebhookAdminController::class, 'retry']);
});
