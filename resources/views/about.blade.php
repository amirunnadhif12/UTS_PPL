@extends('layouts.main')
@section('title', 'About Us - PT Assabar Sukses Berkah')

@section('content')
<!-- Page Header -->
<section class="min-h-[50vh] bg-cover bg-left flex items-center justify-center relative overflow-hidden" style="background-image: url('/images/hero/hero-3.jpeg');">
    <div class="absolute inset-0 bg-gradient-to-b from-primary/85 via-primary/70 to-dark/85 z-1"></div>
    <div class="relative z-10 text-center text-white py-24 px-8">
        <h1 class="text-5xl font-bold mb-4 drop-shadow-lg" data-aos="fade-up">Tentang Kami</h1>
        <p class="text-lg opacity-90" data-aos="fade-up" data-aos-delay="100">Mengenal lebih dekat PT Assabar Sukses Berkah</p>
    </div>
</section>

<!-- Tentang Perusahaan -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <img src="/images/logo/logo%20lengkap.jpeg" alt="Tentang Perusahaan" class="w-full rounded-2xl shadow-xl">
            </div>
            <div data-aos="fade-left">
                <h2 class="text-4xl font-bold text-primary-dark mb-6">Tentang Perusahaan</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    PT Assabar Sukses Berkah adalah perusahaan fashion muslim pria yang didirikan dengan keyakinan bahwa busana adalah cerminan dari identitas dan nilai-nilai spiritual. Melalui brand utama kami, <strong>As-Sabar</strong>, kami hadir sebagai simbol keteguhan iman dan konsistensi amal dalam dunia mode. Kami tidak sekadar mengejar hasil materi secara terburu-buru, melainkan berfokus pada proses, nilai-nilai kejujuran, dan ketenangan hati untuk menjamin setiap karya yang dihasilkan membawa keberkahan.
                </p>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Produk kami, mulai dari Songkok, Gamis, hingga Baju Koko, dirancang dengan memadukan kearifan lokal yang sarat akan nilai tradisi dengan gaya modern yang aktual. Sebagai perusahaan yang mengedepankan prinsip syariah, kami berkomitmen untuk menjadi teladan dalam berbisnis secara jujur dan transparan.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Melalui ekosistem yang melibatkan penjahit, pengrajin lokal, dan mitra UMKM, PT Assabar Sukses Berkah berupaya tumbuh bersama masyarakat untuk memberikan dampak sosial yang nyata dan berkelanjutan. Bagi kami, setiap aktivitas usaha adalah ibadah yang ditujukan untuk memberikan manfaat luas serta meraih ridha Allah SWT.
                </p>

                <div class="grid grid-cols-3 gap-6">
                    <div class="text-center p-6 bg-cream rounded-xl">
                        <h3 class="text-3xl font-bold text-primary mb-1">5+</h3>
                        <p class="text-gray-500 text-sm">Tahun Pengalaman</p>
                    </div>
                    <div class="text-center p-6 bg-cream rounded-xl">
                        <h3 class="text-3xl font-bold text-primary mb-1">10000+</h3>
                        <p class="text-gray-500 text-sm">Pelanggan</p>
                    </div>
                    <div class="text-center p-6 bg-cream rounded-xl">
                        <h3 class="text-3xl font-bold text-primary mb-1">100+</h3>
                        <p class="text-gray-500 text-sm">Produk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tata Nilai Perusahaan (A-S-S-A-B-A-R) -->
<section class="py-20 bg-cream">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-primary-dark mb-2">Tata Nilai Perusahaan</h2>
            <p class="text-gray-500">Pedoman perilaku yang mengintegrasikan profesionalisme kerja dengan nilai-nilai spiritual</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- A - Akidah -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border-t-4 border-primary" data-aos="fade-up" data-aos-delay="0">
                <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                    <span class="text-2xl font-extrabold text-primary">A</span>
                </div>
                <h3 class="text-lg font-bold text-primary-dark mb-2">Akidah</h3>
                <p class="text-xs text-secondary font-semibold uppercase tracking-wide mb-2">Faith-Based Integrity</p>
                <p class="text-gray-600 text-sm leading-relaxed">Menjadikan iman dan nilai-nilai Islam sebagai dasar utama dalam setiap pengambilan keputusan dan tindakan bisnis.</p>
            </div>

            <!-- S - Semangat -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border-t-4 border-secondary" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 bg-secondary/10 rounded-xl flex items-center justify-center mb-4">
                    <span class="text-2xl font-extrabold text-secondary">S</span>
                </div>
                <h3 class="text-lg font-bold text-primary-dark mb-2">Semangat</h3>
                <p class="text-xs text-secondary font-semibold uppercase tracking-wide mb-2">Passionate in Purpose</p>
                <p class="text-gray-600 text-sm leading-relaxed">Bekerja dengan semangat dakwah, di mana setiap produk fashion muslim pria yang kami ciptakan merupakan bentuk kontribusi nyata terhadap syiar Islam.</p>
            </div>

            <!-- S - Solidaritas -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border-t-4 border-primary" data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                    <span class="text-2xl font-extrabold text-primary">S</span>
                </div>
                <h3 class="text-lg font-bold text-primary-dark mb-2">Solidaritas</h3>
                <p class="text-xs text-secondary font-semibold uppercase tracking-wide mb-2">Unity & Togetherness</p>
                <p class="text-gray-600 text-sm leading-relaxed">Membangun kerja sama yang erat dan saling mendukung antara tim internal, mitra, serta reseller dengan budaya saling percaya dan keterbukaan.</p>
            </div>

            <!-- A - Amanah -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border-t-4 border-secondary" data-aos="fade-up" data-aos-delay="300">
                <div class="w-14 h-14 bg-secondary/10 rounded-xl flex items-center justify-center mb-4">
                    <span class="text-2xl font-extrabold text-secondary">A</span>
                </div>
                <h3 class="text-lg font-bold text-primary-dark mb-2">Amanah</h3>
                <p class="text-xs text-secondary font-semibold uppercase tracking-wide mb-2">Trust & Responsibility</p>
                <p class="text-gray-600 text-sm leading-relaxed">Menjalankan setiap tugas dengan penuh tanggung jawab, kejujuran, dan transparansi serta menjamin kualitas produk tetap terjaga.</p>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- B - Berdaya -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border-t-4 border-primary" data-aos="fade-up" data-aos-delay="400">
                <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                    <span class="text-2xl font-extrabold text-primary">B</span>
                </div>
                <h3 class="text-lg font-bold text-primary-dark mb-2">Berdaya</h3>
                <p class="text-xs text-secondary font-semibold uppercase tracking-wide mb-2">Empowerment & Excellence</p>
                <p class="text-gray-600 text-sm leading-relaxed">Mendorong setiap anggota tim untuk terus tumbuh, menjadi lebih kreatif, dan produktif dengan memberikan ruang untuk belajar dan berinovasi.</p>
            </div>

            <!-- A - Aktual -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border-t-4 border-secondary" data-aos="fade-up" data-aos-delay="500">
                <div class="w-14 h-14 bg-secondary/10 rounded-xl flex items-center justify-center mb-4">
                    <span class="text-2xl font-extrabold text-secondary">A</span>
                </div>
                <h3 class="text-lg font-bold text-primary-dark mb-2">Aktual</h3>
                <p class="text-xs text-secondary font-semibold uppercase tracking-wide mb-2">Adaptive & Modern</p>
                <p class="text-gray-600 text-sm leading-relaxed">Bersikap responsif terhadap perubahan zaman, tren fashion, dan perkembangan teknologi digital agar tetap relevan di era e-commerce.</p>
            </div>

            <!-- R - Rahmah -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border-t-4 border-primary" data-aos="fade-up" data-aos-delay="600">
                <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                    <span class="text-2xl font-extrabold text-primary">R</span>
                </div>
                <h3 class="text-lg font-bold text-primary-dark mb-2">Rahmah</h3>
                <p class="text-xs text-secondary font-semibold uppercase tracking-wide mb-2">Compassion & Barakah</p>
                <p class="text-gray-600 text-sm leading-relaxed">Mengedepankan kasih sayang dan keberkahan dalam setiap langkah bisnis, dengan orientasi pada dampak positif bagi masyarakat serta lingkungan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Produk Kami -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-primary-dark mb-2">Produk Kami</h2>
            <p class="text-gray-500">Beberapa kategori produk yang kami tawarkan</p>
        </div>

        <div class="grid md:grid-cols-4 gap-6">

          <!-- Baju Koko -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-700 ease-out" data-aos="fade-up" data-aos-delay="200">
                <div class="h-64 bg-islamic-gradient flex items-center justify-center relative overflow-hidden">
                    <img src="/images/produk/bajukoko.png" alt="Baju Koko" class="w-full h-full object-cover transition-transform duration-700 ease-out hover:scale-105">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary-dark mb-2">Baju Koko</h3>
                    <a href="/products?category=koko" class="inline-flex items-center gap-2 text-primary font-semibold transition-all duration-300 hover:text-secondary hover:gap-3">
                        Lihat Produk <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- Songkok -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-700 ease-out" data-aos="fade-up" data-aos-delay="100">
                <div class="h-64 bg-islamic-gradient flex items-center justify-center relative overflow-hidden">
                    <img src="/images/produk/songkok.jpeg" alt="Songkok" class="w-full h-full object-cover transition-transform duration-700 ease-out hover:scale-105">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary-dark mb-2">Songkok</h3>
                    <a href="/products?category=songkok" class="inline-flex items-center gap-2 text-primary font-semibold transition-all duration-300 hover:text-secondary hover:gap-3">
                        Lihat Produk <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

          

            <!-- Gamis -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-700 ease-out" data-aos="fade-up" data-aos-delay="300">
                <div class="h-64 bg-islamic-gradient flex items-center justify-center relative overflow-hidden">
                    <img src="/images/produk/gamis-1.png" alt="Gamis" class="w-full h-full object-cover transition-transform duration-700 ease-out hover:scale-105">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary-dark mb-2">Gamis</h3>
                    <a href="/products?category=gamis" class="inline-flex items-center gap-2 text-primary font-semibold transition-all duration-300 hover:text-secondary hover:gap-3">
                        Lihat Produk <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Peci -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-700 ease-out" data-aos="fade-up" data-aos-delay="400">
                <div class="h-64 bg-islamic-gradient flex items-center justify-center relative overflow-hidden">
                    <img src="/images/produk/peci.jpeg " alt="Peci" class="w-full h-full object-cover transition-transform duration-700 ease-out hover:scale-105">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary-dark mb-2">Peci</h3>
                    <a href="/products?category=peci" class="inline-flex items-center gap-2 text-primary font-semibold transition-all duration-300 hover:text-secondary hover:gap-3">
                        Lihat Produk <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sejarah Perusahaan -->
<section class="py-20 bg-cream">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-4" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-primary-dark mb-2">Sejarah Perusahaan</h2>
            <p class="text-gray-500">Perjalanan kami adalah wujud dari komitmen jangka panjang untuk tidak terburu-buru mengejar hasil, melainkan fokus pada proses, nilai, dan keberkahan</p>
        </div>

        <div class="relative max-w-3xl mx-auto">
            <!-- Timeline Line -->
            <div class="absolute left-1/2 -translate-x-1/2 w-1 h-full bg-primary"></div>

            <!-- 2018 -->
            <div class="relative mb-8" data-aos="fade-right">
                <div class="flex justify-end md:pr-[calc(50%+2rem)]">
                    <div class="bg-white p-6 rounded-xl max-w-sm shadow-md">
                        <h4 class="text-primary font-bold mb-2">2018 – Fondasi Awal</h4>
                        <p class="text-gray-600 text-sm">PT Assabar Sukses Berkah resmi didirikan sebagai usaha kecil yang berfokus pada produksi kopyah atau songkok berkualitas. Sejak awal, kami memegang prinsip "Sabar dalam proses" dengan menekuni desain dan kualitas bahan secara mendalam.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 -translate-x-1/2 top-4 w-5 h-5 bg-secondary rounded-full border-4 border-white shadow-md shadow-primary/30"></div>
            </div>

            <!-- 2021 -->
            <div class="relative mb-8" data-aos="fade-left">
                <div class="flex justify-start md:pl-[calc(50%+2rem)]">
                    <div class="bg-white p-6 rounded-xl max-w-sm shadow-md">
                        <h4 class="text-primary font-bold mb-2">2021 – Diversifikasi dan Ekspansi</h4>
                        <p class="text-gray-600 text-sm">Perusahaan memperluas lini produknya dengan mulai memproduksi gamis dan baju koko pria. Kami mulai memperluas jangkauan pasar dengan memadukan kearifan lokal dan gaya modern agar menjadi teladan dalam berbisnis syariah.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 -translate-x-1/2 top-4 w-5 h-5 bg-secondary rounded-full border-4 border-white shadow-md shadow-primary/30"></div>
            </div>

            <!-- 2023 -->
            <div class="relative mb-8" data-aos="fade-right">
                <div class="flex justify-end md:pr-[calc(50%+2rem)]">
                    <div class="bg-white p-6 rounded-xl max-w-sm shadow-md">
                        <h4 class="text-primary font-bold mb-2">2023 – Akselerasi Digital</h4>
                        <p class="text-gray-600 text-sm">Kami mengoptimalkan ekosistem digital melalui e-commerce, marketplace, dan social commerce seperti Instagram, TikTok, dan YouTube. Langkah ini memperkuat akses pelanggan di seluruh Indonesia untuk mendapatkan produk premium dengan layanan yang responsif.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 -translate-x-1/2 top-4 w-5 h-5 bg-secondary rounded-full border-4 border-white shadow-md shadow-primary/30"></div>
            </div>

            <!-- 2024 -->
            <div class="relative" data-aos="fade-left">
                <div class="flex justify-start md:pl-[calc(50%+2rem)]">
                    <div class="bg-white p-6 rounded-xl max-w-sm shadow-md">
                        <h4 class="text-primary font-bold mb-2">2024 s.d. Sekarang – Transformasi Menuju Keberkahan</h4>
                        <p class="text-gray-600 text-sm">PT Assabar Sukses Berkah telah bertransformasi menjadi salah satu produsen fashion muslim terpercaya di Indonesia. Kami tidak hanya fokus pada kualitas produk, tetapi juga menjadi wadah pemberdayaan UMKM lokal dengan melibatkan penjahit dan pengrajin dalam setiap rantai produksi.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 -translate-x-1/2 top-4 w-5 h-5 bg-secondary rounded-full border-4 border-white shadow-md shadow-primary/30"></div>
            </div>
        </div>

        <p class="text-center text-gray-600 italic mt-12 max-w-2xl mx-auto" data-aos="fade-up">Sejarah ini membuktikan bahwa As-Sabar bukan sekadar brand fashion, melainkan simbol dari keteguhan iman dan konsistensi dalam beramal melalui setiap karya yang kami hasilkan.</p>
    </div>
</section>

<!-- Visi & Misi -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-primary-dark mb-2">Visi & Misi</h2>
            <p class="text-gray-500">Arah dan tujuan perusahaan kami</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 mb-12">
            <!-- Visi -->
            <div class="bg-cream p-10 rounded-2xl shadow-lg border-l-4 border-primary" data-aos="fade-up">
                <h3 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                    <i class="fas fa-eye text-secondary"></i> Visi
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi brand fashion muslim pria terdepan di Indonesia yang mengangkat identitas tradisi, tampil modern, serta menjadi pilihan utama umat muslim di dunia melalui praktik bisnis syariah yang amanah dan penuh keberkahan.
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-cream p-10 rounded-2xl shadow-lg border-l-4 border-secondary" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                    <i class="fas fa-bullseye text-secondary"></i> Misi
                </h3>
                <ul class="text-gray-600 leading-relaxed space-y-4">
                    <li class="pl-6 relative before:content-['✓'] before:absolute before:left-0 before:text-secondary before:font-bold">
                        <strong class="text-primary-dark">Kualitas & Inovasi:</strong> Menghadirkan produk busana muslim pria yang berkualitas premium, nyaman, dan orisinal dengan riset desain yang berkelanjutan.
                    </li>
                    <li class="pl-6 relative before:content-['✓'] before:absolute before:left-0 before:text-secondary before:font-bold">
                        <strong class="text-primary-dark">Kepuasan Pelanggan:</strong> Memberikan pengalaman berbelanja yang mudah, terpercaya, dan responsif melalui berbagai platform digital dan e-commerce.
                    </li>
                    <li class="pl-6 relative before:content-['✓'] before:absolute before:left-0 before:text-secondary before:font-bold">
                        <strong class="text-primary-dark">Pemberdayaan Ekonomi:</strong> Membangun ekosistem bisnis yang inklusif dengan melibatkan penjahit, pengrajin lokal, serta jaringan agen dan reseller di seluruh Indonesia.
                    </li>
                    <li class="pl-6 relative before:content-['✓'] before:absolute before:left-0 before:text-secondary before:font-bold">
                        <strong class="text-primary-dark">Etika Bisnis Islami:</strong> Menjalankan operasional perusahaan dengan prinsip halal, transparan, jujur, dan berorientasi pada ridha Allah SWT.
                    </li>
                </ul>
            </div>
        </div>

        <!-- Filosofi AS-SABAR -->
        <div class="bg-gradient-to-br from-primary to-dark rounded-3xl p-10 lg:p-12 text-white" data-aos="fade-up">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-bold mb-2">Filosofi "AS-SABAR"</h3>
                <p class="text-white/80">Kami meyakini bahwa kesabaran adalah kunci keberlanjutan</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-12 h-12 bg-secondary/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-cogs text-secondary text-xl"></i>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Sabar dalam Proses</h4>
                    <p class="text-white/80 text-sm leading-relaxed">Fokus pada kualitas jangka panjang daripada tren sesaat.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 bg-secondary/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-heart text-secondary text-xl"></i>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Sabar dalam Pelayanan</h4>
                    <p class="text-white/80 text-sm leading-relaxed">Menanggapi setiap pelanggan dengan empati dan keramahan.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 bg-secondary/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-hand-holding-heart text-secondary text-xl"></i>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Sabar dalam Rezeki</h4>
                    <p class="text-white/80 text-sm leading-relaxed">Percaya sepenuhnya bahwa rezeki yang halal pasti mencukupi tanpa harus berbuat curang.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 bg-secondary/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-pray text-secondary text-xl"></i>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Sabar dalam Niat</h4>
                    <p class="text-white/80 text-sm leading-relaxed">Mengikhlaskan seluruh aktivitas bisnis sebagai bentuk ibadah.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection