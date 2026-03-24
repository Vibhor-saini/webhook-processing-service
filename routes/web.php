<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\WebhookEndpoint;
use App\Models\WebhookEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\WebhookAdminController;

// Route::get('/', function () {
//     return view('admin.login');
// });


Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::post('/admin/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect('/admin/dashboard');
    }
    return back()->with('error', 'Invalid credentials');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        $total = WebhookEvent::count();
        $processed = WebhookEvent::where('status', 'processed')->count();
        $failed = WebhookEvent::where('status', 'failed')->count();
        $pending = WebhookEvent::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'total',
            'processed',
            'failed',
            'pending'
        ));
    });


    Route::get('/admin/events', function () {
        $events = WebhookEvent::with('endpoint')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.events', compact('events'));
    });
    
    Route::get('/events', [WebhookAdminController::class, 'index']);
    Route::get('/events/failed', [WebhookAdminController::class, 'failed']);
    Route::post('/events/{id}/retry', [WebhookAdminController::class, 'retry']);
});

Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/admin/login');
});

// ------------------------------------------------------------------
Route::get('/create-key', function () {
    $plainKey = 'whk_' . Str::random(40);
    WebhookEndpoint::create([
        'name'        => 'Vishal Shop',
        'webhook_key' => $plainKey,
        'key_preview' => substr($plainKey, 0, 12) . '...',
    ]);

    return "Key created: " . $plainKey;
});
