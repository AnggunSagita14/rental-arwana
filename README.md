🚗 Arwana Rental Mobil
📌 Review Singkat Project

Arwana Rental Mobil adalah aplikasi berbasis web yang dibuat untuk membantu proses pengelolaan rental mobil secara lebih mudah, cepat, dan terstruktur. Sistem ini dirancang untuk mempermudah admin dalam mengelola seluruh proses penyewaan kendaraan mulai dari pengelolaan data mobil, data penyewa, reservasi, pembayaran, hingga pengembalian kendaraan.

Aplikasi ini dikembangkan menggunakan:
PHP Native
MySQL / MariaDB
HTML
CSS
JavaScript

✨ Fitur Sistem

1. Login Admin
Digunakan untuk mengakses sistem sebagai administrator.

2. Dashboard
Menampilkan informasi dan ringkasan data pada sistem rental mobil.

3. Data Mobil
Digunakan untuk mengelola data kendaraan yang tersedia pada rental mobil.

4. Data Penyewa
Digunakan untuk mengelola data penyewa atau pelanggan rental mobil.

5. Reservasi
Digunakan untuk mengelola data pemesanan atau penyewaan kendaraan.

6. Pembayaran
Digunakan untuk mengelola data transaksi pembayaran penyewaan kendaraan.

7. Pengembalian
Digunakan untuk mengelola data pengembalian kendaraan yang telah disewa.

🗄️ Struktur Database
Database yang digunakan bernama:
mbdminiproject

Tabel utama yang digunakan:
admin
mobil
penyewa
reservasi
pembayaran
pengembalian

Relasi antar tabel mendukung proses bisnis rental mobil mulai dari reservasi kendaraan, pembayaran transaksi, hingga pengembalian kendaraan.
👥 Anggota Kelompok
| No | Nama                | NIM         |
| -- | ------------------- | ----------- |
| 1  | Faturrahman Pasha   | D1041241002 |
| 2  | Oktavia Namu Erdita | D1041241072 |
| 3  | Anggun Sagita       | D1041241085 |

⚙️ Instruksi Instalasi
1. Clone Repository
git clone https://github.com/AnggunSagita14/rental-arwana.git

2. Pindahkan Folder Project
Pindahkan folder project ke dalam direktori:
htdocs/
Contoh:
C:\xampp\htdocs\rental-arwana

3. Import Database
a. Jalankan Apache dan MySQL pada XAMPP.
b. Buka phpMyAdmin.
c. Buat database baru dengan nama:
mbdminiproject

5. Import file database:
mbdminiproject.sql

4. Konfigurasi Koneksi Database
Edit file:
koneksi.php

Sesuaikan konfigurasi database:
$host = "localhost";
$dbname = "mbdminiproject";
$username = "root";
$password = "";

5. Jalankan Project
Aktifkan:
Apache
MySQL

Kemudian buka browser:
http://localhost/rental-arwana/

atau jika menggunakan port 8080:
http://localhost:8080/rental-arwana/

🔑 Akun Demo
Gunakan akun berikut untuk login:
Username : pashanggunamu
Password : mbdasik

🌐 Hosted Website
Project dapat diakses melalui:
https://mushroom-paltry-poem.ngrok-free.dev/rental-arwana/

Gunakan akun demo yang tersedia untuk masuk ke sistem.

📢 Catatan Penting
Website hosted menggunakan layanan **ngrok** sehingga dapat diakses melalui internet selama server lokal aktif.
Agar website dapat diakses oleh pengguna lain, pemilik project harus menjalankan:
XAMPP
Apache
MySQL
ngrok

Perintah yang digunakan:
ngrok http 8080
Apabila server lokal dimatikan atau layanan ngrok tidak dijalankan, maka website tidak dapat diakses oleh pengguna lain.

📂 GitHub Repository
Repository project:
https://github.com/AnggunSagita14/rental-arwana

📝 Tujuan Project
Project ini dibuat untuk memenuhi tugas akhir mata kuliah Manajemen Basis Data (MBD). Sistem dirancang untuk membantu proses pengelolaan rental mobil secara lebih efektif, terorganisir, dan terintegrasi dalam satu aplikasi berbasis web.

📄 Lisensi
Project ini dibuat untuk keperluan akademik dan pembelajaran pada mata kuliah Manajemen Basis Data (MBD).
