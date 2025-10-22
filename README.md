📚 E-Book Learning Web Application
Laravel 12.x + TailwindCSS + MySQL

FullStack Developer Challenge — PT Kreasi Bintang Edukasi

🎯 Project Purpose

Aplikasi web ini dikembangkan untuk memenuhi tantangan FullStack Developer Challenge.
Tujuannya adalah membuat web application sederhana menggunakan PHP (Laravel Framework) dan TailwindCSS, yang menampilkan daftar e-book pembelajaran lengkap dengan fitur login, session management, serta PDF viewer dengan keamanan (no download, no copy).

🧩 Project Overview
Item	Deskripsi
Nama Aplikasi	E-Book Learning App
Framework Backend	Laravel 12.x
Framework CSS	TailwindCSS + DaisyUI
Database	MySQL
Build Tool	Vite
Auth System	Laravel Breeze (Session Based)

📘 Fitur Utama
✅ Login & Register System
Autentikasi menggunakan session, lengkap dengan validasi & proteksi route.

✅ Dashboard eBook (One Page Application)
Menampilkan list data dari database dengan 3 kolom utama:
No
Nama eBook
Action (Lihat / Delete)

✅ PDF Viewer (tanpa tab baru)
Menampilkan PDF langsung di halaman dashboard dengan batasan:
Tidak bisa di-download
Tidak bisa di-copy
Tidak bisa di-klik kanan
Jika user pindah tab, muncul popup peringatan
Terdapat watermark transparan: CONFIDENTIAL • VIEW ONLY

✅ Database Seeder Otomatis
Seeder otomatis menambahkan 3 eBook:
Soal Assessment Siswa Kelas X
Soal Assessment Siswa Kelas XI
Soal Assessment Siswa Kelas XII

✅ UI/UX Modern & Responsif
Desain elegan, clean, dan profesional dengan komponen Tailwind & DaisyUI.

🏗️ Struktur Folder Utama
ebook-app/
│
├── app/
│   ├── Http/Controllers/EbookController.php
│   └── Models/Ebook.php
│
├── database/
│   ├── migrations/xxxx_create_ebooks_table.php
│   └── seeders/EbookSeeder.php
│
├── public/
│   ├── ebooks/
│   │   ├── Soal-Assessment-Siswa-Kelas-X.pdf
│   │   ├── Soal-Assessment-Siswa-Kelas-XI.pdf
│   │   └── Soal-Assessment-Siswa-Kelas-XII.pdf
│
├── resources/
│   ├── js/app.js
│   ├── views/
│   │   ├── dashboard.blade.php
│   │   ├── auth/
│   │   │   ├── login.blade.php
│   │   │   └── register.blade.php
│   │   └── layouts/app.blade.php
│
├── routes/web.php
├── tailwind.config.js
├── package.json
├── composer.json
└── README.md

2️⃣ Install Dependencies
composer install
npm install

3️⃣ Setup Environment
cp .env.example .env
php artisan key:generate

Edit .env:
DB_DATABASE=ebook_app
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Migrasi & Seeder Database
php artisan migrate --seed

5️⃣ Jalankan Server
php artisan serve
npm run dev

Akses di browser:
http://127.0.0.1:8000

🧠 Skema Database
Tabel: ebooks

Kolom	Tipe	Keterangan
id	BIGINT	Primary Key
title	VARCHAR(255)	Nama eBook
file_path	VARCHAR(255)	Lokasi file PDF
created_at	TIMESTAMP	Otomatis
updated_at	TIMESTAMP	Otomatis

🖥️ Tampilan Utama
🔹 Login Page
Desain minimalis dengan Tailwind + gradient background
Validasi field otomatis
🔹 Dashboard Page
Tabel daftar eBook + panel viewer PDF di kanan.
Jika user klik “Lihat”, PDF tampil di area viewer dengan watermark dan proteksi.
🔹 Watermark PDF
“Nama Pemilik” muncul transparan di tengah dokumen.

🧾 Rincian Teknis
PDF di-render dengan PDF.js
Event visibilitychange mendeteksi perpindahan tab
Right-click & select event dinonaktifkan (contextmenu, selectstart)
Rendering PDF dilakukan via Canvas API

🔐 Fitur Keamanan
Proteksi	Deskripsi
No Download	PDF tidak dapat disimpan oleh user
No Copy Text	Fitur select text dinonaktifkan
No Right-Click	Context menu dimatikan
Tab Warning	Peringatan muncul jika user berpindah tab
View Only Mode	Watermark transparan otomatis tampil di PDF

🧩 Akun Default (Jika Seeder User Aktif)
Email: test@gmail.com
Password: password

📦 Teknologi yang Digunakan
Komponen	Teknologi
Framework	Laravel 12.x
Frontend	TailwindCSS + DaisyUI
Viewer	PDF.js
Database	MySQL
Auth	Laravel Breeze
Build Tool	Vite
Server	PHP 8.2 (XAMPP / Artisan Serve)
Source Code (Laravel Project)
Database SQL (auto via Seeder)
Link Repository GitHub
File PDF di folder /public/ebooks

🧑‍💻 Developer
Nama  : Nur Wardani
Email : nurwardani03@gmail.com

🔗 LinkedIn: nur-wardani

🪪 Lisensi
Proyek ini dikembangkan untuk kebutuhan FullStack Developer Assessment dan pembelajaran akademik.
Lisensi mengikuti MIT License Laravel, Tidak digunakan untuk hal lain.
