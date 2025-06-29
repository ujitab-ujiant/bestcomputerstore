<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Best Computer Service</title>
    @vite(['resources/css/login.css'])
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <a href="/" class="back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <h1>Login</h1>
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <span class="input-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <span class="input-icon">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="password-toggle" onclick="togglePassword()">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </span>
                </div>
                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
        <div class="image-side" style="background-image: url('{{ asset('img/loginform.jpg') }}');">
            <div class="image-overlay"></div>
            <div class="image-content">
                <h2>Best Computer</h2>
                <p>Manajemen Sistem Informasi</p>
            </div>
        </div>
    </div>
    
    <div class="footer">
        Best Computer 2025 &copy; All Rights Reserved
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}</script>
</html>