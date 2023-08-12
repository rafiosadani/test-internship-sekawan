--PHP Version--
PHP 8.2.7

--Composer Version--
Composer 2.5.3 

--Framework--
Laravel Framework 9.52.15
Bootstrap 4.6.0

--OS Pengembangan--
Macbook Air M2
VS Code (Text Editor)

--Panduan Penggunaan Aplikasi--
1. Pengguna dapat melakukan register kemudian dapat login menggunakan akun yang telah dibuat
2. Pengguna baru akan di assign sebagai "pegawai"
3. Grafik penggunaan kendaraan dapat dilihat di menu "Dashboard" (untuk Admin dan Verifikator)
4. Pengguna dengan role "admin" dapat melakukan sebagai berikut:
    - CRUD Pengaturan User,
    - CRUD Kendaraan
    - CRUD Region
    - CRUD Perusahaan Persewaan
    - CRUD Role
    - Add Data Peminjaman Kendaraan (dengan memilih peminjam, pilih kendaraan, pilih perusahaan persewaan (kalau sewa), pilih perusahaan persewaan (kalau sewa), pilih verifikator (approve))
    - Dapat Melihat Data Peminjaman Kendaraan
    - Dapat Approve Peminjamaan Kendaraan
    - Dapat mengakses Menu Laporan
5. Pengguna dengan role "verifikator" dapat melakukan sebagai berikut:
    - Dapat Approve Peminjamaan Kendaraan
    - Dapat mengakses Menu Laporan

--Panduan Install--
1. Jalankan XAMPP/MAMPP.
2. “sekawan_internshipmport database mySQL dari file “sekawan_internship.sql”.
3. Buka folder yang telah diclone dari repository github menggunakan Text Editor.
4. Buka command (*pastikan direktori folder sesuai) dan jalankan perintah "composer install"
5. cp .env.example -> .env lalu edit dan sesuaikan bagian database di file .env
6. Buat buat variabel di file .env -> FILESYSTEM_DRIVER=public
7. Jalankan perintah "php artisan key:generate"
8. Jalankan perintah "php artisan storage:link"
8. Jalankan perintah "php artisan serve"

--User Login--

--Administrator--
Email	: rafioosadani@gmail.com
Pass	: admin123*

--Verifikator--
Email	: budimansudjatmiko@gmail.com
Pass	: verifikator123*

Email	: titin.sumarni@gmail.com 
Pass	: verifikator123*

--Pegawai--
Email	: rindu.anjasmoro@gmail.com 
Pass	: 12345678

Email	: subarianto.malik@gmail.com 
Pass	: 12345678

Email	: leksono.budi@gmail.com 
Pass	: 12345678




