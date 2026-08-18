# 🗺️ Sistem Informasi Geografis Sekolah - CodeIgniter 4

<p align="left">
  <img src="https://img.shields.io/badge/CodeIgniter-4-EF4223?logo=codeigniter&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-7.4+-777BB4?logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Leaflet.js-Map-199900?logo=leaflet&logoColor=white" />
  <img src="https://img.shields.io/badge/AdminLTE-3-blue" />
  <img src="https://img.shields.io/github/contributors/pangeran-droid/WebGIS-Sekolah-CI4" />
  <img src="https://img.shields.io/github/license/pangeran-droid/WebGIS-Sekolah-CI4" />
</p>

Sistem Informasi Geografis berbasis web (**Web GIS**) untuk mengelola dan menampilkan lokasi sekolah secara interaktif. Proyek ini dibangun menggunakan **CodeIgniter 4**, **Leaflet.js**, dan **AdminLTE 3**.

Aplikasi ini memungkinkan administrator untuk mengelola informasi sekolah serta menampilkan lokasi sekolah secara interaktif melalui peta digital.

---

## ✨ Fitur

* 🔐 Autentikasi Admin (Login & Register)
* 📍 Pemetaan lokasi sekolah secara interaktif menggunakan Leaflet.js
* 🏫 Manajemen data sekolah (Tambah, Lihat, Ubah, Hapus)
* 📊 Dashboard Admin yang responsif dan modern
* 🧭 Peta interaktif untuk menentukan koordinat sekolah
* 📁 Dukungan unggah gambar sekolah
* 🌍 Pengelolaan sekolah berdasarkan wilayah
* 📌 Halaman detail informasi sekolah

---

## 🛠️ Teknologi yang Digunakan

* CodeIgniter 4
* PHP 7.4+
* MySQL / MariaDB
* Leaflet.js
* AdminLTE 3
* Bootstrap
* jQuery
* Font Awesome

---

## 📚 Referensi Pembelajaran

Proyek ini dikembangkan dengan mempelajari dan mengadaptasi konsep dari seri tutorial berikut:

**Playlist YouTube**

> Building a School Web GIS using CodeIgniter 4 & Leaflet

https://youtube.com/playlist?list=PLYfaT5HP5yRrZa_MW_eQymabg4oKVq3D1&si=lx3skJM382Oww9II

Terima kasih kepada pembuat konten asli yang telah menyediakan materi pembelajaran yang sangat membantu dalam pengembangan proyek ini.

---

## 🚀 Instalasi

### 1. Clone repository

```bash
git clone https://github.com/pangeran-droid/gis-pemetaan-sekolah.git
cd gis-pemetaan-sekolah
```

### 2. Install dependency

```bash
composer install
```

### 3. Salin file environment

```bash
cp env .env
```

Atau ubah nama file:

```text
env
```

menjadi:

```text
.env
```

---

### 4. Konfigurasi database

Buka file `.env`, kemudian sesuaikan konfigurasi database:

```ini
database.default.hostname = localhost
database.default.database = nama_database_anda
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

---

### 5. Import database

Import file SQL yang tersedia ke database **MySQL/MariaDB** yang telah dibuat sebelumnya.

---

### 6. Jalankan server development

```bash
php spark serve
```

---

### 7. Buka aplikasi

Buka browser dan akses:

```text
http://localhost:8080
```

---

## 🔑 Akun Admin Default

Gunakan akun berikut untuk masuk ke halaman administrator:

| Email                                     | Password |
| ----------------------------------------- | -------- |
| [admin@gmail.com](mailto:admin@gmail.com) | admin123 |

> ⚠️ Untuk penggunaan di lingkungan produksi, segera ubah password default setelah login.

---

## 📌 Persyaratan

Pastikan perangkat kamu sudah memiliki:

* PHP 7.4 atau lebih tinggi
* Composer
* MySQL atau MariaDB
* Ekstensi PHP berikut:

```text
intl
curl
mbstring
openssl
mysqli
```

Jika menggunakan **Laragon** atau **XAMPP**, letakkan project di dalam:

```text
www/
```

atau:

```text
htdocs/
```

---

## 👀 Tampilan Aplikasi

### Halaman Utama & Login

| Halaman Utama                                   | Login                                            |
| ----------------------------------------------- | ------------------------------------------------ |
| <img src="public/preview/home.png" width="400"> | <img src="public/preview/login.png" width="400"> |

### Registrasi & Dashboard

| Registrasi                                          | Dashboard                                            |
| --------------------------------------------------- | ---------------------------------------------------- |
| <img src="public/preview/register.png" width="400"> | <img src="public/preview/dashboard.png" width="400"> |

---

## 🤝 Kontribusi

Kontribusi sangat terbuka untuk pengembangan project ini.

Jika ingin membantu meningkatkan project, kamu dapat:

* Melakukan **Fork** repository
* Membuat branch baru
* Melakukan perubahan dan commit
* Mengirimkan **Pull Request**

---

## 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran dan pendidikan.
