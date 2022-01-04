-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 06:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokotembakau`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_user` varchar(123) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `jumlah`, `total`, `id_user`, `id_produk`, `status`) VALUES
(1, 1, 3000, '19', 6, 0),
(2, 1, 3000, '19', 6, 0),
(3, 8, 3000, '19', 6, 0),
(4, 2, 46000, '19', 1, 0),
(5, 3, 15000, '19', 3, 0),
(6, 1, 7000, '19', 5, 0),
(7, 30, 210000, '19', 5, 0),
(8, 20, 400000, '19', 2, 0),
(9, 15, 45000, '19', 4, 0),
(10, 24, 144000, '19', 12, 0),
(11, 1, 23000, '17', 1, 0),
(12, 1, 5000, '19', 3, 0),
(13, 1, 5000, '19', 3, 0),
(14, 1, 20000, '17', 2, 0),
(15, 1, 20000, '17', 2, 1),
(16, 1, 24000, '17', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `alamat`, `nohp`, `email`, `password`, `role_id`, `is_active`, `date_created`, `image`) VALUES
(17, 'vio', 'aaa', '12341', 'vio@gmail.com', '$2y$10$k1vS3r.7VPvHhgy1SuhK4uVSrfKvDrC/9TOiwxNGhZ0FFTaNZaeQi', 2, 1, 1636534184, 'e6a2e19b9a9792d8f47ab35f301c28b6.jpg'),
(30, 'Arie Hasta', 'bratang gede', '49152531122', 'ariehasta0573@gmail.com', '$2y$10$wBfGzUETsUMd1o2fLvTjR.uG5wHy/IhSbf17VQgf.nslP6ExWWCd2', 2, 0, 1639325605, 'default.png'),
(31, 'Rafi Oktaviano', 'bratang gede', '089698960492', 'rafioktafiano0@gmail.com', '$2y$10$NeQMJ.EBkqMq7bmJzodhZehiAxglLxeXpcu4HQRzh5CdWV41pZngK', 1, 1, 1641206358, 'WhatsApp_Image_2022-01-03_at_19_51_05.jpeg'),
(34, 'Rafi Second', 'Bratang Bagian Cidro', '083831234567', 'testwebku25@gmail.com', '$2y$10$VTP.n5YU2bPHE9PjHl1Oxe3.Hdhr3sUdgXx3OK9yZpBK3rRlfCv6.', 2, 1, 1641213595, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `deskripsi` varchar(123) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jenis` varchar(123) NOT NULL,
  `image` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `stok`, `harga`, `jenis`, `image`) VALUES
(1, 'tembakau surya', 'per 100 gram', 9, 24000, 'tembakau', 'surya.jpg'),
(2, 'Tembakau Dji Sam Soe', 'per 100 gram', 10, 23000, 'tembakau', 'Dji_Sam_Soe.jpg'),
(3, 'alat linting kecil', 'alat linting kecil', 7, 5000, 'alatlinting', 'alatkecil.jpg'),
(4, 'kertas samsu', 'paper samsu kw', 15, 1000, 'paper', 'kertas236.jpg'),
(5, 'filter Reguler', 'filter rokok ukuran sedang', 8, 5000, 'filter', 'filterreg.jpg'),
(6, 'lem kecil', 'lem ukuran kecil', 15, 3000, 'alatlainnya', 'lemkecil.jpg'),
(12, 'ketas delima', 'paper roko', 24, 1000, 'paper', 'kertas_delima.jpg'),
(13, 'Alat linting sedang', 'alat linting besar', 5, 15000, 'alatlinting', 'alatsedang.jpg'),
(14, 'Filter Magnum', 'filter rokok ukuran besar', 10, 5000, 'filter', 'filtermagnum.jpg'),
(15, 'lem besar', 'lem ukuran besar', 10, 5000, 'alatlainnya', 'lembesar.jpg'),
(16, 'tembakau mild', 'tembakau aroma mild', 10, 20000, 'tembakau', 'tembakaumild1.jpg'),
(17, 'tembakau malioboro', 'per 100 gram', 10, 23000, 'tembakau', 'tembakaumalioboro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(6, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user'),
(19, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-chart-line', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(7, 2, 'keranjang', 'user/keranjang', 'fas fa-fw fa-shopping-cart', 1),
(8, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(9, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(10, 1, 'Verifikasi Pesanan', 'admin/keranjang', 'fas fa-fw fa-calendar-check', 1),
(11, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(12, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-folder-open', 1),
(13, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(15, 1, 'History', 'Admin/history', 'fas fa-fw fa-chart-area', 1),
(16, 1, 'Manage Product', 'Admin/manageProduct', 'fab fa-fw fa-product-hunt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(5, 'ariehasta0573@gmail.com', 'icnpFNWgjTEwnEKmGnEedbwpoe7RRpzTFyCPMnuY5jo=', 1639325605),
(7, 'rafioktafiano0@gmail.com', 'EkIRta2n2aggyiR0saoIXLWcSpbHes/dRuXW5F9GJqg=', 1641206551),
(8, 'rafioktafiano0@gmail.com', 'hSHeKQS5n2TDGlwn17uPfjtORBr+du5plyoq9FLmcwc=', 1641206956),
(9, 'rafioktafiano0@gmail.com', 'YymfNME1bRFjUR25idvQ/rsOp4UexXO9r1Wx6xm2Z3o=', 1641206982),
(10, 'rafioktafiano0@gmail.com', 'kW7jD65m29CfMbG3sGcZABdXUQC35kF/OmWMFekiGCI=', 1641207011),
(11, 'rafioktafiano0@gmail.com', 'L5gg19bADboma2t2YCmu8jPoE2edOeqYk08B4wwbNqg=', 1641208631),
(12, 'mungelsaca@gmail.com', '9v1xnUCspU5Dr4doJWRzR3+QCteSIfN4GZgVnDBZPF0=', 1641212881);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
