<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - MyProfile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .login-bg {
            min-height: 100vh;
            background: linear-gradient(rgba(10, 20, 35, 0.65), rgba(10, 20, 35, 0.65)),
                        url('{{ asset("images/unpam-building.jpg") }}') center center / cover no-repeat fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            border: none;
        }

        .login-card-header {
            background-color: #ffc107;
            color: #212529;
            text-align: center;
            padding: 18px 20px;
            font-size: 1.35rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .login-card-body {
            padding: 30px;
        }

        .form-label {
            font-size: 0.95rem;
            color: #495057;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .form-control {
            border-radius: 6px;
            padding: 10px 14px;
            font-size: 0.95rem;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
        }

        .btn-login {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
            font-weight: 700;
            padding: 11px;
            border-radius: 6px;
            font-size: 1rem;
            width: 100%;
            transition: all 0.2s ease-in-out;
        }

        .btn-login:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            color: #111;
        }

        .demo-text {
            color: #6c757d;
            font-size: 0.88rem;
            text-align: center;
            margin-top: 22px;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="login-bg">
        <div class="login-card">
            <div class="login-card-header">
                Admin Login
            </div>
            <div class="login-card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show py-2 px-3 small" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close py-2 px-3" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show py-2 px-3 small" role="alert">
                        {{ $errors->first() }}
                        <button type="button" class="btn-close py-2 px-3" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autocomplete="email" 
                               autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               required 
                               autocomplete="current-password">
                    </div>

                    <button type="submit" class="btn btn-login">
                        Login
                    </button>

                    <p class="demo-text">
                        Demo Login : <strong>admin@example.com</strong> / <strong>password</strong>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
