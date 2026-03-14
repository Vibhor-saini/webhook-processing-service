<?php

use Illuminate\Support\Facades\Route;
use App\Models\WebhookEndpoint;
use App\Models\WebhookEvent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {

    $total = WebhookEvent::count();
    $processed = WebhookEvent::where('status','processed')->count();
    $failed = WebhookEvent::where('status','failed')->count();
    $pending = WebhookEvent::where('status','pending')->count();

    return view('admin.dashboard', compact(
        'total',
        'processed',
        'failed',
        'pending'
    ));
});


Route::get('/admin/events', function () {

    $events = WebhookEvent::with('endpoint')
                ->latest()
                ->limit(50)
                ->get();

    return view('admin.events', compact('events'));
});

Route::get('/create-key', function () {

    WebhookEndpoint::create([
        'name' => 'Rohit Plumbing',
        'webhook_key' => 'rohit123'
    ]);

    return "Webhook key created";
});

