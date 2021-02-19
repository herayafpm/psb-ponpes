# PSB Ponpes Codeigniter 4

## Apa itu PSB Ponpes?

PSB Ponpes adalah sebuah aplikasi untuk pendaftaran santri baru di pondok pesantren.

## Fitur Super Admin

- Mengelola Admin
- Mengelola User
- Mengelola Kelas
- Mengelola Pendaftaran
- Mengelola Program
- Mengelola Soal
- Mengelola Formulir Proses
- Mengelola Formulir Diterima
- Mengelola Formulir Ditolak

## Fitur Admin

- Mengelola Formulir Proses
- Mengelola Formulir Diterima
- Mengelola Formulir Ditolak

## Kebutuhan Server

PHP versi 7.2 atau lebih tinggi, dengan extension yang sudah diinstall atau diaktifkan:

- [intl](http://php.net/manual/en/intl.requirements.php)
- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

Database defaultnya adalah Mysql, namun anda juga bisa mengubahnya ke Postgresql, untuk lebih jelas silahkan lihat cara instalasinya

## Instalasi

1. Download repositori ini dan taruh di htdocs(Xampp) atau www (Laragon) atau webserver yang lain, rekomendasi Laragon, cari di google.
2. Silahkan buka di vscode atau text editor yang lain, pastikan composer sudah diinstall
3. untuk vs code silahkan klik ctrl+` (\`` diatas key tab).
4. di terminal ketikkan _composer install_ untuk menginstall codeigniter 4 ke projek.
5. rename file env menjadi .env dan ubah sesuai kebutuhan, seperti database, dan base url, untuk cara mengubahnya silahkan cari di google
6. setelah disetting silahkan gunakkan perintah _php spark app:install_ untuk membuat table ke databasenya dan mengisi data awal
7. selesai

## Akun

1. Akun Superadmin

- Username: superadmin
- Password: 123456

2. Akun Admin

- Username: admin
- Password: 123456

3. Akun Contoh Pendaftar

- Username: 330411
- Password: 123456

# Lisensi

Cek link ini untuk melihat lisensi Codeigniter [Lisensi Codeigniter 4](https://github.com/codeigniter4/CodeIgniter4).

# Resources

- [Codeigniter User Guide](https://codeigniter.com/docs)

Laporkan isu keamanan ke [Email kerentanan aplikasi](mailto:herayafpm@gmail.com)
Terima kasih.
