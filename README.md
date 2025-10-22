# 📚 E-Book Learning App

A simple one-page web application built with **Laravel 12**, **TailwindCSS**, and **MySQL**.  
Created for the **Full-Stack Developer Challenge**.

---

## 🎯 Purpose
Menampilkan daftar e-book pembelajaran dengan sistem login, register, dan dashboard berisi tabel data dari database.  
PDF dapat dibuka langsung di halaman yang sama tanpa bisa di-download atau di-copy.

---

## ⚙️ Features
- 🔐 **Login & Register** — Session based (Laravel Breeze)  
- 📖 **Dashboard eBook List** — Data diambil dari database  
  Kolom: No | Nama eBook | Action (Lihat / Delete)  
- 🧾 **PDF Viewer** — Tanpa tab baru, dengan proteksi:
  - Tidak bisa download / copy
  - Tidak bisa klik kanan
  - Ada watermark “CONFIDENTIAL • VIEW ONLY”
  - Peringatan muncul saat berpindah tab
- 💾 **Seeder Otomatis** — 3 eBook contoh dimasukkan otomatis

---

## 🧩 Tech Stack
| Komponen | Teknologi |
|-----------|------------|
| Backend | Laravel 12.x |
| Frontend | TailwindCSS + DaisyUI |
| Database | MySQL |
| PDF Engine | PDF.js |
| Auth | Laravel Breeze |
| Build Tool | Vite |

---

## 🚀 Installation
```bash
cd ebook-app
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Edit file .env:
DB_DATABASE=ebook_app
DB_USERNAME=root
DB_PASSWORD=

```bash
php artisan migrate --seed
npm run dev
php artisan serve
```

Akses di browser: http://127.0.0.1:8000/Login

👩‍💻 Developer :
Nur Wardani

Lisensi Penggunaan Proyek (Non-Komersial)
Hak Cipta © 2025 Nur Wardani

Proyek ini dibuat khusus untuk tujuan penilaian dalam konteks seleksi teknis.  
Dilarang keras menggunakan, menyalin, memodifikasi, atau mendistribusikan sebagian maupun seluruh kode sumber proyek ini untuk tujuan komersial, ilegal, atau aktivitas lain yang tidak bertanggung jawab tanpa izin tertulis dari pemilik.

Penggunaan proyek ini di luar konteks tersebut dianggap pelanggaran hak cipta.
