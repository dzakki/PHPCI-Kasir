-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 05:05 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_minuman` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_meja`
--

CREATE TABLE `tb_meja` (
  `id_meja` int(11) NOT NULL,
  `status` enum('empty','exist') NOT NULL,
  `kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_meja`
--

INSERT INTO `tb_meja` (`id_meja`, `status`, `kursi`) VALUES
(1, 'empty', 2),
(2, 'empty', 3),
(3, 'empty', 4),
(4, 'exist', 2),
(5, 'empty', 4),
(6, 'empty', 2),
(7, 'empty', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_minuman`
--

CREATE TABLE `tb_minuman` (
  `id_minuman` int(11) NOT NULL,
  `nama_minuman` varchar(50) NOT NULL,
  `harga_minuman` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_minuman`
--

INSERT INTO `tb_minuman` (`id_minuman`, `nama_minuman`, `harga_minuman`, `harga_jual`, `ppn`, `diskon`, `stok`, `picture`, `deskripsi`) VALUES
(1, 'White Coffe', 13000, 14170, 1300, 1, 16, '', ''),
(2, 'Black Coffe', 10000, 11000, 1000, 0, 15, '', ''),
(3, 'Coffe Amercano', 14000, 15260, 1400, 1, 26, '', ''),
(4, 'Coffelatte', 10000, 11000, 1000, 0, 9, '', ''),
(5, 'Good day', 10000, 10900, 1000, 1, 12, '', ''),
(6, 'Coffe strong', 15000, 16500, 1500, 0, 20, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_minuman`
--

CREATE TABLE `tb_order_minuman` (
  `id_order_minuman` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `id_minuman` int(11) NOT NULL,
  `jumlah_minuman` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order_minuman`
--

INSERT INTO `tb_order_minuman` (`id_order_minuman`, `id_transaksi`, `id_minuman`, `jumlah_minuman`, `harga`) VALUES
(1, '03dOk5lDBzX4YZIr22', 1, 1, 9000),
(2, 'bv24fwWGLHUSm6XQ22', 1, 1, 14170),
(3, 'bv24fwWGLHUSm6XQ22', 2, 2, 11000),
(4, 'tNhPcvLRdGOBF8Yz23', 3, 1, 15260),
(5, 'tNhPcvLRdGOBF8Yz23', 2, 1, 11000),
(7, 'N7tPLIFXcoS3vhsy23', 1, 1, 14170),
(8, 'UVYZz1bDt3GcH6aM23', 2, 1, 11000),
(9, 'fshQb7u2WAeZ3jcM23', 3, 1, 15260),
(10, 'RNObmuarZpYELki723', 2, 1, 11000),
(11, 'av3QuqVi9y72zZ5023', 1, 1, 14170),
(12, 'av3QuqVi9y72zZ5023', 3, 2, 15260),
(13, 'av3QuqVi9y72zZ5023', 4, 1, 11000),
(14, 'PQomBcr9Ej1kw5Ne23', 1, 1, 14170);

--
-- Triggers `tb_order_minuman`
--
DELIMITER $$
CREATE TRIGGER `Mengurangi stok minuman` AFTER INSERT ON `tb_order_minuman` FOR EACH ROW BEGIN
	UPDATE tb_minuman SET stok = stok - NEW.jumlah_minuman WHERE id_minuman = 		NEW.id_minuman;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` enum('success','pending') NOT NULL DEFAULT 'pending',
  `status_order` enum('success','pending','','') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_kasir`, `id_customer`, `id_meja`, `total`, `bayar`, `status_order`, `created_at`) VALUES
('03dOk5lDBzX4YZIr22', 2, 1, 1, 9000, 'success', 'success', '2019-04-22 10:18:07'),
('av3QuqVi9y72zZ5023', 5, 1, 2, 55690, 'success', 'success', '2019-04-23 01:49:57'),
('bv24fwWGLHUSm6XQ22', 7, 8, 4, 36170, 'success', 'success', '2019-04-22 14:41:31'),
('fshQb7u2WAeZ3jcM23', 7, 8, 1, 15260, 'success', 'success', '2019-04-23 01:40:03'),
('N7tPLIFXcoS3vhsy23', 5, 4, 2, 14170, 'success', 'success', '2019-04-23 01:36:33'),
('PQomBcr9Ej1kw5Ne23', 7, 1, 2, 14170, 'success', 'success', '2019-04-23 01:53:07'),
('RNObmuarZpYELki723', 7, 1, 1, 11000, 'success', 'success', '2019-04-23 01:41:17'),
('tNhPcvLRdGOBF8Yz23', 5, 4, 1, 26260, 'success', 'success', '2019-04-23 01:37:08'),
('UVYZz1bDt3GcH6aM23', 5, 1, 1, 11000, 'success', 'pending', '2019-04-23 01:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `role` tinyint(5) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `first_name`, `last_name`, `username`, `email`, `password`, `gender`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Dzakki', 'Achmed', 'dzakki', 'dzakkiaz7@gmail.com', '12345', 'L', 1, '2019-04-22 03:08:48', '2019-04-22 03:08:48'),
(2, 'Ahmad', 'Muzakkii', 'ahmad', 'ahmadd@gmail.com', '$2y$10$vWROyWsD9O8gtPgOtMsBJeTrbXW64MiX7eA.Qae2vAJHSyr6yAQyy', 'P', 4, '2019-04-22 05:30:31', '2019-04-22 05:30:31'),
(3, 'jane ', 'doe', 'janejane', 'jane@gmail.com', '$2y$10$N0cN10/.6JpbUSYfTnkJWedBUGYbbWXOkKUjYJxDTTTXlT/.9iHFG', 'L', 3, '2019-04-22 05:48:17', '2019-04-22 05:48:17'),
(4, 'Iqbal', 'Ramadhan', 'iqbal', 'iqbal@iqbal.com', '$2y$10$E9/U3p9YLnZ7r37TzOTCIeWdknZvBrVHAISCh6uE3RMZqTa.khaJm', 'L', 1, '2019-04-22 14:08:56', '2019-04-22 14:08:56'),
(5, 'admin', 'admin', 'admin', 'admin@admin.com', '$2y$10$d/qy1d4fyN5RTksTe1WImOUAb64A7kHXbpcpy1FD5JeOovvZNkgQ2', 'L', 5, '2019-04-22 14:19:45', '2019-04-22 14:19:45'),
(6, 'waiter', 'waiter', 'waiter', 'waiter@waiter.com', '$2y$10$vAYoa3BCmupBC1BRfGEIO.uJ7AouA2MYBMebyNHhui3mlS8RAVNOW', 'L', 4, '2019-04-22 14:20:09', '2019-04-22 14:20:09'),
(7, 'kasir', 'kasir', 'kasir', 'kasir@kasir.com', '$2y$10$DkVyq7FvAx8xzdta0dDVTuTrDdCGcK4TJEE9txjNOAY/ZjZhJ/cy2', 'P', 3, '2019-04-22 14:20:32', '2019-04-22 14:20:32'),
(8, 'pelanggan', 'pelanggan', 'pelanggan', 'pelanggan@pelanggan.com', '$2y$10$agDkUB4p07.Lj9DcsKUCbOMGQqLqwe5Va7cwXJiXuQbUtUMEDGBuO', 'P', 1, '2019-04-22 14:20:49', '2019-04-22 14:20:49'),
(9, 'owner', 'owner', 'owner', 'owner@owner.com', '$2y$10$dPjJ9PR6JBfOeWVkEUYK0evl.bZFmpi8tKWzHQuMqXhnm2gzQsyLa', 'P', 2, '2019-04-22 14:22:25', '2019-04-22 14:22:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_minuman` (`id_minuman`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `tb_minuman`
--
ALTER TABLE `tb_minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indexes for table `tb_order_minuman`
--
ALTER TABLE `tb_order_minuman`
  ADD PRIMARY KEY (`id_order_minuman`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_minuman` (`id_minuman`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_meja` (`id_meja`),
  ADD KEY `id_kasir` (`id_kasir`),
  ADD KEY `id_cutomer` (`id_customer`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_meja`
--
ALTER TABLE `tb_meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_minuman`
--
ALTER TABLE `tb_minuman`
  MODIFY `id_minuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_order_minuman`
--
ALTER TABLE `tb_order_minuman`
  MODIFY `id_order_minuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`id_minuman`) REFERENCES `tb_minuman` (`id_minuman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_keranjang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_order_minuman`
--
ALTER TABLE `tb_order_minuman`
  ADD CONSTRAINT `tb_order_minuman_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_order_minuman_ibfk_2` FOREIGN KEY (`id_minuman`) REFERENCES `tb_minuman` (`id_minuman`) ON UPDATE NO ACTION;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `tb_meja` (`id_meja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `tb_user` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
