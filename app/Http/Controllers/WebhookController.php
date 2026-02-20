<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WebhookEvent;
use App\Models\WebhookEndpoint;
use App\Jobs\ProcessWebhookEvent;

class WebhookController extends Controller
{
public function receive($key, Request $request)
{
    // find endpoint
    $endpoint = WebhookEndpoint::where('webhook_key', $key)->first();

    $payload = $request->all();

    // unique id from provider
    $providerEventId = $payload['event_id'] ?? null;

    // duplicate check
    if ($providerEventId) {
        $alreadyExists = WebhookEvent::where('provider_event_id', $providerEventId)->exists();

        if ($alreadyExists) {
            return response()->json([
                'status' => 'duplicate ignored'
            ]);
        }
    }

    // detect event name
    $eventName = $payload['event'] ?? null;

    // store event
    $event = WebhookEvent::create([
        'webhook_endpoint_id' => $endpoint->id,
        'event_name' => $eventName,
        'payload' => $payload,
        'provider_event_id' => $providerEventId,
        'received_at' => now(),
        'status' => 'pending'
    ]);

    ProcessWebhookEvent::dispatch($event);

    return response()->json([
        'status' => 'event stored'
    ]);
}

}
