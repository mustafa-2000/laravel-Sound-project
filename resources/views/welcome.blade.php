<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Music Portal</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('/img/bg_pic1_b.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .welcome-container {
            text-align: center;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.8);
            width: 500px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
        }
        p {
            margin-bottom: 30px;
            color: #666;
            font-size: 1.2rem;
        }
        a {
            text-decoration: none;
            padding: 10px 20px;
            border: 1px solid #3490dc;
            border-radius: 5px;
            color: #3490dc;
            transition: background 0.3s;
            font-size: 1.2rem;
        }
        a:hover {
            background: #3490dc;
            color: white;
        }
        .music-icon {
            font-size: 4rem;
            color: #ff69b4;
            margin-bottom: 20px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .button-container a {
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <i class="fas fa-music music-icon"></i>
        <h1>Welcome to Our Music Portal</h1>
        <p>Your one-stop solution for music and video management.</p>
        <div class="button-container">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                    <!-- Admin Login Link -->
                    @if (Route::has('admin.login'))
                        <a href="{{ route('admin.login') }}">Admin</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>