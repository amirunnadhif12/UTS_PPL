<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PT Assabar Sukses Berkah</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-[Poppins] min-h-screen flex items-center justify-center p-4 relative overflow-hidden" style="background: linear-gradient(135deg, #0d4f4f 0%, #1a6b6b 50%, #0a3d3d 100%);">
    
    <!-- Decorative Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <!-- Water Droplet Pattern -->
        <div class="absolute top-10 left-10 w-32 h-32 bg-gradient-to-br from-cyan-400/20 to-teal-500/10 rounded-full blur-2xl"></div>
        <div class="absolute top-1/4 right-10 w-48 h-48 bg-gradient-to-br from-teal-400/15 to-cyan-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-gradient-to-br from-cyan-500/10 to-teal-400/15 rounded-full blur-2xl"></div>
        <div class="absolute bottom-10 right-1/3 w-56 h-56 bg-gradient-to-br from-teal-500/10 to-cyan-400/10 rounded-full blur-3xl"></div>
        
        <!-- Animated Floating Elements -->
        <div class="absolute top-1/3 left-5 w-4 h-4 bg-cyan-400/30 rounded-full animate-bounce" style="animation-delay: 0s; animation-duration: 3s;"></div>
        <div class="absolute top-2/3 right-10 w-3 h-3 bg-teal-400/40 rounded-full animate-bounce" style="animation-delay: 0.5s; animation-duration: 2.5s;"></div>
        <div class="absolute bottom-1/3 left-1/4 w-2 h-2 bg-cyan-300/50 rounded-full animate-bounce" style="animation-delay: 1s; animation-duration: 2s;"></div>
    </div>

    <!-- Main Login Card -->
    <div class="w-full max-w-md relative z-10">
        <div class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white/20">
            
            <!-- Header Section -->
            <div class="relative pt-10 pb-8 px-8 text-center bg-gradient-to-b from-white to-gray-50/80">
                <!-- Logo Container with Glow Effect -->
                <div class="relative inline-block mb-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-400 to-teal-500 rounded-full blur-xl opacity-30 scale-110"></div>
                    <div class="relative w-28 h-28 bg-white rounded-full flex items-center justify-center shadow-xl p-3 border-4 border-gradient-to-br from-cyan-100 to-teal-100 ring-4 ring-teal-500/20">
                        <img src="{{ asset('images/logo/logo asli.png') }}" alt="Logo PT Assabar Sukses Berkah" class="w-full h-full object-contain drop-shadow-md">
                    </div>
                </div>
                
                <!-- Company Name -->
                <h1 class="text-2xl font-bold bg-gradient-to-r from-teal-700 via-cyan-600 to-teal-600 bg-clip-text text-transparent mb-2">
                    Admin Panel
                </h1>
                <p class="text-teal-600 text-sm font-medium tracking-wide">
                    PT Assabar Sukses Berkah
                </p>
                <p class="text-gray-400 text-xs mt-1 italic">Moslem Wear</p>
            </div>

            <!-- Form Section -->
            <div class="px-8 pb-8 pt-4">
                <div class="text-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-800">Selamat Datang!</h2>
                    <p class="text-gray-500 text-sm mt-1">Silakan login untuk mengakses dashboard</p>
                </div>

                @if($errors->any())
                    <div class="flex items-center gap-3 p-4 mb-6 bg-gradient-to-r from-red-50 to-red-100/80 text-red-700 border border-red-200 rounded-xl">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                        <span class="text-sm">{{ $errors->first() }}</span>
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST" class="space-y-5" id="loginForm" novalidate>
                    @csrf
                    
                    <!-- Email Input -->
                    <div>
                        <label class="block mb-2 font-medium text-gray-700 text-sm">Email</label>
                        <div class="relative group">
                            <input 
                                type="email" 
                                name="email" 
                                class="w-full py-3.5 pl-12 pr-4 bg-gray-50/80 border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-teal-500 focus:bg-white focus:ring-4 focus:ring-teal-500/10 hover:border-gray-300 hover:bg-white" 
                                placeholder="Masukkan email anda"
                                value="{{ old('email') }}"
                                required
                            >
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-teal-500 transition-colors">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label class="block mb-2 font-medium text-gray-700 text-sm">Password</label>
                        <div class="relative group">
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                class="w-full py-3.5 pl-12 pr-12 bg-gray-50/80 border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-teal-500 focus:bg-white focus:ring-4 focus:ring-teal-500/10 hover:border-gray-300 hover:bg-white" 
                                placeholder="Masukkan password anda"
                                required
                            >
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-teal-500 transition-colors">
                                <i class="fas fa-lock"></i>
                            </div>
                            <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-teal-600 transition-colors" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 accent-teal-600 cursor-pointer rounded border-gray-300 focus:ring-teal-500">
                        <label for="remember" class="text-sm text-gray-600 cursor-pointer select-none">Ingat saya di perangkat ini</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submitBtn" class="w-full py-4 bg-gradient-to-r from-teal-600 via-cyan-600 to-teal-500 text-white rounded-xl font-semibold text-base flex items-center justify-center gap-3 shadow-lg shadow-teal-500/30 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-teal-500/40 active:translate-y-0 group">
                        <i class="fas fa-sign-in-alt group-hover:translate-x-1 transition-transform" id="btnIcon"></i>
                        <span id="btnText">Masuk ke Dashboard</span>
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center py-5 px-6 bg-gradient-to-r from-gray-50 to-gray-100/80 border-t border-gray-100">
                <p class="text-gray-500 text-xs">© {{ date('Y') }} PT Assabar Sukses Berkah. All rights reserved.</p>
            </div>
        </div>

        <!-- Back to Home Link -->
        <a href="/" class="flex items-center justify-center gap-2 mt-6 text-white/70 text-sm transition-all duration-300 hover:text-white hover:gap-3 group">
            <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            <span>Kembali ke Halaman Utama</span>
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

        // Prevent double submit
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnIcon = document.getElementById('btnIcon');
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');
            if (btnIcon) {
                btnIcon.className = 'fas fa-spinner fa-spin';
            }
            if (btnText) {
                btnText.textContent = 'Memproses...';
            }
        });
    </script>
</body>
</html>
