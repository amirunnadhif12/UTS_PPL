@extends('layouts.main')
@section('title', 'Produk - PT Assabar Sukses Berkah | Katalog Busana Muslim')

@section('content')
<!-- Page Header -->
<section class="min-h-[35vh] flex items-center justify-center relative overflow-hidden">
    <!-- Slideshow Background -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="product-slide-track flex h-full transition-transform duration-700 ease-in-out" style="width: 300%;">
            <div style="width: 33.333%;" class="h-full shrink-0">
                <img src="/images/hero/image-1.png" alt="" class="w-full h-full object-cover">
            </div>
            <div style="width: 33.333%;" class="h-full shrink-0">
                <img src="/images/hero/image-2.png" alt="" class="w-full h-full object-cover">
            </div>
            <div style="width: 33.333%;" class="h-full shrink-0">
                <img src="/images/hero/image-3.png" alt="" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-primary/85 via-primary/70 to-dark/85 z-1"></div>
    <div class="absolute inset-0 opacity-5 pointer-events-none z-[2]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23d4af37\' fill-opacity=\'0.06\'%3E%3Cpath d=\'M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 text-center text-white py-12 px-8" data-aos="fade-up">
        <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">Katalog <span class="text-secondary">Produk</span></h1>
        <p class="text-lg opacity-90 max-w-2xl mx-auto">Koleksi busana muslim berkualitas tinggi dengan sentuhan elegan dan modern untuk menemani ibadah Anda</p>
    </div>
</section>

<!-- Category Filter & Products Section -->
<section class="py-12 pb-24 bg-cream">
    <div class="max-w-7xl mx-auto px-8">
        <!-- Filter Buttons -->
        <div class="flex justify-center flex-wrap gap-4 mb-12" data-aos="fade-up">
            <button class="filter-btn px-8 py-3 border-2 border-primary bg-transparent text-primary font-medium rounded-full flex items-center gap-2 transition-all duration-300 hover:bg-primary hover:text-white hover:-translate-y-0.5 active" data-filter="all">
                <i class="fas fa-th-large"></i>
                Semua Produk
            </button>
            <button class="filter-btn px-8 py-3 border-2 border-primary bg-transparent text-primary font-medium rounded-full flex items-center gap-2 transition-all duration-300 hover:bg-primary hover:text-white hover:-translate-y-0.5" data-filter="gamis">
                <i class="fas fa-vest"></i>
                Gamis
            </button>
            <button class="filter-btn px-8 py-3 border-2 border-primary bg-transparent text-primary font-medium rounded-full flex items-center gap-2 transition-all duration-300 hover:bg-primary hover:text-white hover:-translate-y-0.5" data-filter="koko">
                <i class="fas fa-tshirt"></i>
                Baju Koko
            </button>
            <button class="filter-btn px-8 py-3 border-2 border-primary bg-transparent text-primary font-medium rounded-full flex items-center gap-2 transition-all duration-300 hover:bg-primary hover:text-white hover:-translate-y-0.5" data-filter="songkok">
                <i class="fas fa-hat-wizard"></i>
                Songkok
            </button>
            <button class="filter-btn px-8 py-3 border-2 border-primary bg-transparent text-primary font-medium rounded-full flex items-center gap-2 transition-all duration-300 hover:bg-primary hover:text-white hover:-translate-y-0.5" data-filter="peci">
                <i class="fas fa-hat-cowboy"></i>
                Peci
            </button>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $index => $product)
            <div class="product-card bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-400 relative" data-category="{{ strtolower($product->kategori) }}" data-aos="fade-up" data-aos-delay="{{ ($index % 6 + 1) * 50 }}">
                <div class="relative h-80 overflow-hidden group">
                    <a href="{{ route('products.show', $product->id) }}" class="block w-full h-full cursor-pointer">
                    @if($product->gambar1)
                        <img src="{{ asset('storage/' . $product->gambar1) }}" alt="{{ $product->nama_produk }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <img src="https://via.placeholder.com/500x400?text=No+Image" alt="{{ $product->nama_produk }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @endif
                    </a>
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent flex justify-center gap-3 translate-y-full transition-transform duration-400 group-hover:translate-y-0">
                        <a href="{{ route('products.show', $product->id) }}" class="w-11 h-11 rounded-full bg-white text-primary flex items-center justify-center transition-all duration-300 hover:bg-secondary hover:text-dark hover:scale-110" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                        <button onclick="if(navigator.share){navigator.share({title:'{{ $product->nama_produk }}',url:'{{ route('products.show', $product->id) }}'})}else{navigator.clipboard.writeText('{{ route('products.show', $product->id) }}');alert('Link berhasil disalin!')}" class="w-11 h-11 rounded-full bg-white text-primary flex items-center justify-center transition-all duration-300 hover:bg-secondary hover:text-dark hover:scale-110" title="Share Produk"><i class="fas fa-share-alt"></i></button>
                        <a href="https://wa.me/6285748169363?text=Halo, saya tertarik dengan produk {{ urlencode($product->nama_produk) }}" target="_blank" class="w-11 h-11 rounded-full bg-white text-primary flex items-center justify-center transition-all duration-300 hover:bg-secondary hover:text-dark hover:scale-110" title="Hubungi Kami"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="p-6">
                    <span class="inline-block bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide mb-3">{{ $product->kategori }}</span>
                    <h3 class="text-xl font-semibold text-dark mb-2 leading-snug">{{ $product->nama_produk }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($product->deskripsi, 100) }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <i class="fas fa-box-open text-7xl text-gray-300 mb-4 block"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-400">Produk akan segera tersedia. Silakan kunjungi kembali nanti.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category Filter
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    // Normalize category for comparison
    function normalizeCategory(cat) {
        if (!cat) return '';
        cat = cat.toLowerCase().trim();
        // Map common variations
        if (cat === 'baju koko' || cat === 'bajukoko') return 'koko';
        if (cat === 'jubah') return 'gamis';
        return cat;
    }

    // Function to apply filter
    function applyFilter(filter) {
        // Update button states
        filterBtns.forEach(b => {
            if (b.dataset.filter === filter) {
                b.classList.add('active', 'bg-primary', 'text-white');
                b.classList.remove('bg-transparent', 'text-primary');
            } else {
                b.classList.remove('active', 'bg-primary', 'text-white');
                b.classList.add('bg-transparent', 'text-primary');
            }
        });

        // Filter products
        let visibleCount = 0;
        productCards.forEach(card => {
            const cardCategory = normalizeCategory(card.dataset.category);
            if (filter === 'all' || cardCategory === filter) {
                card.style.display = 'block';
                card.style.opacity = '1';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        console.log('Filter applied:', filter, 'Visible products:', visibleCount);
    }

    // Check URL parameter on page load
    const urlParams = new URLSearchParams(window.location.search);
    const categoryParam = urlParams.get('category');
    if (categoryParam) {
        // Apply filter immediately for URL parameter
        applyFilter(categoryParam.toLowerCase());
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

    // Product Header Slideshow (horizontal slide)
    const slideTrack = document.querySelector('.product-slide-track');
    let currentProductSlide = 0;
    const totalSlides = 3;
    function nextProductSlide() {
        currentProductSlide = (currentProductSlide + 1) % totalSlides;
        slideTrack.style.transform = 'translateX(-' + (currentProductSlide * (100 / totalSlides)) + '%)';
    }
    if (slideTrack) {
        setInterval(nextProductSlide, 5000);
    }
});
</script>
@endpush

@push('styles')
<style>
    .filter-btn.active {
        background-color: var(--color-primary) !important;
        color: white !important;
        box-shadow: 0 5px 20px rgba(14, 124, 140, 0.3);
    }
    .product-slide-track {
        will-change: transform;
    }
</style>
@endpush
