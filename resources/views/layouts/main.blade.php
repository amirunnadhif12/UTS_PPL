<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT Assabar Sukses Berkah')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    </head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="/" class="logo">
                <div class="logo-icon">
                <img src="{{ asset('images/logo/logo.png') }}" alt="Logo">
                </div>
                <div class="logo-text">
                    <h1>PT Assabar Sukses Berkah</h1>
                    <p>Muslim Fashion Excellence</p>
                </div>
            </a>
            
            <div class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul class="nav-menu" id="navMenu">
                <li><a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a></li>
                <!-- Products Dropdown -->
    <li class="nav-item dropdown">
        <a href="/products" class="nav-link dropdown-toggle {{ request()->is('products*') ? 'active' : '' }}">
            Products
            <i class="fas fa-chevron-down dropdown-arrow"></i>
        </a>
        <ul class="dropdown-menu">
            <li><a href="/products?category=kopyah">Jubah</a></li>
            <li><a href="/products?category=gamis">Baju Koko</a></li>
            <li><a href="/products?category=footwear">Songkok</a></li>
            <li><a href="/products?category=accessories">Peci</a></li>
        </ul>
    </li>
                <li><a href="/contact" class="nav-cta">Contact Us</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer islamic-pattern">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>PT Assabar Sukses Berkah</h3>
                    <p>Produsen terpercaya produk fashion muslim berkualitas tinggi. Kami berkomitmen menghadirkan produk terbaik dengan sentuhan islami yang elegan.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="/"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="/about"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="/products"><i class="fas fa-chevron-right"></i> Products</a></li>
                        <li><a href="/contact"><i class="fas fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4>Marketplace</h4>
                    <ul>
                        <li><a href="https://shopee.co.id/toko-assabar" target="_blank"><i class="fas fa-shopping-bag"></i> Shopee</a></li>
                        <li><a href="https://tokopedia.com/toko-assabar" target="_blank"><i class="fas fa-store"></i> Tokopedia</a></li>
                        <li><a href="https://bukalapak.com/toko-assabar" target="_blank"><i class="fas fa-shopping-cart"></i> Bukalapak</a></li>
                        <li><a href="https://lazada.co.id/toko-assabar" target="_blank"><i class="fas fa-shopping-basket"></i> Lazada</a></li>
                    </ul>
                </div>

                <div class="footer-links footer-contact">
                    <h4>Contact Info</h4>
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Industri Muslim No. 123, Jakarta, Indonesia</p>
                    <p><i class="fas fa-phone"></i> +62 21 1234 5678</p>
                    <p><i class="fas fa-envelope"></i> info@assabar.co.id</p>
                    <p><i class="fas fa-clock"></i> Mon - Sat: 08:00 - 17:00</p>
                </div>
            </div>

           
        </div>
    </footer>

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
        
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
        });
        
        // Close sidebar when clicking outside
        navMenu.addEventListener('click', (e) => {
            if (e.target === navMenu) {
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
        
        // Mobile dropdown toggle
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
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
    
    <style>
        :root {
            --primary: #1a5632;
            --primary-dark: #0f3d22;
            --primary-light: #2d7a4a;
            --secondary: #d4af37;
            --secondary-dark: #b8962e;
            --dark: #1a1a2e;
            --dark-light: #252542;
            --cream: #faf8f5;
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
            background: var(--cream);
            color: #333;
            overflow-x: hidden;
        }

        .font-arabic {
            font-family: 'Amiri', serif;
        }

        /* Islamic Pattern Overlay */
        .islamic-pattern {
            position: relative;
        }

        .islamic-pattern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4af37' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 1;
        }

        .islamic-pattern > * {
            position: relative;
            z-index: 2;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1rem 0;
            transition: all 0.4s ease;
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(26, 86, 50, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            padding: 0.5rem 0;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 55px;
            height: 55px;
            /* background: var(--gold-gradient); */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* box-shadow: 0 4px 15px rgba(192, 154, 28, 0.4); */
            transition: transform 0.3s ease;
        }

        .logo:hover .logo-icon {
            transform: rotate(10deg) scale(1.05);
        }

        .logo-icon span {
            color: var(--primary-dark);
            font-weight: 800;
            font-size: 1.3rem;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }

        .logo-text h1 {
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .logo-text p {
            color: var(--secondary);
            font-size: 0.75rem;
            font-weight: 500;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
            padding: 0.5rem 0;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary);
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: var(--secondary);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active {
            color: var(--secondary);
        }

        .nav-link.active::after {
            width: 100%;
        }

        .nav-cta {
            background: var(--gold-gradient);
            color: var(--primary-dark) !important;
            padding: 0.75rem 1.75rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
        }

        .nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.5);
        }

        .nav-cta::after {
            display: none;
        }
        /* Dropdown Menu */
        .nav-item {
            position: relative;
        }

        .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dropdown-arrow {
            font-size: 0.7rem;
            transition: transform 0.3s ease;
        }

        .nav-item:hover .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: white;
            min-width: 220px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 0.75rem 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            list-style: none;
        }

        .nav-item:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid white;
        }

        .dropdown-menu li a {
            display: block;
            padding: 0.75rem 1.5rem;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .dropdown-menu li a:hover {
            background: rgba(26, 86, 50, 0.1);
            color: var(--primary);
            padding-left: 1.75rem;
        }

    

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 10px;
        }

        .menu-toggle span {
            width: 28px;
            height: 3px;
            background: white;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 4rem 0 0;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 3rem;
            padding-bottom: 3rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .footer-brand h3 {
            font-size: 1.5rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }

        .footer-brand p {
            color: rgba(255,255,255,0.7);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
        }

        .footer-social a {
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background: var(--secondary);
            color: var(--primary-dark);
            transform: translateY(-3px);
        }

        .footer-links h4 {
            color: white;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .footer-links h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--secondary);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-links a:hover {
            color: var(--secondary);
            padding-left: 5px;
        }

        .footer-contact p {
            color: rgba(255,255,255,0.7);
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .footer-contact i {
            color: var(--secondary);
            margin-top: 4px;
        }

        .footer-bottom {
            padding: 1.5rem 0;
            text-align: center;
            color: rgba(255,255,255,0.5);
        }

        .footer-bottom span {
            color: var(--secondary);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: var(--gold-gradient);
            color: var(--primary-dark);
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.5);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: var(--primary-dark);
        }

        .btn-outline-gold {
            background: transparent;
            color: var(--secondary);
            border: 2px solid var(--secondary);
        }

        .btn-outline-gold:hover {
            background: var(--secondary);
            color: var(--primary-dark);
        }

        /* Section Title */
        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title .subtitle {
            color: var(--secondary);
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 0.75rem;
            display: block;
        }

        .section-title h2 {
            font-size: 2.75rem;
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .section-title .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .section-title .divider span {
            width: 60px;
            height: 3px;
            background: var(--secondary);
        }

        .section-title .divider i {
            color: var(--secondary);
            font-size: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
            
            .nav-container {
                padding: 0.75rem 1rem;
            }
        }

        @media (max-width: 768px) {
            /* Navbar Mobile */
            .navbar {
                padding: 0.5rem 0;
            }
            
            .nav-container {
                padding: 0.5rem 1rem;
            }
            
            .logo {
                gap: 0.5rem;
            }
            
            .logo-icon {
                width: 40px;
                height: 40px;
            }
            
            .logo-text h1 {
                font-size: 0.9rem;
            }
            
            .logo-text p {
                font-size: 0.65rem;
            }

            .nav-menu {
                position: fixed;
                top: 0;
                right: -280px;
                width: 280px;
                height: 100vh;
                background: var(--primary-dark);
                flex-direction: column;
                padding: 5rem 2rem 2rem;
                gap: 1rem;
                z-index: 998;
                overflow-y: auto;
                transition: right 0.3s ease;
                box-shadow: -5px 0 30px rgba(0,0,0,0.3);
            }

            .nav-menu.active {
                right: 0;
            }
            
            /* Overlay backdrop */
            .nav-menu::before {
                content: '';
                position: fixed;
                top: 0;
                left: -100vw;
                width: 100vw;
                height: 100vh;
                background: rgba(0,0,0,0.5);
                opacity: 0;
                transition: opacity 0.3s ease;
                pointer-events: none;
            }
            
            .nav-menu.active::before {
                opacity: 1;
                pointer-events: auto;
            }

            .menu-toggle {
                display: flex;
            }
            
            /* Dropdown on mobile */
            .dropdown-menu {
                position: static;
                transform: none;
                max-height: 0;
                opacity: 0;
                visibility: hidden;
                overflow: hidden;
                box-shadow: none;
                background: rgba(255,255,255,0.1);
                margin-top: 0;
                border-radius: 8px;
                transition: all 0.3s ease;
            }
            
            .nav-item.dropdown.open .dropdown-menu {
                max-height: 300px;
                opacity: 1;
                visibility: visible;
                margin-top: 0.5rem;
            }
            
            .nav-item.dropdown.open .dropdown-arrow {
                transform: rotate(180deg);
            }
            
            .dropdown-menu::before {
                display: none;
            }
            
            .dropdown-menu li a {
                color: white;
                padding: 0.5rem 1rem;
            }
            
            .dropdown-menu li a:hover {
                background: rgba(255,255,255,0.1);
                color: var(--secondary);
            }

            /* Footer Mobile */
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }

            .footer-links h4::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .footer-social {
                justify-content: center;
            }

            .footer-contact p {
                justify-content: center;
            }
            
            .footer-container {
                padding: 0 1rem;
            }

            /* Section Title Mobile */
            .section-title h2 {
                font-size: 1.75rem;
            }
            
            .section-title .subtitle {
                font-size: 0.8rem;
            }
            
            /* Buttons Mobile */
            .btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.9rem;
            }
            
            /* Scroll Top Mobile */
            .scroll-top {
                width: 45px;
                height: 45px;
                bottom: 1rem;
                right: 1rem;
            }
        }

        @media (max-width: 480px) {
            /* Extra small devices */
            .logo-text {
                display: none;
            }
            
            .logo-icon {
                width: 45px;
                height: 45px;
            }
            
            .nav-container {
                padding: 0.5rem 0.75rem;
            }
            
            .section-title h2 {
                font-size: 1.5rem;
            }
            
            .btn {
                padding: 0.6rem 1.25rem;
                font-size: 0.85rem;
            }
            
            .footer-brand h3 {
                font-size: 1.25rem;
            }
            
            .footer-brand p {
                font-size: 0.85rem;
            }
            
            .footer-social a {
                width: 40px;
                height: 40px;
            }
        }

        /* Scroll to top button */
        .scroll-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--gold-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-dark);
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
            z-index: 999;
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            transform: translateY(-5px);
        }
    </style>
    @stack('styles')

</html>
