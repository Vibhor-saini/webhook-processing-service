<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('webhook')->middleware('webhook.verify')->group(function () {
Route::post('/{key}', [WebhookController::class, 'receive']);
});

// 3A3hMjtmYRcUcV10gdi3A2QsYtF_WoayGXT7vQN94fPiYxMf
// ngrok config add-authtoken 3A3hMjtmYRcUcV10gdi3A2QsYtF_WoayGXT7vQN94fPiYxMf

// https://jenee-multilaciniate-chin.ngrok-free.dev/api/webhook/sumit63542