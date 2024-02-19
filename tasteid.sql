-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 05:14 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasteid`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `id_user`, `judul`, `isi`, `gambar`) VALUES
(8, '61cd99765c7a0', 'Cara memotong ayam', 'saya akan membagikan tips cara memotong ayam yang benar dan rapi, pertama siapkan pisau dan talenan/tatakan, lalu potong ayam', '1640864557_2d1435a0ea710afd4589.jpg'),
(9, '61cd9bab73200', 'Teknik memotong ayam', 'Disini saya akan membagikan tips untuk para bunda agar bisa memotong ayam dengan baik dan benar', '1640865159_7048e659f7d90afda0c0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_resep`
--

CREATE TABLE `bahan_resep` (
  `id_bahan_resep` int(100) NOT NULL,
  `id_resep` int(100) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_resep`
--

INSERT INTO `bahan_resep` (`id_bahan_resep`, `id_resep`, `nama_bahan`) VALUES
(1, 7, 'ayam'),
(2, 7, 'awd'),
(3, 8, 'ayam'),
(4, 9, 'ayam'),
(5, 9, 'garam'),
(6, 10, '500 gr Daging Sapi'),
(7, 11, '500 gr ayam'),
(8, 12, '500 gr Ikan Laut'),
(9, 13, '500 gr Daging Sapi'),
(10, 13, 'garam');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_utama`
--

CREATE TABLE `bahan_utama` (
  `id_bahan_utama` int(11) NOT NULL,
  `nama_bahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id_bookmark` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `id_resep` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id_bookmark`, `user_id`, `id_resep`) VALUES
(10, '61cd9bab73200', 11),
(11, '61cd9bab73200', 10);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `judul`, `gambar`) VALUES
(3, '', '1640438403_1ed4052e546b400cc63e.jpg'),
(4, '', '1640438414_8d04e668a6e795452091.jpg'),
(5, '', '1640438431_4c9ac679a35b3a062f06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `instruksi`
--

CREATE TABLE `instruksi` (
  `id_instruksi` int(100) NOT NULL,
  `id_resep` int(100) NOT NULL,
  `detail_instruksi` varchar(1000) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instruksi`
--

INSERT INTO `instruksi` (`id_instruksi`, `id_resep`, `detail_instruksi`, `gambar`) VALUES
(1, 7, 'awdaw', '1640406115_ad35721f9efa6a66887c.png'),
(2, 7, 'adaw', '1640406115_cf19b6aca00c23ade5c3.png'),
(3, 8, 'buat', '1640431200_22b20445eca50819e4f1.png'),
(4, 9, 'suir', '1640796106_db1fb6cb21354ec9c4ba.png'),
(5, 10, 'Haluskan bumbu dan tumis', '1640864060_7de649ffb6b39589102c.jpg'),
(6, 11, 'masak ayam', '1640864304_a1f2188929aa01825796.jpg'),
(7, 12, 'Haluskan ikan', '1640865089_01ce1ae9d567a6704dfc.jpg'),
(8, 13, 'pp', '1640921286_f863bdbb618ed873469b.gif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `status`) VALUES
(1, 'Makanan', 1),
(2, 'Minuman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_memasak`
--

CREATE TABLE `rencana_memasak` (
  `id_rencana_memasak` int(100) NOT NULL,
  `id_resep` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `hari` date NOT NULL,
  `waktu` enum('breakfast','lunch','dinner','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(100) NOT NULL,
  `nama_resep` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_kategori` int(100) NOT NULL,
  `detail_resep` varchar(1000) NOT NULL,
  `gambar_resep` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `nama_resep`, `id_user`, `id_kategori`, `detail_resep`, `gambar_resep`) VALUES
(10, 'Rendang', '61cd97ad5aa57', 1, 'Rendang atau randang adalah masakan daging asli Indonesia yang berasal dari Minangkabau. Masakan ini dihasilkan dari proses memasak suhu rendah dalam waktu lama menggunakan aneka rempah-rempah dan santan.', '1640864060_c1e5aa6b5e4eb7b19e1f.jpg'),
(11, 'Soto Ayam', '61cd99765c7a0', 1, 'Soto ayam adalah makanan khas Indonesia yang berupa sejenis sup ayam dengan kuah yang berwarna kekuningan. Warna kuning ini dikarenakan oleh kunyit yang digunakan sebagai bumbu. Soto ayam banyak ditemukan di daerah-daerah di Indonesia dan Singapura.', '1640864304_2b2361f48054a8f24b1a.jpg'),
(12, 'Sate Lilit', '61cd9bab73200', 1, 'Sate lilit adalah makanan dari bali, blablablabla', '1640865089_b37e18270bc8ba694409.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(32) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `img_user` varchar(100) NOT NULL,
  `hak_akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama_user`, `email_user`, `password_user`, `provinsi`, `kota`, `img_user`, `hak_akses`) VALUES
('61c5f692129d7', 'q', 'q@mail.com', '$2y$10$s4tezpd0WhrmFPb0ltq1H.tdX', 'q', 'q', 'user.png', 'user'),
('61c5f6e11a21e', 'a', 'a@mail.com', '$2y$10$EgDVSFjQN9QRD4rj6CzGwOtpE', 'a', 'a', 'user.png', 'user'),
('61c5f72c19ca9', 'w', 'w@mail.com', 'f1290186a5d0b1ceab27f4e77c0c5d68', 'Bali', 'w', 'user.png', 'user'),
('61c6f33ae01ec', 'admin', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'user.png', 'admin'),
('61cc8f393a427', 'user', 'user@mail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Jawa Barat', 'Bandung', 'user.png', 'user'),
('61cd97ad5aa57', 'asih', 'asih@gmail.com', '037e263b930b63976b66f302380897b0', 'Jawa Barat', 'Bandung', 'user.png', 'user'),
('61cd99765c7a0', 'julia', 'julia@gmail.com', '04305e8ef1c15dbf249cc0c99ce86107', 'Kalimantan', 'Pontianak', 'user.png', 'user'),
('61cd9bab73200', 'bunda test', 'bunda@gmail.com', '6111c0ae39441b08b8d02a67132dc37a', 'Jawa Timur', 'Surabaya', 'user.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan_resep`
--
ALTER TABLE `bahan_resep`
  ADD PRIMARY KEY (`id_bahan_resep`);

--
-- Indexes for table `bahan_utama`
--
ALTER TABLE `bahan_utama`
  ADD PRIMARY KEY (`id_bahan_utama`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id_bookmark`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruksi`
--
ALTER TABLE `instruksi`
  ADD PRIMARY KEY (`id_instruksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `rencana_memasak`
--
ALTER TABLE `rencana_memasak`
  ADD PRIMARY KEY (`id_rencana_memasak`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bahan_resep`
--
ALTER TABLE `bahan_resep`
  MODIFY `id_bahan_resep` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bahan_utama`
--
ALTER TABLE `bahan_utama`
  MODIFY `id_bahan_utama` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id_bookmark` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instruksi`
--
ALTER TABLE `instruksi`
  MODIFY `id_instruksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rencana_memasak`
--
ALTER TABLE `rencana_memasak`
  MODIFY `id_rencana_memasak` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
