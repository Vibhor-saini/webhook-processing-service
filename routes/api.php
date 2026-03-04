<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\DB;
use App\Models\WebhookEvent;
use App\Http\Resources\WebhookEventResource;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('webhook')->middleware('webhook.verify')->group(function () {
    Route::post('/{key}', [WebhookController::class, 'receive']);
});

// Route::get('/nplus1-test', function () {

//     DB::enableQueryLog();
//     // $events = WebhookEvent::all();  //n+1 problem [eager loading]
//     $events = WebhookEvent::with('endpoint')->get();

//     foreach ($events as $event) {
//         $event->endpoint->name;
//     }

//     return DB::getQueryLog();
// });

Route::get('/events', function () {

    $events = WebhookEvent::with('endpoint')->get();
    return WebhookEventResource::collection($events);
});

// 3A3hMjtmYRcUcV10gdi3A2QsYtF_WoayGXT7vQN94fPiYxMf
// ngrok config add-authtoken 3A3hMjtmYRcUcV10gdi3A2QsYtF_WoayGXT7vQN94fPiYxMf

// https://jenee-multilaciniate-chin.ngrok-free.dev/api/webhook/sumit63542