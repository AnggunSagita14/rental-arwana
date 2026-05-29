🚗 Arwana Rental Mobil
📌 Review Singkat Project

Arwana Rental Mobil adalah aplikasi berbasis web yang dibuat untuk membantu proses pengelolaan rental mobil secara lebih mudah dan terstruktur.
Sistem ini memiliki beberapa fitur utama, yaitu:

* Login Admin
* Dashboard
* Data Mobil
* Data Penyewa
* Reservasi
* Pembayaran
* Pengembalian

Aplikasi dibuat menggunakan:
* PHP Native
* MySQL dan MariaDB
* HTML
* CSS
* JavaScript

👥 Anggota Kelompok
1. Faturrahman Pasha — D1041241002Anggun Sagita — D1041241085
2. Oktavia Namu Erdita — D1041241072
3. Anggun Sagita — D1041241085

⚙️ Instruksi Instalasi
1. Clone Repository
git clone https://github.com/AnggunSagita14/rental-arwana.git

2. Pindahkan Folder Project
Pindahkan folder project ke dalam folder:
htdocs/

3. Import Database
* Buka phpMyAdmin
* Buat database dengan nama:
miniprojectmbd
* Import file database:
miniprojectmbd.sql

4. Atur Koneksi Database
Edit file:
koneksi.php
Contoh konfigurasi:

php id="a6"
<?php

$conn = new PDO(
    "mysql:host=localhost;port=3307;dbname=miniprojectmbd",
    "root",
    ""
);

?>

5. Jalankan Project
Aktifkan:
* Apache
* MySQL

Lalu buka browser dan akses: 
http://localhost/rental-arwana/

atau jika menggunakan port 8080: 
http://localhost:8080/rental-arwana/

🌐 Hosted Website
Project dapat diakses melalui link berikut:
https://mushroom-paltry-poem.ngrok-free.dev/rental-arwana/

Catatan Penting
Website menggunakan layanan **ngrok**, sehingga link dapat diakses oleh pengguna lain melalui internet ketika pemilik project menjalankan:
* XAMPP
* Apache dan MySQL
* ngrok pada CMD/Terminal

Perintah yang digunakan:
ngrok http 8080

Jika server dari pemilik project sedang offline atau ngrok tidak dijalankan, maka website tidak dapat diakses oleh pengguna lain.

📂 GitHub Repository
https://github.com/AnggunSagita14/rental-arwana

📝 Penutup
Project ini dibuat untuk memenuhi tugas akhir mata kuliah Manajemen Basis Data (MBD). Diharapkan aplikasi ini dapat membantu proses pengelolaan rental mobil menjadi lebih efektif, mudah, dan terorganisir.
