-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Inang: sql105.byethost.com
-- Waktu pembuatan: 13 Jan 2019 pada 22.49
-- Versi Server: 5.6.41-84.1
-- Versi PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `b14_23201140_logistik_zalfa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_pesan`
--

CREATE TABLE IF NOT EXISTS `t_detail_pesan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(3) NOT NULL,
  `id_produk` int(3) NOT NULL,
  `jumlah_pesan` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pesan` (`id_pesan`),
  KEY `id_produk` (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `t_detail_pesan`
--

INSERT INTO `t_detail_pesan` (`id`, `id_pesan`, `id_produk`, `jumlah_pesan`) VALUES
(1, 1, 16, 1),
(2, 1, 5, 1),
(3, 2, 11, 1),
(4, 2, 15, 1),
(5, 1, 1, 0),
(6, 1, 3, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_distributor`
--

CREATE TABLE IF NOT EXISTS `t_distributor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` enum('owner','agen','reseller','') NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `t_distributor`
--

INSERT INTO `t_distributor` (`id`, `jenis`, `nama`, `no_hp`) VALUES
(1, 'owner', 'Zalfa Miracle Skincare', '089676181051'),
(2, 'agen', 'Merry Going', '081220254474'),
(3, 'reseller', 'Edward Elric', '081394901196');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_fundraising`
--

CREATE TABLE IF NOT EXISTS `t_fundraising` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `periode` varchar(30) NOT NULL,
  `total_kebutuhan` varchar(18) DEFAULT '0',
  `total_realisasi` varchar(18) DEFAULT '0',
  `total_pemasukan` varchar(18) DEFAULT '0',
  `selisih` varchar(18) DEFAULT '0',
  `status` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_fundraising`
--

INSERT INTO `t_fundraising` (`id`, `periode`, `total_kebutuhan`, `total_realisasi`, `total_pemasukan`, `selisih`, `status`) VALUES
(1, '10-2016', '56700000', '360000', '8500000', '-48200000', 0),
(2, '07-2016', '22000000', '1000', '10000000', '-12000000', 0),
(3, '12-2016', '20000000', '100000', '40000000', '20000000', 1),
(5, '01-2017', '100000', '0', '11000000', '10900000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_group_users`
--

CREATE TABLE IF NOT EXISTS `t_group_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(20) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_group_users`
--

INSERT INTO `t_group_users` (`id`, `level`, `deskripsi`) VALUES
(1, 'Pimpinan', 'Pimpinan Zalfa'),
(2, 'Admin', 'Admin Zalfa'),
(3, 'Staf', 'Staf Zalfa'),
(5, 'Manager Supervisor D', 'Mengatur 2 pekerjaan : staf dan admin (bisa salah ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelanggan`
--

CREATE TABLE IF NOT EXISTS `t_pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `tipe_pelanggan` enum('Customer Biasa','Reseller','Agen','') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id`, `nama`, `tipe_pelanggan`, `alamat`, `no_hp`) VALUES
(1, 'Sri Wahyuni', 'Customer Biasa', 'Jalan Dipatiukur No. 140 Kec. Coblong 44312', '081394901196'),
(2, 'Ratna Sari', 'Reseller', 'Jalan Budhi No. 71 Kec. Cilember Tengah 49082', '081320254474'),
(3, 'Cinta Laura', 'Agen', 'Jalan in aja dulu\n                                                  \n                               ', '089676181051'),
(5, 'Wul4n_Kr15t1n4', 'Customer Biasa', 'Jalan Sadang Hegar 1 Gang Menara Air 1 No. 23 Coblong, Kota Bandung 40314 dekat lapangan serbaguna b', '081394901196');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pesanan`
--

CREATE TABLE IF NOT EXISTS `t_pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pesan` date NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `ekspedisi` enum('JNT','JNE','SICEPAT','') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `t_pesanan`
--

INSERT INTO `t_pesanan` (`id`, `tgl_pesan`, `id_pelanggan`, `id_user`, `ekspedisi`) VALUES
(1, '2018-06-08', 1, 4, 'JNT'),
(2, '2018-06-09', 3, 2, 'JNT'),
(3, '2018-06-18', 2, 1, 'JNT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE IF NOT EXISTS `t_produk` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`id`, `nama_produk`) VALUES
(1, 'Paket Lightening'),
(2, 'Paket Acne'),
(3, 'Paket Flawless'),
(4, 'Day Cream White'),
(5, 'Night Cream White'),
(6, 'Day Cream Acne'),
(7, 'Night Cream Acne'),
(8, 'Day Cream Flawless'),
(9, 'Night Cream Flawless'),
(10, 'Serum Lightening'),
(11, 'Facial Wash White'),
(12, 'Facial Wash Acne'),
(13, 'Facial Wash Flawless'),
(14, 'Toner'),
(15, 'Milk Cleanser'),
(16, 'Brightening Gel'),
(17, 'Eye Cream'),
(18, 'Hand and Body'),
(19, 'Acne Gel'),
(20, 'Masker Whitening'),
(21, 'Masker Acne'),
(22, 'Masker Gold'),
(23, 'Madu Alshifa'),
(24, 'Serum KAKADU'),
(25, 'Spray Vit C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stok`
--

CREATE TABLE IF NOT EXISTS `t_stok` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tipe_stok` enum('Mengalir','Tetap') NOT NULL,
  `id_produk` int(3) NOT NULL,
  `jumlah` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipe_stok` (`tipe_stok`),
  KEY `id_produk` (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `t_stok`
--

INSERT INTO `t_stok` (`id`, `tipe_stok`, `id_produk`, `jumlah`) VALUES
(1, 'Mengalir', 1, 37),
(2, 'Mengalir', 2, 69),
(3, 'Mengalir', 3, 55),
(4, 'Mengalir', 4, 11),
(5, 'Mengalir', 5, 10),
(6, 'Mengalir', 6, 85),
(7, 'Mengalir', 7, 19),
(8, 'Tetap', 8, 38),
(9, 'Mengalir', 9, 2),
(10, 'Mengalir', 10, 18),
(11, 'Mengalir', 11, 20),
(12, 'Mengalir', 12, 4),
(13, 'Mengalir', 13, 16),
(14, 'Mengalir', 14, 87),
(15, 'Mengalir', 15, 65),
(16, 'Mengalir', 16, 6),
(17, 'Mengalir', 17, 16),
(18, 'Mengalir', 18, 0),
(19, 'Mengalir', 19, 26),
(20, 'Mengalir', 20, 3),
(21, 'Mengalir', 21, 16),
(22, 'Mengalir', 22, 9),
(23, 'Mengalir', 23, 6),
(24, 'Mengalir', 24, 20),
(25, 'Mengalir', 25, 10),
(26, 'Tetap', 1, 13),
(27, 'Tetap', 2, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) DEFAULT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('aktif','blokir') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password` (`password`),
  KEY `FK_sys_users_sys_group_users` (`id_group`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `id_group`, `nama_user`, `username`, `password`, `status`) VALUES
(1, 1, 'Wulan Sulistiasari', 'wulan', 'aae79912250d18756900f742270de7e1', 'aktif'),
(2, 2, 'Lani Karmila', 'lani', '56df0a643938f8bffe80b5ab44dfe284', 'aktif'),
(3, 3, 'Nira Sifaul', 'nira', '052769254f3c2739caa691e21431f027', 'aktif'),
(4, 2, 'Ipit Ipot', 'ipittt', '2de03b3df795018ad18c2a77307dd6e4', 'aktif'),
(5, 2, 'qw', 'qw', '006d2143154327a64d86a264aea225f3', 'aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
