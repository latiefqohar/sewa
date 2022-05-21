-- Adminer 4.8.1 MySQL 5.5.5-10.4.22-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `keluhan`;
CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyewa` int(11) NOT NULL,
  `keluhan` longtext NOT NULL,
  `tanggal` datetime NOT NULL,
  `status_keluhan` varchar(100) NOT NULL DEFAULT 'Belum Selesai',
  `catatan` longtext NOT NULL,
  `update_tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_penyewa` (`id_penyewa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `penyewa`;
CREATE TABLE `penyewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `tipe_sewa` varchar(30) NOT NULL,
  `harga_sewa` float NOT NULL,
  `no_unit` varchar(20) NOT NULL,
  `alamat_unit` varchar(255) NOT NULL,
  `tipe_unit` varchar(255) NOT NULL,
  `mulai_sewa` date DEFAULT NULL,
  `selesai_sewa` date DEFAULT NULL,
  `lengkap` varchar(30) DEFAULT 'Tidak',
  `status` varchar(100) NOT NULL DEFAULT 'Aktif',
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tagihan`;
CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyewa` int(11) NOT NULL,
  `tanggal_tagihan` date NOT NULL,
  `total_tagihan` float NOT NULL,
  `status_bayar` varchar(30) NOT NULL DEFAULT 'Belum Lunas',
  `bukti_pembayaran` varchar(255) NOT NULL,
  `maksimal_pembayaran` date NOT NULL,
  `tipe_tagihan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyewa` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `id_penyewa`, `email`, `password`, `nama`, `role`, `status`) VALUES
(4,	33,	'admin@admin.com',	'21232f297a57a5a743894a0e4a801fc3',	'admin',	'admin',	'Aktif');

-- 2022-05-21 09:04:15
