-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(25) NOT NULL,
  `admin_pass` varchar(25) NOT NULL,
  `admin_nama` varchar(25) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tb_admin` (`admin_id`, `admin_user`, `admin_pass`, `admin_nama`) VALUES
(1,	'admin1',	'admin1',	'admin1');

DROP TABLE IF EXISTS `tb_keranjang`;
CREATE TABLE `tb_keranjang` (
  `keranjang_id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `keranjang_jml_beli` int(11) NOT NULL,
  `keranjang_tgl` datetime NOT NULL,
  PRIMARY KEY (`keranjang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_user` varchar(25) NOT NULL,
  `member_pass` varchar(25) NOT NULL,
  `member_nama` varchar(50) NOT NULL,
  `member_jk` varchar(25) NOT NULL,
  `member_tgl_lahir` date NOT NULL,
  `member_alamat` varchar(25) NOT NULL,
  `member_nohp` varchar(25) NOT NULL,
  `member_tgl_daftar` date NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tb_member` (`member_id`, `member_user`, `member_pass`, `member_nama`, `member_jk`, `member_tgl_lahir`, `member_alamat`, `member_nohp`, `member_tgl_daftar`) VALUES
(3,	'Admin',	'Admin',	'Admin',	'Admin',	'2019-10-28',	'Admin',	'Admin',	'2019-10-28'),
(2,	'Egova1',	'Egova1',	'Egova1',	'Perempuan',	'2019-10-29',	'Egova1',	'Egova1',	'2019-10-28');

DROP TABLE IF EXISTS `tb_ongkir`;
CREATE TABLE `tb_ongkir` (
  `ongkir_id` int(11) NOT NULL AUTO_INCREMENT,
  `ongkir_nama` varchar(100) NOT NULL,
  `ongkir_tarif` int(11) NOT NULL,
  PRIMARY KEY (`ongkir_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tb_ongkir` (`ongkir_id`, `ongkir_nama`, `ongkir_tarif`) VALUES
(1,	'Padang',	15000);

DROP TABLE IF EXISTS `tb_pesanan`;
CREATE TABLE `tb_pesanan` (
  `pesanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `pesanan_alamat_kirim` text NOT NULL,
  `pesanan_total` int(11) NOT NULL,
  `pesanan_tgl` date NOT NULL,
  `pesanan_status` varchar(100) NOT NULL,
  PRIMARY KEY (`pesanan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_produk`;
CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_nama` varchar(100) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_stok` int(11) NOT NULL,
  `produk_spek` text NOT NULL,
  `produk_diskon` int(11) DEFAULT NULL,
  `produk_foto` text,
  `produk_tgl_post` date NOT NULL,
  PRIMARY KEY (`produk_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tb_produk` (`produk_id`, `produk_nama`, `produk_harga`, `produk_stok`, `produk_spek`, `produk_diskon`, `produk_foto`, `produk_tgl_post`) VALUES
(1,	'Tas1',	20001,	111,	'Tas Bagus ni1',	1,	'tas.jpg',	'2019-10-28'),
(5,	'Tas Koper',	12000,	12,	'Tas GG ini',	0,	'koper.jpg',	'2019-10-29');

-- 2019-10-29 03:31:27
