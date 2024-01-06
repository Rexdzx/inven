-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 03, 2024 at 10:43 AM
-- Server version: 8.0.32
-- PHP Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `kondisi` enum('Bagus','Rusak') NOT NULL DEFAULT 'Bagus',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `merek`, `kondisi`, `created_at`) VALUES
(1, 'BOLA VOLI MOLTEN', 'V5M5000 MOLTEN', 'Bagus', '2024-01-03 10:34:55'),
(2, 'BOLA FUTSAL', 'ADIDAS/MITRE', 'Bagus', '2024-01-03 10:35:04'),
(3, 'BOLA BASKET', 'MOLTEN ORIGINAL', 'Bagus', '2024-01-03 10:35:14'),
(4, 'BOLA TAKRAW PUTRA', 'MARATHON MT908 ', 'Bagus', '2024-01-03 10:35:22'),
(5, 'BOLA TAKRAW PUTRI', 'MARATHON MT909 ', 'Bagus', '2024-01-03 10:35:31'),
(6, 'BOLA VOLI OUTDOOR', 'MIKASA', 'Bagus', '2024-01-03 10:35:41'),
(7, 'BOLA KAKI', 'MOLTEN ', 'Bagus', '2024-01-03 10:35:49'),
(8, 'BOLA SOFT TENIS', 'KENKO BALL', 'Bagus', '2024-01-03 10:35:56'),
(9, 'BOLA TENIS MEJA', 'NITTAKU PREMIUM +40 MADE IN JAPAN', 'Bagus', '2024-01-03 10:36:04'),
(10, 'BOLA TENIS LAP', 'DUNLOP FRONT', 'Bagus', '2024-01-03 10:36:12'),
(11, 'BOLA PENTANQUE', 'OBUT', 'Bagus', '2024-01-03 10:36:19'),
(12, 'BOLA SOFTBALL', 'Mizuno 150', 'Bagus', '2024-01-03 10:36:27'),
(13, 'BOLA PICKLE BALL', 'HUDEF', 'Bagus', '2024-01-03 10:36:35'),
(14, 'BAD PADDLE PICKLE BALL', 'HUDEF', 'Bagus', '2024-01-03 10:36:42'),
(15, 'BOLA KARET SOFTBALL', 'MIZUNO ', 'Bagus', '2024-01-03 10:36:50'),
(16, 'BOLA BULU TANGKIS', 'SUN POWER', 'Bagus', '2024-01-03 10:36:57'),
(17, 'BED TENIS MEJA', 'DONIC', 'Bagus', '2024-01-03 10:37:03'),
(18, 'BET SOFTBALL', 'NIKE', 'Bagus', '2024-01-03 10:37:11'),
(19, 'RAKET TENIS DEWASA', 'WILSON', 'Bagus', '2024-01-03 10:37:17'),
(20, 'ROMPI SEPAK BOLA', 'ADISAS', 'Bagus', '2024-01-03 10:37:23'),
(21, 'PEMBALUT GRIB B. TANGKIS', 'Yonex', 'Bagus', '2024-01-03 10:37:30'),
(22, 'PEMBALUT GRIB TENIS LAP', 'Yonex', 'Bagus', '2024-01-03 10:38:47'),
(23, 'RAKET BULU TANGKIS', 'Lining/Yonex', 'Bagus', '2024-01-03 10:38:58'),
(24, 'STOPWATCH 100 MEMORI', 'CASIO', 'Bagus', '2024-01-03 10:39:07'),
(25, 'NET BULU TANGKIS', 'YONEX', 'Bagus', '2024-01-03 10:39:18'),
(26, 'LINGKARAN (CIRCLE)', 'OBUT', 'Bagus', '2024-01-03 10:39:28'),
(27, 'TENDA PRAMUKA REGU ', 'Eliezer Outdoor uk. 6 org', 'Bagus', '2024-01-03 10:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjam` int NOT NULL,
  `nama_peminjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_penjamin` int NOT NULL,
  `id_barang` int NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','operator') NOT NULL DEFAULT 'operator',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2024-01-03 10:31:46'),
(2, 'Operator', 'operator@mail.com', '4b583376b2767b923c3e1da60d10de59', 'operator', '2024-01-03 10:32:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `id_penjamin` (`id_penjamin`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjam` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_penjamin`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
