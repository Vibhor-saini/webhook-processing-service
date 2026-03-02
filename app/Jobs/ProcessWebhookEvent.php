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

    try {

        if ($event->event_name === 'booking.created') {
            // future me booking handler aayega
            \Log::info('Booking created event handled');
        } else {
            \Log::info('No handler for event: ' . $event->event_name);
        }

        // SUCCESS
        $event->status = 'processed';
        $event->save();

    } catch (\Exception $e) {

        // FAILURE
        $event->status = 'failed';
        $event->save();

        throw $e; // Laravel ko batana zaruri (failed_jobs me jayegi)
    }
}
}
