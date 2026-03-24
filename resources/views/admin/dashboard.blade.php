@extends('admin.layout')

@section('content')

<h1>Webhook Dashboard</h1>

<div style="display:flex; gap:20px; margin-top:20px;">

    <div style="background:white;padding:20px;border-radius:8px;width:200px;">
        <h2>{{ $total }}</h2>
        <p>Total Events</p>
    </div>

    <div style="background:#2ecc71;color:white;padding:20px;border-radius:8px;width:200px;">
        <h2>{{ $processed }}</h2>
        <p>Processed</p>
    </div>

    <div style="background:#e74c3c;color:white;padding:20px;border-radius:8px;width:200px;">
        <h2>{{ $failed }}</h2>
        <p>Failed</p>
    </div>

    <div style="background:#f39c12;color:white;padding:20px;border-radius:8px;width:200px;">
        <h2>{{ $pending }}</h2>
        <p>Pending</p>
    </div>

</div>

@endsection