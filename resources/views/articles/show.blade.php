@extends('layouts.main')
@section('title', 'Detail Artikel - PT Assabar Sukses Berkah')

@php
    // Data artikel statis
    $articles = [
        'dinamika-zaman-assabar' => [
            'title' => 'Menghadapi Dinamika Zaman dengan Keteguhan Gaya dan Iman bersama As-Sabar',
            'category' => 'Fashion',
            'category_color' => 'bg-primary',
            'date' => '5 Februari 2026',
            'author' => 'Admin',
            'image' => 'images/article/art1.jpeg',
            'content' => '
            <p class="mb-6">Di era modern yang serba cepat ini, pria muslim seringkali dihadapkan pada tantangan untuk tetap tampil aktual dan relevan tanpa harus mengorbankan nilai-nilai tradisi dan syariat. Perubahan tren fashion yang sangat dinamis menuntut produk yang tidak hanya sekadar mengikuti zaman, tetapi juga memiliki karakter yang kuat, sederhana, dan elegan. Dalam kondisi inilah, PT Assabar Sukses Berkah hadir melalui lini produk unggulannya untuk memberikan jawaban atas kebutuhan busana muslim yang berkualitas tinggi.</p>

            <h3 class="text-2xl font-bold text-primary-dark mb-4">Gaya Modern dalam Balutan Tradisi</h3>
            <p class="mb-6">Produk As-Sabar, mulai dari Songkok, Baju Koko, hingga Gamis, dirancang dengan memadukan kearifan lokal dan gaya modern agar mampu bersaing di pasar nasional hingga internasional. Di tengah maraknya produk instan, As-Sabar memilih untuk tetap istiqamah dalam kualitas premium dan desain orisinal. Kami memahami bahwa bagi pria muslim modern, kenyamanan bahan dan ketahanan produk adalah prioritas utama untuk mendukung aktivitas ibadah maupun profesionalisme sehari-hari.</p>

            <h3 class="text-2xl font-bold text-primary-dark mb-4">Filosofi Sabar: Solusi di Tengah Kompetisi yang Keras</h3>
            <p class="mb-6">Pasar saat ini dipenuhi dengan kompetisi yang sangat ketat, namun As-Sabar memilih jalan yang berbeda melalui prinsip "Sabar dalam Proses". Kami tidak terburu-buru mengejar tren sesaat; sebaliknya, kami menekuni setiap detail bahan dan kualitas dengan penuh ketelitian. Dengan mengusung nilai Akidah dan Amanah, setiap produk yang Anda kenakan telah melewati proses produksi yang jujur, transparan, dan berpedoman pada prinsip syariah.</p>

            <h3 class="text-2xl font-bold text-primary-dark mb-4">Aksesibilitas dan Keberkahan untuk Umat</h3>
            <p class="mb-6">Menyadari pentingnya kemudahan akses di era digital, As-Sabar kini hadir lebih dekat melalui penguatan platform e-commerce dan media sosial agar pelanggan dapat berbelanja dengan mudah di mana saja. Namun, lebih dari sekadar transaksi dagang, setiap pembelian produk As-Sabar juga berarti Anda turut berkontribusi dalam pemberdayaan UMKM lokal, penjahit, dan pengrajin yang menjadi bagian dari rantai produksi kami.</p>

            <div class="bg-cream border-l-4 border-primary p-6 rounded-r-xl my-8">
                <p class="text-gray-700 italic font-medium">Mengenakan As-Sabar bukan hanya soal tampil elegan dengan kualitas premium, tetapi juga tentang merayakan keteguhan iman dan konsistensi amal. Kami hadir untuk memastikan bahwa setiap usaha dan penampilan Anda bernilai ibadah yang diridhai Allah SWT.</p>
            </div>
        ',
        ],
        'ramadhan-syukur-sabar' => [
            'title' => 'Menyambut Ramadhan dengan Syukur & Kesabaran: Refleksi Spiritual dalam Karya Fashion As-Sabar',
            'category' => 'Spiritual',
            'category_color' => 'bg-secondary text-primary-dark',
            'date' => '1 Februari 2026',
            'author' => 'Admin',
            'image' => 'images/article/art2.jpeg',
            'content' => '
            <p class="mb-6">Bulan Ramadhan telah tiba kembali, bulan yang dinantikan oleh seluruh umat Islam di penjuru dunia. Bulan yang di dalamnya terkumpul berbagai keutamaan: ibadah dilipatgandakan pahalanya, pintu ampunan dibuka selebar-lebarnya, dan keberkahan turun membasahi setiap hati yang tulus. Bagi kami di As-Sabar, Ramadhan bukan sekadar momentum ritual tahunan, melainkan <em>madrasah ruhaniyah</em>sekolah spiritual yang mengajarkan dua nilai utama: syukur dan sabar, yang juga menjadi fondasi filosofi brand kami.</p>

            <h3 class="text-2xl font-bold text-primary-dark mb-4">Makna Sabar dalam Perspektif Al-Qur\'an dan Ulama</h3>
            <p class="mb-4">Nama As-Sabar terinspirasi dari salah satu sifat mulia yang sering disebut dalam Al-Qur\'an. Allah SWT berfirman:</p>
            <div class="bg-cream border-l-4 border-primary p-6 rounded-r-xl my-6 text-center">
                <p class="text-xl font-arabic text-primary-dark leading-loose mb-3" dir="rtl">يَـٰٓأَيُّهَا ٱلَّذِينَ ءَامَنُوا۟ ٱسْتَعِينُوا۟ بِٱلصَّبْرِ وَٱلصَّلَوٰةِ ۚ إِنَّ ٱللَّهَ مَعَ ٱلصَّـٰبِرِينَ</p>
                <p class="text-gray-600 italic">"Wahai orang-orang yang beriman, mintalah pertolongan dengan sabar dan shalat. Sungguh, Allah beserta orang-orang yang sabar." (QS. Al-Baqarah: 153)</p>
            </div>
            <p class="mb-4">Imam Ibnul Qayyim Al-Jauziyah dalam kitab <em>\'Uddatush Shabirin</em> menyatakan:</p>
            <div class="bg-cream border-l-4 border-secondary p-6 rounded-r-xl my-6">
                <p class="text-gray-700 italic">"Sabar adalah menahan jiwa dari berkeluh kesah, menahan lisan dari mengaduh, dan menahan anggota badan dari perbuatan yang tidak terpuji."</p>
            </div>
            <p class="mb-6">Di sinilah filosofi As-Sabar menemukan ruangnya, setiap produk yang kami hadirkan adalah wujud dari kesabaran dalam proses: sabar dalam memilih bahan terbaik, sabar dalam merancang desain yang elegan dan syar\'i, sabar dalam menjaga kualitas dari tahap produksi hingga ke tangan pelanggan.</p>

            <h3 class="text-2xl font-bold text-primary-dark mb-4">Syukur sebagai Penggerak Kebaikan</h3>
            <p class="mb-4">Allah SWT berfirman:</p>
            <div class="bg-cream border-l-4 border-primary p-6 rounded-r-xl my-6 text-center">
                <p class="text-xl font-arabic text-primary-dark leading-loose mb-3" dir="rtl">وَإِذْ تَأَذَّنَ رَبُّكُمْ لَئِن شَكَرْتُمْ لَأَزِيدَنَّكُمْ</p>
                <p class="text-gray-600 italic">"Dan (ingatlah) ketika Tuhanmu memaklumkan, \'Sesungguhnya jika kamu bersyukur, niscaya Aku akan menambah (nikmat) kepadamu.\'" (QS. Ibrahim: 7)</p>
            </div>
            <p class="mb-6">As-Sabar hadir sebagai bentuk syukur kami kepada Allah SWT atas nikmat kreativitas, kesehatan, dan kesempatan untuk berkarya di bidang fashion muslim pria. Setiap Songkok, Baju Koko, dan Gamis yang kami produksi adalah wujud rasa syukur yang diharapkan dapat membawa manfaat dan keberkahan bagi pemakainya.</p>

            <h3 class="text-2xl font-bold text-primary-dark mb-4">Koleksi Spesial Ramadhan</h3>
            <p class="mb-4">As-Sabar dengan penuh khidmat meluncurkan koleksi spesial Ramadhan yang dirancang khusus untuk mendukung kekhusyukan ibadah dan kebersamaan bersama keluarga:</p>
            <ul class="list-none space-y-3 mb-6">
                <li class="pl-6 relative before:content-[\'✦\'] before:absolute before:left-0 before:text-secondary before:font-bold text-gray-600"><strong class="text-primary-dark">Songkok Premium</strong> bahan beludru lembut dan motif tenun eksklusif, cocok untuk tarawih dan silaturahmi.</li>
                <li class="pl-6 relative before:content-[\'✦\'] before:absolute before:left-0 before:text-secondary before:font-bold text-gray-600"><strong class="text-primary-dark">Baju Koko Slim Fit</strong> bahan katun pilihan yang menyerap keringat, nyaman sepanjang hari.</li>
                <li class="pl-6 relative before:content-[\'✦\'] before:absolute before:left-0 before:text-secondary before:font-bold text-gray-600"><strong class="text-primary-dark">Gamis Modern</strong> potongan rapi dan saku fungsional, ideal untuk ibadah sekaligus aktivitas sehari-hari.</li>
            </ul>
            <p class="mb-6">Semua produk dibuat dengan prinsip <em>halalan thayyiban</em>, mengutamakan bahan yang halal, proses yang etis, dan niat yang ikhlas.</p>

            <h3 class="text-2xl font-bold text-primary-dark mb-4">Mari Sambut Ramadhan dengan Hati yang Tenang</h3>
            <p class="mb-4">Di bulan yang mulia ini, mari kita bersama-sama:</p>
            <ul class="list-none space-y-3 mb-6">
                <li class="pl-6 relative before:content-[\'🤲\'] before:absolute before:left-0 text-gray-600"><strong>Bersabar</strong> dalam menahan diri dari hal yang membatalkan puasa, baik secara fisik maupun spiritual.</li>
                <li class="pl-6 relative before:content-[\'🤲\'] before:absolute before:left-0 text-gray-600"><strong>Bersyukur</strong> atas segala nikmat iman, kesehatan, dan rezeki yang Allah berikan.</li>
                <li class="pl-6 relative before:content-[\'🤲\'] before:absolute before:left-0 text-gray-600"><strong>Berbagi</strong> kebahagiaan dengan sesama, melalui silaturahmi, sedekah, dan dukungan terhadap produk-produk yang lahir dari niat baik.</li>
            </ul>

            <div class="bg-gradient-to-br from-primary to-dark text-white p-8 rounded-2xl my-8">
                <p class="text-center italic text-lg leading-relaxed mb-4\">As-Sabar hadir tidak hanya sebagai merek fashion, tetapi sebagai sahabat spiritual yang ingin mengingatkan kita akan pentingnya kesabaran dan rasa syukur dalam setiap helai kehidupan.</p>
                <p class="text-center font-bold text-secondary text-lg\">As-Sabar Fashion Tampil Syar\'i, Hidup Penuh Makna.</p>
            </div>
        ',
        ],
    ];

    $article = $articles[$slug] ?? null;
@endphp

@section('content')
    @if ($article)
        <!-- Hero Section -->
        <section class="py-24 bg-islamic-gradient relative overflow-hidden">
            <div class="absolute inset-0 opacity-10"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M30 0L60 30L30 60L0 30z\' fill=\'%23ffffff\' fill-opacity=\'0.1\'/%3E%3C/svg%3E');">
            </div>
            <div class="max-w-4xl mx-auto px-8 text-center relative z-10">
                <span
                    class="inline-block {{ $article['category_color'] }} text-white px-4 py-1 rounded-full text-sm font-semibold mb-4"
                    data-aos="fade-up">{{ $article['category'] }}</span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight" data-aos="fade-up"
                    data-aos-delay="100">{{ $article['title'] }}</h1>
            </div>
        </section>

        <!-- Article Content -->
        <section class="py-16 bg-white">
            <div class="max-w-4xl mx-auto px-8">
                <!-- Featured Image -->
                <div class="rounded-2xl overflow-hidden shadow-xl mb-12 -mt-20 relative z-20" data-aos="fade-up">
                    <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}"
                        class="w-full h-90 object-cover">
                </div>

                
                <!-- Content -->
                <article class="prose prose-lg max-w-none" data-aos="fade-up">
                    <div class="text-gray-600 leading-relaxed text-justify">
                        {!! $article['content'] !!}
                    </div>
                </article>

                <!-- Share & Navigation -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <span class="text-gray-500 mr-4">Bagikan:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors mr-2"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="https://x.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article['title']) }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black text-white hover:bg-gray-800 transition-colors mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($article['title'] . ' - ' . request()->url()) }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-500 text-white hover:bg-green-600 transition-colors"><i
                                    class="fab fa-whatsapp"></i></a>
                        </div>
                        <a href="/"
                            class="inline-flex items-center gap-2 text-primary font-semibold hover:text-secondary transition-colors">
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
                <a href="/"
                    class="btn-primary-custom inline-flex items-center gap-2 px-8 py-4 rounded-full font-semibold transition-all duration-300">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </section>
    @endif
@endsection
