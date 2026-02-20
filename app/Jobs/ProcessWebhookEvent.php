<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\WebhookEvent;

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
        \Log::info('Processing webhook event ID: ' . $this->store_event->id);
    }
}
