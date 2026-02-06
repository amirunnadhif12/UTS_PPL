<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - PT Assabar Sukses Berkah</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo/logo.png') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="font-sans bg-cream min-h-screen">
    <!-- Mobile Toggle -->
    <button class="fixed top-4 left-4 z-[1001] w-11 h-11 bg-islamic-gradient rounded-xl flex items-center justify-center text-white shadow-lg md:hidden hover:scale-105 transition-transform" id="mobileToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar Overlay -->
    <div class="fixed inset-0 bg-black/50 z-[999] hidden" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 w-72 h-screen bg-gradient-to-b from-dark to-dark-light text-white z-[1000] shadow-2xl flex flex-col transition-transform duration-300 -translate-x-full md:translate-x-0" id="sidebar">
        <div class="p-6 bg-black/20 border-b border-secondary/20">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gold-gradient rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-mosque text-dark text-xl"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-white">Admin Panel</h2>
                    <span class="text-xs text-secondary font-medium">PT Assabar Sukses Berkah</span>
                </div>
            </div>
        </div>

        <div class="flex-1 flex flex-col p-6 overflow-y-auto">
            <span class="text-xs uppercase tracking-wider text-white/40 mb-4 pl-2">Menu Utama</span>
            <ul class="list-none flex-1">
                <li class="mb-2">
                    <a href="/" target="_blank" class="flex items-center gap-4 px-4 py-3 text-white/70 rounded-xl transition-all duration-300 hover:bg-primary/50 hover:text-white hover:translate-x-1">
                        <i class="fas fa-external-link-alt w-5 text-center"></i>
                        Lihat Website
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 hover:translate-x-1 {{ request()->routeIs('admin.products.*') ? 'bg-islamic-gradient text-white shadow-lg' : 'text-white/70 hover:bg-primary/50 hover:text-white' }}">
                        <i class="fas fa-box w-5 text-center {{ request()->routeIs('admin.products.*') ? 'text-secondary' : '' }}"></i>
                        Kelola Produk
                    </a>
                </li>
            </ul>

            <!-- User Info & Logout -->
            <div class="p-4 bg-white/5 rounded-2xl border border-secondary/15 mt-auto">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-11 h-11 bg-gold-gradient rounded-xl flex items-center justify-center text-dark font-bold text-lg shadow-md">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="overflow-hidden">
                        <div class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-white/50 truncate">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-3 px-4 bg-red-500/15 text-red-400 border border-red-500/30 rounded-xl font-medium text-sm flex items-center justify-center gap-2 transition-all duration-300 hover:bg-red-500 hover:text-white hover:border-red-500 hover:-translate-y-0.5 hover:shadow-lg">
                        <i class="fas fa-sign-out-alt"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-72 p-6 pt-20 md:pt-6 min-h-screen transition-all duration-300">
        @if(session('success'))
            <div class="flex items-center gap-4 p-4 mb-6 bg-gradient-to-r from-green-100 to-green-50 text-green-800 border border-green-200 rounded-2xl animate-slideIn">
                <i class="fas fa-check-circle text-xl"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-center gap-4 p-4 mb-6 bg-gradient-to-r from-red-100 to-red-50 text-red-800 border border-red-200 rounded-2xl animate-slideIn">
                <i class="fas fa-exclamation-circle text-xl"></i>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileToggle = document.getElementById('mobileToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('translate-x-0');
            sidebarOverlay.classList.toggle('hidden');
        }

        mobileToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);
    </script>
    @stack('scripts')
</body>
</html>
