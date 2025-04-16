-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 08:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knsalati_webknsalatiga`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `user_id`, `judul`, `isi`, `gambar`, `tanggal`, `views`, `created_at`) VALUES
(1, 1, 'Penutupan Praktek Pengalaman Lapangan (PPL) Mahasiswa Fakultas Syari’ah dan Hukum Universitas Islam Negeri Walisongo Semarang di Kejaksaan Negeri Salatiga', 'Penutupan Praktek Pengalaman Lapangan (PPL) Mahasiswa Fakultas Syari’ah dan Hukum Universitas Islam Negeri Walisongo Semarang di Kejaksaan Negeri Salatiga telah dilaksanakan pada hari Jumat, 07 Februari 2025 di Aula Kantor Kejaksaan Negeri Salatiga oleh Kepala Kejaksaan Negeri Salatiga (Sukamto, S.H., M.H.) bersama dengan Kepala Sub Bagian Pembinaan pada Kejaksaan Negeri Salatiga (Ramlah Hasyim Parema, S.H.). Kegiatan penutupan ini meliputi serah terima sertifikat magang kepada peserta, serah terima sertifikat pengisi materi, penyerahan cinderamata dari UIN Walisongo Semarang kepada Kejaksaan Negeri Salatiga, serta kesan dan pesan.  @kejaksaan.ri @kejati.jateng #KejaksaanRI #JaksaAgungRI #KejatiJateng #KejariSalatiga #JaksaAgungRI #kejaksaanri #jaksaagung #jaksa #jaksaprofesional #jaksamenyapa #jaksasahabatmasyarakat #puspenkum #penkum #kejaksaantinggi #kejaksaannegeri #bergerakdanberkarya #adhyaksa #trapsilaadhyaksa #banggamelayanibangsa', '1743542046_89a1b0a9c06bb19fcff9.png', '2025-02-07', 0, '2025-02-24 12:10:33'),
(2, 1, 'Hari Ketiga Pelatihan dan Launching Aplikasi Pengadaan Real Time Monitoring Village Management Funding', 'Hari Ketiga Pelatihan dan Launching Aplikasi Pengadaan Real Time Monitoring Village Management Funding Kejaksaan Republik Indonesia Tahun Anggaran 2024 yang dilaksanakan di Grand Candi Hotel Semarang pada hari Kamis, 06 Februari 2025 turut dihadiri oleh Kepala Seksi Intelijen Kejaksaan Negeri Salatiga (Erwin Rionaldy Koloway, S.H., M.H.) dengan agenda Launching Aplikasi Jaga Desa.  @kejaksaan.ri @kejati.jateng #KejaksaanRI #JaksaAgungRI #KejatiJateng #KejariSalatiga #JaksaAgungRI #kejaksaanri #jaksaagung #jaksa #jaksaprofesional #jaksamenyapa #jaksasahabatmasyarakat #puspenkum #penkum #kejaksaantinggi #kejaksaannegeri #bergerakdanberkarya #adhyaksa #trapsilaadhyaksa #banggamelayanibangsa', 'berita_08_02_2025_2326.jpg', '2025-02-06', 7, '2025-02-22 23:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sidang`
--

CREATE TABLE `jadwal_sidang` (
  `id` int(5) UNSIGNED NOT NULL,
  `terdakwa` text NOT NULL,
  `jpu` text NOT NULL,
  `no_perkara` varchar(100) NOT NULL,
  `agenda` text NOT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `kategori` enum('pidum','pidsus') NOT NULL DEFAULT 'pidum',
  `tanggal` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_sidang`
--

INSERT INTO `jadwal_sidang` (`id`, `terdakwa`, `jpu`, `no_perkara`, `agenda`, `tempat`, `kategori`, `tanggal`, `created_at`) VALUES
(1, 'AYU ARISTA ZAHARA Binti AGUS BUDI SANTOSO', 'SUTAN TAKDIR, S.H.', ' 6/Pid.Sus/2024/PN Slt', 'Tuntutan PU', 'PN Salatiga', 'pidum', '2024-04-02', '2025-02-10 14:36:33'),
(2, 'Bambang Hartono Bin Ali Murtono', 'DIMAZ ATMADI B.A, S.H, M.H', 'PDS-02/M.3.20.4/Fd.1/07/2024', 'Pledoi', 'PN Tipikor Semarang', 'pidsus', '2024-12-04', '2025-02-10 15:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_pengambilan_barang_bukti`
--

CREATE TABLE `layanan_pengambilan_barang_bukti` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `nama_terpidana` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `tanda_pengenal` text NOT NULL,
  `perkara` text NOT NULL,
  `barang_bukti` varchar(100) NOT NULL,
  `surat_kuasa` text DEFAULT NULL,
  `bukti_kepemilikan` text DEFAULT NULL,
  `nomor_registrasi` varchar(100) NOT NULL,
  `status` enum('on_process','done') NOT NULL DEFAULT 'on_process',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan_pengambilan_barang_bukti`
--

INSERT INTO `layanan_pengambilan_barang_bukti` (`id`, `nama_pemohon`, `nama_terpidana`, `alamat`, `pekerjaan`, `nomor_telepon`, `tanda_pengenal`, `perkara`, `barang_bukti`, `surat_kuasa`, `bukti_kepemilikan`, `nomor_registrasi`, `status`, `created_at`) VALUES
(2, '3m2e3e3', 'rizal', 'km232', 'ASN', '082322734378', '1739517933_8d9c31581f80454344dd.png', 'apa yya', 'motor', '1739517933_c5b081deab32d0d240a0.png', '', 'ZlRCytG', 'done', '2025-02-14 14:25:33'),
(3, '3m2e3e3', 'rizal', 'km232', 'ASN', '082322734378', '1739521304_1bfb38aeb1434d7d8919.png', 'apa yya', 'motor', '1739521304_6d063950d90f7a586804.png', '', 'x5bsA4l', 'on_process', '2025-02-14 15:21:45'),
(4, 'Yudha', 'test', 'Salatiga', 'ASN', '082322734378', '1739625231_b8c31597c753f7e4cc91.png', 'maling', 'pesawat', '', '', '3YIGgaP', 'on_process', '2025-02-15 20:13:52'),
(5, 'Yudha', 'test', 'Salatiga', 'ASN', '082322734378', '1739625335_2a8bd3ca75fb3865abeb.png', 'maling', 'pesawat', '', '', 'SMp6c5o', 'on_process', '2025-02-15 20:15:35'),
(6, 'Yudha', 'test', 'Salatiga', 'ASN', '082322734378', '1739625410_dc4069b4221c7318ee28.png', 'maling', 'pesawat', '', '', 'WKSAN01', 'on_process', '2025-02-15 20:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2025-02-08-144719', 'App\\Database\\Migrations\\BeritaMigration', 'default', 'App', 1739030329, 1),
(6, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1739030370, 2),
(7, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1739030370, 2),
(8, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1739030370, 2),
(9, '2025-02-08-160133', 'App\\Database\\Migrations\\AddNameRoleColumnUserTable', 'default', 'App', 1739030539, 3),
(10, '2025-02-10-072240', 'App\\Database\\Migrations\\CreateJadwalSidangTableMigration', 'default', 'App', 1739172791, 4),
(11, '2025-02-12-033804', 'App\\Database\\Migrations\\CreateLayananPengambilanBarangBuktiTableMigration', 'default', 'App', 1739331925, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Super Admin'),
(2, 'Admin Pidsus'),
(3, 'Admin Intel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 5,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'adminksala3', 'admin', 'adminksala3', 1, '2025-04-02 04:32:13', '2025-04-02 04:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan_pengambilan_barang_bukti`
--
ALTER TABLE `layanan_pengambilan_barang_bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layanan_pengambilan_barang_bukti`
--
ALTER TABLE `layanan_pengambilan_barang_bukti`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
