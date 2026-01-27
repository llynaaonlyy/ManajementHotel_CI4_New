-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2026 at 01:10 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelku`
--

-- --------------------------------------------------------

--
-- Table structure for table `akomodasi`
--

CREATE TABLE `akomodasi` (
  `id` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tipe` enum('hotel','villa','apart') NOT NULL,
  `deskripsi` text,
  `alamat` text NOT NULL,
  `kota` varchar(100) NOT NULL,
  `rating` decimal(2,1) DEFAULT '0.0',
  `foto_utama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `akomodasi`
--

INSERT INTO `akomodasi` (`id`, `nama`, `tipe`, `deskripsi`, `alamat`, `kota`, `rating`, `foto_utama`, `created_at`, `updated_at`) VALUES
(1, 'Huang Jin Dynasty Hotel', 'hotel', 'Hotel mewah bernuansa oriental Tionghoa di pusat kota Jakarta, menghadirkan arsitektur elegan khas kekaisaran Cina, fasilitas bintang lima, dan pemandangan kota yang menakjubkan.', 'Jl. Sudirman No. 123, Jakarta Pusat', 'Jakarta', 4.8, '1769046176_83175cb48b3099da5dde.jpg', '2026-01-10 11:00:57', '2026-01-21 19:23:08'),
(2, 'Villa Bali Paradise', 'villa', 'Villa eksklusif dengan private pool dan pemandangan sawah yang indah', 'Jl. Raya Ubud No. 45, Gianyar', 'Bali', 4.9, '1769045283_f1cc00137a1de3006161.jpg', '2026-01-10 11:00:57', '2026-01-21 18:28:03'),
(3, 'Apartemen Surabaya Heights', 'apart', 'Apartemen modern dengan fasilitas lengkap di jantung kota Surabaya', 'Jl. HR Muhammad No. 88, Surabaya', 'Surabaya', 4.7, '1769045414_20b08e0bb65c60348a93.jpg', '2026-01-10 11:00:57', '2026-01-21 18:30:14'),
(4, 'Luxury Resort Bandung', 'hotel', 'Resort premium dengan nuansa pegunungan yang sejuk dan menenangkan', 'Jl. Setiabudhi No. 200, Bandung', 'Bandung', 4.8, 'hotel2.jpg', '2026-01-10 11:00:57', '2026-01-10 11:00:57'),
(5, 'Villa Puncak Serenity', 'villa', 'Villa keluarga dengan taman luas dan udara sejuk pegunungan', 'Jl. Raya Puncak KM 87, Bogor', 'Bogor', 4.6, 'villa2.jpg', '2026-01-10 11:00:57', '2026-01-10 11:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int NOT NULL,
  `akomodasi_id` int NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `akomodasi_id`, `nama_fasilitas`, `icon`) VALUES
(1, 1, 'WiFi Gratis', 'fa-wifi'),
(2, 1, 'Kolam Renang', 'fa-swimming-pool'),
(3, 1, 'Restoran', 'fa-utensils'),
(4, 1, 'Gym & Fitness', 'fa-dumbbell'),
(5, 1, 'Spa & Wellness', 'fa-spa'),
(6, 1, 'Parkir Gratis', 'fa-parking');

-- --------------------------------------------------------

--
-- Table structure for table `foto_akomodasi`
--

CREATE TABLE `foto_akomodasi` (
  `id` int NOT NULL,
  `akomodasi_id` int NOT NULL,
  `foto` varchar(255) NOT NULL,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foto_akomodasi`
--

INSERT INTO `foto_akomodasi` (`id`, `akomodasi_id`, `foto`, `urutan`) VALUES
(3, 1, '1769047775_780200cbbe5b1fd7bda5.jpg', 1),
(5, 1, '1769048303_c39609380171cf51e6c7.jpg', 2),
(6, 1, '1769048303_d04c65d824512c28ab01.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `id` int NOT NULL,
  `akomodasi_id` int NOT NULL,
  `highlight` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `highlights`
--

INSERT INTO `highlights` (`id`, `akomodasi_id`, `highlight`) VALUES
(1, 1, 'Lokasi strategis di pusat bisnis Jakarta'),
(2, 1, 'Sarapan prasmanan internasional'),
(3, 1, 'Rooftop bar dengan pemandangan kota'),
(4, 1, 'Akses mudah ke pusat perbelanjaan');

-- --------------------------------------------------------

--
-- Table structure for table `kebijakan`
--

CREATE TABLE `kebijakan` (
  `id` int NOT NULL,
  `akomodasi_id` int NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `kebijakan_pembatalan` text,
  `aturan_lainnya` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kebijakan`
--

INSERT INTO `kebijakan` (`id`, `akomodasi_id`, `check_in`, `check_out`, `kebijakan_pembatalan`, `aturan_lainnya`) VALUES
(1, 1, '15:00:00', '12:00:00', 'Pembatalan gratis hingga 24 jam sebelum check-in', 'Dilarang merokok di dalam kamar, Hewan peliharaan tidak diperbolehkan');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `akomodasi_id` int NOT NULL,
  `tipe_kamar_id` int NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `jumlah_malam` int NOT NULL,
  `biaya_admin_ppn` int NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `metode_pembayaran` enum('tf_bank','e_wallet','qris','cash') NOT NULL,
  `bukti_pembayaran` varchar(225) DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled','check_in','check_out') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'pending',
  `catatan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `catatan_internal` varchar(255) DEFAULT NULL,
  `status_lama` varchar(35) NOT NULL,
  `check_in` varchar(35) NOT NULL,
  `check_out` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `user_id`, `akomodasi_id`, `tipe_kamar_id`, `tanggal_checkin`, `tanggal_checkout`, `jumlah_malam`, `biaya_admin_ppn`, `total_harga`, `metode_pembayaran`, `bukti_pembayaran`, `status`, `catatan`, `created_at`, `updated_at`, `catatan_internal`, `status_lama`, `check_in`, `check_out`) VALUES
(14, 9, 1, 6, '2026-01-23', '2026-01-26', 3, 2310000, 12810000.00, 'tf_bank', '1769153855_496a5abec39fe92d105f.jpeg', 'cancelled', '.', '2026-01-23 00:37:35', '2026-01-23 00:40:16', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_status_log`
--

CREATE TABLE `pemesanan_status_log` (
  `id` int NOT NULL,
  `pemesanan_id` int NOT NULL,
  `status_lama` varchar(50) DEFAULT NULL,
  `status_baru` varchar(50) DEFAULT NULL,
  `changed_by` int DEFAULT NULL,
  `keterangan` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan_status_log`
--

INSERT INTO `pemesanan_status_log` (`id`, `pemesanan_id`, `status_lama`, `status_baru`, `changed_by`, `keterangan`, `created_at`) VALUES
(25, 14, 'pending', 'cancelled', 11, 'kok meja?', '2026-01-23 14:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id` int NOT NULL,
  `akomodasi_id` int NOT NULL,
  `nama_tipe` varchar(100) NOT NULL,
  `harga_per_malam` decimal(10,2) NOT NULL,
  `kapasitas` int NOT NULL,
  `ukuran_kamar` varchar(50) DEFAULT NULL,
  `fasilitas_kamar` text,
  `foto` varchar(255) DEFAULT NULL,
  `stok_kamar` int DEFAULT '1',
  `status` enum('available','maintenance') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id`, `akomodasi_id`, `nama_tipe`, `harga_per_malam`, `kapasitas`, `ukuran_kamar`, `fasilitas_kamar`, `foto`, `stok_kamar`, `status`) VALUES
(4, 1, 'Deluxe Room', 850000.00, 2, '32 m²', 'King Bed, TV LED 42\", AC, Mini Bar, Kamar Mandi Pribadi', '1768899682_0d5ede103e26a24ba2d8.jpg', 10, 'maintenance'),
(5, 1, 'Executive Suite', 1500000.00, 3, '55 m²', '1 King Bed + 1 Sofa Bed, TV LED 55\", AC, Mini Bar, Ruang Tamu, Bathtub', '1769049676_4e164462ede03d03fb80.jpg', 5, 'available'),
(6, 1, 'Presidential Suite', 3500000.00, 4, '120 m²', '2 King Beds, TV LED 65\", AC, Full Kitchen, Ruang Makan, Jacuzzi, Balkon', '1769049602_98b5efe4727782763e8c.jpg', 2, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `role` enum('pelanggan','pegawai','admin') DEFAULT 'pelanggan',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `no_telp`, `foto_profil`, `role`, `created_at`, `updated_at`, `reset_token`, `reset_expired`) VALUES
(7, 'ayah', 'ayah@gmail.com', '$2y$10$GY7TF4oQagwAgQh37vYr9eYi4/hJjGyaaaB2AajkIeuCA6.XaIiTW', '6286416085285', NULL, 'pelanggan', '2026-01-11 04:28:42', '2026-01-11 04:28:42', NULL, NULL),
(9, 'Hidayah Ridho Safitri', 'fitri@gmail.com', '$2b$12$JkMVntIKDmYYfHZH9bFSQuzqMnVbu/KG6v5rdIzVVKy.yDLlWOfli', '62895273289520', NULL, 'pelanggan', '2026-01-13 18:02:21', '2026-01-22 20:34:52', NULL, NULL),
(10, 'admin1', 'admin1@hotelku.com', '$2y$10$nSvRXvNzFGXpElRIpdXvB.au7gFRa/JnCm8EZyGo6EQ33X.jTc922', '6289462014527', NULL, 'admin', '2026-01-19 03:11:54', '2026-01-19 03:19:01', NULL, NULL),
(11, 'pegawai2', 'pegawai2@gmail.com', '$2y$10$3HCVZhAwWhDMJ1t2a6lsA.yeQDeBBScBy0k.odeM6WNko8ZcF4bim', '6289261935273', NULL, 'pegawai', '2026-01-20 01:26:43', '2026-01-20 01:26:43', NULL, NULL),
(13, 'Mas Kiki', 'kiki@gmail.com', '$2b$12$JwtlcPtPc7uk1g8LHscqb.xKOz2PGl3GqAQ1UPl.nDYkU2LLHry76', '6282134328076', NULL, 'pelanggan', '2026-01-21 18:17:10', '2026-01-22 01:19:48', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akomodasi`
--
ALTER TABLE `akomodasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akomodasi_id` (`akomodasi_id`);

--
-- Indexes for table `foto_akomodasi`
--
ALTER TABLE `foto_akomodasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akomodasi_id` (`akomodasi_id`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akomodasi_id` (`akomodasi_id`);

--
-- Indexes for table `kebijakan`
--
ALTER TABLE `kebijakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akomodasi_id` (`akomodasi_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `akomodasi_id` (`akomodasi_id`),
  ADD KEY `tipe_kamar_id` (`tipe_kamar_id`);

--
-- Indexes for table `pemesanan_status_log`
--
ALTER TABLE `pemesanan_status_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_statuslog_pemesanan` (`pemesanan_id`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akomodasi_id` (`akomodasi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akomodasi`
--
ALTER TABLE `akomodasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foto_akomodasi`
--
ALTER TABLE `foto_akomodasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kebijakan`
--
ALTER TABLE `kebijakan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pemesanan_status_log`
--
ALTER TABLE `pemesanan_status_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`akomodasi_id`) REFERENCES `akomodasi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `foto_akomodasi`
--
ALTER TABLE `foto_akomodasi`
  ADD CONSTRAINT `foto_akomodasi_ibfk_1` FOREIGN KEY (`akomodasi_id`) REFERENCES `akomodasi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `highlights`
--
ALTER TABLE `highlights`
  ADD CONSTRAINT `highlights_ibfk_1` FOREIGN KEY (`akomodasi_id`) REFERENCES `akomodasi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kebijakan`
--
ALTER TABLE `kebijakan`
  ADD CONSTRAINT `kebijakan_ibfk_1` FOREIGN KEY (`akomodasi_id`) REFERENCES `akomodasi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`akomodasi_id`) REFERENCES `akomodasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`tipe_kamar_id`) REFERENCES `tipe_kamar` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan_status_log`
--
ALTER TABLE `pemesanan_status_log`
  ADD CONSTRAINT `fk_statuslog_pemesanan` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD CONSTRAINT `tipe_kamar_ibfk_1` FOREIGN KEY (`akomodasi_id`) REFERENCES `akomodasi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
