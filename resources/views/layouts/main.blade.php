<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT Assabar Sukses Berkah')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo asli.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo/logo asli.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo/logo asli.png') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="font-sans bg-cream text-gray-800 overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 py-3 md:py-4 transition-all duration-400 bg-transparent" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <a href="/" class="flex items-center gap-2 sm:gap-4 no-underline group">
                <div class="w-10 h-10 sm:w-12 md:w-14 sm:h-12 md:h-14 rounded-full flex items-center justify-center transition-transform duration-300 group-hover:rotate-12 group-hover:scale-105 shrink-0">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="w-full h-full object-contain rounded-full">
                </div>
                <div class="min-w-0">
                    <h1 class="text-white text-sm sm:text-lg md:text-xl font-bold drop-shadow-md truncate">As-Sabar Official</h1>
                    <p class="text-secondary text-[10px] sm:text-xs font-medium">Moslem Wear</p>
                </div>
            </a>
            
            <!-- Mobile Menu Toggle -->
            <div class="flex md:hidden flex-col gap-1.5 cursor-pointer p-2 z-50" id="menuToggle">
                <span class="w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
                <span class="w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
                <span class="w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
            </div>

            <ul class="hidden md:flex items-center gap-10 list-none md:static md:flex-row md:bg-transparent md:p-0 md:w-auto" id="navMenu">
                <li>
                    <a href="/" class="nav-link-custom text-white no-underline font-medium text-sm relative py-2 transition-colors duration-300 hover:text-secondary {{ request()->is('/') ? 'active text-secondary' : '' }}">Home</a>
                </li>
                <li>
                    <a href="/about" class="nav-link-custom text-white no-underline font-medium text-sm relative py-2 transition-colors duration-300 hover:text-secondary {{ request()->is('about') ? 'active text-secondary' : '' }}">About</a>
                </li>
                <!-- Products -->
                <li>
                    <a href="/products" class="nav-link-custom text-white no-underline font-medium text-sm relative py-2 transition-colors duration-300 hover:text-secondary {{ request()->is('products*') ? 'active text-secondary' : '' }}">
                        Products
                    </a>
                </li>
                <li>
                    <a href="/faq" class="nav-link-custom text-white no-underline font-medium text-sm relative py-2 transition-colors duration-300 hover:text-secondary {{ request()->is('faq') ? 'active text-secondary' : '' }}">FAQ</a>
                </li>
                <li>
                    <a href="/contact" class="bg-gold-gradient text-primary-dark px-7 py-3 rounded-full font-semibold no-underline transition-all duration-300 shadow-lg hover:-translate-y-0.5 hover:shadow-xl">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="islamic-pattern bg-dark text-white pt-12 md:pt-16 text-left">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12 pb-10 md:pb-14">
                <!-- Brand -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <h3 class="text-xl md:text-2xl text-secondary font-bold mb-3 md:mb-4">PT Assabar Sukses Berkah</h3>
                    <p class="text-white/70 leading-relaxed mb-4 md:mb-6 text-sm md:text-base">Produsen terpercaya produk fashion muslim berkualitas tinggi. Kami berkomitmen menghadirkan produk terbaik dengan sentuhan islami yang elegan.</p>
                    <div class="flex gap-3">
                        <a href="https://web.facebook.com/gamisassabar" target="_blank" class="w-10 h-10 md:w-11 md:h-11 bg-white/10 rounded-full flex items-center justify-center text-white no-underline transition-all duration-300 hover:bg-secondary hover:text-primary-dark hover:-translate-y-1"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/assabarcollection/" target="_blank" class="w-10 h-10 md:w-11 md:h-11 bg-white/10 rounded-full flex items-center justify-center text-white no-underline transition-all duration-300 hover:bg-secondary hover:text-primary-dark hover:-translate-y-1"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@assabarmoslemwear" target="_blank" class="w-10 h-10 md:w-11 md:h-11 bg-white/10 rounded-full flex items-center justify-center text-white no-underline transition-all duration-300 hover:bg-secondary hover:text-primary-dark hover:-translate-y-1"><i class="fab fa-tiktok"></i></a>
                        <a href="https://wa.me/6285748169363" class="w-10 h-10 md:w-11 md:h-11 bg-white/10 rounded-full flex items-center justify-center text-white no-underline transition-all duration-300 hover:bg-secondary hover:text-primary-dark hover:-translate-y-1"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white text-lg font-semibold mb-6 relative pb-3 after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-secondary">Quick Links</h4>
                    <ul class="list-none space-y-3">
                        <li><a href="/" class="text-white/70 no-underline flex items-center gap-2 transition-all duration-300 hover:text-secondary hover:pl-1"><i class="fas fa-chevron-right text-xs"></i> Home</a></li>
                        <li><a href="/about" class="text-white/70 no-underline flex items-center gap-2 transition-all duration-300 hover:text-secondary hover:pl-1"><i class="fas fa-chevron-right text-xs"></i> About Us</a></li>
                        <li><a href="/products" class="text-white/70 no-underline flex items-center gap-2 transition-all duration-300 hover:text-secondary hover:pl-1"><i class="fas fa-chevron-right text-xs"></i> Products</a></li>
                        <li><a href="/contact" class="text-white/70 no-underline flex items-center gap-2 transition-all duration-300 hover:text-secondary hover:pl-1"><i class="fas fa-chevron-right text-xs"></i> Contact</a></li>
                    </ul>
                </div>

                <!-- Marketplace -->
                <div>
                    <h4 class="text-white text-lg font-semibold mb-6 relative pb-3 after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-secondary">Marketplace</h4>
                    <ul class="list-none space-y-3">
                        <li><a href="https://shopee.co.id/as_sabarofficialshop" target="_blank" class="text-white/70 no-underline flex items-center gap-2 transition-all duration-300 hover:text-secondary hover:pl-1"><i class="fas fa-shopping-bag"></i> Shopee</a></li>
                        <li><a href="https://www.tokopedia.com/as-sabar-moslem-wear" target="_blank" class="text-white/70 no-underline flex items-center gap-2 transition-all duration-300 hover:text-secondary hover:pl-1"><i class="fas fa-store"></i> Tokopedia</a></li>
                        <li><a href="https://www.lazada.co.id/as-sabar" target="_blank" class="text-white/70 no-underline flex items-center gap-2 transition-all duration-300 hover:text-secondary hover:pl-1"><i class="fas fa-shopping-basket"></i> Lazada</a></li>
                        <li><a href="https://vt.tiktok.com/ZSmL7D97K/?page=Mall" target="_blank" class="text-white/70 no-underline flex items-center gap-2 transition-all duration-300 hover:text-secondary hover:pl-1"><i class="fab fa-tiktok"></i> TikTok Shop</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-white text-lg font-semibold mb-6 relative pb-3 after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-secondary">Contact Info</h4>
                    <div class="space-y-4">
                        <p class="text-white/70 flex items-start gap-3 text-sm"><i class="fas fa-map-marker-alt text-secondary mt-0.5 w-4 text-center"></i> Gg. II E No.3A, Ngipik, Kec. Gresik, Kabupaten Gresik, Jawa Timur 61119</p>
                        <p class="text-white/70 flex items-start gap-3 text-sm"><i class="fas fa-phone text-secondary mt-0.5 w-4 text-center"></i> +62 857 4816 9363</p>
                        <p class="text-white/70 flex items-start gap-3 text-sm"><i class="fas fa-envelope text-secondary mt-0.5 w-4 text-center"></i> sabarsuksesberkah@gmail.com</p>
                        <p class="text-white/70 flex items-start gap-3 text-sm"><i class="fas fa-clock text-secondary mt-0.5 w-4 text-center"></i> Senin - Sabtu: 08:00 - 16:00</p>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="py-6 md:py-8 text-center">
                <p class="text-white/50 text-sm">© {{ date('Y') }} PT. Assabar Sukses Berkah. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Live Chat Button -->
    <a href="https://wa.me/6285748169363?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20As-Sabar" target="_blank" id="waFloat"
       class="fixed bottom-24 right-5 sm:bottom-28 sm:right-7 z-50 group flex items-center no-underline">
        <!-- Tooltip -->
        <span class="hidden group-hover:flex items-center mr-3 bg-white text-gray-800 text-sm font-semibold px-4 py-2 rounded-full shadow-lg whitespace-nowrap transition-all duration-300 animate-fade-in">
            <i class="fas fa-comment-dots text-green-500 mr-2"></i>
            order disini!
        </span>
        <!-- Button -->
        <div class="relative">
            <div class="absolute inset-0 bg-green-400 rounded-full animate-wa-ping"></div>
            <div class="relative w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-xl text-white text-2xl sm:text-3xl transition-all duration-300 group-hover:scale-110 group-hover:shadow-2xl group-hover:from-green-500 group-hover:to-green-700">
                <i class="fab fa-whatsapp"></i>
            </div>
            <!-- Online indicator -->
            <span class="absolute top-0 right-0 w-4 h-4 bg-yellow-400 border-2 border-white rounded-full animate-pulse"></span>
        </div>
    </a>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const navMenu = document.getElementById('navMenu');
        
        // Create overlay element
        const overlay = document.createElement('div');
        overlay.className = 'mobile-overlay';
        document.body.appendChild(overlay);
        
        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                menuToggle.classList.toggle('active');
                navMenu.classList.toggle('active');
                overlay.classList.toggle('active');
                document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
            });
        }
        
        // Close sidebar when clicking overlay
        overlay.addEventListener('click', () => {
            menuToggle.classList.remove('active');
            navMenu.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        });
        
        // Mobile dropdown toggle
        const dropdownToggles = document.querySelectorAll('.nav-item-dropdown > a');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                if (window.innerWidth <= 767) {
                    e.preventDefault();
                    const parent = toggle.parentElement;
                    parent.classList.toggle('open');
                }
            });
        });

        // Scroll to top
        const scrollTop = document.getElementById('scrollTop');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTop.classList.add('visible');
            } else {
                scrollTop.classList.remove('visible');
            }
        });

        scrollTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    @stack('scripts')
</body>
</html>
