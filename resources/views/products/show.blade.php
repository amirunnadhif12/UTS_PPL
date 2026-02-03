@extends('layouts.main')
@section('title', $product->nama_produk . ' - PT Assabar Sukses Berkah')

@push('styles')
<style>
    .product-detail-section {
        padding: 8rem 2rem 5rem;
        background: var(--cream);
        min-height: 100vh;
        position: relative;
    }

    .product-detail-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 350px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
        z-index: 0;
    }

    .product-detail-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 350px;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4af37' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 1;
        pointer-events: none;
    }

    .product-detail-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 10;
    }

    /* Breadcrumb */
    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 2rem;
        font-size: 0.9rem;
        padding: 1rem 1.5rem;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border-radius: 50px;
        width: fit-content;
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
        color: rgba(255,255,255,0.5);
    }

    .breadcrumb span:last-child {
        color: var(--secondary);
        font-weight: 500;
    }

    /* Product Card */
    .product-detail-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 25px 80px rgba(0,0,0,0.15);
    }

    .product-detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
    }

    /* Gallery */
    .product-gallery {
        padding: 2rem;
        background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .main-image-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        background: white;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }

    .main-image {
        width: 100%;
        height: 480px;
        position: relative;
        overflow: hidden;
    }

    .main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .main-image:hover img {
        transform: scale(1.08);
    }

    .image-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: var(--gold-gradient);
        color: var(--dark);
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        z-index: 5;
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
    }

    .thumbnail-grid {
        display: flex;
        gap: 1rem;
        justify-content: center;
    }

    .thumbnail {
        width: 85px;
        height: 85px;
        border-radius: 14px;
        overflow: hidden;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .thumbnail:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .thumbnail.active {
        border-color: var(--primary);
        box-shadow: 0 4px 20px rgba(26, 86, 50, 0.3);
    }

    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Product Info */
    .product-detail-info {
        padding: 3rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .product-detail-category {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, rgba(26, 86, 50, 0.1) 0%, rgba(26, 86, 50, 0.15) 100%);
        color: var(--primary);
        padding: 0.6rem 1.2rem;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        width: fit-content;
    }

    .product-detail-category i {
        font-size: 0.9rem;
    }

    .product-detail-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1.2;
        position: relative;
        padding-bottom: 1rem;
    }

    .product-detail-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 4px;
        background: var(--gold-gradient);
        border-radius: 2px;
    }

    .product-detail-description {
        color: #555;
        line-height: 1.9;
        font-size: 1rem;
        background: var(--cream);
        padding: 1.5rem;
        border-radius: 16px;
        border-left: 4px solid var(--secondary);
    }

    .product-meta {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .product-detail-date {
        color: #888;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .product-detail-date i {
        color: var(--primary);
    }

    /* Marketplace Section */
    .marketplace-section {
        margin-top: 1rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--cream) 0%, #fff 100%);
        border-radius: 20px;
        border: 1px solid #eee;
    }

    .marketplace-title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .marketplace-title i {
        color: var(--primary);
        font-size: 1.1rem;
    }

    .marketplace-links {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem;
    }

    .marketplace-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        padding: 0.9rem 1.6rem;
        border-radius: 14px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .marketplace-btn:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    .marketplace-btn i {
        font-size: 1.2rem;
    }

    .btn-shopee {
        background: linear-gradient(135deg, #EE4D2D 0%, #FF6B3D 100%);
        color: white;
    }

    .btn-shopee:hover {
        box-shadow: 0 8px 25px rgba(238, 77, 45, 0.4);
    }

    .btn-tokopedia {
        background: linear-gradient(135deg, #42B549 0%, #5DD55D 100%);
        color: white;
    }

    .btn-tokopedia:hover {
        box-shadow: 0 8px 25px rgba(66, 181, 73, 0.4);
    }

    .btn-lazada {
        background: linear-gradient(135deg, #0F146D 0%, #1E3A8A 100%);
        color: white;
    }

    .btn-lazada:hover {
        box-shadow: 0 8px 25px rgba(15, 20, 109, 0.4);
    }

    /* Actions */
    .product-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 1rem;
        padding-top: 1.5rem;
        border-top: 2px solid #eee;
    }

    .btn-whatsapp {
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1.1rem 2.2rem;
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 6px 25px rgba(37, 211, 102, 0.35);
    }

    .btn-whatsapp:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 35px rgba(37, 211, 102, 0.5);
    }

    .btn-whatsapp i {
        font-size: 1.3rem;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 1.1rem 1.8rem;
        background: transparent;
        color: var(--primary);
        text-decoration: none;
        border: 2px solid var(--primary);
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-4px);
        box-shadow: 0 6px 25px rgba(26, 86, 50, 0.3);
    }

    /* Related Products */
    .related-section {
        margin-top: 4rem;
        padding-top: 3rem;
    }

    .related-title {
        text-align: center;
        margin-bottom: 2rem;
    }

    .related-title h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
    }

    .related-title h2 i {
        color: var(--primary);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .product-detail-grid {
            grid-template-columns: 1fr;
        }

        .product-gallery {
            padding: 1.5rem;
        }

        .main-image {
            height: 380px;
        }

        .product-detail-info {
            padding: 2rem;
        }
    }

    @media (max-width: 768px) {
        .product-detail-section {
            padding: 7rem 1rem 3rem;
        }

        .product-detail-section::before,
        .product-detail-section::after {
            height: 280px;
        }

        .breadcrumb {
            font-size: 0.8rem;
            padding: 0.8rem 1rem;
            gap: 0.5rem;
        }

        .main-image {
            height: 300px;
        }

        .thumbnail {
            width: 65px;
            height: 65px;
        }

        .product-detail-title {
            font-size: 1.6rem;
        }

        .product-detail-info {
            padding: 1.5rem;
        }

        .marketplace-links {
            flex-direction: column;
        }

        .marketplace-btn {
            justify-content: center;
        }

        .product-actions {
            flex-direction: column;
        }

        .btn-whatsapp,
        .btn-back {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .thumbnail-grid {
            gap: 0.5rem;
        }

        .thumbnail {
            width: 55px;
            height: 55px;
            border-radius: 10px;
        }
    }
</style>
@endpush

@section('content')
<section class="product-detail-section">
    <div class="product-detail-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb" data-aos="fade-right">
            <a href="/"><i class="fas fa-home"></i></a>
            <span><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></span>
            <a href="{{ route('products') }}">Produk</a>
            <span><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></span>
            <span>{{ $product->nama_produk }}</span>
        </div>

        <div class="product-detail-card" data-aos="fade-up">
            <div class="product-detail-grid">
                <!-- Gallery -->
                <div class="product-gallery">
                    <div class="main-image-wrapper">
                        <span class="image-badge">
                            <i class="fas fa-star"></i> {{ $product->kategori }}
                        </span>
                        <div class="main-image" id="mainImage">
                            @if($product->gambar1)
                                <img src="{{ asset('storage/' . $product->gambar1) }}" alt="{{ $product->nama_produk }}" id="mainImg">
                            @else
                                <img src="https://via.placeholder.com/600x480?text=No+Image" alt="{{ $product->nama_produk }}" id="mainImg">
                            @endif
                        </div>
                    </div>
                    
                    @php
                        $images = [];
                        for ($i = 1; $i <= 5; $i++) {
                            $field = 'gambar' . $i;
                            if ($product->$field) {
                                $images[] = $product->$field;
                            }
                        }
                    @endphp

                    @if(count($images) > 1)
                    <div class="thumbnail-grid">
                        @foreach($images as $index => $image)
                        <div class="thumbnail {{ $index === 0 ? 'active' : '' }}" onclick="changeImage('{{ asset('storage/' . $image) }}', this)">
                            <img src="{{ asset('storage/' . $image) }}" alt="Thumbnail {{ $index + 1 }}">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Info -->
                <div class="product-detail-info">
                    <span class="product-detail-category">
                        <i class="fas fa-tag"></i>
                        {{ $product->kategori }}
                    </span>
                    
                    <h1 class="product-detail-title">{{ $product->nama_produk }}</h1>
                    
                    @if($product->deskripsi)
                    <p class="product-detail-description">{{ $product->deskripsi }}</p>
                    @endif

                    <div class="product-meta">
                        @if($product->tanggal_dibuat)
                        <p class="product-detail-date">
                            <i class="fas fa-calendar-alt"></i>
                            Ditambahkan {{ $product->tanggal_dibuat->format('d F Y') }}
                        </p>
                        @endif
                    </div>

                    <!-- Marketplace Links -->
                    @if($product->link_shopee || $product->link_tokopedia || $product->link_lazada)
                    <div class="marketplace-section">
                        <h4 class="marketplace-title">
                            <i class="fas fa-shopping-bag"></i>
                            Beli Langsung di Marketplace
                        </h4>
                        <div class="marketplace-links">
                            @if($product->link_shopee)
                            <a href="{{ $product->link_shopee }}" target="_blank" class="marketplace-btn btn-shopee">
                                <i class="fas fa-shopping-cart"></i>
                                Beli di Shopee
                            </a>
                            @endif
                            
                            @if($product->link_tokopedia)
                            <a href="{{ $product->link_tokopedia }}" target="_blank" class="marketplace-btn btn-tokopedia">
                                <i class="fas fa-store"></i>
                                Beli di Tokopedia
                            </a>
                            @endif
                            
                            @if($product->link_lazada)
                            <a href="{{ $product->link_lazada }}" target="_blank" class="marketplace-btn btn-lazada">
                                <i class="fas fa-shopping-basket"></i>
                                Beli di Lazada
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="product-actions">
                        <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan produk {{ urlencode($product->nama_produk) }}. Apakah masih tersedia?" target="_blank" class="btn-whatsapp">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi via WhatsApp
                        </a>
                        <a href="{{ route('products') }}" class="btn-back">
                            <i class="fas fa-arrow-left"></i>
                            Kembali ke Katalog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function changeImage(src, element) {
    // Fade effect
    const mainImg = document.getElementById('mainImg');
    mainImg.style.opacity = '0';
    
    setTimeout(() => {
        mainImg.src = src;
        mainImg.style.opacity = '1';
    }, 200);
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('active');
    });
    element.classList.add('active');
}

// Add transition to main image
document.getElementById('mainImg').style.transition = 'opacity 0.2s ease';
</script>
@endpush
