@extends('layouts.main')
@section('title', 'As-Sabar Official- Website Resmi PT Assabar Sukses Berkah ')

@section('content')
<!-- Hero Section -->
<section class="min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Slideshow Background -->
    <div class="absolute inset-0 z-0">
        <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1500 active" style="background-image: url('/images/hero/hero-1.jpg');"></div>
        <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1500" style="background-image: url('/images/hero/hero-2.jpg');"></div>
        <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1500" style="background-image: url('/images/hero/hero-3.jpeg');"></div>
    </div>
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-primary/70 via-primary/50 to-dark/70 z-1"></div>
    
    <!-- Decorative Elements -->
    <div class="absolute -top-24 -right-24 w-96 h-96 border-2 border-secondary/20 rounded-full pointer-events-none animate-spin-slow"></div>
    <div class="absolute -bottom-36 -left-36 w-[500px] h-[500px] border-2 border-secondary/20 rounded-full pointer-events-none animate-spin-slow-reverse"></div>
    
    <div class="text-center text-white z-10 px-4 sm:px-8 max-w-4xl" data-aos="fade-up">
        <span class="inline-block bg-secondary/20 border border-secondary/40 text-secondary px-4 sm:px-6 py-2 rounded-full text-xl sm:text-2xl md:text-3xl font-medium tracking-wider mb-4 sm:mb-6 font-arabic">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-4 sm:mb-6 drop-shadow-lg">
            AS-SABAR
            <span class="text-secondary block">Moslem Wear</span>
        </h1>
        <p class="text-base sm:text-lg md:text-xl opacity-90 mb-6 sm:mb-10 leading-relaxed px-2">
            Produsen terpercaya footwear muslim, kopyah premium, dan baju gamis berkualitas tinggi. 
            Menghadirkan produk dengan sentuhan islami yang elegan untuk keluarga muslim Indonesia.
        </p>
        <div class="flex gap-3 sm:gap-4 justify-center flex-wrap">
            <a href="/products" class="btn-primary-custom inline-flex items-center gap-2 px-5 sm:px-8 py-3 sm:py-4 rounded-full font-semibold text-sm sm:text-base transition-all duration-300">
                <i class="fas fa-shopping-bag"></i>
                Lihat Produk
            </a>
            <a href="/about" class="inline-flex items-center gap-2 px-5 sm:px-8 py-3 sm:py-4 rounded-full font-semibold text-sm sm:text-base border-2 border-white text-white transition-all duration-300 hover:bg-white hover:text-primary-dark">
                <i class="fas fa-info-circle"></i>
                Tentang Kami
            </a>
        </div>
    </div>

    <div class="absolute bottom-12 left-1/2 -translate-x-1/2 flex flex-col items-center text-white opacity-70 animate-bounce">
        <span class="text-xs mb-2">Scroll Down</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- About Section -->
<section class="py-16 sm:py-24 md:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-10 md:gap-16 lg:gap-20 items-center">
            <div class="relative" data-aos="fade-right">
                <img src="{{ asset('images/hero/3.png') }}" alt="About Us" class="w-full rounded-2xl shadow-2xl">
                <div class="absolute -bottom-8 -right-8 w-48 h-48 bg-gold-gradient rounded-2xl -z-10"></div>
                <div class="absolute bottom-8 -left-8 bg-primary text-white p-8 rounded-2xl text-center shadow-xl">
                    <h3 class="text-5xl font-extrabold text-secondary leading-none">5+</h3>
                    <p class="text-sm mt-2">Tahun Pengalaman</p>
                </div>
            </div>

            <div data-aos="fade-left">
                <h4 class="text-secondary font-semibold text-sm uppercase tracking-widest mb-4">Tentang Kami</h4>
                <h2 class="text-4xl font-bold text-primary-dark mb-6 leading-tight">Menyediakan Produk Fashion Muslim Berkualitas</h2>
                <p class="text-gray-600 leading-relaxed mb-8">
                    PT Assabar Sukses Berkah adalah perusahaan yang bergerak di bidang produksi 
                    fashion muslim dengan fokus pada kualitas dan nilai-nilai islami. Kami berkomitmen 
                    untuk menghadirkan produk terbaik yang memenuhi kebutuhan umat muslim Indonesia.
                </p>

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary text-xl shrink-0">
                            <i class="fas fa-award"></i>
                        </div>
                        <div>
                            <h5 class="font-semibold text-primary-dark mb-1">Kualitas Premium</h5>
                            <p class="text-sm text-gray-500">Bahan berkualitas tinggi</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary text-xl shrink-0">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <div>
                            <h5 class="font-semibold text-primary-dark mb-1">Nilai Islami</h5>
                            <p class="text-sm text-gray-500">Sesuai syariat Islam</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary text-xl shrink-0">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div>
                            <h5 class="font-semibold text-primary-dark mb-1">Pengiriman Cepat</h5>
                            <p class="text-sm text-gray-500">Seluruh Indonesia</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary text-xl shrink-0">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div>
                            <h5 class="font-semibold text-primary-dark mb-1">Support 24/7</h5>
                            <p class="text-sm text-gray-500">Layanan pelanggan</p>
                        </div>
                    </div>
                </div>

                <a href="/about" class="btn-primary-custom inline-flex items-center gap-2 px-8 py-4 rounded-full font-semibold transition-all duration-300">
                    <i class="fas fa-arrow-right"></i>
                    Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-16 sm:py-24 md:py-32 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
            <span class="text-secondary font-semibold text-sm uppercase tracking-widest block mb-3">Produk Kami</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-primary-dark mb-4">Produk Unggulan</h2>
            <div class="flex items-center justify-center gap-4">
                <span class="w-12 sm:w-16 h-0.5 bg-secondary"></span>
                <i class="fas fa-star text-secondary text-xl sm:text-2xl"></i>
                <span class="w-12 sm:w-16 h-0.5 bg-secondary"></span>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-10">
            <!-- Product 1 - Gamis -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-700 ease-out" data-aos="fade-up" data-aos-delay="100">
                <div class="h-96 bg-islamic-gradient flex items-center justify-center relative overflow-hidden">
                    <img src="/images/produk/gamis-1.png" alt="Gamis" class="w-full h-full object-cover transition-transform duration-700 ease-out hover:scale-105">
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-primary-dark mb-3">Gamis</h3>
                    <a href="/products?category=gamis" class="inline-flex items-center gap-2 text-primary font-semibold transition-all duration-300 hover:text-secondary hover:gap-3">
                        Lihat Produk <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Product 2 - Baju Koko -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-700 ease-out" data-aos="fade-up" data-aos-delay="200">
                <div class="h-96 bg-islamic-gradient flex items-center justify-center relative overflow-hidden">
                    <img src="/images/produk/bajukoko.png" alt="Baju Koko" class="w-full h-full object-cover transition-transform duration-700 ease-out hover:scale-105">
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-primary-dark mb-3">Baju Koko</h3>
                    <a href="/products?category=koko" class="inline-flex items-center gap-2 text-primary font-semibold transition-all duration-300 hover:text-secondary hover:gap-3">
                        Lihat Produk <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Product 3 - Songkok -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-700 ease-out" data-aos="fade-up" data-aos-delay="300">
                <div class="h-96 bg-islamic-gradient flex items-center justify-center relative overflow-hidden">
                    <img src="/images/produk/songkok1.jpeg" alt="Songkok" class="w-full h-full object-cover transition-transform duration-700 ease-out hover:scale-105">
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-primary-dark mb-3">Songkok</h3>
                    <a href="/products?category=songkok" class="inline-flex items-center gap-2 text-primary font-semibold transition-all duration-300 hover:text-secondary hover:gap-3">
                        Lihat Produk <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 sm:py-20 md:py-24 bg-islamic-gradient relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z\' fill=\'%23d4af37\'/%3E%3C/svg%3E');"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 md:gap-12 text-center">
            <div class="text-white" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 sm:w-14 md:w-16 sm:h-14 md:h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 md:mb-6 text-secondary text-lg sm:text-xl md:text-2xl">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-secondary mb-1 sm:mb-2">10000+</div>
                <div class="opacity-80 text-xs sm:text-sm md:text-base">Pelanggan Puas</div>
            </div>
            <div class="text-white" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 sm:w-14 md:w-16 sm:h-14 md:h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 md:mb-6 text-secondary text-lg sm:text-xl md:text-2xl">
                    <i class="fas fa-box"></i>
                </div>
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-secondary mb-1 sm:mb-2">100+</div>
                <div class="opacity-80 text-xs sm:text-sm md:text-base">Jenis Produk</div>
            </div>
            <div class="text-white" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 sm:w-14 md:w-16 sm:h-14 md:h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 md:mb-6 text-secondary text-lg sm:text-xl md:text-2xl">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-secondary mb-1 sm:mb-2"><i class="fas fa-check-circle"></i></div>
                <div class="opacity-80 text-xs sm:text-sm md:text-base">Seluruh Indonesia</div>
            </div>
            <div class="text-white" data-aos="fade-up" data-aos-delay="400">
                <div class="w-12 h-12 sm:w-14 md:w-16 sm:h-14 md:h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 md:mb-6 text-secondary text-lg sm:text-xl md:text-2xl">
                    <i class="fas fa-star"></i>
                </div>
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-secondary mb-1 sm:mb-2">4.9</div>
                <div class="opacity-80 text-xs sm:text-sm md:text-base">Rating Pelanggan</div>
            </div>
        </div>
    </div>
</section>

<!-- Artikel Section -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-secondary font-semibold text-sm uppercase tracking-widest block mb-3">Artikel Terbaru</span>
            <h2 class="text-4xl font-bold text-primary-dark mb-4">Berita & Informasi</h2>
            <div class="flex items-center justify-center gap-4">
                <span class="w-16 h-0.5 bg-secondary"></span>
                <i class="fas fa-newspaper text-secondary text-2xl"></i>
                <span class="w-16 h-0.5 bg-secondary"></span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Artikel 1 -->
            <div class="bg-cream rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 ease-out" data-aos="fade-up" data-aos-delay="100">
                <div class="relative h-48 overflow-hidden">
                    <img src="images/article/art1.jpeg" alt="Dinamika Zaman As-Sabar" class="w-full h-full object-cover">
                    <span class="absolute top-4 left-4 bg-primary text-white px-3 py-1 rounded-full text-xs font-semibold">Fashion</span>
                </div>
                <div class="p-6">
                   
                    <h3 class="font-bold text-primary-dark mb-3 leading-snug">Menghadapi Dinamika Zaman dengan Keteguhan Gaya dan Iman bersama As-Sabar</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">Bagaimana As-Sabar menjawab kebutuhan pria muslim modern yang ingin tampil aktual tanpa mengorbankan nilai tradisi dan syariat.</p>
                    <a href="/articles/dinamika-zaman-assabar" class="inline-flex items-center gap-2 text-primary font-semibold text-sm transition-all duration-300 hover:text-secondary hover:gap-3">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Artikel 2 -->
            <div class="bg-cream rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 ease-out" data-aos="fade-up" data-aos-delay="200">
                <div class="relative h-48 overflow-hidden">
                    <img src="images/article/art2.jpeg" alt="Ramadhan As-Sabar" class="w-full h-full object-cover">
                    <span class="absolute top-4 left-4 bg-secondary text-primary-dark px-3 py-1 rounded-full text-xs font-semibold">Spiritual</span>
                </div>
                <div class="p-6">
                   
                    <h3 class="font-bold text-primary-dark mb-3 leading-snug">Menyambut Ramadhan dengan Syukur & Kesabaran</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">Refleksi spiritual tentang makna sabar dan syukur dalam Al-Qur'an serta koleksi spesial Ramadhan dari As-Sabar.</p>
                    <a href="/articles/ramadhan-syukur-sabar" class="inline-flex items-center gap-2 text-primary font-semibold text-sm transition-all duration-300 hover:text-secondary hover:gap-3">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="py-24 bg-islamic-gradient">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-secondary font-semibold text-sm uppercase tracking-widest block mb-3">Testimoni Pelanggan</span>
            <h2 class="text-4xl font-bold text-white mb-4">Apa Kata Mereka?</h2>
            <div class="flex items-center justify-center gap-4">
                <span class="w-16 h-0.5 bg-secondary"></span>
                <i class="fas fa-comments text-secondary text-2xl"></i>
                <span class="w-16 h-0.5 bg-secondary"></span>
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="flex gap-1 text-secondary mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-white text-sm mb-4 leading-relaxed">"Produk As-Sabar sangat berkualitas dan nyaman dipakai. Saya suka desainnya yang modern tapi tetap islami. Bahan gamis nya adem dan tidak mudah kusut."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-secondary/30 flex items-center justify-center text-white font-bold text-lg">AF</div>
                    <div>
                        <h4 class="text-white font-semibold">Ahmad Fauzi</h4>
                        <span class="text-white/80 text-xs">Jakarta</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="flex gap-1 text-secondary mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-white text-sm mb-4 leading-relaxed">"Songkok dari As-Sabar kualitasnya premium banget. Jahitannya rapi dan bahannya tidak bikin panas di kepala. Sudah langganan dari 2 tahun lalu!"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-secondary/30 flex items-center justify-center text-white font-bold text-lg">MR</div>
                    <div>
                        <h4 class="text-white font-semibold">Muhammad Rizki</h4>
                        <span class="text-white/80 text-xs">Surabaya</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 shadow-lg" data-aos="fade-up" data-aos-delay="300">
                <div class="flex gap-1 text-secondary mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="text-white text-sm mb-4 leading-relaxed">"Baju koko As-Sabar cocok untuk acara formal maupun santai. Pengiriman cepat dan packaging rapi. Pelayanannya sangat ramah dan responsif."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-secondary/30 flex items-center justify-center text-white font-bold text-lg">HA</div>
                    <div>
                        <h4 class="text-white font-semibold">Hasan Abdullah</h4>
                        <span class="text-white/80 text-xs">Bandung</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA Section -->
<section class="py-24 bg-cream">
    <div class="max-w-4xl mx-auto px-8" data-aos="fade-up">
        <div class="bg-islamic-gradient rounded-3xl p-12 md:p-16 text-center text-white shadow-2xl">
            <h2 class="text-4xl font-bold mb-4">Siap Berbelanja?</h2>
            <p class="text-white/80 text-lg mb-8 max-w-xl mx-auto">
                Temukan koleksi lengkap fashion muslim berkualitas kami. 
                Hubungi kami sekarang untuk pemesanan atau informasi lebih lanjut.
            </p>
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="/products" class="btn-primary-custom inline-flex items-center gap-2 px-8 py-4 rounded-full font-semibold transition-all duration-300">
                    <i class="fas fa-shopping-bag"></i>
                    Lihat Katalog
                </a>
                <a href="/contact" class="inline-flex items-center gap-2 px-8 py-4 rounded-full font-semibold bg-green-500 text-white transition-all duration-300 hover:bg-green-600 hover:-translate-y-1">
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
        slides[currentSlide].style.opacity = '0';
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
        slides[currentSlide].style.opacity = '1';
    }

    // Change slide every 5 seconds
    setInterval(nextSlide, 5000);

    // Initialize first slide
    if (slides.length > 0) {
        slides[0].style.opacity = '1';
    }
</script>
@endpush

@push('styles')
<style>
    .hero-slide.active {
        opacity: 1 !important;
    }
    
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .animate-spin-slow {
        animation: spin-slow 30s linear infinite;
    }
    
    .animate-spin-slow-reverse {
        animation: spin-slow 40s linear infinite reverse;
    }
</style>
@endpush
