<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f5f5;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .login-box{
            background:white;
            padding:30px;
            border-radius:8px;
            width:300px;
            box-shadow:0 2px 6px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        input{
            width:100%;
            padding:10px;
            margin-bottom:15px;
            border:1px solid #ddd;
            border-radius:4px;
        }

        button{
            width:100%;
            padding:10px;
            background:#3498db;
            color:white;
            border:none;
            border-radius:4px;
            cursor:pointer;
        }

        button:hover{
            background:#2980b9;
        }

        .error{
            background:#e74c3c;
            color:white;
            padding:10px;
            margin-bottom:15px;
            text-align:center;
        }

    </style>
</head>

<body>

<div class="login-box">

    <h2>Admin Login</h2>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/admin/login">
        @csrf

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

</div>

</body>
</html>