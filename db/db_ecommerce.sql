-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Des 2019 pada 11.00
-- Versi Server: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(25) NOT NULL,
  `admin_pass` varchar(25) NOT NULL,
  `admin_nama` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_user`, `admin_pass`, `admin_nama`) VALUES
(1, 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(30) NOT NULL,
  `kategori_sat` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`, `kategori_sat`) VALUES
(1, 'Bibit', 'Item'),
(2, 'Buah', 'Kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `member_id` int(11) NOT NULL,
  `member_user` varchar(25) NOT NULL,
  `member_pass` varchar(25) NOT NULL,
  `member_nama` varchar(50) NOT NULL,
  `member_jk` varchar(25) NOT NULL,
  `member_tgl_lahir` date NOT NULL,
  `member_alamat` varchar(25) NOT NULL,
  `member_nohp` varchar(25) NOT NULL,
  `member_tgl_daftar` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`member_id`, `member_user`, `member_pass`, `member_nama`, `member_jk`, `member_tgl_lahir`, `member_alamat`, `member_nohp`, `member_tgl_daftar`) VALUES
(10, 'egova', 'asdasd12', 'Egova Riva Gustino', 'Laki-Laki', '2019-11-01', 'Jln. Parak Karakah No 21 ', '0812931231', '2019-08-11'),
(11, 'Fahri', 'dinda', 'dinda', 'Perempuan', '2019-11-08', 'padang', '0846788998090', '2019-08-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ongkir`
--

CREATE TABLE IF NOT EXISTS `tb_ongkir` (
  `ongkir_id` int(11) NOT NULL,
  `ongkir_nama` varchar(100) NOT NULL,
  `ongkir_tarif` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`ongkir_id`, `ongkir_nama`, `ongkir_tarif`) VALUES
(1, 'Padang', 15000),
(3, 'Bukittinggi', 30000),
(4, 'Pasaman', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE IF NOT EXISTS `tb_pembelian` (
  `pembelian_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `ongkir_id` int(11) NOT NULL,
  `pembelian_tgl` date NOT NULL,
  `pembelian_total` int(11) NOT NULL,
  `pembelian_kota` varchar(100) NOT NULL,
  `pembelian_tarif` int(11) NOT NULL,
  `pembelian_alamat` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`pembelian_id`, `member_id`, `ongkir_id`, `pembelian_tgl`, `pembelian_total`, `pembelian_kota`, `pembelian_tarif`, `pembelian_alamat`) VALUES
(12, 10, 1, '2019-12-03', 157500, 'Padang', 15000, 'Jln. Parak Karakah No 21 Lubuk Begalung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian_produk`
--

CREATE TABLE IF NOT EXISTS `tb_pembelian_produk` (
  `pembelian_produk_id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `pembelian_produk_jumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembelian_produk`
--

INSERT INTO `tb_pembelian_produk` (`pembelian_produk_id`, `pembelian_id`, `produk_id`, `pembelian_produk_jumlah`) VALUES
(14, 12, 14, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE IF NOT EXISTS `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `produk_nama` varchar(100) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_stok` int(11) NOT NULL,
  `produk_spek` text NOT NULL,
  `produk_diskon` int(11) DEFAULT NULL,
  `produk_min` int(11) DEFAULT NULL,
  `produk_foto` text,
  `produk_tgl_post` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `kategori_id`, `produk_nama`, `produk_harga`, `produk_stok`, `produk_spek`, `produk_diskon`, `produk_min`, `produk_foto`, `produk_tgl_post`) VALUES
(14, 1, 'Bibit Strawberry', 15000, 100, 'Terbuat dari kain pilihan dengan ukiran detail', 5, 10, 'Bibit-Strawberry.jpg', '2019-11-07'),
(15, 2, 'Buah Strawberry', 30000, 25, 'Terbuat dari kain pilihan dengan ukiran detail', 4, 4, 'staw.jpeg', '2019-11-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`ongkir_id`),
  ADD KEY `ongkir_id` (`ongkir_id`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`pembelian_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `pembelian_id` (`pembelian_id`,`member_id`,`ongkir_id`),
  ADD KEY `ongkir_id` (`ongkir_id`);

--
-- Indexes for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  ADD PRIMARY KEY (`pembelian_produk_id`),
  ADD KEY `pembelian_produk_id` (`pembelian_produk_id`,`pembelian_id`,`produk_id`),
  ADD KEY `pembelian_id` (`pembelian_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `produk_id` (`produk_id`,`kategori_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `ongkir_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `pembelian_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  MODIFY `pembelian_produk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `tb_pembelian_ibfk_1` FOREIGN KEY (`ongkir_id`) REFERENCES `tb_ongkir` (`ongkir_id`),
  ADD CONSTRAINT `tb_pembelian_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`);

--
-- Ketidakleluasaan untuk tabel `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  ADD CONSTRAINT `tb_pembelian_produk_ibfk_1` FOREIGN KEY (`pembelian_id`) REFERENCES `tb_pembelian` (`pembelian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori` (`kategori_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
