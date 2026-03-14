<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebhookEvent;
use App\Http\Resources\WebhookEventResource;
use App\Jobs\ProcessWebhookEvent;

class WebhookAdminController extends Controller
{
    public function index()
    {
        $events = WebhookEvent::with('endpoint')
            ->latest()
            ->paginate(10);

        return WebhookEventResource::collection($events);
    }


    public function failed()
    {
        $events = WebhookEvent::with('endpoint')
            ->where('status', 'failed')
            ->latest()
            ->get();

        return WebhookEventResource::collection($events);
    }


    public function retry($id)
    {
        $event = WebhookEvent::findOrFail($id);
        ProcessWebhookEvent::dispatch($event);

        // return response()->json([
        //     'message' => 'Webhook event re-dispatched to queue'
            
        // ]);
        return redirect()->back()->with('success','Webhook retried');
    }
}
