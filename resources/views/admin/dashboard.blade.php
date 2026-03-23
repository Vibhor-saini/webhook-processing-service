<!DOCTYPE html>
<html>

<head>
    <title>Webhook Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 40px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            width: 200px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            margin: 0;
            font-size: 32px;
        }

        .card p {
            margin: 5px 0 0;
            color: #555;
        }

        .total {
            border-left: 5px solid #3498db;
        }

        .processed {
            border-left: 5px solid #2ecc71;
        }

        .failed {
            border-left: 5px solid #e74c3c;
        }

        .pending {
            border-left: 5px solid #f39c12;
        }
    </style>
</head>

<body>

    <h1>Webhook Dashboard</h1>

    <form method="POST" action="/admin/logout" style="margin-bottom:20px;">
        @csrf
        <button style="padding:8px 12px;background:#e74c3c;color:white;border:none;border-radius:4px;cursor:pointer;">
            Logout
        </button>
    </form>

    <div class="cards">

        <div class="card total">
            <h2>{{ $total }}</h2>
            <p>Total Events</p>
        </div>

        <div class="card processed">
            <h2>{{ $processed }}</h2>
            <p>Processed</p>
        </div>

        <div class="card failed">
            <h2>{{ $failed }}</h2>
            <p>Failed</p>
        </div>

        <div class="card pending">
            <h2>{{ $pending }}</h2>
            <p>Pending</p>
        </div>

    </div>



</body>

</html>