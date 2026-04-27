@extends('layouts.app')
@section('title', 'Login — Task Manager')
@section('styles')
    <style>
        @media (max-width: 576px) {
            body {
                align-items: flex-start;
                padding-top: 40px;
            }
        }
        body {
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background: white;
            border-radius: 10px;
            padding: 32px 20px;
            width: 100%;
            max-width: 460px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            margin: 16px;
        }
        .icon-wrapper {
            width: 48px;
            height: 48px;
            background-color: #e6f4f1;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }
        .icon-wrapper i {
            font-size: 1.5rem;
            color: #1a7a6e;
        }
        h2 {
            font-size: 1.3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 6px;
        }
        .subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 28px;
        }
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #374151;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px 14px;
            border: 1.5px solid #d1d5db;
            font-size: 0.95rem;
        }
        .form-control:focus {
            border-color: #1a7a6e;
            box-shadow: 0 0 0 3px rgba(26,122,110,0.15);
        }
        .forgot-link {
            font-size: 0.85rem;
            color: #1a7a6e;
            text-decoration: none;
            font-weight: 500;
        }
        .forgot-link:hover { text-decoration: underline; }
        .btn-login {
            background-color: #1a7a6e;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            width: 100%;
            transition: background 0.2s;
        }
        .btn-login:hover { background-color: #155f55; color: white; }
        .signup-text {
            text-align: center;
            font-size: 0.875rem;
            color: #6b7280;
            margin-top: 20px;
        }
        .signup-text a {
            color: #1a7a6e;
            font-weight: 600;
            text-decoration: none;
        }
        .signup-text a:hover { text-decoration: underline; }
        .password-wrapper { position: relative; }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9ca3af;
            background: none;
            border: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="icon-wrapper">
            <i class="bi bi-check2-square"></i>
        </div>

        <h2>Hallo cuy! Selamat Datang</h2>
        <p class="subtitle">Masukkin username sama password dulu yak</p>

        @if(request('error'))
        <div style="
            background:#fef2f2;
            color:#ef4444;
            border-radius:8px;
            padding:10px 14px;
            font-size:0.875rem;
            text-align:center;
            margin-bottom:16px;">
            <i class="bi bi-exclamation-circle me-1"></i>{{ request('error') }}
        </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username"
                       class="form-control" placeholder="username" required>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <label for="password" class="form-label mb-0">Password</label>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>
                <div class="password-wrapper mt-1">
                    <input type="password" name="password" id="password"
                           class="form-control" placeholder="Password" required>
                    <button type="button" class="toggle-password" onclick="togglePassword()">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="remember">
                <label class="form-check-label" for="remember" style="font-size:0.9rem;">
                    Remember me
                </label>
            </div>

            <button type="submit" class="btn-login">Log in</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }
    </script>
</body>
</html>

