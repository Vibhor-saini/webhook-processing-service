<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f5f5;
            margin:0;
        }

        .navbar{
            background:#2c3e50;
            padding:15px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .nav-left a{
            color:white;
            margin-right:15px;
            text-decoration:none;
            font-weight:bold;
        }

        .nav-left a:hover{
            text-decoration:underline;
        }

        .logout-btn{
            background:#e74c3c;
            color:white;
            border:none;
            padding:8px 12px;
            cursor:pointer;
            border-radius:4px;
        }

        .container{
            padding:30px;
        }
    </style>
</head>

<body>

<div class="navbar">
    <div class="nav-left">
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/admin/events">Events</a>
    </div>

    <form method="POST" action="/admin/logout">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>