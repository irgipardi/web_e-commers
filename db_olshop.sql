-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 02:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tlp_admin` varchar(20) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `tlp_admin`, `email_admin`, `alamat_admin`) VALUES
(25, 'admin db_olshop', 'admin', '21232f297a57a5a743894a0e4a801fc3', '085784214523', 'admin@gmail.com', 'Kec.Sujinaraja Kab.Garut');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(27, 'kamera'),
(28, 'Sayuran'),
(29, 'Handphone'),
(30, 'Laptop'),
(31, 'Jaket');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `produk_name` varchar(100) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `produk_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori_id`, `produk_name`, `produk_harga`, `deskripsi`, `gambar`, `produk_status`, `date_created`) VALUES
(18, 27, 'kamera 1', 200000, '<p>kamera 1</p>\r\n', 'produk1673180549.jpg', 1, '2023-01-08 12:22:29'),
(19, 27, 'kamera 2', 300000, '<p>kamera 2</p>\r\n', 'produk1673180704.jpg', 1, '2023-01-08 12:25:04'),
(20, 27, 'kamera 3', 400000, '<p>kamera 3</p>\r\n', 'produk1673180732.jpg', 1, '2023-01-08 12:25:32'),
(21, 29, 'Handphone Redme 6', 2500000, '<p>HAndphone Redme 6 pro</p>\r\n', 'produk1673182536.jpg', 1, '2023-01-08 12:55:36'),
(22, 28, 'Sayuran Brokoli', 10000, '<p>Sayur Brokoli Sehat</p>\r\n', 'produk1673182603.jpg', 1, '2023-01-08 12:56:43'),
(23, 28, 'Sayuran Kol', 10000, '<p>Sayur Kol</p>\r\n', 'produk1673182637.jpg', 1, '2023-01-08 12:57:17'),
(24, 30, 'Laptop Lenovo', 5000000, '<p>Laptop Lenovo</p>\r\n', 'produk1673182705.jpg', 1, '2023-01-08 12:58:25'),
(25, 30, 'Laptop Asus', 2500000, '<p>Laptop Asus</p>\r\n', 'produk1673182747.jpg', 1, '2023-01-08 12:59:07'),
(26, 31, 'Jaket 1', 120000, '<p>Size XL</p>\r\n', 'produk1673182823.jpg', 1, '2023-01-08 13:00:23'),
(27, 31, 'Jaket 2', 80000, '<p>Size M</p>\r\n', 'produk1673182888.jpg', 1, '2023-01-08 13:01:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`) USING BTREE;

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
