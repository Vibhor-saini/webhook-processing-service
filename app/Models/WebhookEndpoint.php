<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookEndpoint extends Model
{
    protected $table = 'webhook_endpoints';

    protected $fillable = [
        'name',
        'webhook_key'
    ];
}
