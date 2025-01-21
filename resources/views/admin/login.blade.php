<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>ADMIN LOGIN</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js',])
    <style>
        .error-message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <h3>Admin Login</h3>

        {{-- Display error message if exists --}}
        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <label for="username">Email</label>
        <input type="email" name="email" placeholder="Admin Email" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required>
        
        <button type="submit">Login</button>
        
    </form>
</body>
</html>
