<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - PT Assabar Sukses Berkah</title>

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
    
    @stack('styles')
</head>
<body class="font-[Poppins] bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Mobile Toggle -->
    <button class="fixed top-4 left-4 z-[1001] w-12 h-12 bg-gradient-to-r from-teal-600 to-cyan-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-teal-500/30 md:hidden hover:scale-105 active:scale-95 transition-all duration-200" id="mobileToggle">
        <i class="fas fa-bars text-lg"></i>
    </button>

    <!-- Sidebar Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[999] hidden transition-opacity duration-300" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 w-72 h-screen z-[1000] shadow-2xl flex flex-col transition-transform duration-300 -translate-x-full md:translate-x-0" id="sidebar" style="background: linear-gradient(180deg, #0d4f4f 0%, #115e5e 50%, #0a3d3d 100%);">
        
        <!-- Sidebar Header -->
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center shadow-lg p-2 ring-2 ring-cyan-400/30">
                    <img src="{{ asset('images/logo/logo asli.png') }}" alt="Logo" class="w-full h-full object-contain">
                </div>
                <div>
                    <h2 class="text-base font-bold text-white">Admin Panel</h2>
                    <span class="text-xs text-cyan-300 font-medium">PT Assabar Sukses Berkah</span>
                </div>
            </div>
        </div>

        <!-- Sidebar Navigation -->
        <div class="flex-1 flex flex-col p-5 overflow-y-auto">
            <span class="text-xs uppercase tracking-widest text-cyan-400/60 mb-4 pl-3 font-semibold">Menu Utama</span>
            <ul class="list-none flex-1 space-y-2">
                <li>
                    <a href="/" target="_blank" class="flex items-center gap-4 px-4 py-3.5 text-white/70 rounded-xl transition-all duration-300 hover:bg-white/10 hover:text-white hover:translate-x-1 group">
                        <div class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-cyan-500/20 transition-colors">
                            <i class="fas fa-external-link-alt text-sm"></i>
                        </div>
                        <span class="font-medium">Lihat Website</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-300 hover:translate-x-1 group {{ request()->routeIs('admin.products.*') ? 'bg-gradient-to-r from-cyan-500/30 to-teal-500/20 text-white shadow-lg border border-cyan-400/30' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                        <div class="w-9 h-9 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-gradient-to-br from-cyan-400 to-teal-500 text-white shadow-md' : 'bg-white/10 group-hover:bg-cyan-500/20' }}">
                            <i class="fas fa-box text-sm"></i>
                        </div>
                        <span class="font-medium">Kelola Produk</span>
                        @if(request()->routeIs('admin.products.*'))
                            <div class="ml-auto w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </li>
            </ul>

            <!-- User Info & Logout -->
            <div class="p-4 bg-white/5 rounded-2xl border border-cyan-400/20 mt-auto backdrop-blur-sm">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-teal-500 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-cyan-500/30">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="overflow-hidden flex-1">
                        <div class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-cyan-300/70 truncate">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-3 px-4 bg-red-500/15 text-red-400 border border-red-500/30 rounded-xl font-medium text-sm flex items-center justify-center gap-2 transition-all duration-300 hover:bg-red-500 hover:text-white hover:border-red-500 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-red-500/30 group">
                        <i class="fas fa-sign-out-alt group-hover:rotate-12 transition-transform"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-72 p-6 pt-20 md:pt-6 min-h-screen transition-all duration-300">
        @if(session('success'))
            <div class="flex items-center gap-4 p-4 mb-6 bg-gradient-to-r from-emerald-50 to-teal-50 text-emerald-800 border border-emerald-200 rounded-2xl shadow-sm animate-slideIn">
                <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-500/30">
                    <i class="fas fa-check"></i>
                </div>
                <span class="font-medium">{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto text-emerald-500 hover:text-emerald-700 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-center gap-4 p-4 mb-6 bg-gradient-to-r from-red-50 to-rose-50 text-red-800 border border-red-200 rounded-2xl shadow-sm animate-slideIn">
                <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-red-500/30">
                    <i class="fas fa-exclamation"></i>
                </div>
                <span class="font-medium">{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto text-red-500 hover:text-red-700 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
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
