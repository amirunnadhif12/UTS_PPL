@extends('layouts.main')
@section('title', 'About Us - PT Assabar Sukses Berkah')

@push('styles')
<style>
    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 8rem 0 4rem;
        text-align: center;
        color: white;
    }

    .page-header h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
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

    /* ===== TENTANG PERUSAHAAN ===== */
    .company-section {
        padding: 5rem 0;
        background: white;
    }

    .company-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .company-image img {
        width: 100%;
        border-radius: 15px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
    }

    .company-content h2 {
        font-size: 2.25rem;
        color: var(--primary-dark);
        margin-bottom: 1.5rem;
    }

    .company-content p {
        color: #666;
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }

    .company-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .stat-box {
        text-align: center;
        padding: 1.5rem;
        background: var(--cream);
        border-radius: 10px;
    }

    .stat-box h3 {
        font-size: 2rem;
        color: var(--primary);
        margin-bottom: 0.25rem;
    }

    .stat-box p {
        color: #888;
        font-size: 0.9rem;
        margin: 0;
    }

    /* ===== PRODUK PREVIEW ===== */
    .products-preview {
        padding: 5rem 0;
        background: var(--cream);
    }

    .section-title {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title h2 {
        font-size: 2.25rem;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
    }

    .section-title p {
        color: #888;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-icon {
        height: 150px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: var(--secondary);
    }

    .product-info {
        padding: 1.5rem;
        text-align: center;
    }

    .product-info h4 {
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
    }

    .product-info p {
        color: #888;
        font-size: 0.9rem;
        margin: 0;
    }

    /* ===== SEJARAH PERUSAHAAN ===== */
    .history-section {
        padding: 5rem 0;
        background: white;
    }

    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 3px;
        height: 100%;
        background: var(--primary);
    }

    .timeline-item {
        display: flex;
        justify-content: flex-end;
        padding-right: 50%;
        position: relative;
        margin-bottom: 2rem;
    }

    .timeline-item:nth-child(even) {
        justify-content: flex-start;
        padding-right: 0;
        padding-left: 50%;
    }

    .timeline-content {
        background: var(--cream);
        padding: 1.5rem;
        border-radius: 10px;
        max-width: 350px;
        margin-right: 2rem;
    }

    .timeline-item:nth-child(even) .timeline-content {
        margin-right: 0;
        margin-left: 2rem;
    }

    .timeline-content h4 {
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .timeline-content p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
    }

    .timeline-dot {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 20px;
        background: var(--secondary);
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 3px var(--primary);
    }

    /* ===== VISI MISI ===== */
    .vm-section {
        padding: 5rem 0;
        background: var(--cream);
    }

    .vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
    }

    .vm-card {
        background: white;
        padding: 2.5rem;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .vm-card h3 {
        color: var(--primary);
        font-size: 1.5rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .vm-card h3 i {
        color: var(--secondary);
    }

    .vm-card p, .vm-card ul {
        color: #666;
        line-height: 1.8;
    }

    .vm-card ul {
        list-style: none;
        padding: 0;
    }

    .vm-card ul li {
        padding: 0.5rem 0;
        padding-left: 1.5rem;
        position: relative;
    }

    .vm-card ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--secondary);
        font-weight: bold;
    }

    /* ===== FAQ / PERTANYAAN ===== */
    .faq-section {
        padding: 5rem 0;
        background: white;
    }

    .faq-list {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        border: 1px solid #eee;
        border-radius: 10px;
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .faq-question {
        padding: 1.25rem 1.5rem;
        background: var(--cream);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        color: var(--primary-dark);
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background: var(--primary);
        color: white;
    }

    .faq-question i {
        transition: transform 0.3s ease;
    }

    .faq-item.active .faq-question i {
        transform: rotate(180deg);
    }

    .faq-answer {
        padding: 0 1.5rem;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-item.active .faq-answer {
        padding: 1.5rem;
        max-height: 200px;
    }

    .faq-answer p {
        color: #666;
        line-height: 1.7;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .company-grid, .vm-grid, .products-grid {
            grid-template-columns: 1fr;
        }
        .company-stats {
            grid-template-columns: 1fr;
        }
        .timeline::before {
            left: 20px;
        }
        .timeline-item, .timeline-item:nth-child(even) {
            padding-left: 50px;
            padding-right: 0;
            justify-content: flex-start;
        }
        .timeline-content, .timeline-item:nth-child(even) .timeline-content {
            margin-left: 0;
            margin-right: 0;
        }
        .timeline-dot {
            left: 20px;
        }
        .page-header h1 {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Tentang Kami</h1>
        <p data-aos="fade-up" data-aos-delay="100">Mengenal lebih dekat PT Assabar Sukses Berkah</p>
    </div>
</section>

<!-- ===== TENTANG PERUSAHAAN ===== -->
<section class="company-section">
    <div class="container">
        <div class="company-grid">
            <div class="company-image" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop" alt="Tentang Perusahaan">
            </div>
            <div class="company-content" data-aos="fade-left">
                <h2>Tentang Perusahaan</h2>
                <p>
                    PT Assabar Sukses Berkah adalah perusahaan yang bergerak di bidang produksi 
                    fashion muslim berkualitas tinggi. Kami menghadirkan berbagai produk seperti 
                    kopyah, gamis, dan footwear muslim dengan desain modern namun tetap syar'i.
                </p>
                <p>
                    Dengan pengalaman lebih dari 10 tahun, kami telah melayani ribuan pelanggan 
                    di seluruh Indonesia dan terus berkomitmen untuk memberikan produk terbaik.
                </p>

                <div class="company-stats">
                    <div class="stat-box">
                        <h3>10+</h3>
                        <p>Tahun Pengalaman</p>
                    </div>
                    <div class="stat-box">
                        <h3>5000+</h3>
                        <p>Pelanggan</p>
                    </div>
                    <div class="stat-box">
                        <h3>100+</h3>
                        <p>Produk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== BEBERAPA PRODUK ===== -->
<section class="products-preview">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Produk Kami</h2>
            <p>Beberapa kategori produk yang kami tawarkan</p>
        </div>

        <div class="products-grid">
            <div class="product-card" data-aos="fade-up" data-aos-delay="100">
                <div class="product-icon">
                    <i class="fas fa-hat-wizard"></i>
                </div>
                <div class="product-info">
                    <h4>Kopyah Premium</h4>
                    <p>Berbagai model kopyah berkualitas tinggi</p>
                </div>
            </div>

            <div class="product-card" data-aos="fade-up" data-aos-delay="200">
                <div class="product-icon">
                    <i class="fas fa-tshirt"></i>
                </div>
                <div class="product-info">
                    <h4>Baju Gamis</h4>
                    <p>Gamis modern untuk pria dan wanita</p>
                </div>
            </div>

            <div class="product-card" data-aos="fade-up" data-aos-delay="300">
                <div class="product-icon">
                    <i class="fas fa-shoe-prints"></i>
                </div>
                <div class="product-info">
                    <h4>Muslim Footwear</h4>
                    <p>Sandal dan sepatu untuk ibadah</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SEJARAH PERUSAHAAN ===== -->
<section class="history-section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah Perusahaan</h2>
            <p>Perjalanan kami dari awal hingga sekarang</p>
        </div>

        <div class="timeline">
            <div class="timeline-item" data-aos="fade-right">
                <div class="timeline-content">
                    <h4>2014 - Berdiri</h4>
                    <p>PT Assabar Sukses Berkah didirikan sebagai usaha kecil produksi kopyah.</p>
                </div>
                <div class="timeline-dot"></div>
            </div>

            <div class="timeline-item" data-aos="fade-left">
                <div class="timeline-content">
                    <h4>2017 - Ekspansi Produk</h4>
                    <p>Mulai memproduksi gamis dan memperluas jangkauan pasar.</p>
                </div>
                <div class="timeline-dot"></div>
            </div>

            <div class="timeline-item" data-aos="fade-right">
                <div class="timeline-content">
                    <h4>2020 - Go Digital</h4>
                    <p>Meluncurkan platform online dan ekspansi ke seluruh Indonesia.</p>
                </div>
                <div class="timeline-dot"></div>
            </div>

            <div class="timeline-item" data-aos="fade-left">
                <div class="timeline-content">
                    <h4>2024 - Sekarang</h4>
                    <p>Menjadi salah satu produsen fashion muslim terpercaya di Indonesia.</p>
                </div>
                <div class="timeline-dot"></div>
            </div>
        </div>
    </div>
</section>

<!-- ===== VISI MISI ===== -->
<section class="vm-section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Visi & Misi</h2>
            <p>Arah dan tujuan perusahaan kami</p>
        </div>

        <div class="vm-grid">
            <div class="vm-card" data-aos="fade-up">
                <h3><i class="fas fa-eye"></i> Visi</h3>
                <p>
                    Menjadi perusahaan fashion muslim terkemuka yang menginspirasi umat untuk 
                    berpenampilan syar'i dengan gaya modern dan berkualitas tinggi.
                </p>
            </div>
            <div class="vm-card" data-aos="fade-up" data-aos-delay="100">
                <h3><i class="fas fa-bullseye"></i> Misi</h3>
                <ul>
                    <li>Menghasilkan produk berkualitas premium</li>
                    <li>Memberikan pelayanan terbaik kepada pelanggan</li>
                    <li>Berinovasi dalam desain yang modern dan syar'i</li>
                    <li>Berkontribusi pada kesejahteraan masyarakat</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ===== PERTANYAAN / FAQ ===== -->
<section class="faq-section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Pertanyaan Umum</h2>
            <p>Jawaban untuk pertanyaan yang sering diajukan</p>
        </div>

        <div class="faq-list" data-aos="fade-up">
            <div class="faq-item active">
                <div class="faq-question">
                    <span>Bagaimana cara memesan produk?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Anda dapat memesan melalui halaman Products atau menghubungi kami via WhatsApp untuk pemesanan langsung.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah bisa custom ukuran?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Ya, kami menerima pesanan custom ukuran untuk produk gamis dan kopyah. Hubungi kami untuk detail lebih lanjut.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Berapa lama pengiriman?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Pengiriman membutuhkan waktu 2-5 hari kerja tergantung lokasi. Kami menggunakan ekspedisi terpercaya.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah ada garansi produk?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Ya, semua produk kami bergaransi 7 hari untuk penukaran jika ada cacat produksi.</p>
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
            const isActive = item.classList.contains('active');
            
            // Close all
            document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
            
            // Open clicked if wasn't active
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
</script>
@endpush