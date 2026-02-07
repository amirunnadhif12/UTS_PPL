@extends('layouts.main')
@section('title', 'Detail Artikel - PT Assabar Sukses Berkah')

@php
// Data artikel statis
$articles = [
    'cara-memilih-kopyah' => [
        'title' => 'Cara Membedakan Songkok President Asli dan Palsu',
        'category' => 'Tips',
        'category_color' => 'bg-primary',
        'date' => '1 Februari 2026',
        'author' => 'Admin',
        'image' => 'https://images.unsplash.com/photo-1558171813-4c088753af8f?w=800&h=400&fit=crop',
        'content' => '
            <p class="mb-6">Membedakan Songkok President yang asli dan palsu </p>
            
            <h3 class="text-2xl font-bold text-primary-dark mb-4">1. Perhatikan Bahan Kopyah</h3>
            <p class="mb-6">Bahan kopyah yang baik harus menyerap keringat dan breathable. Beberapa bahan yang direkomendasikan antara lain:</p>
            <ul class="list-disc list-inside mb-6 text-gray-600">
                <li>Katun - nyaman dan menyerap keringat</li>
                <li>Beludru - elegan untuk acara formal</li>
                <li>Rajut - cocok untuk sehari-hari</li>
            </ul>
            
            <h3 class="text-2xl font-bold text-primary-dark mb-4">2. Ukuran yang Tepat</h3>
            <p class="mb-6">Pastikan kopyah tidak terlalu ketat atau terlalu longgar. Kopyah yang pas akan terasa nyaman dan tidak mudah jatuh saat sujud.</p>
            
            <h3 class="text-2xl font-bold text-primary-dark mb-4">3. Pilih Warna yang Sesuai</h3>
            <p class="mb-6">Warna putih dan hitam adalah pilihan klasik yang cocok untuk berbagai kesempatan. Namun, warna-warna lain seperti coklat, abu-abu, dan biru tua juga bisa menjadi pilihan yang elegan.</p>
        '
    ],
    'tren-gamis-modern' => [
        'title' => 'Tren Gamis Modern 2026 yang Tetap Syar\'i',
        'category' => 'Fashion',
        'category_color' => 'bg-secondary text-primary-dark',
        'date' => '28 Januari 2026',
        'author' => 'Admin',
        'image' => 'https://images.unsplash.com/photo-1591035897819-f4bdf739f446?w=800&h=400&fit=crop',
        'content' => '
            <p class="mb-6">Tahun 2026 menghadirkan berbagai tren gamis yang memadukan gaya modern dengan tetap menjaga nilai-nilai syar\'i. Berikut beberapa tren yang sedang populer.</p>
            
            <h3 class="text-2xl font-bold text-primary-dark mb-4">1. Gamis dengan Aksen Minimalis</h3>
            <p class="mb-6">Desain minimalis dengan detail bordir atau payet yang tidak berlebihan menjadi favorit. Tampilan elegan namun tetap sederhana.</p>
            
            <h3 class="text-2xl font-bold text-primary-dark mb-4">2. Warna Earth Tone</h3>
            <p class="mb-6">Warna-warna seperti olive, mocca, dusty pink, dan sage green sangat diminati karena memberikan kesan kalem dan sophisticated.</p>
            
            <h3 class="text-2xl font-bold text-primary-dark mb-4">3. Material Premium</h3>
            <p class="mb-6">Bahan seperti wolfis, moscrepe, dan ceruti babydoll menjadi pilihan utama karena jatuh di badan dan tidak transparan.</p>
        '
    ],
    'penghargaan-umkm' => [
        'title' => 'PT Assabar Sukses Berkah Raih Penghargaan UMKM',
        'category' => 'Perusahaan',
        'category_color' => 'bg-dark',
        'date' => '20 Januari 2026',
        'author' => 'Admin',
        'image' => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?w=800&h=400&fit=crop',
        'content' => '
            <p class="mb-6">PT Assabar Sukses Berkah berhasil meraih penghargaan sebagai UMKM Fashion Muslim Terbaik 2026 dalam ajang Indonesia Muslim Fashion Award.</p>
            
            <h3 class="text-2xl font-bold text-primary-dark mb-4">Perjalanan 10 Tahun</h3>
            <p class="mb-6">Penghargaan ini merupakan buah dari kerja keras selama 10 tahun dalam memproduksi fashion muslim berkualitas tinggi untuk keluarga Indonesia.</p>
            
            <h3 class="text-2xl font-bold text-primary-dark mb-4">Komitmen Kualitas</h3>
            <p class="mb-6">Kami selalu berkomitmen untuk menghadirkan produk dengan kualitas terbaik, mulai dari pemilihan bahan hingga proses produksi yang detail.</p>
            
            <h3 class="text-2xl font-bold text-primary-dark mb-4">Visi ke Depan</h3>
            <p class="mb-6">Dengan penghargaan ini, kami semakin termotivasi untuk terus berinovasi dan memperluas jangkauan ke seluruh Indonesia bahkan mancanegara.</p>
        '
    ]
];

$article = $articles[$slug] ?? null;
@endphp

@section('content')
@if($article)

<!-- Hero Section -->
<section class="py-24 bg-islamic-gradient relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M30 0L60 30L30 60L0 30z\' fill=\'%23ffffff\' fill-opacity=\'0.1\'/%3E%3C/svg%3E');"></div>
    <div class="max-w-4xl mx-auto px-8 text-center relative z-10">
        <span class="inline-block {{ $article['category_color'] }} text-white px-4 py-1 rounded-full text-sm font-semibold mb-4" data-aos="fade-up">{{ $article['category'] }}</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight" data-aos="fade-up" data-aos-delay="100">{{ $article['title'] }}</h1>
        <div class="flex items-center justify-center gap-6 text-white/70 mt-6" data-aos="fade-up" data-aos-delay="200">
            <span class="flex items-center gap-2"><i class="far fa-calendar-alt"></i> {{ $article['date'] }}</span>
            <span class="flex items-center gap-2"><i class="far fa-user"></i> {{ $article['author'] }}</span>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-8">
        <!-- Featured Image -->
        <div class="rounded-2xl overflow-hidden shadow-xl mb-12 -mt-20 relative z-20" data-aos="fade-up">
            <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-90 object-cover">
        </div>

        <!-- Content -->
        <article class="prose prose-lg max-w-none" data-aos="fade-up">
            <div class="text-gray-600 leading-relaxed">
                {!! $article['content'] !!}
            </div>
        </article>

        <!-- Share & Navigation -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <span class="text-gray-500 mr-4">Bagikan:</span>
                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors mr-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-500 text-white hover:bg-sky-600 transition-colors mr-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-500 text-white hover:bg-green-600 transition-colors"><i class="fab fa-whatsapp"></i></a>
                </div>
                <a href="/" class="inline-flex items-center gap-2 text-primary font-semibold hover:text-secondary transition-colors">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>
@else
<!-- Article Not Found -->
<section class="py-32 bg-cream">
    <div class="max-w-xl mx-auto px-8 text-center">
        <i class="fas fa-file-alt text-6xl text-gray-300 mb-6"></i>
        <h1 class="text-3xl font-bold text-primary-dark mb-4">Artikel Tidak Ditemukan</h1>
        <p class="text-gray-600 mb-8">Maaf, artikel yang Anda cari tidak tersedia.</p>
        <a href="/" class="btn-primary-custom inline-flex items-center gap-2 px-8 py-4 rounded-full font-semibold transition-all duration-300">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>
</section>
@endif
@endsection