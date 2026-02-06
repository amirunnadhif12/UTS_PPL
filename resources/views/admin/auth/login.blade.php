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
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-dark min-h-screen flex items-center justify-center p-8 relative overflow-hidden">
    <!-- Islamic Pattern Background -->
    <div class="fixed inset-0 opacity-5 pointer-events-none z-1" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23d4af37\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <!-- Decorative Elements -->
    <div class="fixed w-96 h-96 rounded-full bg-gold-gradient opacity-10 -top-48 -right-24 z-0"></div>
    <div class="fixed w-72 h-72 rounded-full bg-gold-gradient opacity-10 -bottom-36 -left-24 z-0"></div>
    <div class="fixed w-48 h-48 rounded-full bg-gold-gradient opacity-10 top-1/2 left-[10%] -translate-y-1/2 z-0"></div>

    <div class="w-full max-w-md relative z-10">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-b from-dark to-dark-light p-12 pb-16 text-center relative islamic-pattern">
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 w-12 h-12 bg-white rounded-full shadow-lg"></div>
                
                <div class="w-20 h-20 bg-gold-gradient rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg relative z-2">
                    <i class="fas fa-mosque text-dark text-3xl"></i>
                </div>
                <h1 class="text-white text-2xl font-bold mb-2 relative z-2">Admin Panel</h1>
                <p class="text-secondary text-sm font-medium relative z-2">PT Assabar Sukses Berkah</p>
            </div>

            <!-- Body -->
            <div class="p-8 pt-12">
                <div class="text-center mb-8">
                    <h2 class="text-xl font-bold text-dark mb-2">Selamat Datang!</h2>
                    <p class="text-gray-500 text-sm">Silakan login untuk mengakses dashboard admin</p>
                </div>

                @if($errors->any())
                    <div class="flex items-center gap-3 p-4 mb-6 bg-gradient-to-r from-red-100 to-red-50 text-red-800 border border-red-200 rounded-xl animate-pulse">
                        <i class="fas fa-exclamation-circle text-lg"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold text-dark text-sm">Email</label>
                        <div class="relative">
                            <input 
                                type="email" 
                                name="email" 
                                class="w-full py-4 pl-12 pr-4 border-2 border-gray-200 rounded-xl font-sans text-base transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                                placeholder="Masukkan email anda"
                                value="{{ old('email') }}"
                                required
                            >
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 font-semibold text-dark text-sm">Password</label>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                class="w-full py-4 pl-12 pr-12 border-2 border-gray-200 rounded-xl font-sans text-base transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                                placeholder="Masukkan password anda"
                                required
                            >
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary transition-colors" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 mb-8">
                        <input type="checkbox" name="remember" id="remember" class="w-5 h-5 accent-primary cursor-pointer rounded">
                        <label for="remember" class="text-sm text-gray-600 cursor-pointer">Ingat saya di perangkat ini</label>
                    </div>

                    <button type="submit" class="w-full py-4 bg-islamic-gradient text-white rounded-xl font-semibold text-base flex items-center justify-center gap-2 shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <i class="fas fa-sign-in-alt"></i>
                        Masuk ke Dashboard
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center p-6 bg-cream border-t border-gray-100">
                <p class="text-gray-500 text-sm">© {{ date('Y') }} PT Assabar Sukses Berkah. All rights reserved.</p>
            </div>
        </div>

        <a href="/" class="flex items-center justify-center gap-2 mt-8 text-white/60 text-sm transition-colors hover:text-secondary">
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
