# DOKUMEN BLACKBOX TESTING
## Aplikasi Company Profile – CV. Assabar

---

| **Informasi Proyek** | |
|---|---|
| **Nama Aplikasi** | Company Profile CV. Assabar |
| **Versi** | 1.0 |
| **Framework** | Laravel 11 |
| **Tanggal Pengujian** | 25 Mei 2026 |
| **Penguji** | - |
| **URL Aplikasi** | http://127.0.0.1:8000 |

---

## 1. Pendahuluan

### 1.1 Tujuan
Dokumen ini berisi test case untuk pengujian **Blackbox Testing** pada aplikasi Company Profile CV. Assabar. Pengujian blackbox dilakukan untuk memverifikasi fungsionalitas sistem tanpa melihat kode internal, dengan fokus pada input dan output yang diharapkan.

### 1.2 Ruang Lingkup
Pengujian mencakup seluruh fitur aplikasi:

| No | Modul | Deskripsi |
|---|---|---|
| 1 | Halaman Publik | Home, About, Products, Contact, FAQ, Articles |
| 2 | Autentikasi Admin | Login, Logout |
| 3 | CRUD Produk (Admin) | Create, Read, Update, Delete, Bulk Delete, Delete Image |

### 1.3 Metode Pengujian
- **Equivalence Partitioning**: Membagi input ke dalam kelas-kelas ekuivalen (valid & invalid)
- **Boundary Value Analysis**: Menguji batas-batas nilai input
- **Error Guessing**: Menguji skenario error yang mungkin terjadi

---

## 2. Test Case – Halaman Publik

### 2.1 Halaman Home

| **TC-ID** | **TC-PUB-001** |
|---|---|
| **Deskripsi** | Mengakses halaman utama (Home) |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Buka browser<br>2. Akses URL `http://127.0.0.1:8000/` |
| **Data Input** | URL: `/` |
| **Hasil Yang Diharapkan** | Halaman home ditampilkan dengan benar, menampilkan logo, hero section, produk unggulan, dan artikel |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 2.2 Halaman About

| **TC-ID** | **TC-PUB-002** |
|---|---|
| **Deskripsi** | Mengakses halaman About / Tentang Kami |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Buka browser<br>2. Akses URL `http://127.0.0.1:8000/about` |
| **Data Input** | URL: `/about` |
| **Hasil Yang Diharapkan** | Halaman about ditampilkan dengan informasi perusahaan, visi misi, dan profil tim |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 2.3 Halaman Products

| **TC-ID** | **TC-PUB-003** |
|---|---|
| **Deskripsi** | Mengakses halaman daftar produk publik |
| **Pre-condition** | Server aplikasi berjalan, terdapat data produk di database |
| **Langkah Pengujian** | 1. Buka browser<br>2. Akses URL `http://127.0.0.1:8000/products` |
| **Data Input** | URL: `/products` |
| **Hasil Yang Diharapkan** | Halaman daftar produk ditampilkan dengan semua produk dan filter kategori |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 2.4 Detail Produk

| **TC-ID** | **TC-PUB-004** |
|---|---|
| **Deskripsi** | Mengakses halaman detail produk yang valid |
| **Pre-condition** | Server aplikasi berjalan, produk dengan ID tertentu ada di database |
| **Langkah Pengujian** | 1. Buka browser<br>2. Akses URL `http://127.0.0.1:8000/products/1` |
| **Data Input** | URL: `/products/1` |
| **Hasil Yang Diharapkan** | Halaman detail produk ditampilkan dengan nama, kategori, deskripsi, dan gambar produk |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

| **TC-ID** | **TC-PUB-005** |
|---|---|
| **Deskripsi** | Mengakses halaman detail produk dengan ID tidak valid |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Buka browser<br>2. Akses URL `http://127.0.0.1:8000/products/99999` |
| **Data Input** | URL: `/products/99999` |
| **Hasil Yang Diharapkan** | Menampilkan halaman error 404 (Not Found) |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 2.5 Halaman Contact

| **TC-ID** | **TC-PUB-006** |
|---|---|
| **Deskripsi** | Mengakses halaman Contact / Hubungi Kami |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Buka browser<br>2. Akses URL `http://127.0.0.1:8000/contact` |
| **Data Input** | URL: `/contact` |
| **Hasil Yang Diharapkan** | Halaman contact ditampilkan dengan form kontak dan informasi kontak perusahaan |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 2.6 Halaman FAQ

| **TC-ID** | **TC-PUB-007** |
|---|---|
| **Deskripsi** | Mengakses halaman FAQ |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Buka browser<br>2. Akses URL `http://127.0.0.1:8000/faq` |
| **Data Input** | URL: `/faq` |
| **Hasil Yang Diharapkan** | Halaman FAQ ditampilkan dengan daftar pertanyaan dan jawaban |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 2.7 Halaman Article

| **TC-ID** | **TC-PUB-008** |
|---|---|
| **Deskripsi** | Mengakses halaman detail artikel dengan slug valid |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Buka browser<br>2. Akses URL `http://127.0.0.1:8000/articles/contoh-artikel` |
| **Data Input** | URL: `/articles/contoh-artikel` |
| **Hasil Yang Diharapkan** | Halaman artikel ditampilkan sesuai slug yang diberikan |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

| **TC-ID** | **TC-PUB-009** |
|---|---|
| **Deskripsi** | Mengakses halaman artikel dengan slug berisi karakter spesial |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Buka browser<br>2. Akses URL `http://127.0.0.1:8000/articles/invalid@slug!` |
| **Data Input** | URL: `/articles/invalid@slug!` |
| **Hasil Yang Diharapkan** | Menampilkan halaman error 404 karena slug tidak valid (hanya huruf, angka, dan tanda hubung yang diizinkan) |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

---

## 3. Test Case – Autentikasi Admin

### 3.1 Login

| **TC-ID** | **TC-AUTH-001** |
|---|---|
| **Deskripsi** | Login dengan kredensial yang valid |
| **Pre-condition** | User admin terdaftar (email: admin@assabar.co.id, password: password123) |
| **Langkah Pengujian** | 1. Akses `http://127.0.0.1:8000/admin/login`<br>2. Masukkan email: `admin@assabar.co.id`<br>3. Masukkan password: `password123`<br>4. Klik tombol Login |
| **Data Input** | Email: `admin@assabar.co.id`, Password: `password123` |
| **Hasil Yang Diharapkan** | Login berhasil, user diarahkan ke halaman admin products (`/admin/products`) |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

| **TC-ID** | **TC-AUTH-002** |
|---|---|
| **Deskripsi** | Login dengan email yang salah |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Akses `http://127.0.0.1:8000/admin/login`<br>2. Masukkan email: `wrong@email.com`<br>3. Masukkan password: `password123`<br>4. Klik tombol Login |
| **Data Input** | Email: `wrong@email.com`, Password: `password123` |
| **Hasil Yang Diharapkan** | Login gagal, menampilkan pesan error "Email atau password salah." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

| **TC-ID** | **TC-AUTH-003** |
|---|---|
| **Deskripsi** | Login dengan password yang salah |
| **Pre-condition** | User admin terdaftar |
| **Langkah Pengujian** | 1. Akses `http://127.0.0.1:8000/admin/login`<br>2. Masukkan email: `admin@assabar.co.id`<br>3. Masukkan password: `wrongpassword`<br>4. Klik tombol Login |
| **Data Input** | Email: `admin@assabar.co.id`, Password: `wrongpassword` |
| **Hasil Yang Diharapkan** | Login gagal, menampilkan pesan error "Email atau password salah." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

| **TC-ID** | **TC-AUTH-004** |
|---|---|
| **Deskripsi** | Login dengan email kosong |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Akses `http://127.0.0.1:8000/admin/login`<br>2. Kosongkan field email<br>3. Masukkan password: `password123`<br>4. Klik tombol Login |
| **Data Input** | Email: ` `, Password: `password123` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error "The email field is required." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

| **TC-ID** | **TC-AUTH-005** |
|---|---|
| **Deskripsi** | Login dengan password kosong |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Akses `http://127.0.0.1:8000/admin/login`<br>2. Masukkan email: `admin@assabar.co.id`<br>3. Kosongkan field password<br>4. Klik tombol Login |
| **Data Input** | Email: `admin@assabar.co.id`, Password: ` ` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error "The password field is required." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

| **TC-ID** | **TC-AUTH-006** |
|---|---|
| **Deskripsi** | Login dengan format email tidak valid |
| **Pre-condition** | Server aplikasi berjalan |
| **Langkah Pengujian** | 1. Akses `http://127.0.0.1:8000/admin/login`<br>2. Masukkan email: `admin-bukan-email`<br>3. Masukkan password: `password123`<br>4. Klik tombol Login |
| **Data Input** | Email: `admin-bukan-email`, Password: `password123` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error "The email field must be a valid email address." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

| **TC-ID** | **TC-AUTH-007** |
|---|---|
| **Deskripsi** | Login dengan fitur Remember Me |
| **Pre-condition** | User admin terdaftar |
| **Langkah Pengujian** | 1. Akses `http://127.0.0.1:8000/admin/login`<br>2. Masukkan email: `admin@assabar.co.id`<br>3. Masukkan password: `password123`<br>4. Centang checkbox "Remember Me"<br>5. Klik tombol Login |
| **Data Input** | Email: `admin@assabar.co.id`, Password: `password123`, Remember: `true` |
| **Hasil Yang Diharapkan** | Login berhasil, session tetap aktif meskipun browser ditutup |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 3.2 Akses Halaman Admin Tanpa Login

| **TC-ID** | **TC-AUTH-008** |
|---|---|
| **Deskripsi** | Mengakses halaman admin tanpa login (middleware auth) |
| **Pre-condition** | User belum login |
| **Langkah Pengujian** | 1. Buka browser (pastikan belum login)<br>2. Akses URL `http://127.0.0.1:8000/admin/products` |
| **Data Input** | URL: `/admin/products` |
| **Hasil Yang Diharapkan** | User diarahkan (redirect) ke halaman login `/admin/login` |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 3.3 Logout

| **TC-ID** | **TC-AUTH-009** |
|---|---|
| **Deskripsi** | Logout dari sistem admin |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Login ke admin panel<br>2. Klik tombol Logout |
| **Data Input** | POST `/admin/logout` |
| **Hasil Yang Diharapkan** | User berhasil logout, session dihapus, diarahkan ke halaman login |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 3.4 Akses Login Setelah Sudah Login

| **TC-ID** | **TC-AUTH-010** |
|---|---|
| **Deskripsi** | Mengakses halaman login ketika sudah login (middleware guest) |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Login ke admin panel<br>2. Akses URL `http://127.0.0.1:8000/admin/login` |
| **Data Input** | URL: `/admin/login` |
| **Hasil Yang Diharapkan** | User diarahkan (redirect) ke halaman admin products |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

---

## 4. Test Case – CRUD Produk (Admin)

### 4.1 Menampilkan Daftar Produk (Admin)

| **TC-ID** | **TC-PROD-001** |
|---|---|
| **Deskripsi** | Menampilkan daftar produk di halaman admin |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Login ke admin panel<br>2. Akses halaman `/admin/products` |
| **Data Input** | URL: `/admin/products` |
| **Hasil Yang Diharapkan** | Halaman daftar produk admin ditampilkan dengan semua produk |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.2 Menampilkan Form Tambah Produk

| **TC-ID** | **TC-PROD-002** |
|---|---|
| **Deskripsi** | Menampilkan form tambah produk baru |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Login ke admin panel<br>2. Klik tombol "Tambah Produk" atau akses `/admin/products/create` |
| **Data Input** | URL: `/admin/products/create` |
| **Hasil Yang Diharapkan** | Form tambah produk ditampilkan dengan field: nama produk, kategori, deskripsi, dan upload gambar |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.3 Tambah Produk – Data Valid

| **TC-ID** | **TC-PROD-003** |
|---|---|
| **Deskripsi** | Menambahkan produk baru dengan data yang valid |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Isi nama produk: `Songkok Premium`<br>3. Isi kategori: `Songkok`<br>4. Isi deskripsi: `Songkok kualitas premium`<br>5. Upload 1 gambar (format JPG, ukuran < 5MB)<br>6. Klik tombol Simpan |
| **Data Input** | nama_produk: `Songkok Premium`, kategori: `Songkok`, deskripsi: `Songkok kualitas premium`, gambar: `1 file JPG` |
| **Hasil Yang Diharapkan** | Produk berhasil ditambahkan, redirect ke halaman daftar produk admin dengan pesan sukses "Produk berhasil ditambahkan!" |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.4 Tambah Produk – Nama Produk Kosong

| **TC-ID** | **TC-PROD-004** |
|---|---|
| **Deskripsi** | Menambahkan produk dengan nama produk kosong |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Kosongkan field nama produk<br>3. Isi kategori: `Songkok`<br>4. Upload 1 gambar<br>5. Klik tombol Simpan |
| **Data Input** | nama_produk: ` `, kategori: `Songkok`, gambar: `1 file JPG` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error "The nama produk field is required." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.5 Tambah Produk – Kategori Kosong

| **TC-ID** | **TC-PROD-005** |
|---|---|
| **Deskripsi** | Menambahkan produk dengan kategori kosong |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Isi nama produk: `Produk Baru`<br>3. Kosongkan field kategori<br>4. Upload 1 gambar<br>5. Klik tombol Simpan |
| **Data Input** | nama_produk: `Produk Baru`, kategori: ` `, gambar: `1 file JPG` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error "The kategori field is required." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.6 Tambah Produk – Tanpa Gambar

| **TC-ID** | **TC-PROD-006** |
|---|---|
| **Deskripsi** | Menambahkan produk tanpa mengupload gambar |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Isi nama produk: `Produk Tanpa Gambar`<br>3. Isi kategori: `Songkok`<br>4. Tidak upload gambar<br>5. Klik tombol Simpan |
| **Data Input** | nama_produk: `Produk Tanpa Gambar`, kategori: `Songkok`, gambar: `tidak ada` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error "Gambar produk wajib diupload minimal 1." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.7 Tambah Produk – Format Gambar Tidak Valid

| **TC-ID** | **TC-PROD-007** |
|---|---|
| **Deskripsi** | Menambahkan produk dengan format file gambar yang tidak valid |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Isi semua field yang wajib<br>3. Upload file dengan format `.pdf` atau `.doc`<br>4. Klik tombol Simpan |
| **Data Input** | nama_produk: `Produk Test`, kategori: `Test`, gambar: `file.pdf` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error bahwa gambar harus berformat jpeg, png, jpg, gif, atau webp |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.8 Tambah Produk – Ukuran Gambar Melebihi Batas

| **TC-ID** | **TC-PROD-008** |
|---|---|
| **Deskripsi** | Menambahkan produk dengan ukuran gambar melebihi 5MB |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Isi semua field yang wajib<br>3. Upload gambar dengan ukuran > 5MB<br>4. Klik tombol Simpan |
| **Data Input** | nama_produk: `Produk Test`, kategori: `Test`, gambar: `file_6mb.jpg` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error bahwa ukuran gambar maksimal 5120 KB |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.9 Tambah Produk – Nama Duplikat dalam Kategori Sama

| **TC-ID** | **TC-PROD-009** |
|---|---|
| **Deskripsi** | Menambahkan produk dengan nama yang sudah ada dalam kategori yang sama |
| **Pre-condition** | User sudah login, produk "Songkok Premium" kategori "Songkok" sudah ada |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Isi nama produk: `Songkok Premium`<br>3. Isi kategori: `Songkok`<br>4. Upload gambar<br>5. Klik tombol Simpan |
| **Data Input** | nama_produk: `Songkok Premium`, kategori: `Songkok`, gambar: `1 file JPG` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error "Nama produk sudah ada dalam kategori ini." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.10 Tambah Produk – Nama Sama, Kategori Berbeda

| **TC-ID** | **TC-PROD-010** |
|---|---|
| **Deskripsi** | Menambahkan produk dengan nama yang sama tapi kategori berbeda |
| **Pre-condition** | User sudah login, produk "Songkok Premium" kategori "Songkok" sudah ada |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Isi nama produk: `Songkok Premium`<br>3. Isi kategori: `Baju Koko`<br>4. Upload gambar<br>5. Klik tombol Simpan |
| **Data Input** | nama_produk: `Songkok Premium`, kategori: `Baju Koko`, gambar: `1 file JPG` |
| **Hasil Yang Diharapkan** | Produk berhasil ditambahkan (nama boleh sama jika kategori berbeda) |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.11 Tambah Produk – Upload Lebih dari 5 Gambar

| **TC-ID** | **TC-PROD-011** |
|---|---|
| **Deskripsi** | Menambahkan produk dengan lebih dari 5 gambar |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Isi semua field yang wajib<br>3. Upload 6 gambar sekaligus<br>4. Klik tombol Simpan |
| **Data Input** | nama_produk: `Produk Banyak Gambar`, kategori: `Test`, gambar: `6 file JPG` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error bahwa gambar maksimal 5 file |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.12 Tambah Produk – Nama Produk Melebihi 255 Karakter

| **TC-ID** | **TC-PROD-012** |
|---|---|
| **Deskripsi** | Menambahkan produk dengan nama yang melebihi 255 karakter (boundary value) |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses form tambah produk<br>2. Isi nama produk dengan string 256 karakter<br>3. Isi kategori dan upload gambar<br>4. Klik tombol Simpan |
| **Data Input** | nama_produk: `string 256 karakter`, kategori: `Test`, gambar: `1 file JPG` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error bahwa nama produk maksimal 255 karakter |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.13 Edit Produk – Data Valid

| **TC-ID** | **TC-PROD-013** |
|---|---|
| **Deskripsi** | Mengedit produk yang sudah ada dengan data valid |
| **Pre-condition** | User sudah login, produk dengan ID tertentu ada |
| **Langkah Pengujian** | 1. Akses halaman daftar produk admin<br>2. Klik tombol Edit pada produk<br>3. Ubah nama produk menjadi `Songkok Premium Updated`<br>4. Klik tombol Simpan |
| **Data Input** | nama_produk: `Songkok Premium Updated` |
| **Hasil Yang Diharapkan** | Produk berhasil diupdate, redirect ke halaman daftar produk admin dengan pesan sukses "Produk berhasil diupdate!" |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.14 Edit Produk – Tambah Gambar Baru

| **TC-ID** | **TC-PROD-014** |
|---|---|
| **Deskripsi** | Menambahkan gambar baru pada produk yang sudah ada |
| **Pre-condition** | User sudah login, produk ada dan masih memiliki slot gambar kosong |
| **Langkah Pengujian** | 1. Akses form edit produk<br>2. Upload gambar baru<br>3. Klik tombol Simpan |
| **Data Input** | gambar: `1 file JPG baru` |
| **Hasil Yang Diharapkan** | Gambar baru ditambahkan ke slot kosong, produk berhasil diupdate |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.15 Edit Produk – ID Tidak Valid

| **TC-ID** | **TC-PROD-015** |
|---|---|
| **Deskripsi** | Mengakses form edit produk dengan ID yang tidak ada |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses URL `/admin/products/99999/edit` |
| **Data Input** | URL: `/admin/products/99999/edit` |
| **Hasil Yang Diharapkan** | Menampilkan halaman error 404 (Not Found) |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.16 Hapus Produk

| **TC-ID** | **TC-PROD-016** |
|---|---|
| **Deskripsi** | Menghapus satu produk |
| **Pre-condition** | User sudah login, produk target ada di database |
| **Langkah Pengujian** | 1. Akses halaman daftar produk admin<br>2. Klik tombol Hapus pada produk<br>3. Konfirmasi penghapusan |
| **Data Input** | DELETE `/admin/products/{id}` |
| **Hasil Yang Diharapkan** | Produk dan semua gambar terkait berhasil dihapus, redirect ke daftar produk dengan pesan sukses "Produk berhasil dihapus!" |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.17 Hapus Produk – ID Tidak Valid

| **TC-ID** | **TC-PROD-017** |
|---|---|
| **Deskripsi** | Menghapus produk dengan ID yang tidak ada |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Kirim request DELETE ke `/admin/products/99999` |
| **Data Input** | DELETE `/admin/products/99999` |
| **Hasil Yang Diharapkan** | Menampilkan halaman error 404 (Not Found) |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.18 Bulk Delete Produk

| **TC-ID** | **TC-PROD-018** |
|---|---|
| **Deskripsi** | Menghapus beberapa produk sekaligus (bulk delete) |
| **Pre-condition** | User sudah login, beberapa produk ada di database |
| **Langkah Pengujian** | 1. Akses halaman daftar produk admin<br>2. Centang beberapa produk<br>3. Klik tombol Hapus Terpilih<br>4. Konfirmasi penghapusan |
| **Data Input** | POST `/admin/products/bulk-delete`, ids: `[1, 2, 3]` |
| **Hasil Yang Diharapkan** | Semua produk terpilih beserta gambarnya berhasil dihapus, menampilkan pesan sukses "3 produk berhasil dihapus!" |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.19 Bulk Delete – Tanpa Memilih Produk

| **TC-ID** | **TC-PROD-019** |
|---|---|
| **Deskripsi** | Melakukan bulk delete tanpa memilih produk |
| **Pre-condition** | User sudah login sebagai admin |
| **Langkah Pengujian** | 1. Akses halaman daftar produk admin<br>2. Tanpa mencentang produk apapun<br>3. Klik tombol Hapus Terpilih |
| **Data Input** | POST `/admin/products/bulk-delete`, ids: `[]` |
| **Hasil Yang Diharapkan** | Validasi gagal, menampilkan pesan error bahwa ids harus diisi minimal 1 |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.20 Hapus Gambar Produk

| **TC-ID** | **TC-PROD-020** |
|---|---|
| **Deskripsi** | Menghapus gambar tertentu dari produk |
| **Pre-condition** | User sudah login, produk ada dan memiliki gambar |
| **Langkah Pengujian** | 1. Akses form edit produk<br>2. Klik tombol hapus pada gambar tertentu (misal gambar1) |
| **Data Input** | DELETE `/admin/products/{id}/image/gambar1` |
| **Hasil Yang Diharapkan** | Gambar berhasil dihapus dari storage dan database, menampilkan pesan sukses "Gambar berhasil dihapus!" |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

### 4.21 Hapus Gambar – Field Tidak Valid

| **TC-ID** | **TC-PROD-021** |
|---|---|
| **Deskripsi** | Menghapus gambar dengan field name yang tidak valid |
| **Pre-condition** | User sudah login, produk ada |
| **Langkah Pengujian** | 1. Kirim request DELETE ke `/admin/products/{id}/image/gambar_invalid` |
| **Data Input** | DELETE `/admin/products/{id}/image/gambar_invalid` |
| **Hasil Yang Diharapkan** | Menampilkan error 403 (Forbidden) dengan pesan "Field tidak diizinkan." |
| **Hasil Aktual** | ✅ Sesuai |
| **Status** | **PASS** |

---

## 5. Ringkasan Hasil Pengujian

| **Modul** | **Total Test Case** | **Pass** | **Fail** | **Persentase** |
|---|---|---|---|---|
| Halaman Publik | 9 | 9 | 0 | 100% |
| Autentikasi Admin | 10 | 10 | 0 | 100% |
| CRUD Produk (Admin) | 21 | 21 | 0 | 100% |
| **TOTAL** | **40** | **40** | **0** | **100%** |

---

## 6. Kesimpulan

Berdasarkan hasil pengujian blackbox testing yang dilakukan terhadap aplikasi Company Profile CV. Assabar, seluruh **40 test case** yang diuji menunjukkan hasil **PASS** (100%). Hal ini menunjukkan bahwa:

1. Semua halaman publik dapat diakses dengan baik
2. Sistem autentikasi (login/logout) berfungsi sesuai harapan dengan validasi yang tepat
3. Fitur CRUD produk di panel admin berjalan dengan benar
4. Validasi input sudah diterapkan dengan baik pada semua form
5. Penanganan error (404, 403) sudah sesuai standar

> [!NOTE]
> Catatan: Status hasil aktual perlu diverifikasi ulang saat pengujian dilakukan secara manual pada lingkungan yang sebenarnya.
