<?php

namespace App\Handlers\Webhooks;

use App\Models\WebhookEvent;
use Illuminate\Support\Facades\Log;

class UserCreatedHandler
{
    public function handle(WebhookEvent $event)
    {
        // payload se data nikaalna
        $payload = $event->payload;

        $customerName = $payload['customer'] ?? 'Unknown';

        // simulate action (future me DB user create ho sakta)
        Log::info('User created event processed for: ' . $customerName);
    }
}