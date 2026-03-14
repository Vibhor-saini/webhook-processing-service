<!DOCTYPE html>
<html>
<head>
    <title>Webhook Events</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f5f5;
            padding:40px;
        }

        h1{
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse: collapse;
            background:white;
        }

        th, td{
            padding:12px;
            border-bottom:1px solid #ddd;
            text-align:left;
        }

        th{
            background:#333;
            color:white;
        }

        .status{
            padding:4px 8px;
            border-radius:4px;
            font-size:12px;
            color:white;
        }

        .processed{background:#2ecc71;}
        .failed{background:#e74c3c;}
        .pending{background:#f39c12;}

        .retry-btn{
            background:#3498db;
            color:white;
            padding:6px 10px;
            border:none;
            border-radius:4px;
            cursor:pointer;
        }

        .retry-btn:hover{
            background:#2980b9;
        }

    </style>

</head>

<body>

<h1>Webhook Events</h1>

<table>

    <thead>
        <tr>
            <th>ID</th>
            <th>Event</th>
            <th>Status</th>
            <th>Endpoint</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

        @foreach($events as $event)

        <tr>
            <td>{{ $event->id }}</td>

            <td>{{ $event->event_name }}</td>

            <td>
                <span class="status {{ $event->status }}">
                    {{ $event->status }}
                </span>
            </td>

            <td>{{ $event->endpoint->name ?? '-' }}</td>

            <td>{{ $event->created_at }}</td>

            <td>
                @if($event->status === 'failed')

                <form method="POST" action="/api/admin/events/{{ $event->id }}/retry">
                    @csrf
                    <button class="retry-btn">Retry</button>
                </form>

                @else
                    -
                @endif
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>
</html>