<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\WebhookEvent;
use App\Handlers\UserCreatedHandler;

class ProcessWebhookEvent implements ShouldQueue
{
    use Queueable;

    protected $store_event;
    public function __construct(WebhookEvent $incoming_event)
    {
        $this->store_event = $incoming_event;
    }

    /**
     * Execute the job.
     */
public function handle(): void
{
    $event = $this->store_event;

    if ($event->event_name === 'user.created') {
        (new UserCreatedHandler())->handle($event);
    } else {
        \Log::info('No handler for event: ' . $event->event_name);
    }
}
}
