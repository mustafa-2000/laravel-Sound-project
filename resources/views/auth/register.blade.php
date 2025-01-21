<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <link rel="stylesheet" href="registration-style.css">
</head>
<body>
    <section>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
        
        <!-- Repeat span elements as per your original design -->
        <div class="signin">
            <div class="content">
                <h2>Register</h2>
                <form method="POST" action="{{ route('register') }}" class="form">
                    @csrf
                    <div class="inputBox">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        <i>Username</i>
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="inputBox">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                        <i>Email</i>
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="inputBox">
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                        <i>Password</i>
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="inputBox">
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                        <i>Confirm Password</i>
                        @error('password_confirmation')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="links">
                        <a href="{{ route('login') }}">Already registered?</a>
                    </div>
                    
                    <div class="inputBox">
                        <input type="submit" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
