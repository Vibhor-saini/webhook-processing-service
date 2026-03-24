@extends('admin.layout')

@section('content')

<h1>Webhook Events</h1>

@if(session('success'))
    <div style="background:#2ecc71;color:white;padding:10px;margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

<table style="width:100%;border-collapse:collapse;background:white;margin-top:20px;">

    <thead>
        <tr style="background:#333;color:white;">
            <th style="padding:10px;">ID</th>
            <th>Event</th>
            <th>Status</th>
            <th>Endpoint</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

        @foreach($events as $event)

        <tr style="border-bottom:1px solid #ddd;">
            <td style="padding:10px;">{{ $event->id }}</td>

            <td>{{ $event->event_name }}</td>

            <td>
                <span style="
                    padding:5px 8px;
                    color:white;
                    border-radius:4px;
                    background:
                        {{ $event->status == 'processed' ? '#2ecc71' : '' }}
                        {{ $event->status == 'failed' ? '#e74c3c' : '' }}
                        {{ $event->status == 'pending' ? '#f39c12' : '' }}
                ">
                    {{ $event->status }}
                </span>
            </td>

            <td>{{ $event->endpoint->name ?? '-' }}</td>

            <td>{{ $event->created_at }}</td>

            <td>
                @if($event->status === 'failed')

                <form method="POST" action="/events/{{ $event->id }}/retry">
                    @csrf
                    <button style="padding:6px 10px;background:#3498db;color:white;border:none;border-radius:4px;cursor:pointer;">
                        Retry
                    </button>
                </form>

                @else
                    -
                @endif
            </td>
        </tr>

        @endforeach

    </tbody>

</table>

@endsection