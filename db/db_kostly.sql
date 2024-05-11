-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2024 at 02:36 PM
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
-- Database: `db_kostly`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(5) NOT NULL,
  `nama_kost` varchar(30) NOT NULL,
  `alamat_kost` varchar(30) NOT NULL,
  `harga_sewa` int(10) NOT NULL,
  `jumlah_bulan` int(2) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `no_telp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `nama_kost`, `alamat_kost`, `harga_sewa`, `jumlah_bulan`, `total_harga`, `nama_pengguna`, `no_telp`) VALUES
('398', 'Wisma Griya Arista', 'Depok', 350000, 1, 350000, 'pelanggan', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `id_kost` varchar(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jumlah_kamar` int(3) NOT NULL,
  `harga_sewa` int(10) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`id_kost`, `nama`, `alamat`, `jumlah_kamar`, `harga_sewa`, `gambar`) VALUES
('k1', 'Wisma Griya Arista', 'Depok', 7, 350000, 'griyakost.png'),
('k2', 'Inara Kost', 'Sidoarjo', 10, 550000, 'inarakost.png'),
('k3', 'Kost Campur', 'Surabaya', 7, 1800000, 'kostcampur.png'),
('k4', 'Graha Kost', 'Malang', 14, 500000, 'grahakost.png'),
('k5', 'Kost Abah Zaini', 'Surabaya', 6, 400000, 'kostabah.png'),
('k6', 'Kost Putra Putri', 'Kediri', 8, 450000, 'kostpupi.png'),
('k7', 'Cemara Kost', 'Jakarta Pusat', 6, 1000000, 'cemarakost.jpg'),
('k8', 'Kost Sejahtra', 'Jakarta Pusat', 7, 1900000, 'kostsejahtra.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `ttl` varchar(40) NOT NULL,
  `alamat_pengguna` varchar(30) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_pengguna`, `ttl`, `alamat_pengguna`, `no_hp`, `role`) VALUES
(6, 'admin', 'admin', 'admin', 'admin', 'admin', 12345, 'admin'),
(7, 'pelanggan', 'pelanggan', 'pelanggan', 'pelanggan', 'pelanggan', 12345, 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
