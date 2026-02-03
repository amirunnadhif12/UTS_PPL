<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PT Assabar Sukses Berkah</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --primary: #1a5632;
            --primary-dark: #0f3d22;
            --secondary: #d4af37;
            --secondary-dark: #b8962e;
            --dark: #1a1a2e;
            --dark-light: #252542;
            --light: #f8f9fa;
            --cream: #faf8f5;
            --danger: #dc3545;
            --gold-gradient: linear-gradient(135deg, #d4af37 0%, #f4d06f 50%, #d4af37 100%);
            --islamic-gradient: linear-gradient(135deg, #1a5632 0%, #0f3d22 50%, #1a5632 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        /* Islamic Pattern Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4af37' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 1;
        }

        /* Decorative Elements */
        .decoration {
            position: fixed;
            border-radius: 50%;
            background: var(--gold-gradient);
            opacity: 0.1;
            z-index: 0;
        }

        .decoration-1 {
            width: 400px;
            height: 400px;
            top: -200px;
            right: -100px;
        }

        .decoration-2 {
            width: 300px;
            height: 300px;
            bottom: -150px;
            left: -100px;
        }

        .decoration-3 {
            width: 200px;
            height: 200px;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 10;
        }

        .login-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(180deg, var(--dark) 0%, var(--dark-light) 100%);
            padding: 3rem 2rem 4rem;
            text-align: center;
            position: relative;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4af37' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .login-logo {
            width: 80px;
            height: 80px;
            background: var(--gold-gradient);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            position: relative;
            z-index: 2;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
        }

        .login-logo i {
            font-size: 2.2rem;
            color: var(--dark);
        }

        .login-header h1 {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .login-header p {
            color: var(--secondary);
            font-size: 0.9rem;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }

        .login-body {
            padding: 3.5rem 2.5rem 2.5rem;
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 2rem;
        }

        .welcome-text h2 {
            font-size: 1.4rem;
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .welcome-text p {
            color: #888;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .input-group {
            position: relative;
        }

        .input-group i.input-icon {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            transition: color 0.3s ease;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3.2rem;
            border: 2px solid #e8e8e8;
            border-radius: 14px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(26, 86, 50, 0.1);
        }

        .form-control:hover {
            border-color: #ccc;
        }

        .input-group:focus-within i.input-icon {
            color: var(--primary);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            padding: 0.5rem;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 2rem;
        }

        .form-check input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--primary);
            cursor: pointer;
            border-radius: 4px;
        }

        .form-check label {
            font-size: 0.9rem;
            color: #666;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 1.1rem;
            background: var(--islamic-gradient);
            color: white;
            border: none;
            border-radius: 14px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            box-shadow: 0 6px 25px rgba(26, 86, 50, 0.35);
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 35px rgba(26, 86, 50, 0.45);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            padding: 1.5rem 2rem;
            background: var(--cream);
            border-top: 1px solid #eee;
        }

        .login-footer p {
            color: #888;
            font-size: 0.85rem;
        }

        .login-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: var(--primary-dark);
        }

        .alert {
            padding: 1rem 1.2rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            animation: shake 0.5s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert i {
            font-size: 1.1rem;
        }

        /* Back to home link */
        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
            position: relative;
            z-index: 10;
        }

        .back-link:hover {
            color: var(--secondary);
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-body {
                padding: 3rem 1.5rem 2rem;
            }

            .login-header {
                padding: 2.5rem 1.5rem 3.5rem;
            }

            .login-logo {
                width: 70px;
                height: 70px;
            }

            .login-logo i {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Decorative Elements -->
    <div class="decoration decoration-1"></div>
    <div class="decoration decoration-2"></div>
    <div class="decoration decoration-3"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">
                    <i class="fas fa-mosque"></i>
                </div>
                <h1>Admin Panel</h1>
                <p>PT Assabar Sukses Berkah</p>
            </div>

            <div class="login-body">
                <div class="welcome-text">
                    <h2>Selamat Datang!</h2>
                    <p>Silakan login untuk mengakses dashboard admin</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <input 
                                type="email" 
                                name="email" 
                                class="form-control" 
                                placeholder="Masukkan email anda"
                                value="{{ old('email') }}"
                                required
                            >
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                class="form-control" 
                                placeholder="Masukkan password anda"
                                required
                            >
                            <i class="fas fa-lock input-icon"></i>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Ingat saya di perangkat ini</label>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        Masuk ke Dashboard
                    </button>
                </form>
            </div>

            <div class="login-footer">
                <p>© {{ date('Y') }} PT Assabar Sukses Berkah. All rights reserved.</p>
            </div>
        </div>

        <a href="/" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Halaman Utama
        </a>
    </div>

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
        }
    </script>
</body>
</html>
