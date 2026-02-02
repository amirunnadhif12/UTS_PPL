@extends('layouts.main')
@section('title', 'Produk - PT Assabar Sukses Berkah | Katalog Busana Muslim')

@push('styles')
<style>
    /* Page Header */
    .page-header {
        min-height: 50vh;
        background: linear-gradient(135deg, rgba(26, 86, 50, 0.95) 0%, rgba(15, 61, 34, 0.98) 100%),
                    url('https://images.unsplash.com/photo-1558171813-4c088753af8f?w=1920') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4af37' fill-opacity='0.06'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
    }

    .page-header-content {
        text-align: center;
        color: white;
        z-index: 2;
        padding: 2rem;
    }

    .page-header h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 4px 10px rgba(0,0,0,0.3);
    }

    .page-header h1 span {
        color: var(--secondary);
    }

    .page-header p {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }

    .breadcrumb {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 1.5rem;
        font-size: 0.95rem;
    }

    .breadcrumb a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb a:hover {
        color: var(--secondary);
    }

    .breadcrumb span {
        color: var(--secondary);
    }

    /* Category Filter */
    .category-section {
        padding: 4rem 0 2rem;
        background: var(--cream);
    }

    .category-filter {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .filter-btn {
        padding: 0.8rem 2rem;
        border: 2px solid var(--primary);
        background: transparent;
        color: var(--primary);
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 0.95rem;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(26, 86, 50, 0.3);
    }

    .filter-btn i {
        font-size: 1.1rem;
    }

    /* Products Grid */
    .products-section {
        padding: 3rem 0 6rem;
        background: var(--cream);
    }

    .products-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    /* Product Card */
    .product-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    }

    .product-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: var(--secondary);
        color: var(--dark);
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 10;
    }

    .product-badge.new {
        background: var(--primary);
        color: white;
    }

    .product-badge.sale {
        background: #e74c3c;
        color: white;
    }

    .product-image {
        position: relative;
        height: 320px;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .product-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.5rem;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        display: flex;
        justify-content: center;
        gap: 0.8rem;
        transform: translateY(100%);
        transition: transform 0.4s ease;
    }

    .product-card:hover .product-overlay {
        transform: translateY(0);
    }

    .overlay-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: none;
        background: white;
        color: var(--primary);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .overlay-btn:hover {
        background: var(--secondary);
        color: var(--dark);
        transform: scale(1.1);
    }

    .product-info {
        padding: 1.5rem;
    }

    .product-category {
        display: inline-block;
        background: rgba(26, 86, 50, 0.1);
        color: var(--primary);
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.8rem;
    }

    .product-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .product-description {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        line-height: 1.6;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }

    .product-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary);
    }

    .product-price .old-price {
        font-size: 0.9rem;
        color: #999;
        text-decoration: line-through;
        margin-right: 0.5rem;
        font-weight: 400;
    }

    .product-colors {
        display: flex;
        gap: 0.4rem;
    }

    .color-dot {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid #ddd;
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .color-dot:hover {
        transform: scale(1.2);
    }

    /* Section Header */
    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1rem;
    }

    .section-header h2 span {
        color: var(--primary);
    }

    .section-header p {
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.8;
    }

    /* Featured Banner */
    .featured-banner {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 4rem;
        border-radius: 30px;
        margin-bottom: 4rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 2rem;
        position: relative;
        overflow: hidden;
    }

    .featured-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4af37' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
    }

    .featured-content {
        flex: 1;
        min-width: 300px;
        z-index: 2;
    }

    .featured-content h3 {
        font-size: 2rem;
        color: white;
        margin-bottom: 1rem;
    }

    .featured-content h3 span {
        color: var(--secondary);
    }

    .featured-content p {
        color: rgba(255,255,255,0.9);
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }

    .featured-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        background: var(--secondary);
        color: var(--dark);
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .featured-btn:hover {
        background: white;
        transform: translateX(5px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2.5rem;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        }

        .featured-banner {
            padding: 2rem;
            text-align: center;
        }

        .featured-content h3 {
            font-size: 1.5rem;
        }

        .filter-btn {
            padding: 0.6rem 1.2rem;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 480px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .products-grid {
            grid-template-columns: 1fr;
        }

        .product-image {
            height: 280px;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="page-header-content" data-aos="fade-up">
        <h1>Katalog <span>Produk</span></h1>
        <p>Koleksi busana muslim berkualitas tinggi dengan sentuhan elegan dan modern untuk menemani ibadah Anda</p>
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <span>Produk</span>
        </div>
    </div>
</section>

<!-- Category Filter -->
<section class="category-section">
    <div class="category-filter" data-aos="fade-up">
        <button class="filter-btn active" data-filter="all">
            <i class="fas fa-th-large"></i>
            Semua Produk
        </button>
        <button class="filter-btn" data-filter="jubah">
            <i class="fas fa-vest"></i>
            Jubah
        </button>
        <button class="filter-btn" data-filter="koko">
            <i class="fas fa-tshirt"></i>
            Baju Koko
        </button>
        <button class="filter-btn" data-filter="songkok">
            <i class="fas fa-hat-wizard"></i>
            Songkok
        </button>
        <button class="filter-btn" data-filter="peci">
            <i class="fas fa-hat-cowboy"></i>
            Peci
        </button>
    </div>
</section>

<!-- Products Section -->
<section class="products-section">
    <div class="products-container">
        <!-- Featured Banner -->
        <div class="featured-banner" data-aos="fade-up">
            <div class="featured-content">
                <h3>Koleksi <span>Ramadhan 2026</span></h3>
                <p>Sambut bulan suci dengan koleksi terbaru busana muslim premium. Dapatkan diskon spesial hingga 30% untuk pembelian pertama.</p>
                <a href="#" class="featured-btn">
                    Lihat Koleksi
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Section Header -->
        <div class="section-header" data-aos="fade-up">
            <h2>Koleksi <span>Busana Muslim</span></h2>
            <p>Temukan berbagai pilihan jubah, baju koko, songkok, dan peci berkualitas tinggi dengan desain modern dan nyaman dipakai</p>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            <!-- Jubah Products -->
            <div class="product-card" data-category="jubah" data-aos="fade-up" data-aos-delay="100">
                <span class="product-badge new">Baru</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=500" alt="Jubah Premium Al-Haramain">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Jubah</span>
                    <h3 class="product-name">Jubah Premium Al-Haramain</h3>
                    <p class="product-description">Jubah pria berbahan katun premium dengan bordiran eksklusif, nyaman untuk ibadah dan acara formal.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 450.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #1a1a1a;"></span>
                            <span class="color-dot" style="background: #f5f5dc;"></span>
                            <span class="color-dot" style="background: #1a5632;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-card" data-category="jubah" data-aos="fade-up" data-aos-delay="150">
                <span class="product-badge">Best Seller</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1589465885857-44edb59bbff2?w=500" alt="Jubah Saudi Classic">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Jubah</span>
                    <h3 class="product-name">Jubah Saudi Classic</h3>
                    <p class="product-description">Jubah model Saudi Arabia dengan bahan premium yang adem dan tidak mudah kusut.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 385.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #fff;"></span>
                            <span class="color-dot" style="background: #d4af37;"></span>
                            <span class="color-dot" style="background: #4a4a4a;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-card" data-category="jubah" data-aos="fade-up" data-aos-delay="200">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=500" alt="Jubah Madinah Elegant">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Jubah</span>
                    <h3 class="product-name">Jubah Madinah Elegant</h3>
                    <p class="product-description">Jubah elegan dengan detail bordiran khas Madinah, cocok untuk acara spesial.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 520.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #2c3e50;"></span>
                            <span class="color-dot" style="background: #8b4513;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Baju Koko Products -->
            <div class="product-card" data-category="koko" data-aos="fade-up" data-aos-delay="100">
                <span class="product-badge new">Baru</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=500" alt="Koko Premium Bordir">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Baju Koko</span>
                    <h3 class="product-name">Koko Premium Bordir Emas</h3>
                    <p class="product-description">Baju koko lengan panjang dengan bordir emas yang elegan, bahan katun toyobo premium.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 275.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #fff;"></span>
                            <span class="color-dot" style="background: #1a5632;"></span>
                            <span class="color-dot" style="background: #1a1a1a;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-card" data-category="koko" data-aos="fade-up" data-aos-delay="150">
                <span class="product-badge sale">Diskon 20%</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500" alt="Koko Modern Slim Fit">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Baju Koko</span>
                    <h3 class="product-name">Koko Modern Slim Fit</h3>
                    <p class="product-description">Baju koko dengan potongan modern slim fit, cocok untuk anak muda yang aktif.</p>
                    <div class="product-footer">
                        <div class="product-price">
                            <span class="old-price">Rp 250.000</span>
                            Rp 200.000
                        </div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #3498db;"></span>
                            <span class="color-dot" style="background: #2ecc71;"></span>
                            <span class="color-dot" style="background: #9b59b6;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-card" data-category="koko" data-aos="fade-up" data-aos-delay="200">
                <span class="product-badge">Best Seller</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500" alt="Koko Casual Daily">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Baju Koko</span>
                    <h3 class="product-name">Koko Casual Daily</h3>
                    <p class="product-description">Baju koko kasual untuk sehari-hari, nyaman dan tetap stylish untuk aktivitas apapun.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 185.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #ecf0f1;"></span>
                            <span class="color-dot" style="background: #bdc3c7;"></span>
                            <span class="color-dot" style="background: #34495e;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Songkok Products -->
            <div class="product-card" data-category="songkok" data-aos="fade-up" data-aos-delay="100">
                <span class="product-badge new">Baru</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1582791694770-cbdc9dda338f?w=500" alt="Songkok Nasional Premium">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Songkok</span>
                    <h3 class="product-name">Songkok Nasional Premium</h3>
                    <p class="product-description">Songkok hitam premium kualitas terbaik, cocok untuk acara formal dan resmi.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 125.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #1a1a1a;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-card" data-category="songkok" data-aos="fade-up" data-aos-delay="150">
                <span class="product-badge">Best Seller</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=500" alt="Songkok Beludru Exclusive">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Songkok</span>
                    <h3 class="product-name">Songkok Beludru Exclusive</h3>
                    <p class="product-description">Songkok berbahan beludru halus dengan jahitan rapi, tampil elegan dalam setiap kesempatan.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 95.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #1a1a1a;"></span>
                            <span class="color-dot" style="background: #2c3e50;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-card" data-category="songkok" data-aos="fade-up" data-aos-delay="200">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500" alt="Songkok AC Bordir">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Songkok</span>
                    <h3 class="product-name">Songkok AC Bordir Emas</h3>
                    <p class="product-description">Songkok dengan lubang ventilasi AC dan bordiran emas, adem dan mewah.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 150.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #1a1a1a;"></span>
                            <span class="color-dot" style="background: #8b4513;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Peci Products -->
            <div class="product-card" data-category="peci" data-aos="fade-up" data-aos-delay="100">
                <span class="product-badge new">Baru</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1521369909029-2afed882baee?w=500" alt="Peci Rajut Premium">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Peci</span>
                    <h3 class="product-name">Peci Rajut Premium</h3>
                    <p class="product-description">Peci rajut tangan dengan motif tradisional, nyaman dan tidak panas di kepala.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 75.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #fff;"></span>
                            <span class="color-dot" style="background: #1a1a1a;"></span>
                            <span class="color-dot" style="background: #8b4513;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-card" data-category="peci" data-aos="fade-up" data-aos-delay="150">
                <span class="product-badge">Best Seller</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=500" alt="Peci Putih Haji">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Peci</span>
                    <h3 class="product-name">Peci Putih Haji Premium</h3>
                    <p class="product-description">Peci putih berkualitas tinggi, ideal untuk ibadah haji dan umrah.</p>
                    <div class="product-footer">
                        <div class="product-price">Rp 85.000</div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #fff; border-color: #ccc;"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-card" data-category="peci" data-aos="fade-up" data-aos-delay="200">
                <span class="product-badge sale">Diskon 15%</span>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=500" alt="Peci Motif Ethnic">
                    <div class="product-overlay">
                        <button class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <button class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">Peci</span>
                    <h3 class="product-name">Peci Motif Ethnic Nusantara</h3>
                    <p class="product-description">Peci dengan motif batik dan tenun khas nusantara, perpaduan tradisi dan modernitas.</p>
                    <div class="product-footer">
                        <div class="product-price">
                            <span class="old-price">Rp 100.000</span>
                            Rp 85.000
                        </div>
                        <div class="product-colors">
                            <span class="color-dot" style="background: #8b4513;"></span>
                            <span class="color-dot" style="background: #2c3e50;"></span>
                            <span class="color-dot" style="background: #1a5632;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Category Filter
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            btn.classList.add('active');

            const filter = btn.dataset.filter;

            productCards.forEach(card => {
                if (filter === 'all' || card.dataset.category === filter) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.5s ease forwards';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Add fadeInUp animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(style);
</script>
@endpush