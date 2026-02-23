<?php

namespace App\Handlers;

use App\Models\WebhookEvent;
use Illuminate\Support\Facades\Log;

class UserCreatedHandler
{
    public function handle(WebhookEvent $event)
    {
        Log::info('User Created Handler Executed for event ID: ' . $event->id);

        // future: fetch user details from API
        // future: send to CRM / Google Sheet
    }
}