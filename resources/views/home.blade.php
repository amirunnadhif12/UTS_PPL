@extends('layouts.main')
@section('title', 'Home - PT Assabar Sukses Berkah | Muslim Fashion Excellence')

@push('styles')
<style>
    /* Hero Section with Slideshow */
    .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    /* Slideshow Background */
    .hero-slideshow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .hero-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
    }

    .hero-slide.active {
        opacity: 1;
    }

    .hero-slide:nth-child(1) {
        background-image: url('/images/hero/hero-1.jpg');
    }

    .hero-slide:nth-child(2) {
        background-image: url('/images/hero/hero-2.jpg');
    }

    .hero-slide:nth-child(3) {
        background-image: url('/images/hero/hero-3.jpg');
    }

    /* Overlay */
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(
            180deg,
            rgba(26, 86, 50, 0.7) 0%,
            rgba(26, 86, 50, 0.5) 50%,
            rgba(26, 26, 46, 0.7) 100%
        );
        z-index: 1;
    }

    /* Decorative Elements */
    .hero-decoration {
        position: absolute;
        width: 400px;
        height: 400px;
        border: 2px solid rgba(212, 175, 55, 0.2);
        border-radius: 50%;
        pointer-events: none;
    }

    .hero-decoration-1 {
        top: -100px;
        right: -100px;
        animation: rotate 30s linear infinite;
    }

    .hero-decoration-2 {
        bottom: -150px;
        left: -150px;
        width: 500px;
        height: 500px;
        animation: rotate 40s linear infinite reverse;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .hero-content {
        text-align: center;
        color: white;
        z-index: 10;
        padding: 0 2rem;
        max-width: 900px;
    }

    .hero-subtitle {
        display: inline-block;
        background: rgba(212, 175, 55, 0.2);
        border: 1px solid rgba(212, 175, 55, 0.4);
        color: var(--secondary);
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 3rem;
        font-weight: 500;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
    }

    .hero-title span {
        color: var(--secondary);
        display: block;
    }

    .hero-description {
        font-size: 1.25rem;
        opacity: 0.9;
        margin-bottom: 2.5rem;
        line-height: 1.7;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .hero-scroll {
        position: absolute;
        bottom: 3rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        color: white;
        opacity: 0.7;
        animation: bounce 2s infinite;
    }

    .hero-scroll span {
        font-size: 0.8rem;
        margin-bottom: 0.5rem;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
        40% { transform: translateX(-50%) translateY(-10px); }
        60% { transform: translateX(-50%) translateY(-5px); }
    }

    /* About Section */
    .about-section {
        padding: 8rem 0;
        background: white;
    }

    .about-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: center;
    }

    .about-image {
        position: relative;
    }

    .about-image img {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .about-image-decoration {
        position: absolute;
        bottom: -30px;
        right: -30px;
        width: 200px;
        height: 200px;
        background: var(--gold-gradient);
        border-radius: 20px;
        z-index: -1;
    }

    .about-experience {
        position: absolute;
        bottom: 30px;
        left: -30px;
        background: var(--primary);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 15px 40px rgba(26, 86, 50, 0.4);
    }

    .about-experience h3 {
        font-size: 3rem;
        font-weight: 800;
        color: var(--secondary);
        line-height: 1;
    }

    .about-experience p {
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }

    .about-content h4 {
        color: var(--secondary);
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 1rem;
    }

    .about-content h2 {
        font-size: 2.75rem;
        color: var(--primary-dark);
        font-weight: 700;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .about-content p {
        color: #666;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .about-features {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .about-feature {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .about-feature-icon {
        width: 50px;
        height: 50px;
        background: rgba(26, 86, 50, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .about-feature h5 {
        font-size: 1rem;
        color: var(--primary-dark);
        margin-bottom: 0.25rem;
    }

    .about-feature p {
        font-size: 0.85rem;
        color: #888;
        margin: 0;
    }

    /* Products Section */
    .products-section {
        padding: 8rem 0;
        background: var(--cream);
    }

    .products-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
    }

    .product-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        height: 280px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .product-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .product-icon {
        width: 120px;
        height: 120px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        color: var(--secondary);
        position: relative;
        z-index: 1;
    }

    .product-badge {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: var(--secondary);
        color: var(--primary-dark);
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .product-content {
        padding: 2rem;
    }

    .product-content h3 {
        font-size: 1.5rem;
        color: var(--primary-dark);
        margin-bottom: 0.75rem;
    }

    .product-content p {
        color: #666;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .product-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .product-link:hover {
        color: var(--secondary);
        gap: 0.75rem;
    }

    /* Stats Section */
    .stats-section {
        padding: 6rem 0;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        position: relative;
        overflow: hidden;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23d4af37' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
    }

    .stats-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 1;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 3rem;
        text-align: center;
    }

    .stat-item {
        color: white;
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.75rem;
        color: var(--secondary);
    }

    .stat-number {
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--secondary);
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 1rem;
        opacity: 0.9;
    }

    /* CTA Section */
    .cta-section {
        padding: 8rem 0;
        background: white;
        text-align: center;
    }

    .cta-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .cta-content h2 {
        font-size: 2.75rem;
        color: var(--primary-dark);
        margin-bottom: 1.5rem;
    }

    .cta-content p {
        font-size: 1.15rem;
        color: #666;
        margin-bottom: 2.5rem;
        line-height: 1.7;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-green {
        background: var(--primary);
        color: white;
    }

    .btn-green:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(26, 86, 50, 0.4);
    }

    /* Testimonial Section */
    .testimonial-section {
        padding: 8rem 0;
        background: var(--cream);
    }

    .testimonial-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .testimonial-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .testimonial-card {
        background: white;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        position: relative;
    }

    .testimonial-card::before {
        content: '"';
        position: absolute;
        top: 1.5rem;
        right: 2rem;
        font-size: 6rem;
        font-family: 'Amiri', serif;
        color: rgba(212, 175, 55, 0.2);
        line-height: 1;
    }

    .testimonial-stars {
        color: var(--secondary);
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .testimonial-text {
        color: #555;
        line-height: 1.8;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 1;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .testimonial-avatar {
        width: 55px;
        height: 55px;
        background: var(--gold-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-dark);
        font-weight: 700;
        font-size: 1.2rem;
    }

    .testimonial-info h5 {
        color: var(--primary-dark);
        font-size: 1.05rem;
        margin-bottom: 0.25rem;
    }

    .testimonial-info p {
        color: #888;
        font-size: 0.85rem;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .hero-title { font-size: 3rem; }
        .about-grid { grid-template-columns: 1fr; gap: 3rem; }
        .products-grid { grid-template-columns: repeat(2, 1fr); }
        .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 2rem; }
        .testimonial-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 2.25rem; }
        .hero-description { font-size: 1rem; }
        .products-grid { grid-template-columns: 1fr; }
        .about-features { grid-template-columns: 1fr; }
        .about-experience { position: relative; left: 0; bottom: 0; margin-top: 1.5rem; }
        .about-image-decoration { display: none; }
        .section-title h2 { font-size: 1.75rem; }
        .about-content h2 { font-size: 2rem; }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .stat-number { font-size: 2.5rem; }
        .testimonial-grid { grid-template-columns: 1fr; }
        .cta-content h2 { font-size: 2rem; }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero">
    <!-- Slideshow Background -->
    <div class="hero-slideshow">
        <div class="hero-slide active"></div>
        <div class="hero-slide"></div>
        <div class="hero-slide"></div>
    </div>
    
    <!-- Overlay -->
    <div class="hero-overlay"></div>
    
    <div class="hero-decoration hero-decoration-1"></div>
    <div class="hero-decoration hero-decoration-2"></div>
    
    <div class="hero-content" data-aos="fade-up">
        <span class="hero-subtitle">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</span>
        <h1 class="hero-title">
            Muslim Fashion
            <span>Excellence</span>
        </h1>
        <p class="hero-description">
            Produsen terpercaya footwear muslim, kopyah premium, dan baju gamis berkualitas tinggi. 
            Menghadirkan produk dengan sentuhan islami yang elegan untuk keluarga muslim Indonesia.
        </p>
        <div class="hero-buttons">
            <a href="/products" class="btn btn-primary">
                <i class="fas fa-shopping-bag"></i>
                Lihat Produk
            </a>
            <a href="/about" class="btn btn-secondary">
                <i class="fas fa-info-circle"></i>
                Tentang Kami
            </a>
        </div>
    </div>

    <div class="hero-scroll">
        <span>Scroll Down</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="about-container">
        <div class="about-grid">
            <div class="about-image" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1558171813-4c088753af8f?w=600&h=700&fit=crop" alt="About Us">
                <div class="about-image-decoration"></div>
                <div class="about-experience">
                    <h3>10+</h3>
                    <p>Tahun Pengalaman</p>
                </div>
            </div>

            <div class="about-content" data-aos="fade-left">
                <h4>Tentang Kami</h4>
                <h2>Menyediakan Produk Fashion Muslim Berkualitas</h2>
                <p>
                    PT Assabar Sukses Berkah adalah perusahaan yang bergerak di bidang produksi 
                    fashion muslim dengan fokus pada kualitas dan nilai-nilai islami. Kami berkomitmen 
                    untuk menghadirkan produk terbaik yang memenuhi kebutuhan umat muslim Indonesia.
                </p>

                <div class="about-features">
                    <div class="about-feature">
                        <div class="about-feature-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div>
                            <h5>Kualitas Premium</h5>
                            <p>Bahan berkualitas tinggi</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <div>
                            <h5>Nilai Islami</h5>
                            <p>Sesuai syariat Islam</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div>
                            <h5>Pengiriman Cepat</h5>
                            <p>Seluruh Indonesia</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div>
                            <h5>Support 24/7</h5>
                            <p>Layanan pelanggan</p>
                        </div>
                    </div>
                </div>

                <a href="/about" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i>
                    Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="products-section">
    <div class="products-container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Produk Kami</span>
            <h2>Produk Unggulan</h2>
            <div class="divider">
                <span></span>
                <i class="fas fa-star"></i>
                <span></span>
            </div>
        </div>

        <div class="products-grid">
            <!-- Product 1 -->
            <div class="product-card" data-aos="fade-up" data-aos-delay="100">
                <div class="product-image">
                    <span class="product-badge">Best Seller</span>
                    <div class="product-icon">
                        <i class="fas fa-shoe-prints"></i>
                    </div>
                </div>
                <div class="product-content">
                    <h3>Muslim Footwear</h3>
                    <p>Sandal dan sepatu muslim dengan desain modern dan nyaman untuk beribadah serta aktivitas sehari-hari.</p>
                    <a href="/products" class="product-link">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card" data-aos="fade-up" data-aos-delay="200">
                <div class="product-image">
                    <span class="product-badge">Premium</span>
                    <div class="product-icon">
                        <i class="fas fa-hat-wizard"></i>
                    </div>
                </div>
                <div class="product-content">
                    <h3>Kopyah Premium</h3>
                    <p>Koleksi kopyah berkualitas tinggi dengan berbagai model dari tradisional hingga kontemporer.</p>
                    <a href="/products" class="product-link">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card" data-aos="fade-up" data-aos-delay="300">
                <div class="product-image">
                    <span class="product-badge">New</span>
                    <div class="product-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                </div>
                <div class="product-content">
                    <h3>Baju Gamis</h3>
                    <p>Gamis elegan dengan bahan premium dan desain yang syar'i untuk pria dan wanita muslim.</p>
                    <a href="/products" class="product-link">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="stats-container">
        <div class="stats-grid">
            <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">5000+</div>
                <div class="stat-label">Pelanggan Puas</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-number">100+</div>
                <div class="stat-label">Jenis Produk</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="stat-number">34</div>
                <div class="stat-label">Provinsi Terjangkau</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-number">4.9</div>
                <div class="stat-label">Rating Pelanggan</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="testimonial-container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Testimoni</span>
            <h2>Apa Kata Pelanggan</h2>
            <div class="divider">
                <span></span>
                <i class="fas fa-quote-right"></i>
                <span></span>
            </div>
        </div>

        <div class="testimonial-grid">
            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Kualitas produk sangat bagus, bahan nyaman dan desainnya elegan. 
                    Pengiriman juga cepat. Sangat recommended!"
                </p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">AH</div>
                    <div class="testimonial-info">
                        <h5>Ahmad Hidayat</h5>
                        <p>Jakarta</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Sudah berlangganan sejak 2 tahun lalu. Kopyah premium mereka 
                    kualitasnya konsisten dan harga bersaing."
                </p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">MR</div>
                    <div class="testimonial-info">
                        <h5>Muhammad Rizki</h5>
                        <p>Surabaya</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Pelayanan sangat ramah dan responsif. Produk gamis untuk 
                    keluarga kami sangat memuaskan. Terima kasih!"
                </p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">FA</div>
                    <div class="testimonial-info">
                        <h5>Fatimah Azzahra</h5>
                        <p>Bandung</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-container" data-aos="fade-up">
        <div class="cta-content">
            <h2>Siap Berbelanja?</h2>
            <p>
                Temukan koleksi lengkap fashion muslim berkualitas kami. 
                Hubungi kami sekarang untuk pemesanan atau informasi lebih lanjut.
            </p>
            <div class="cta-buttons">
                <a href="/products" class="btn btn-primary">
                    <i class="fas fa-shopping-bag"></i>
                    Lihat Katalog
                </a>
                <a href="/contact" class="btn btn-green">
                    <i class="fab fa-whatsapp"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Hero Slideshow
    const slides = document.querySelectorAll('.hero-slide');
    let currentSlide = 0;

    function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    // Change slide every 5 seconds
    setInterval(nextSlide, 5000);
</script>
@endpush
