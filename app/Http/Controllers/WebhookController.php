<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function receive($key)
{
    return response()->json([
        'message' => 'Webhook reached controller',
        'key' => $key
    ]);
}

}
