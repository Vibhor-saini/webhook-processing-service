<?php

use Illuminate\Support\Facades\Route;
use App\Models\WebhookEndpoint;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-key', function () {

    WebhookEndpoint::create([
        'name' => 'Rohit Plumbing',
        'webhook_key' => 'rohit123'
    ]);

    return "Webhook key created";
});