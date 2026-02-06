@extends('layouts.main')
@section('title', 'Contact Us - PT Assabar Sukses Berkah')

@section('content')
<!-- Page Header -->
<section class="min-h-[50vh] bg-cover bg-right flex items-center justify-center relative overflow-hidden" style="background-image: url('/images/hero/hero-3.jpg');">
    <div class="absolute inset-0 bg-gradient-to-b from-primary/85 via-primary/70 to-dark/85 z-1"></div>
    <div class="relative z-10 text-center text-white py-24 px-8">
        <h1 class="text-5xl font-bold mb-4 drop-shadow-lg" data-aos="fade-up">Hubungi Kami</h1>
        <p class="text-lg opacity-90" data-aos="fade-up" data-aos-delay="100">Kami siap membantu Anda</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="grid md:grid-cols-5 gap-16">
            <!-- Contact Info -->
            <div class="md:col-span-2" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-primary-dark mb-4">Hubungi Kami</h2>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Jangan ragu untuk menghubungi kami. Tim kami akan dengan senang hati 
                    membantu menjawab pertanyaan Anda.
                </p>

                <ul class="space-y-4">
                    <li class="flex items-start gap-4 p-5 bg-cream rounded-xl transition-all duration-300 hover:translate-x-2 hover:shadow-lg">
                        <div class="w-12 h-12 bg-gold-gradient rounded-full flex items-center justify-center text-primary-dark text-lg shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary-dark mb-1">Alamat</h4>
                            <p class="text-gray-600 text-sm">Jl. Contoh Alamat No. 123<br>Kota, Provinsi 12345</p>
                        </div>
                    </li>

                    <li class="flex items-start gap-4 p-5 bg-cream rounded-xl transition-all duration-300 hover:translate-x-2 hover:shadow-lg">
                        <div class="w-12 h-12 bg-gold-gradient rounded-full flex items-center justify-center text-primary-dark text-lg shrink-0">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary-dark mb-1">Telepon</h4>
                            <p class="text-sm"><a href="tel:+6281234567890" class="text-primary hover:text-secondary transition-colors">+62 812-3456-7890</a></p>
                        </div>
                    </li>

                    <li class="flex items-start gap-4 p-5 bg-cream rounded-xl transition-all duration-300 hover:translate-x-2 hover:shadow-lg">
                        <div class="w-12 h-12 bg-gold-gradient rounded-full flex items-center justify-center text-primary-dark text-lg shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary-dark mb-1">Email</h4>
                            <p class="text-sm"><a href="mailto:info@assabar.com" class="text-primary hover:text-secondary transition-colors">info@assabar.com</a></p>
                        </div>
                    </li>

                    <li class="flex items-start gap-4 p-5 bg-cream rounded-xl transition-all duration-300 hover:translate-x-2 hover:shadow-lg">
                        <div class="w-12 h-12 bg-gold-gradient rounded-full flex items-center justify-center text-primary-dark text-lg shrink-0">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary-dark mb-1">WhatsApp</h4>
                            <p class="text-sm"><a href="https://wa.me/6281234567890" class="text-primary hover:text-secondary transition-colors">+62 812-3456-7890</a></p>
                        </div>
                    </li>

                    <li class="flex items-start gap-4 p-5 bg-cream rounded-xl transition-all duration-300 hover:translate-x-2 hover:shadow-lg">
                        <div class="w-12 h-12 bg-gold-gradient rounded-full flex items-center justify-center text-primary-dark text-lg shrink-0">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary-dark mb-1">Jam Operasional</h4>
                            <p class="text-gray-600 text-sm">Senin - Sabtu: 08:00 - 17:00</p>
                        </div>
                    </li>
                </ul>

                <div class="flex gap-4 mt-8">
                    <a href="#" class="w-11 h-11 bg-primary rounded-full flex items-center justify-center text-white transition-all duration-300 hover:bg-secondary hover:-translate-y-1"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-11 h-11 bg-primary rounded-full flex items-center justify-center text-white transition-all duration-300 hover:bg-secondary hover:-translate-y-1"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-11 h-11 bg-primary rounded-full flex items-center justify-center text-white transition-all duration-300 hover:bg-secondary hover:-translate-y-1"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="md:col-span-3 bg-cream p-10 rounded-2xl" data-aos="fade-left">
                <h3 class="text-2xl font-bold text-primary-dark mb-2">Kirim Pesan</h3>
                <p class="text-gray-500 mb-8">Isi form di bawah ini dan kami akan segera menghubungi Anda</p>

                <form action="#" method="POST">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="name" class="block text-primary-dark font-medium text-sm mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required
                                class="w-full p-4 border-2 border-gray-200 rounded-xl bg-white transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </div>
                        <div>
                            <label for="phone" class="block text-primary-dark font-medium text-sm mb-2">Nomor HP</label>
                            <input type="tel" id="phone" name="phone" placeholder="08xxxxxxxxxx" required
                                class="w-full p-4 border-2 border-gray-200 rounded-xl bg-white transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-primary-dark font-medium text-sm mb-2">Email</label>
                        <input type="email" id="email" name="email" placeholder="email@contoh.com" required
                            class="w-full p-4 border-2 border-gray-200 rounded-xl bg-white transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-primary-dark font-medium text-sm mb-2">Subjek</label>
                        <select id="subject" name="subject" required
                            class="w-full p-4 border-2 border-gray-200 rounded-xl bg-white transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                            <option value="">Pilih Subjek</option>
                            <option value="order">Pertanyaan Pesanan</option>
                            <option value="product">Informasi Produk</option>
                            <option value="wholesale">Pembelian Grosir</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-primary-dark font-medium text-sm mb-2">Pesan</label>
                        <textarea id="message" name="message" placeholder="Tulis pesan Anda di sini..." required
                            class="w-full p-4 border-2 border-gray-200 rounded-xl bg-white transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 min-h-36 resize-y"></textarea>
                    </div>

                    <button type="submit" class="w-full p-4 bg-primary text-white rounded-xl font-semibold flex items-center justify-center gap-2 transition-all duration-300 hover:bg-primary-dark hover:-translate-y-0.5 hover:shadow-xl">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-20 bg-cream">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-8" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary-dark mb-2">Lokasi Kami</h2>
            <p class="text-gray-500">Temukan kami di lokasi berikut</p>
        </div>
        <div class="rounded-2xl overflow-hidden shadow-xl" data-aos="fade-up">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.41881612548636!2d112.64482299815622!3d-7.160517764436428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd801b5778c28e3%3A0xb79f8524267bd57c!2sPT.%20Assabar%20Sukses%20Berkah!5e0!3m2!1sid!2sid!4v1770362369946!5m2!1sid!2sid" class="w-full h-96 border-0" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<!-- WhatsApp CTA -->
<section class="py-16 bg-primary">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <div data-aos="fade-up">
            <h2 class="text-3xl font-bold text-white mb-2">Butuh Respon Cepat?</h2>
            <p class="text-white/80 mb-6">Hubungi kami langsung via WhatsApp untuk pelayanan lebih cepat</p>
            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk" target="_blank" 
                class="inline-flex items-center gap-3 px-10 py-4 bg-green-500 text-white rounded-full text-lg font-semibold transition-all duration-300 hover:bg-green-600 hover:scale-105 hover:shadow-xl">
                <i class="fab fa-whatsapp text-2xl"></i>
                Chat via WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
