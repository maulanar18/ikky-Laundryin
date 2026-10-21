# IKKY LAUNDRYIN COIN — Company Profile

Website Company Profile profesional untuk bisnis laundry koin **IKKY LAUNDRYIN COIN**. Dirancang bersih, modern, dan mobile-responsive tanpa login pelanggan/admin, langsung terhubung dengan kontak WhatsApp resmi dan widget interaktif Customer Care.

---

## 🌟 Fitur Utama

### 🖥️ Frontend (Company Profile)
1. **Navbar Rapi & Simpel**: Navigasi satu baris bebas wrap (`Beranda`, `Tentang Kami`, `Profil Pemilik`, `Layanan`, `Cara Kerja`, `Galeri`, `Kontak`, plus tombol `Chat WhatsApp`).
2. **Hero Section**: Judul menarik, badge harga transparan `Mulai dari Rp5.000 per kali cuci`, tagline, tombol WhatsApp order, dan foto interior outlet.
3. **Slideshow Fasilitas Interaktif**:
   - Auto-slide setiap 5 detik.
   - Tombol navigasi sebelumnya & berikutnya serta indikator titik (dots).
   - Dukungan swipe layar sentuh di perangkat mobile.
   - Otomatis jeda (pause) saat kursor berada di atas slider.
4. **Tentang Kami**: Profil bisnis, fasilitas higienis, dan konsep self-service koin.
5. **Profil Pemilik & Tim**: Menampilkan pengelola resmi (**Ikky & Tim Laundryin**), bio, 4 komitmen dedikasi layanan, dan tombol chat WhatsApp langsung ke pemilik.
6. **Keunggulan (4 Poin)**: Mudah & Cepat, Bersih & Higienis, Hemat Waktu, serta Mesin Cuci & Pengering.
7. **Layanan Unggulan**: Mesin Cuci (Washer) dan Mesin Pengering (Dryer) lengkap dengan foto, spesifikasi, dan tombol konsultasi WhatsApp.
8. **Cara Kerja (4 Langkah)**: Panduan langkah demi langkah cara cuci mandiri menggunakan koin.
9. **Banner Harga & Tarif**: Penegasan tarif hemat mulai Rp5.000 per siklus.
10. **Galeri Foto & Lightbox**: Grid foto fasilitas outlet dengan pop-up modal lightbox interaktif (klik gambar, tombol panah keyboard, dan klik luar untuk menutup).
11. **Lokasi & Kontak**: Alamat lengkap outlet (`Jl. Utama Laundry No. 88`), jam operasional (`06.00 – 22.00 WIB`), nomor WhatsApp resmi, dan embed Google Maps interaktif.
12. **Widget Chatbot & WhatsApp Floating**:
   - Tombol mengambang di pojok kanan bawah dengan efek denyut (*pulse*).
   - Modal chat interaktif dengan salam otomatis dan 4 pilihan *quick reply* (Tarif, Mesin, Lokasi, Chat WA).
   - Form ketik pesan yang langsung terhubung ke WhatsApp resmi outlet.
13. **Footer**: Logo resmi, menu cepat, informasi hak cipta, alamat, dan tautan kontak resmi.

---

## 🚀 Panduan Menjalankan Aplikasi

### 1. Prasyarat
- PHP >= 8.2 (disarankan PHP 8.3+)
- Composer
- MySQL / MariaDB (melalui XAMPP)

### 2. Konfigurasi Database (.env)
Pastikan MySQL di XAMPP Control Panel sudah dalam status **Running**.
Pengaturan database pada file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ikky_laundryin
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Migrasi & Seed Data Awal
Jika database belum terisi atau ingin me-reset ke data bawaan lengkap:
```bash
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
```

### 4. Menjalankan Server Lokal
Jalankan perintah berikut pada terminal di folder proyek:
```bash
php artisan serve
```
Akses aplikasi melalui browser:
👉 **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 🎨 Palet Warna Desain
- **Navy**: `#073B78`
- **Biru Cerah**: `#168DE2`
- **Kuning**: `#FFD83D`
- **Putih**: `#FFFFFF`
- **Abu-abu Muda**: `#F5F7FA`
