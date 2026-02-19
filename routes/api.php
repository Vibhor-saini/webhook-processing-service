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
