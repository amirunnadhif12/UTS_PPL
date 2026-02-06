@extends('layouts.main')
@section('title', 'Contact Us - PT Assabar Sukses Berkah')


@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Hubungi Kami</h1>
        <p data-aos="fade-up" data-aos-delay="100">Kami siap membantu Anda</p>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Info -->
            <div class="contact-info" data-aos="fade-right">
                <h2>Hubungi Kami</h2>
                <p>
                    Jangan ragu untuk menghubungi kami. Tim kami akan dengan senang hati 
                    membantu menjawab pertanyaan Anda.
                </p>

                <ul class="info-list">
                    <li class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Alamat</h4>
                            <p>Jl. Contoh Alamat No. 123<br>Kota, Provinsi 12345</p>
                        </div>
                    </li>

                    <li class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Telepon</h4>
                            <p><a href="tel:+6281234567890">+62 812-3456-7890</a></p>
                        </div>
                    </li>

                    <li class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email</h4>
                            <p><a href="mailto:info@assabar.com">info@assabar.com</a></p>
                        </div>
                    </li>

                    <li class="info-item">
                        <div class="info-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="info-content">
                            <h4>Whatsapp</h4>
                            <p><a href="https://wa.me/6281234567890">+62 812-3456-7890</a></p>
                        </div>
                    </li>

                    <li class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h4>Jam Operasional</h4>
                            <p>Senin - Sabtu: 08:00 - 17:00</p>
                        </div>
                    </li>
                </ul>

                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-card" data-aos="fade-left">
                <h3>Kirim Pesan</h3>
                <p>Isi form di bawah ini dan kami akan segera menghubungi Anda</p>

                <form action="#" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor HP</label>
                            <input type="tel" id="phone" name="phone" placeholder="08xxxxxxxxxx" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="email@contoh.com" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <select id="subject" name="subject" required>
                            <option value="">Pilih Subjek</option>
                            <option value="order">Pertanyaan Pesanan</option>
                            <option value="product">Informasi Produk</option>
                            <option value="wholesale">Pembelian Grosir</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" name="message" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <div class="section-title" data-aos="fade-up" style="text-align: center; margin-bottom: 2rem;">
            <h2 style="color: var(--primary-dark); font-size: 2rem;">Lokasi Kami</h2>
            <p style="color: #888;">Temukan kami di lokasi berikut</p>
        </div>
        <div class="map-container" data-aos="fade-up">
            <!-- Ganti dengan embed Google Maps lokasi sebenarnya -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.194741099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1706900000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<!-- WhatsApp CTA -->
<section class="wa-section">
    <div class="container">
        <div class="wa-content" data-aos="fade-up">
            <h2>Butuh Respon Cepat?</h2>
            <p>Hubungi kami langsung via WhatsApp untuk pelayanan lebih cepat</p>
            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk" class="btn-wa" target="_blank">
                <i class="fab fa-whatsapp"></i>
                Chat via WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Page Header */
    .page-header {
        min-height: 50vh;
        background: url('/images/hero/hero-3.jpg') right/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .page-header::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(
            180deg,
            rgba(26, 86, 50, 0.85) 0%,
            rgba(26, 86, 50, 0.7) 50%,
            rgba(26, 26, 46, 0.85) 100%
        );
        z-index: 1;
    }

    .page-header .container {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        padding: 6rem 0 4rem;
    }

    .page-header h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 4px 10px rgba(0,0,0,0.3);
    }

    .page-header p {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Contact Section */
    .contact-section {
        padding: 5rem 0;
        background: white;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 4rem;
    }

    /* Contact Info */
    .contact-info h2 {
        font-size: 2rem;
        color: var(--primary-dark);
        margin-bottom: 1rem;
    }

    .contact-info > p {
        color: #666;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .info-list {
        list-style: none;
        padding: 0;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding: 1.25rem;
        background: var(--cream);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        transform: translateX(10px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: var(--gold-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-dark);
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .info-content h4 {
        color: var(--primary-dark);
        margin-bottom: 0.25rem;
        font-size: 1rem;
    }

    .info-content p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
    }

    .info-content a {
        color: var(--primary);
        text-decoration: none;
    }

    .info-content a:hover {
        color: var(--secondary);
    }

    /* Social Links */
    .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .social-link {
        width: 45px;
        height: 45px;
        background: var(--primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: var(--secondary);
        transform: translateY(-3px);
    }

    /* Contact Form */
    .contact-form-card {
        background: var(--cream);
        padding: 2.5rem;
        border-radius: 20px;
    }

    .contact-form-card h3 {
        font-size: 1.5rem;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
    }

    .contact-form-card > p {
        color: #888;
        margin-bottom: 2rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group label {
        display: block;
        color: var(--primary-dark);
        font-weight: 500;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 0.9rem 1.25rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(26, 86, 50, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 140px;
    }

    .btn-submit {
        width: 100%;
        padding: 1rem 2rem;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-submit:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(26, 86, 50, 0.3);
    }

    /* Map Section */
    .map-section {
        padding: 5rem 0;
        background: var(--cream);
    }

    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }

    .map-container iframe {
        width: 100%;
        height: 400px;
        border: none;
    }

    /* WhatsApp CTA */
    .wa-section {
        padding: 4rem 0;
        background: var(--primary);
        text-align: center;
    }

    .wa-content h2 {
        color: white;
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .wa-content p {
        color: rgba(255,255,255,0.8);
        margin-bottom: 1.5rem;
    }

    .btn-wa {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 2.5rem;
        background: #25D366;
        color: white;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-wa:hover {
        background: #128C7E;
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .page-header h1 {
            font-size: 2rem;
        }
    }
</style>
@endpush

