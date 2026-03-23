<?php

use Illuminate\Support\Facades\Route;
use App\Models\WebhookEndpoint;
use App\Models\WebhookEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->limit(50)
            ->get();

        return view('admin.events', compact('events'));
    });
});

Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/admin/login');
});


Route::get('/create-key', function () {
    WebhookEndpoint::create([
        'name' => 'Rohit Plumbing',
        'webhook_key' => 'rohit123'
    ]);
    return "Webhook key created";
});
