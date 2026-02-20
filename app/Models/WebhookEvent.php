<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookEvent extends Model
{
    protected $fillable = [
        'webhook_endpoint_id',
        'event_name',
        'payload'
    ];

    protected $casts = [
        'payload' => 'array'
    ];
}
