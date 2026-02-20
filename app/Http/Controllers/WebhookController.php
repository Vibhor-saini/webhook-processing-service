<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WebhookEvent;
use App\Models\WebhookEndpoint;

class WebhookController extends Controller
{
public function receive($key, Request $request)
{
    // find endpoint
    $endpoint = WebhookEndpoint::where('webhook_key', $key)->first();

    // get JSON payload
    $payload = $request->all();

    // detect event name
    $eventName = $payload['event'] ?? null;

    // store event
    WebhookEvent::create([
        'webhook_endpoint_id' => $endpoint->id,
        'event_name' => $eventName,
        'payload' => $payload
    ]);

    return response()->json([
        'status' => 'event stored'
    ]);
}

}
