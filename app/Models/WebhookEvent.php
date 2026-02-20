<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookEvent extends Model
{
    protected $fillable = [
        'webhook_endpoint_id',
        'event_name',
        'provider_event_id',
        'payload',
        'status'
    ];

    protected $casts = [
        'payload' => 'array'
    ];
}
