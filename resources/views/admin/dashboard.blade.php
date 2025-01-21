<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }

        body {
            /* background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%), url('{{ asset('img/admin-background.png') }}'); */
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%), url('{{ asset('img/admin-background.png') }}') !important;
            background-size: cover; /* Ensures the image covers the entire background */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat;/* Prevents the image from repeating */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 700px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        h1 {
            color: #4A5568;
            font-size: 2.8rem;
            margin-bottom: 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        h2 {
            color: #2D3748;
            font-size: 1.75rem;
            margin-bottom: 15px;
            font-weight: 500;
        }

        ul {
            margin-top: 15px;
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 10px;
        }

        a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            background-color: #4299E1;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            background-color: #2B6CB0;
            color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .logout-btn {
            display: inline-block;
            background-color: #E53E3E;
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            margin-top: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logout-btn:hover {
            background-color: #C53030;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 15px;
        }

        .nav a {
            flex: 1;
            text-align: center;
            padding: 12px 20px;
        }

        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(45deg);
            z-index: 1;
            animation: animateBg 6s linear infinite;
        }

        @keyframes animateBg {
            0% {
                transform: rotate(45deg) translate(0, 0);
            }
            100% {
                transform: rotate(45deg) translate(-50%, -50%);
            }
        }

        .container > * {
            position: relative;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to Admin Dashboard</h1>

        <div class="nav">
            <a href="{{ route('admin.music.index') }}">Manage Music</a>
            <a href="{{ route('admin.createMusic') }}">Add New Music</a>
        </div>
        <div class="nav">
            <a href="{{ route('admin.video.index') }}">Manage Videos</a>
            <a href="{{ route('admin.video.create') }}">Add New Video</a>
        </div>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">
            Logout
        </a>
    </div>

</body>
</html>
