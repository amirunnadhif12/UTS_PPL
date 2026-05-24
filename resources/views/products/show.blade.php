@extends('layouts.main')
@section('title', $product->nama_produk )

@section('content')
<section class="pt-24 sm:pt-32 pb-12 sm:pb-20 bg-cream min-h-screen relative">
    <!-- Header Background -->
    <div class="absolute top-0 left-0 right-0 h-60 sm:h-80 bg-gradient-to-br from-primary to-dark z-0"></div>
    <div class="absolute top-0 left-0 right-0 h-60 sm:h-80 opacity-10 pointer-events-none z-1" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23d4af37\' fill-opacity=\'0.1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-8 relative z-10">
        <!-- Breadcrumb -->
       

        <div class="bg-white rounded-2xl sm:rounded-3xl overflow-hidden shadow-2xl" data-aos="fade-up">
            <div class="grid lg:grid-cols-2">
                <!-- Gallery -->
                <div class="p-4 sm:p-8 bg-gradient-to-br from-gray-50 to-white flex flex-col gap-4 sm:gap-6">
                    <div class="relative rounded-2xl overflow-hidden bg-white shadow-lg">
                        <span class="absolute top-4 left-4 bg-gold-gradient text-dark py-2 px-4 rounded-full text-xs font-bold uppercase tracking-wide z-10 shadow-lg">
                            <i class="fas fa-star mr-1"></i> {{ $product->kategori }}
                        </span>
                        <div class="h-64 sm:h-96 lg:h-[480px] overflow-hidden cursor-pointer" id="mainImage" onclick="openLightbox()">
                            @if($product->gambar1)
                                <img src="{{ asset('storage/' . $product->gambar1) }}" alt="{{ $product->nama_produk }}" id="mainImg" class="w-full h-full object-cover transition-all duration-500 hover:scale-110">
                            @else
                                <img src="https://via.placeholder.com/600x480?text=No+Image" alt="{{ $product->nama_produk }}" id="mainImg" class="w-full h-full object-cover">
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
                    <div class="flex gap-2 sm:gap-4 justify-center">
                        @foreach($images as $index => $image)
                        <div class="thumbnail w-14 h-14 sm:w-20 sm:h-20 rounded-lg sm:rounded-xl overflow-hidden cursor-pointer border-2 sm:border-3 transition-all duration-300 shadow-md hover:-translate-y-1 hover:shadow-lg {{ $index === 0 ? 'border-primary shadow-primary/30' : 'border-transparent' }}" onclick="changeImage('{{ asset('storage/' . $image) }}', this)">
                            <img src="{{ asset('storage/' . $image) }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Info -->
                <div class="p-4 sm:p-8 lg:p-12 flex flex-col gap-4 sm:gap-6">
                    <span class="inline-flex items-center gap-2 bg-gradient-to-r from-primary/10 to-primary/15 text-primary py-2 px-5 rounded-full text-sm font-semibold uppercase tracking-wide w-fit">
                        <i class="fas fa-tag"></i>
                        {{ $product->kategori }}
                    </span>
                    
                    <h1 class="text-xl sm:text-3xl lg:text-4xl font-extrabold text-dark leading-tight pb-4 relative after:absolute after:bottom-0 after:left-0 after:w-20 after:h-1 after:bg-gold-gradient after:rounded">{{ $product->nama_produk }}</h1>
                    
                    @if($product->deskripsi)
                    <p class="text-gray-600 leading-relaxed bg-cream p-4 sm:p-6 rounded-xl sm:rounded-2xl border-l-4 border-secondary text-sm sm:text-base">{{ $product->deskripsi }}</p>
                    @endif

                    <!-- Marketplace Icons -->
                    <div class="p-4 sm:p-6 bg-gradient-to-br from-cream to-white rounded-xl sm:rounded-2xl border border-gray-100">
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3 sm:mb-4">Tersedia disini</h3>
                        <div class="flex flex-wrap gap-3 sm:gap-4">
                            <!-- Shopee -->
                            <a href="https://shopee.co.id/as_sabarofficialshop" target="_blank" class="w-12 h-12 sm:w-16 sm:h-16 rounded-lg sm:rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-orange-500 p-1.5 sm:p-2" title="Shopee">
                                <img src="/images/logo/logo shoope.png" alt="Shopee" class="w-full h-full object-contain">
                            </a>
                            <!-- Tokopedia -->
                            <a href="https://www.tokopedia.com/as-sabar-moslem-wear" target="_blank" class="w-12 h-12 sm:w-16 sm:h-16 rounded-lg sm:rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-green-500 p-1.5 sm:p-2" title="Tokopedia">
                                <img src="/images/logo/logo tokopedia.png" alt="Tokopedia" class="w-full h-full object-contain">
                            </a>
                            <!-- Lazada -->
                            <a href="https://www.lazada.co.id/as-sabar" target="_blank" class="w-12 h-12 sm:w-16 sm:h-16 rounded-lg sm:rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-blue-600 p-1.5 sm:p-2" title="Lazada">
                                <img src="/images/logo/logo lazada.png" alt="Lazada" class="w-full h-full object-contain">
                            </a>
                            <!-- TikTok -->
                            <a href="https://vt.tiktok.com/ZSmL7D97K/?page=Mall" target="_blank" class="w-12 h-12 sm:w-16 sm:h-16 rounded-lg sm:rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-black p-1.5 sm:p-2" title="TikTok">
                                <img src="/images/logo/logo tiktokshop.png" alt="TikTok" class="w-full h-full object-contain">
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row flex-wrap gap-3 sm:gap-4 pt-4 sm:pt-6 border-t-2 border-gray-100">
                       <a href="{{ route('products') }}" class="inline-flex items-center justify-center gap-2 py-3 sm:py-4 px-5 sm:px-6 bg-transparent text-primary border-2 border-primary rounded-full font-semibold text-sm sm:text-base transition-all duration-300 hover:bg-primary hover:text-white hover:-translate-y-1 hover:shadow-lg">
                            <i class="fas fa-arrow-left"></i>
                            Kembali ke Katalog
                        </a>
                        <a href="https://wa.me/6285748169363?text=Halo, saya tertarik dengan produk {{ urlencode($product->nama_produk) }}. Apakah masih tersedia?" target="_blank" class="inline-flex items-center justify-center gap-3 py-3 sm:py-4 px-6 sm:px-8 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-full font-semibold text-sm sm:text-base shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-green-500/50">
                            <i class="fab fa-whatsapp text-xl"></i>
                            order disini
                        </a>
                        
                    </div>

                    <!-- Bagikan Produk -->
                    <div class="pt-4">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Bagikan Produk</h3>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://wa.me/?text={{ urlencode($product->nama_produk . ' - Lihat produk ini di ' . url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-green-500/30" title="Bagikan ke WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-600/30" title="Bagikan ke Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($product->nama_produk) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-black/30" title="Bagikan ke X">
                                <i class="fab fa-x-twitter"></i>
                            </a>
                            <a href="https://telegram.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($product->nama_produk) }}" target="_blank" class="w-10 h-10 rounded-full bg-sky-500 text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-sky-500/30" title="Bagikan ke Telegram">
                                <i class="fab fa-telegram-plane"></i>
                            </a>
                            <button onclick="copyLink()" class="w-10 h-10 rounded-full bg-gray-600 text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-gray-600/30" title="Salin Link" id="copyBtn">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>
                        <span id="copyNotif" class="text-xs text-green-600 font-medium mt-2 hidden">Link berhasil disalin!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 backdrop-blur-sm" onclick="closeLightbox(event)">
    <!-- Close Button -->
    <button onclick="closeLightbox(event, true)" class="absolute top-4 right-4 sm:top-6 sm:right-6 w-10 h-10 sm:w-12 sm:h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white text-xl transition-all duration-300 z-50">
        <i class="fas fa-times"></i>
    </button>

    <!-- Navigation Arrows -->
    <button id="lightboxPrev" onclick="lightboxNav(event, -1)" class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white text-lg transition-all duration-300 z-50">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button id="lightboxNext" onclick="lightboxNav(event, 1)" class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white text-lg transition-all duration-300 z-50">
        <i class="fas fa-chevron-right"></i>
    </button>

    <!-- Image -->
    <div class="max-w-5xl max-h-[85vh] px-4" onclick="event.stopPropagation()">
        <img id="lightboxImg" src="" alt="" class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl transition-opacity duration-300">
    </div>

    <!-- Counter -->
    <div id="lightboxCounter" class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 text-white/70 text-sm font-medium bg-black/40 px-4 py-1.5 rounded-full"></div>
</div>
@endsection

@push('scripts')
<script>
const allImages = [
    @foreach($images as $image)
        '{{ asset('storage/' . $image) }}',
    @endforeach
];
let currentLightboxIndex = 0;

function openLightbox() {
    const mainImg = document.getElementById('mainImg');
    currentLightboxIndex = allImages.indexOf(mainImg.src) !== -1 ? allImages.indexOf(mainImg.src) : 0;
    
    // Try matching by filename in case of different base URLs
    if (currentLightboxIndex === 0 && allImages.length > 0) {
        const mainSrc = mainImg.src;
        allImages.forEach((img, i) => {
            if (mainSrc.includes(img.split('/').pop()) || img.includes(mainSrc.split('/').pop())) {
                currentLightboxIndex = i;
            }
        });
    }
    
    showLightboxImage();
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.remove('hidden');
    lightbox.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeLightbox(event, force = false) {
    if (force || event.target.id === 'lightbox') {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = '';
    }
}

function lightboxNav(event, direction) {
    event.stopPropagation();
    currentLightboxIndex += direction;
    if (currentLightboxIndex < 0) currentLightboxIndex = allImages.length - 1;
    if (currentLightboxIndex >= allImages.length) currentLightboxIndex = 0;
    showLightboxImage();
}

function showLightboxImage() {
    const img = document.getElementById('lightboxImg');
    img.style.opacity = '0';
    setTimeout(() => {
        img.src = allImages[currentLightboxIndex];
        img.style.opacity = '1';
    }, 150);
    document.getElementById('lightboxCounter').textContent = (currentLightboxIndex + 1) + ' / ' + allImages.length;
    
    // Hide nav if only 1 image
    document.getElementById('lightboxPrev').style.display = allImages.length <= 1 ? 'none' : 'flex';
    document.getElementById('lightboxNext').style.display = allImages.length <= 1 ? 'none' : 'flex';
}

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    const lightbox = document.getElementById('lightbox');
    if (lightbox.classList.contains('hidden')) return;
    
    if (e.key === 'Escape') closeLightbox(e, true);
    if (e.key === 'ArrowLeft') lightboxNav(e, -1);
    if (e.key === 'ArrowRight') lightboxNav(e, 1);
});

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        const notif = document.getElementById('copyNotif');
        notif.classList.remove('hidden');
        setTimeout(() => notif.classList.add('hidden'), 2000);
    });
}

function changeImage(src, element) {
    const mainImg = document.getElementById('mainImg');
    mainImg.style.opacity = '0';
    
    setTimeout(() => {
        mainImg.src = src;
        mainImg.style.opacity = '1';
    }, 200);
    
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('border-primary', 'shadow-primary/30');
        thumb.classList.add('border-transparent');
    });
    element.classList.add('border-primary', 'shadow-primary/30');
    element.classList.remove('border-transparent');
}

const mainImg = document.getElementById('mainImg');
if (mainImg) {
    mainImg.style.transition = 'opacity 0.2s ease';
}
</script>
@endpush
