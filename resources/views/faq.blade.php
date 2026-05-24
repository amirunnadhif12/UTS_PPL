@extends('layouts.main')
@section('title', 'FAQ - PT Assabar Sukses Berkah')

@section('content')
<!-- Page Header -->
<section class="min-h-[50vh] bg-cover bg-center flex items-center justify-center relative overflow-hidden" style="background-image: url('/images/hero/hero-2.jpg');">
    <div class="absolute inset-0 bg-gradient-to-b from-primary/85 via-primary/70 to-dark/85 z-1"></div>
    <div class="relative z-10 text-center text-white py-24 px-4 sm:px-8">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg" data-aos="fade-up">Pertanyaan yang Sering Diajukan</h1>
        <p class="text-base sm:text-lg opacity-90 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Temukan jawaban atas pertanyaan umum seputar produk dan layanan As-Sabar</p>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 sm:py-24 md:py-32 bg-cream">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
            <span class="text-secondary font-semibold text-sm uppercase tracking-widest block mb-3">FAQ</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-primary-dark mb-4">Ada Pertanyaan?</h2>
            <div class="flex items-center justify-center gap-4">
                <span class="w-12 sm:w-16 h-0.5 bg-secondary"></span>
                <i class="fas fa-question-circle text-secondary text-xl sm:text-2xl"></i>
                <span class="w-12 sm:w-16 h-0.5 bg-secondary"></span>
            </div>
        </div>

        <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
            <!-- FAQ Item 1 -->
            <div class="faq-item bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <button class="faq-toggle w-full flex items-center justify-between p-5 sm:p-6 text-left group" onclick="toggleFaq(this)">
                    <span class="font-semibold text-primary-dark text-sm sm:text-base pr-4">Apa saja produk yang dijual oleh As-Sabar?</span>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-primary/10 rounded-full flex items-center justify-center shrink-0 transition-all duration-300 group-hover:bg-primary/20">
                        <i class="fas fa-chevron-down text-primary text-xs sm:text-sm transition-transform duration-300"></i>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <div class="px-5 sm:px-6 pb-5 sm:pb-6 text-gray-600 text-sm sm:text-base leading-relaxed border-t border-gray-100 pt-4">
                        As-Sabar menyediakan berbagai produk fashion muslim berkualitas tinggi, termasuk <strong>Baju Koko</strong>, <strong>Gamis</strong>, dan <strong>Songkok/Peci Premium</strong>. Semua produk kami dibuat dengan bahan pilihan dan jahitan rapi untuk kenyamanan maksimal.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <button class="faq-toggle w-full flex items-center justify-between p-5 sm:p-6 text-left group" onclick="toggleFaq(this)">
                    <span class="font-semibold text-primary-dark text-sm sm:text-base pr-4">Bagaimana cara memesan produk As-Sabar?</span>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-primary/10 rounded-full flex items-center justify-center shrink-0 transition-all duration-300 group-hover:bg-primary/20">
                        <i class="fas fa-chevron-down text-primary text-xs sm:text-sm transition-transform duration-300"></i>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <div class="px-5 sm:px-6 pb-5 sm:pb-6 text-gray-600 text-sm sm:text-base leading-relaxed border-t border-gray-100 pt-4">
                        Anda bisa memesan melalui <strong>WhatsApp</strong> di nomor +62 857-4816-9363, atau melalui marketplace kami di <strong>Shopee</strong>, <strong>Tokopedia</strong>, <strong>Lazada</strong>, dan <strong>TikTok Shop</strong>. Tim kami siap membantu Anda dalam proses pemesanan.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <button class="faq-toggle w-full flex items-center justify-between p-5 sm:p-6 text-left group" onclick="toggleFaq(this)">
                    <span class="font-semibold text-primary-dark text-sm sm:text-base pr-4">Apakah As-Sabar melayani pengiriman ke seluruh Indonesia?</span>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-primary/10 rounded-full flex items-center justify-center shrink-0 transition-all duration-300 group-hover:bg-primary/20">
                        <i class="fas fa-chevron-down text-primary text-xs sm:text-sm transition-transform duration-300"></i>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <div class="px-5 sm:px-6 pb-5 sm:pb-6 text-gray-600 text-sm sm:text-base leading-relaxed border-t border-gray-100 pt-4">
                        Ya, kami melayani pengiriman ke <strong>seluruh wilayah Indonesia</strong> melalui berbagai ekspedisi terpercaya seperti JNE, J&T, SiCepat, dan lainnya. Ongkos kirim disesuaikan dengan lokasi dan berat paket.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <button class="faq-toggle w-full flex items-center justify-between p-5 sm:p-6 text-left group" onclick="toggleFaq(this)">
                    <span class="font-semibold text-primary-dark text-sm sm:text-base pr-4">Apakah bisa memesan dalam jumlah besar (grosir)?</span>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-primary/10 rounded-full flex items-center justify-center shrink-0 transition-all duration-300 group-hover:bg-primary/20">
                        <i class="fas fa-chevron-down text-primary text-xs sm:text-sm transition-transform duration-300"></i>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <div class="px-5 sm:px-6 pb-5 sm:pb-6 text-gray-600 text-sm sm:text-base leading-relaxed border-t border-gray-100 pt-4">
                        Tentu! Kami menerima pesanan <strong>grosir dan partai besar</strong> dengan harga khusus. Silakan hubungi tim kami melalui WhatsApp untuk mendapatkan penawaran harga terbaik untuk pembelian dalam jumlah banyak.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <button class="faq-toggle w-full flex items-center justify-between p-5 sm:p-6 text-left group" onclick="toggleFaq(this)">
                    <span class="font-semibold text-primary-dark text-sm sm:text-base pr-4">Bagaimana kebijakan pengembalian barang?</span>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-primary/10 rounded-full flex items-center justify-center shrink-0 transition-all duration-300 group-hover:bg-primary/20">
                        <i class="fas fa-chevron-down text-primary text-xs sm:text-sm transition-transform duration-300"></i>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <div class="px-5 sm:px-6 pb-5 sm:pb-6 text-gray-600 text-sm sm:text-base leading-relaxed border-t border-gray-100 pt-4">
                        Kami menerima pengembalian barang dalam waktu <strong>3 hari setelah barang diterima</strong> jika terdapat cacat produksi atau barang tidak sesuai pesanan. Silakan dokumentasikan kondisi barang dan hubungi customer service kami untuk proses pengembalian.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="faq-item bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <button class="faq-toggle w-full flex items-center justify-between p-5 sm:p-6 text-left group" onclick="toggleFaq(this)">
                    <span class="font-semibold text-primary-dark text-sm sm:text-base pr-4">Berapa lama estimasi pengiriman?</span>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-primary/10 rounded-full flex items-center justify-center shrink-0 transition-all duration-300 group-hover:bg-primary/20">
                        <i class="fas fa-chevron-down text-primary text-xs sm:text-sm transition-transform duration-300"></i>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <div class="px-5 sm:px-6 pb-5 sm:pb-6 text-gray-600 text-sm sm:text-base leading-relaxed border-t border-gray-100 pt-4">
                        Estimasi pengiriman bervariasi tergantung lokasi: <strong>Pulau Jawa 2-3 hari</strong>, <strong>luar Jawa 3-7 hari</strong>. Pesanan diproses dalam 1-2 hari kerja setelah pembayaran dikonfirmasi. Anda akan mendapatkan nomor resi untuk tracking pengiriman.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 sm:py-20 bg-primary">
    <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center">
        <div data-aos="fade-up">
            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-2">Masih ada pertanyaan?</h2>
            <p class="text-white/80 mb-6 text-sm sm:text-base">Hubungi kami langsung via WhatsApp untuk jawaban lebih cepat</p>
            <a href="https://wa.me/6285748169363?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk" target="_blank"
                class="inline-flex items-center gap-3 px-8 sm:px-10 py-3 sm:py-4 bg-green-500 text-white rounded-full text-base sm:text-lg font-semibold transition-all duration-300 hover:bg-green-600 hover:scale-105 hover:shadow-xl">
                <i class="fab fa-whatsapp text-xl sm:text-2xl"></i>
                Chat via WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // FAQ Accordion
    function toggleFaq(button) {
        const faqItem = button.closest('.faq-item');
        const content = faqItem.querySelector('.faq-content');
        const icon = button.querySelector('i');
        const isActive = faqItem.classList.contains('active');

        // Close all other FAQ items
        document.querySelectorAll('.faq-item.active').forEach(item => {
            if (item !== faqItem) {
                item.classList.remove('active');
                item.querySelector('.faq-content').style.maxHeight = '0';
                item.querySelector('.faq-toggle i').style.transform = 'rotate(0deg)';
            }
        });

        // Toggle current
        if (isActive) {
            faqItem.classList.remove('active');
            content.style.maxHeight = '0';
            icon.style.transform = 'rotate(0deg)';
        } else {
            faqItem.classList.add('active');
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.style.transform = 'rotate(180deg)';
        }
    }
</script>
@endpush
