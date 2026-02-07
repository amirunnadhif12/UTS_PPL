@extends('layouts.main')
@section('title', $product->nama_produk . ' - PT Assabar Sukses Berkah')

@section('content')
<section class="pt-32 pb-20 bg-cream min-h-screen relative">
    <!-- Header Background -->
    <div class="absolute top-0 left-0 right-0 h-80 bg-gradient-to-br from-primary to-dark z-0"></div>
    <div class="absolute top-0 left-0 right-0 h-80 opacity-10 pointer-events-none z-1" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23d4af37\' fill-opacity=\'0.1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <div class="max-w-6xl mx-auto px-8 relative z-10">
        <!-- Breadcrumb -->
       

        <div class="bg-white rounded-3xl overflow-hidden shadow-2xl" data-aos="fade-up">
            <div class="grid lg:grid-cols-2">
                <!-- Gallery -->
                <div class="p-8 bg-gradient-to-br from-gray-50 to-white flex flex-col gap-6">
                    <div class="relative rounded-2xl overflow-hidden bg-white shadow-lg">
                        <span class="absolute top-4 left-4 bg-gold-gradient text-dark py-2 px-4 rounded-full text-xs font-bold uppercase tracking-wide z-10 shadow-lg">
                            <i class="fas fa-star mr-1"></i> {{ $product->kategori }}
                        </span>
                        <div class="h-96 lg:h-[480px] overflow-hidden" id="mainImage">
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
                    <div class="flex gap-4 justify-center">
                        @foreach($images as $index => $image)
                        <div class="thumbnail w-20 h-20 rounded-xl overflow-hidden cursor-pointer border-3 transition-all duration-300 shadow-md hover:-translate-y-1 hover:shadow-lg {{ $index === 0 ? 'border-primary shadow-primary/30' : 'border-transparent' }}" onclick="changeImage('{{ asset('storage/' . $image) }}', this)">
                            <img src="{{ asset('storage/' . $image) }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Info -->
                <div class="p-8 lg:p-12 flex flex-col gap-6">
                    <span class="inline-flex items-center gap-2 bg-gradient-to-r from-primary/10 to-primary/15 text-primary py-2 px-5 rounded-full text-sm font-semibold uppercase tracking-wide w-fit">
                        <i class="fas fa-tag"></i>
                        {{ $product->kategori }}
                    </span>
                    
                    <h1 class="text-3xl lg:text-4xl font-extrabold text-dark leading-tight pb-4 relative after:absolute after:bottom-0 after:left-0 after:w-20 after:h-1 after:bg-gold-gradient after:rounded">{{ $product->nama_produk }}</h1>
                    
                    @if($product->deskripsi)
                    <p class="text-gray-600 leading-relaxed bg-cream p-6 rounded-2xl border-l-4 border-secondary">{{ $product->deskripsi }}</p>
                    @endif

                    <!-- Marketplace Icons -->
                    <div class="p-6 bg-gradient-to-br from-cream to-white rounded-2xl border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Tersedia disini</h3>
                        <div class="flex flex-wrap gap-4">
                            <!-- Shopee -->
                            <a href="https://shopee.co.id/as_sabarofficialshop" target="_blank" class="w-16 h-16 rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-orange-500 p-2" title="Shopee">
                                <img src="/images/logo/logo shoope.png" alt="Shopee" class="w-full h-full object-contain">
                            </a>
                            <!-- Tokopedia -->
                            <a href="https://www.tokopedia.com/as-sabar-moslem-wear" target="_blank" class="w-16 h-16 rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-green-500 p-2" title="Tokopedia">
                                <img src="/images/logo/logo tokopedia.png" alt="Tokopedia" class="w-full h-full object-contain">
                            </a>
                            <!-- Lazada -->
                            <a href="https://www.lazada.co.id/as-sabar" target="_blank" class="w-16 h-16 rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-blue-600 p-2" title="Lazada">
                                <img src="/images/logo/logo lazada.png" alt="Lazada" class="w-full h-full object-contain">
                            </a>
                            <!-- TikTok -->
                            <a href="https://www.tiktok.com/@assabarmoslemwear" target="_blank" class="w-16 h-16 rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-black p-2" title="TikTok">
                                <img src="/images/logo/logo tiktok.png" alt="TikTok" class="w-full h-full object-contain">
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4 pt-6 border-t-2 border-gray-100">
                        <a href="https://wa.me/6285748169363?text=Halo, saya tertarik dengan produk {{ urlencode($product->nama_produk) }}. Apakah masih tersedia?" target="_blank" class="inline-flex items-center gap-3 py-4 px-8 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-full font-semibold shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-green-500/50">
                            <i class="fab fa-whatsapp text-xl"></i>
                            Hubungi via WhatsApp
                        </a>
                        <a href="{{ route('products') }}" class="inline-flex items-center gap-2 py-4 px-6 bg-transparent text-primary border-2 border-primary rounded-full font-semibold transition-all duration-300 hover:bg-primary hover:text-white hover:-translate-y-1 hover:shadow-lg">
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
