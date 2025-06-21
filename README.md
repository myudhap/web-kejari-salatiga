# Website Kejaksaan Negeri Salatiga

Selamat datang di **Website Kejari Salatiga**, sebuah proyek web yang dirancang untuk  ....

## 🎯 Fitur Utama

- 🌅 **Berita Terbaru**: Menampilkan berita terbaru mengenai Kejaksaan Negeri Salatiga.
- 📝 **Profil Kejaksaan**: Menampilkan seluruh hal mengenai kejaksaan, dari sejarah, visi misi, logo, trikrama,dan struktur organisasi.
- 📸 **Bidang**: Menampilkan bidang-bidang yang terdapat pada Kejari Salatiga beserta Tupoksinya.
- 🎶 **Informasi**: Menampilkan jadwal sidang, informasi, tilang, dll.
- 🎨 **Layanan**: Seluruh layanan yang tersedia di Kejari Salatiga, serta hasil survey kepuasan masyarakat.

## 🧑‍💻 Teknologi

- CodeIgniter 4
- MySQL
- Bootstrap 5
- AdminLTE
- CPanel

## 🚀 Instalasi Lokal

1. **Clone repository:**

   ```bash
   https://github.com/myudhap/web-kejari-salatiga
   cd web-kejari-salatiga
   composer install
   buat env file menjadi .env
   buat database pada mysql local
   sesuaikan nama db yang dibuat dengan .env
   lalu jalankan migrasi "php spark migration"
   jalankan aplikasi "php spark serve"

## 🚀 Deploy CPanel

1. Ubah "require FCPATH . '../app/Config/Paths.php';" pada public/index.php menjadi "require FCPATH . './app/Config/Paths.php';"
2. Keluarkan semua yang ada pada public file keluar
3. ZIP semua file & folder (kecuali .env)
4. Hapus semua file pada cpanel (kecuali .env)
5. Upload pada CPanel
6. Extract file
7. Lakukan setting DB (jika ada table atau column baru)

DONE DEVELOP & TESTING (Admin Page):
- CRUD User
- CRUD Berita