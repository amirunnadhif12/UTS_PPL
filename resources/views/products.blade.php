@extends('layouts.main')
@section('title', 'Produk - PT Assabar Sukses Berkah | Katalog Busana Muslim')



@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="page-header-content" data-aos="fade-up">
        <h1>Katalog <span>Produk</span></h1>
        <p>Koleksi busana muslim berkualitas tinggi dengan sentuhan elegan dan modern untuk menemani ibadah Anda</p>
        
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
        

        <!-- Section Header -->
        <div class="section-header" data-aos="fade-up">
            <h2>Koleksi <span>Busana Muslim</span></h2>
            <p>Temukan berbagai pilihan jubah, baju koko, songkok, dan peci berkualitas tinggi dengan desain modern dan nyaman dipakai</p>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            @forelse($products as $index => $product)
            <div class="product-card" data-category="{{ strtolower(str_replace(' ', '', $product->kategori)) }}" data-aos="fade-up" data-aos-delay="{{ ($index % 6 + 1) * 50 }}">
                <div class="product-image">
                    @if($product->gambar1)
                        <img src="{{ asset('storage/' . $product->gambar1) }}" alt="{{ $product->nama_produk }}">
                    @else
                        <img src="https://via.placeholder.com/500x400?text=No+Image" alt="{{ $product->nama_produk }}">
                    @endif
                    <div class="product-overlay">
                        <a href="{{ route('products.show', $product->id) }}" class="overlay-btn" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                        <button class="overlay-btn" title="Tambah ke Wishlist"><i class="fas fa-heart"></i></button>
                        <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan produk {{ urlencode($product->nama_produk) }}" target="_blank" class="overlay-btn" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category">{{ $product->kategori }}</span>
                    <h3 class="product-name">{{ $product->nama_produk }}</h3>
                    <p class="product-description">{{ Str::limit($product->deskripsi, 100) }}</p>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;">
                <i class="fas fa-box-open" style="font-size: 4rem; color: #ddd; margin-bottom: 1rem; display: block;"></i>
                <h3 style="color: #666; margin-bottom: 0.5rem;">Belum Ada Produk</h3>
                <p style="color: #999;">Produk akan segera tersedia. Silakan kunjungi kembali nanti.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Category Filter
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    // Function to apply filter
    function applyFilter(filter) {
        filterBtns.forEach(b => {
            if (b.dataset.filter === filter) {
                b.classList.add('active');
            } else {
                b.classList.remove('active');
            }
        });

        productCards.forEach(card => {
            if (filter === 'all' || card.dataset.category === filter) {
                card.style.display = 'block';
                card.style.animation = 'fadeInUp 0.5s ease forwards';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Check URL parameter on page load
    const urlParams = new URLSearchParams(window.location.search);
    const categoryParam = urlParams.get('category');
    if (categoryParam) {
        applyFilter(categoryParam);
    }

    // Click event for filter buttons
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;
            applyFilter(filter);
            
            // Update URL without reload
            if (filter === 'all') {
                history.pushState({}, '', '/products');
            } else {
                history.pushState({}, '', '/products?category=' + filter);
            }
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

@push('styles')
<style>
    /* Page Header */
    .page-header {
        min-height: 50vh;
        background: url('/images/hero/hero-2.jpg') bottom/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .page-header::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(
            180deg,
            rgba(26, 86, 50, 0.85) 0%,
            rgba(26, 86, 50, 0.7) 50%,
            rgba(26, 26, 46, 0.85) 100%
        );
        z-index: 1;
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
