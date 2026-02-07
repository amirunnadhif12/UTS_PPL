@extends('layouts.main')
@section('title', 'About Us - PT Assabar Sukses Berkah')

@section('content')
<!-- Page Header -->
<section class="min-h-[50vh] bg-cover bg-left flex items-center justify-center relative overflow-hidden" style="background-image: url('/images/hero/hero-1.jpg');">
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
                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop" alt="Tentang Perusahaan" class="w-full rounded-2xl shadow-xl">
            </div>
            <div data-aos="fade-left">
                <h2 class="text-4xl font-bold text-primary-dark mb-6">Tentang Perusahaan</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    PT Assabar Sukses Berkah adalah perusahaan yang bergerak di bidang produksi 
                    fashion muslim berkualitas tinggi. Kami menghadirkan berbagai produk seperti 
                    kopyah, gamis, dan footwear muslim dengan desain modern namun tetap syar'i.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Dengan pengalaman lebih dari 10 tahun, kami telah melayani ribuan pelanggan 
                    di seluruh Indonesia dan terus berkomitmen untuk memberikan produk terbaik.
                </p>

                <div class="grid grid-cols-3 gap-6">
                    <div class="text-center p-6 bg-cream rounded-xl">
                        <h3 class="text-3xl font-bold text-primary mb-1">10+</h3>
                        <p class="text-gray-500 text-sm">Tahun Pengalaman</p>
                    </div>
                    <div class="text-center p-6 bg-cream rounded-xl">
                        <h3 class="text-3xl font-bold text-primary mb-1">5000+</h3>
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

<!-- Produk Kami -->
<section class="py-20 bg-cream">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-primary-dark mb-2">Produk Kami</h2>
            <p class="text-gray-500">Beberapa kategori produk yang kami tawarkan</p>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
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
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-primary-dark mb-2">Sejarah Perusahaan</h2>
            <p class="text-gray-500">Perjalanan kami dari awal hingga sekarang</p>
        </div>

        <div class="relative max-w-3xl mx-auto">
            <!-- Timeline Line -->
            <div class="absolute left-1/2 -translate-x-1/2 w-1 h-full bg-primary"></div>

            <!-- Timeline Items -->
            <div class="relative mb-8" data-aos="fade-right">
                <div class="flex justify-end md:pr-[calc(50%+2rem)]">
                    <div class="bg-cream p-6 rounded-xl max-w-sm">
                        <h4 class="text-primary font-bold mb-2">2014 - Berdiri</h4>
                        <p class="text-gray-600 text-sm">PT Assabar Sukses Berkah didirikan sebagai usaha kecil produksi kopyah.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 -translate-x-1/2 top-4 w-5 h-5 bg-secondary rounded-full border-4 border-white shadow-md shadow-primary/30"></div>
            </div>

            <div class="relative mb-8" data-aos="fade-left">
                <div class="flex justify-start md:pl-[calc(50%+2rem)]">
                    <div class="bg-cream p-6 rounded-xl max-w-sm">
                        <h4 class="text-primary font-bold mb-2">2017 - Ekspansi Produk</h4>
                        <p class="text-gray-600 text-sm">Mulai memproduksi gamis dan memperluas jangkauan pasar.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 -translate-x-1/2 top-4 w-5 h-5 bg-secondary rounded-full border-4 border-white shadow-md shadow-primary/30"></div>
            </div>

            <div class="relative mb-8" data-aos="fade-right">
                <div class="flex justify-end md:pr-[calc(50%+2rem)]">
                    <div class="bg-cream p-6 rounded-xl max-w-sm">
                        <h4 class="text-primary font-bold mb-2">2020 - Go Digital</h4>
                        <p class="text-gray-600 text-sm">Meluncurkan platform online dan ekspansi ke seluruh Indonesia.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 -translate-x-1/2 top-4 w-5 h-5 bg-secondary rounded-full border-4 border-white shadow-md shadow-primary/30"></div>
            </div>

            <div class="relative" data-aos="fade-left">
                <div class="flex justify-start md:pl-[calc(50%+2rem)]">
                    <div class="bg-cream p-6 rounded-xl max-w-sm">
                        <h4 class="text-primary font-bold mb-2">2024 - Sekarang</h4>
                        <p class="text-gray-600 text-sm">Menjadi salah satu produsen fashion muslim terpercaya di Indonesia.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 -translate-x-1/2 top-4 w-5 h-5 bg-secondary rounded-full border-4 border-white shadow-md shadow-primary/30"></div>
            </div>
        </div>
    </div>
</section>

<!-- Visi & Misi -->
<section class="py-20 bg-cream">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-primary-dark mb-2">Visi & Misi</h2>
            <p class="text-gray-500">Arah dan tujuan perusahaan kami</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <div class="bg-white p-10 rounded-2xl shadow-lg" data-aos="fade-up">
                <h3 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                    <i class="fas fa-eye text-secondary"></i> Visi
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi perusahaan fashion muslim terkemuka yang menginspirasi umat untuk 
                    berpenampilan syar'i dengan gaya modern dan berkualitas tinggi.
                </p>
            </div>
            <div class="bg-white p-10 rounded-2xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                    <i class="fas fa-bullseye text-secondary"></i> Misi
                </h3>
                <ul class="text-gray-600 leading-relaxed space-y-3">
                    <li class="pl-6 relative before:content-['✓'] before:absolute before:left-0 before:text-secondary before:font-bold">Menghasilkan produk berkualitas premium</li>
                    <li class="pl-6 relative before:content-['✓'] before:absolute before:left-0 before:text-secondary before:font-bold">Memberikan pelayanan terbaik kepada pelanggan</li>
                    <li class="pl-6 relative before:content-['✓'] before:absolute before:left-0 before:text-secondary before:font-bold">Berinovasi dalam desain yang modern dan syar'i</li>
                    <li class="pl-6 relative before:content-['✓'] before:absolute before:left-0 before:text-secondary before:font-bold">Berkontribusi pada kesejahteraan masyarakat</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-primary-dark mb-2">Pertanyaan Umum</h2>
            <p class="text-gray-500">Jawaban untuk pertanyaan yang sering diajukan</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-4" data-aos="fade-up">
            <div class="faq-item border border-gray-200 rounded-xl overflow-hidden active">
                <div class="faq-question p-5 bg-cream cursor-pointer flex justify-between items-center font-semibold text-primary-dark hover:bg-primary hover:text-white transition-all duration-300">
                    <span>Bagaimana cara memesan produk?</span>
                    <i class="fas fa-chevron-down transition-transform duration-300"></i>
                </div>
                <div class="faq-answer overflow-hidden transition-all duration-300">
                    <p class="p-5 text-gray-600">Anda dapat memesan melalui halaman Products atau menghubungi kami via WhatsApp untuk pemesanan langsung.</p>
                </div>
            </div>

            <div class="faq-item border border-gray-200 rounded-xl overflow-hidden">
                <div class="faq-question p-5 bg-cream cursor-pointer flex justify-between items-center font-semibold text-primary-dark hover:bg-primary hover:text-white transition-all duration-300">
                    <span>Apakah bisa custom ukuran?</span>
                    <i class="fas fa-chevron-down transition-transform duration-300"></i>
                </div>
                <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0">
                    <p class="p-5 text-gray-600">Ya, kami menerima pesanan custom ukuran untuk produk gamis dan kopyah. Hubungi kami untuk detail lebih lanjut.</p>
                </div>
            </div>

            <div class="faq-item border border-gray-200 rounded-xl overflow-hidden">
                <div class="faq-question p-5 bg-cream cursor-pointer flex justify-between items-center font-semibold text-primary-dark hover:bg-primary hover:text-white transition-all duration-300">
                    <span>Berapa lama pengiriman?</span>
                    <i class="fas fa-chevron-down transition-transform duration-300"></i>
                </div>
                <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0">
                    <p class="p-5 text-gray-600">Pengiriman membutuhkan waktu 2-5 hari kerja tergantung lokasi. Kami menggunakan ekspedisi terpercaya.</p>
                </div>
            </div>

            <div class="faq-item border border-gray-200 rounded-xl overflow-hidden">
                <div class="faq-question p-5 bg-cream cursor-pointer flex justify-between items-center font-semibold text-primary-dark hover:bg-primary hover:text-white transition-all duration-300">
                    <span>Apakah ada garansi produk?</span>
                    <i class="fas fa-chevron-down transition-transform duration-300"></i>
                </div>
                <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0">
                    <p class="p-5 text-gray-600">Ya, semua produk kami bergaransi 7 hari untuk penukaran jika ada cacat produksi.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', () => {
            const item = question.parentElement;
            const answer = item.querySelector('.faq-answer');
            const isActive = item.classList.contains('active');
            
            // Close all
            document.querySelectorAll('.faq-item').forEach(i => {
                i.classList.remove('active');
                i.querySelector('.faq-answer').style.maxHeight = '0';
            });
            
            // Open clicked if wasn't active
            if (!isActive) {
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

    // Initialize first FAQ
    const firstFaq = document.querySelector('.faq-item.active .faq-answer');
    if (firstFaq) {
        firstFaq.style.maxHeight = firstFaq.scrollHeight + 'px';
    }
</script>
@endpush