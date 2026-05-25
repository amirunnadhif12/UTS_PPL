# DOKUMEN UNIT TESTING
## Aplikasi Company Profile – CV. Assabar

---

| **Informasi Proyek** | |
|---|---|
| **Nama Aplikasi** | Company Profile CV. Assabar |
| **Versi** | 1.0 |
| **Framework** | Laravel 11 |
| **Tool Testing** | PHPUnit |
| **Tanggal Pengujian** | 25 Mei 2026 |
| **Penguji** | - |

---

## 1. Pendahuluan

### 1.1 Tujuan
Dokumen ini berisi test case untuk pengujian **Unit Testing** pada aplikasi Company Profile CV. Assabar. Unit testing dilakukan untuk menguji setiap unit/komponen individual secara terisolasi, memastikan setiap method dan fungsi bekerja sesuai yang diharapkan.

### 1.2 Ruang Lingkup
Pengujian unit mencakup komponen berikut:

| No | Komponen | File | Jumlah Test |
|---|---|---|---|
| 1 | Model Product | `app/Models/Product.php` | 5 |
| 2 | Model User | `app/Models/User.php` | 4 |
| 3 | AuthController | `app/Http/Controllers/AuthController.php` | 5 |
| 4 | ProductController | `app/Http/Controllers/ProductController.php` | 12 |
| | **TOTAL** | | **26** |

### 1.3 Perintah Menjalankan Test
```bash
# Menjalankan semua unit test
php artisan test --testsuite=Unit

# Menjalankan test tertentu
php artisan test tests/Unit/ProductModelTest.php
php artisan test tests/Unit/UserModelTest.php
php artisan test tests/Unit/AuthControllerTest.php
php artisan test tests/Unit/ProductControllerTest.php
```

---

## 2. Test Case – Model Product

> File test: `tests/Unit/ProductModelTest.php`

| **TC-ID** | **Deskripsi** | **Method yang diuji** | **Input** | **Expected Output** | **Status** |
|---|---|---|---|---|---|
| UT-PROD-001 | Memastikan Product model dapat diinstansiasi | `new Product()` | - | Instance dari Product berhasil dibuat | ✅ PASS |
| UT-PROD-002 | Memastikan atribut fillable sesuai konfigurasi | `$product->getFillable()` | - | Array berisi: `nama_produk, kategori, deskripsi, gambar1, gambar2, gambar3, gambar4, gambar5` | ✅ PASS |
| UT-PROD-003 | Memastikan timestamps dinonaktifkan | `$product->timestamps` | - | `false` | ✅ PASS |
| UT-PROD-004 | Memastikan casting tanggal_dibuat ke datetime | `$product->getCasts()` | - | `tanggal_dibuat` di-cast ke `datetime` | ✅ PASS |
| UT-PROD-005 | Memastikan casting tanggal_update ke datetime | `$product->getCasts()` | - | `tanggal_update` di-cast ke `datetime` | ✅ PASS |

---

## 3. Test Case – Model User

> File test: `tests/Unit/UserModelTest.php`

| **TC-ID** | **Deskripsi** | **Method yang diuji** | **Input** | **Expected Output** | **Status** |
|---|---|---|---|---|---|
| UT-USER-001 | Memastikan atribut fillable sesuai konfigurasi | `$user->getFillable()` | - | Array berisi: `name, email, password` | ✅ PASS |
| UT-USER-002 | Memastikan atribut hidden sesuai konfigurasi | `$user->getHidden()` | - | Array berisi: `password, remember_token` | ✅ PASS |
| UT-USER-003 | Memastikan password di-cast ke hashed | `$user->getCasts()` | - | `password` di-cast ke `hashed` | ✅ PASS |
| UT-USER-004 | Memastikan email_verified_at di-cast ke datetime | `$user->getCasts()` | - | `email_verified_at` di-cast ke `datetime` | ✅ PASS |

---

## 4. Test Case – AuthController

> File test: `tests/Unit/AuthControllerTest.php`

| **TC-ID** | **Deskripsi** | **Method yang diuji** | **Input** | **Expected Output** | **Status** |
|---|---|---|---|---|---|
| UT-AUTH-001 | Login berhasil dengan kredensial valid | `login()` | email: `admin@assabar.co.id`, password: `password123` | Redirect ke `admin.products.index`, session di-regenerate | ✅ PASS |
| UT-AUTH-002 | Login gagal dengan kredensial invalid | `login()` | email: `wrong@email.com`, password: `wrong` | Redirect back dengan error "Email atau password salah." | ✅ PASS |
| UT-AUTH-003 | Login menolak email kosong | `login()` | email: ` `, password: `password123` | Validation exception, field email required | ✅ PASS |
| UT-AUTH-004 | Logout berhasil | `logout()` | User sudah login | Session invalidated, redirect ke `admin.login` | ✅ PASS |
| UT-AUTH-005 | Show login redirect jika sudah login | `showLogin()` | User sudah login | Redirect ke `admin.products.index` | ✅ PASS |

---

## 5. Test Case – ProductController

> File test: `tests/Unit/ProductControllerTest.php`

| **TC-ID** | **Deskripsi** | **Method yang diuji** | **Input** | **Expected Output** | **Status** |
|---|---|---|---|---|---|
| UT-PCTRL-001 | Menampilkan daftar produk publik | `index()` | Request GET `/products` | View `products` dengan data products dan categories | ✅ PASS |
| UT-PCTRL-002 | Menampilkan daftar produk admin | `adminIndex()` | Request GET `/admin/products` | View `admin.products.index` dengan data products | ✅ PASS |
| UT-PCTRL-003 | Menampilkan form create | `create()` | Request GET `/admin/products/create` | View `admin.products.create` | ✅ PASS |
| UT-PCTRL-004 | Menyimpan produk baru dengan data valid | `store()` | nama_produk, kategori, gambar valid | Redirect ke `admin.products.index` dengan pesan sukses | ✅ PASS |
| UT-PCTRL-005 | Validasi gagal saat store tanpa nama_produk | `store()` | nama_produk kosong | Validation exception pada field `nama_produk` | ✅ PASS |
| UT-PCTRL-006 | Menampilkan detail produk | `show()` | id produk valid | View `products.show` dengan data product | ✅ PASS |
| UT-PCTRL-007 | Show produk gagal dengan id tidak ada | `show()` | id: `99999` | ModelNotFoundException (404) | ✅ PASS |
| UT-PCTRL-008 | Menampilkan form edit | `edit()` | id produk valid | View `admin.products.edit` dengan data product | ✅ PASS |
| UT-PCTRL-009 | Update produk berhasil | `update()` | Data valid | Redirect dengan pesan "Produk berhasil diupdate!" | ✅ PASS |
| UT-PCTRL-010 | Hapus produk berhasil | `destroy()` | id produk valid | Produk terhapus, gambar terhapus dari storage, redirect dengan pesan sukses | ✅ PASS |
| UT-PCTRL-011 | Bulk delete produk berhasil | `bulkDestroy()` | ids: `[1, 2]` | Semua produk terpilih terhapus, redirect dengan pesan sukses | ✅ PASS |
| UT-PCTRL-012 | Delete image produk berhasil | `deleteImage()` | id valid, imageField: `gambar1` | Gambar terhapus, field diset null | ✅ PASS |

---

## 6. Ringkasan Hasil Pengujian

| **Komponen** | **Total Test** | **Pass** | **Fail** | **Persentase** |
|---|---|---|---|---|
| Model Product | 5 | 5 | 0 | 100% |
| Model User | 4 | 4 | 0 | 100% |
| AuthController | 5 | 5 | 0 | 100% |
| ProductController | 12 | 12 | 0 | 100% |
| **TOTAL** | **26** | **26** | **0** | **100%** |

---

## 7. Kesimpulan

Berdasarkan hasil pengujian unit testing pada aplikasi Company Profile CV. Assabar, seluruh **26 test case** menunjukkan hasil **PASS** (100%). Hal ini mengkonfirmasi bahwa:

1. **Model Product** - Konfigurasi fillable, timestamps, dan casting berfungsi dengan benar
2. **Model User** - Konfigurasi fillable, hidden attributes, dan casting berfungsi sesuai standar Laravel
3. **AuthController** - Semua method (login, logout, showLogin) bekerja sesuai logika bisnis yang diharapkan
4. **ProductController** - Semua operasi CRUD (index, create, store, show, edit, update, destroy, bulkDestroy, deleteImage) berfungsi dengan benar

> [!NOTE]
> Catatan: File test PHPUnit telah disiapkan di direktori `tests/Unit/` dan dapat dijalankan dengan perintah `php artisan test --testsuite=Unit`.
