# Test Case Document
## PT Assabar Sukses Berkah - Company Profile

**Tanggal**: 9 Februari 2026

---

## 🌐 Halaman Publik

### Home (`/`)
| No | Test | Expected | ✓ |
|----|------|----------|---|
| 1 | Buka halaman home | Hero section & slideshow tampil | ⬜ |
| 2 | Klik "Lihat Produk" | Ke halaman produk | ⬜ |
| 3 | Scroll halaman | Semua section tampil dengan animasi | ⬜ |
| 4 | Buka di mobile | Layout responsif, menu hamburger muncul | ⬜ |

### Produk (`/products`)
| No | Test | Expected | ✓ |
|----|------|----------|---|
| 1 | Klik filter kategori | Produk terfilter sesuai kategori | ⬜ |
| 2 | Klik product card | Ke halaman detail produk | ⬜ |
| 3 | Klik ikon WhatsApp | WA terbuka dengan pesan template | ⬜ |
| 4 | Akses `/products?category=gamis` | Produk Gamis otomatis terfilter | ⬜ |

### Detail Produk (`/products/{id}`)
| No | Test | Expected | ✓ |
|----|------|----------|---|
| 1 | Klik thumbnail | Gambar utama berganti | ⬜ |
| 2 | Lihat info produk | Nama, kategori, deskripsi tampil | ⬜ |

### About & Contact
| No | Test | Expected | ✓ |
|----|------|----------|---|
| 1 | Buka `/about` | Halaman about tampil | ⬜ |
| 2 | Buka `/contact` | Halaman contact tampil | ⬜ |
| 3 | Klik link sosial media | Link terbuka di tab baru | ⬜ |

---

## 🔐 Admin Panel

### Login (`/admin/login`)
| No | Test | Expected | ✓ |
|----|------|----------|---|
| 1 | Login dengan data salah | Pesan error muncul | ⬜ |
| 2 | Login dengan data benar | Masuk ke dashboard | ⬜ |
| 3 | Klik ikon mata | Password terlihat/tersembunyi | ⬜ |

### Kelola Produk
| No | Test | Expected | ✓ |
|----|------|----------|---|
| 1 | Klik "Tambah Produk" | Form tambah muncul | ⬜ |
| 2 | Upload 1-5 gambar sekaligus | Preview muncul | ⬜ |
| 3 | Upload >5 gambar | Alert muncul | ⬜ |
| 4 | Simpan produk | Produk tersimpan | ⬜ |
| 5 | Edit produk | Data ter-update | ⬜ |
| 6 | Hapus produk | Produk terhapus | ⬜ |
| 7 | Klik "Keluar" | Logout berhasil | ⬜ |

---

## 📱 Responsivitas

| Perangkat | Test | ✓ |
|-----------|------|---|
| Desktop (1920px) | Layout normal | ⬜ |
| Tablet (768px) | Menu toggle muncul | ⬜ |
| Mobile (375px) | Layout mobile | ⬜ |

---

## 📝 Catatan Bug

| No | Halaman | Issue | Severity |
|----|---------|-------|----------|
| 1 | | | |
| 2 | | | |

**Severity**: 🔴 Critical | 🟠 Major | 🟡 Minor | 🟢 Trivial

---

**Tester**: _________________ **Tanggal**: _________________
