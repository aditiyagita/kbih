-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Des 2014 pada 20.49
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_kbih`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getStatusActive`(IN `myusername` VARCHAR(70))
SELECT users.username 
FROM users
	JOIN jamaah ON users.iduser = jamaah.iduser
WHERE jamaah.status = 1
	AND users.idusertype = 2
	AND users.username = myusername$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_updated` date NOT NULL,
  PRIMARY KEY (`idarticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`idarticle`, `judul`, `isi`, `type`, `created_by`, `created_at`, `created_updated`) VALUES
(1, 'Profil KBIH Al-Karimiyah', 'asd saas sdfsef', 27, 0, '0000-00-00', '0000-00-00'),
(2, 'Contact KBIH Al-Karimiyah', 'ad', 28, 0, '0000-00-00', '0000-00-00'),
(3, 'Gallery ', 'fsdf', 27, 0, '0000-00-00', '0000-00-00'),
(4, 'Info Layanan Haji', 'sdfsa', 27, 0, '0000-00-00', '0000-00-00'),
(5, 'Info Layanan Umroh', 'sfsd', 27, 0, '0000-00-00', '0000-00-00'),
(6, 'Fasilitas Pelayanan Haji', 'Fasilitas Pelayanan Haji', 27, 0, '0000-00-00', '0000-00-00'),
(7, 'Persyaratan dan Ketentuan Haji', 'jsdfljsadofv sdfsdf asf as awd', 27, 0, '0000-00-00', '0000-00-00'),
(8, 'Persyaratan dan Ketentuan Umroh', 'adads', 27, 0, '0000-00-00', '0000-00-00'),
(9, 'Fasilitas Pelayanan Umroh', 'aksjdhash', 27, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE IF NOT EXISTS `bimbingan` (
  `idbimbingan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_bimbingan` date NOT NULL,
  `waktu_bimbingan_awal` time NOT NULL,
  `waktu_bimbingan_akhir` time NOT NULL,
  `tempat_bimbingan` varchar(20) NOT NULL,
  `nama_pembimbing` varchar(30) NOT NULL,
  PRIMARY KEY (`idbimbingan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`idbimbingan`, `tanggal_bimbingan`, `waktu_bimbingan_awal`, `waktu_bimbingan_akhir`, `tempat_bimbingan`, `nama_pembimbing`) VALUES
(2, '2014-12-05', '10:30:00', '13:00:00', 'Pamulang', 'Ustad Guntur Bumi'),
(3, '2014-12-21', '09:00:00', '11:00:00', 'Aula KBIH Al Karimiy', 'Ust. Zakaria');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cekkesehatan`
--

CREATE TABLE IF NOT EXISTS `cekkesehatan` (
  `idcekkesehatan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_pemeriksaan` varchar(100) NOT NULL,
  `waktu_pemeriksaan_mulai` time NOT NULL,
  `waktu_pemeriksaan_selesai` time NOT NULL,
  `tempat_pemeriksaan` varchar(50) NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`idcekkesehatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `cekkesehatan`
--

INSERT INTO `cekkesehatan` (`idcekkesehatan`, `jenis_pemeriksaan`, `waktu_pemeriksaan_mulai`, `waktu_pemeriksaan_selesai`, `tempat_pemeriksaan`, `tanggal_pemeriksaan`, `created_at`, `updated_at`) VALUES
(2, 'Medical Check Up', '00:20:12', '18:00:00', 'RS Fatmawati', '2014-12-01', '2014-12-01 00:00:00', '2014-12-20 00:00:00'),
(4, 'Test', '08:00:00', '13:00:00', 'Fatmawati', '2014-12-12', '2014-12-20 00:00:00', '2014-12-20 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `idchat` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  PRIMARY KEY (`idchat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`idchat`, `user1`, `user2`) VALUES
(1, 31, 1),
(2, 3, 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailcekkesehatan`
--

CREATE TABLE IF NOT EXISTS `detailcekkesehatan` (
  `iddetailcekkesehatan` int(11) NOT NULL AUTO_INCREMENT,
  `idcekkesehatan` int(11) NOT NULL,
  `idtransaksi` int(11) NOT NULL,
  PRIMARY KEY (`iddetailcekkesehatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `detailcekkesehatan`
--

INSERT INTO `detailcekkesehatan` (`iddetailcekkesehatan`, `idcekkesehatan`, `idtransaksi`) VALUES
(2, 2, 8),
(3, 2, 7),
(6, 4, 7),
(7, 4, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailchat`
--

CREATE TABLE IF NOT EXISTS `detailchat` (
  `iddetailchat` int(11) NOT NULL AUTO_INCREMENT,
  `idchat` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`iddetailchat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `detailchat`
--

INSERT INTO `detailchat` (`iddetailchat`, `idchat`, `to`, `isi`, `waktu`, `status`) VALUES
(1, 1, 1, 'oiii', '2014-12-13 01:28:33', 1),
(2, 1, 1, 'test..', '2014-12-13 01:28:43', 1),
(3, 2, 31, 'Selamaaat dataang yudhaa...', '2014-12-20 00:14:19', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpassport`
--

CREATE TABLE IF NOT EXISTS `detailpassport` (
  `iddetailpassport` int(11) NOT NULL AUTO_INCREMENT,
  `idpassport` int(11) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  PRIMARY KEY (`iddetailpassport`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `detailpassport`
--

INSERT INTO `detailpassport` (`iddetailpassport`, `idpassport`, `no_ktp`) VALUES
(2, 5, '38923423482'),
(3, 5, '1022389484'),
(4, 6, '38923423482'),
(5, 5, '198988059505'),
(6, 6, '198988059505'),
(7, 6, '1022389484');

-- --------------------------------------------------------

--
-- Struktur dari tabel `generic_master`
--

CREATE TABLE IF NOT EXISTS `generic_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(25) NOT NULL,
  `value` varchar(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `generic_master`
--

INSERT INTO `generic_master` (`id`, `desc`, `value`, `type`) VALUES
(1, 'A', '', 'GOL DARAH'),
(2, 'B', '', 'GOL DARAH'),
(3, 'AB', '', 'GOL DARAH'),
(4, 'O', '', 'GOL DARAH'),
(5, 'Orang Tua', '', 'MAHRAM'),
(6, 'Anak', '', 'MAHRAM'),
(7, 'Suami/Istri', '', 'MAHRAM'),
(8, 'Mertua', '', 'MAHRAM'),
(9, 'Saudara Kandung', '', 'MAHRAM'),
(10, 'Jamaah Biasa', '10000000', 'STATUS JAMAAH'),
(11, 'Jamaah Khusus', '15000000', 'STATUS JAMAAH'),
(13, 'Reguler', '12000000', 'PAKET UMRAH'),
(14, 'Plus', '13000000', 'PAKET UMRAH'),
(15, 'Executive', '14000000', 'PAKET UMRAH'),
(16, 'Lain', '15000000', 'PAKET UMRAH'),
(17, 'Double', '2000000', 'KAMAR'),
(18, 'Triple', '3000000', 'KAMAR'),
(19, 'Quad', '4000000', 'KAMAR'),
(20, 'Lain', '5000000', 'KAMAR'),
(21, 'Pernah', '', 'PERGI UMRAH'),
(22, 'Belum', '', 'PERGI UMRAH'),
(23, 'WNI', '', 'WARGANEGARA'),
(24, 'WNA', '', 'WARGANEGARA'),
(25, 'Pria', '', 'JK'),
(26, 'Wanita', '', 'JK'),
(27, 'Profil', '', 'ARTICLE PROFIL'),
(28, 'Contact', '', 'ARTICLE CONTACT'),
(29, 'Berita', '', 'ARTICLE BERITA'),
(30, 'Aktif', '', 'ACTIVATE'),
(31, 'Tidak Aktif', '', 'ACTIVATE'),
(32, 'Belum Lunas', '', 'PELUNASAN'),
(33, 'Lunas', '', 'PELUNASAN'),
(34, 'Accept', '', 'ACCEPTANCE'),
(35, 'Ignore', '', 'ACCEPTANCE'),
(36, 'Submit By Jamaah', '', 'ACCEPTANCE'),
(37, 'haji', '3000000', 'BIAYA'),
(38, 'umroh', '3000000', 'BIAYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah`
--

CREATE TABLE IF NOT EXISTS `jamaah` (
  `iduser` int(11) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_passport` varchar(20) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `ayah` varchar(60) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `rambut` varchar(20) NOT NULL,
  `alis` varchar(20) NOT NULL,
  `hidung` varchar(20) NOT NULL,
  `muka` varchar(20) NOT NULL,
  `tinggi` varchar(20) NOT NULL,
  `berat_badan` varchar(20) NOT NULL,
  `pendidikan` varchar(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `warga_negara` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `propinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gol_darah` int(3) NOT NULL,
  `status` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `pernah_haji_umroh` int(11) NOT NULL,
  `nama_mahram` varchar(20) NOT NULL,
  `hub_mahram` int(11) NOT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jamaah`
--

INSERT INTO `jamaah` (`iduser`, `no_ktp`, `no_passport`, `namalengkap`, `ayah`, `tempat_lahir`, `tanggal_lahir`, `umur`, `jenis_kelamin`, `rambut`, `alis`, `hidung`, `muka`, `tinggi`, `berat_badan`, `pendidikan`, `pekerjaan`, `warga_negara`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `propinsi`, `kode_pos`, `no_telp`, `gol_darah`, `status`, `foto`, `pernah_haji_umroh`, `nama_mahram`, `hub_mahram`) VALUES
(31, '1022389484', '', 'Yudha Pratama', 'Rofi', 'Bogor', '1991-06-20', 23, 25, 'Pendek', 'Tipis', 'Pesek', 'Bulet', '169', '64', 'SMK', 'Security', 23, 'Jalan bagus No.27', 'Cinangka', 'Sawangan', 'Depok', 'Jawa Barat', '16516', '02198878343', 1, 2, 'Yudha Pratama_1022389484.jpg', 22, 'Duan', 6),
(33, '198988059505', '', 'Muhammad Yasir', 'Nggak tau', 'Tangerang', '1991-01-12', 23, 25, 'Panjang', 'Kecil', 'Pesek', 'Kecil', '170', '65', 'S1', 'Mahasiswa', 23, 'Cengkareng', 'Cengkareng lama', 'Cengkareng Baru', 'Tangerang', 'Banten', '12456', '0219748483', 3, 2, 'Muhammad Yasir_198988059505.gif', 22, 'yazid a', 9),
(35, '232874847989', '', 'Ridas Santa Ramadhan', 'Mudair', 'Depok', '1995-08-07', 18, 25, 'Panjang', 'Tipis', 'Pesek', 'Kecil', '170', '60', 'STM', 'Mechanik', 23, 'Jalan raya abdul wahab', 'Cinangka', 'Sawangan', 'Depok', 'Jawa Barat', '16516', '0217984984', 3, 2, 'Ridas Santa Ramadhan_232874847989.jpg', 0, 'Tyas', 9),
(32, '38923423482', '', 'Aditiya Gita Amaranggana', 'Rahasia', 'Jakarta', '1991-04-22', 23, 25, 'Lurus', 'Tebal', 'Mancung', 'Oval', '175', '60', 'S1', 'Pegawai Swasta', 23, 'dsad', 'Benda Baru', 'Pamulang ', 'Tangsel', 'Jakarta', '15416', '123123', 1, 2, 'Aditiya Gita Amaranggana_38923423482.jpg', 22, 'asddsa', 6),
(34, '764764747895', '', 'Rindy Santa Amelia', 'Mudair', 'Bogor', '1990-12-10', 24, 26, 'Panjang', 'Tebal', 'Mancung', 'Kecil', '168', '55', 'D3', 'Karyawan swasta', 23, 'Cinangka Sawangan', 'Cinangka', 'Sawangan', 'Depok', 'Jawa Barat', '16516', '02197878984', 2, 2, 'Rindy Santa Amelia_764764747895.jpg', 22, 'Ridas', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `passport`
--

CREATE TABLE IF NOT EXISTS `passport` (
  `idpassport` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pembuatan` date NOT NULL,
  `waktu_pembuatan_awal` time NOT NULL,
  `waktu_pembuatan_akhir` time NOT NULL,
  `tempat_pembuatan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`idpassport`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `passport`
--

INSERT INTO `passport` (`idpassport`, `tanggal_pembuatan`, `waktu_pembuatan_awal`, `waktu_pembuatan_akhir`, `tempat_pembuatan`, `created_at`, `updated_at`) VALUES
(5, '2014-12-05', '08:00:00', '16:00:00', 'Imigrasi Jaksel', '2014-12-07 00:00:00', '2014-12-07 00:00:00'),
(6, '2014-12-23', '09:00:00', '11:00:00', 'Kantor imigrasi Depok', '2014-12-20 00:00:00', '2014-12-20 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `idpegawai` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`idpegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `iduser`, `namalengkap`, `alamat`) VALUES
(1, 1, 'Administrator', 'Administrator'),
(2, 3, 'Ketua', 'Ketua'),
(3, 15, 'Dssd', ''),
(4, 16, 'Keuangan', 'Keuanganfesd'),
(5, 17, 'kepalasekretariat', 'kepalasekretariat'),
(6, 18, 'frontoffice', 'frontoffice');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `idpembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `idtransaksi` int(11) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idpembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `idtransaksi`, `no_ktp`, `tanggal`, `total`, `status`) VALUES
(2, 7, '1022389484', '2014-12-13 00:00:00', '3000000', 34),
(3, 9, '198988059505', '2014-12-20 00:00:00', '2000000', 34),
(4, 8, '38923423482', '2014-12-20 00:00:00', '1500000', 34),
(5, 12, '1022389484', '2014-12-20 00:00:00', '1000000', 34),
(6, 12, '1022389484', '2014-12-20 00:00:00', '1000000', 35),
(7, 12, '1022389484', '2014-12-20 00:00:00', '1500000', 34),
(8, 14, '232874847989', '2014-12-20 00:00:00', '1500000', 34),
(9, 13, '764764747895', '2014-12-20 00:00:00', '3000000', 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `idpengeluaran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `unit` varchar(20) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  PRIMARY KEY (`idpengeluaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`idpengeluaran`, `tanggal`, `unit`, `harga_satuan`, `volume`, `harga_total`) VALUES
(3, '2014-12-06', 'Pakaian Ihram', 150000, 12, 1800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(20) NOT NULL,
  `no_spph` varchar(20) NOT NULL,
  `layanan` int(3) NOT NULL,
  `tahun_keberangkatan` varchar(4) NOT NULL,
  `bulan_keberangkatan` int(11) NOT NULL,
  `status_jamaah` int(11) NOT NULL,
  `paket` int(11) NOT NULL,
  `kamar` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `no_ktp`, `no_spph`, `layanan`, `tahun_keberangkatan`, `bulan_keberangkatan`, `status_jamaah`, `paket`, `kamar`, `total_biaya`, `status`) VALUES
(7, '1022389484', '129092302', 37, '2015', 8, 10, 0, 0, 3000000, 33),
(8, '38923423482', '23423423', 37, '2014', 11, 10, 0, 0, 3000000, 32),
(9, '198988059505', '', 38, '2015', 9, 0, 13, 17, 3000000, 32),
(10, '38923423482', '1871827223', 37, '2016', 7, 10, 0, 0, 3000000, 32),
(12, '1022389484', '', 38, '2014', 3, 0, 13, 18, 3000000, 32),
(13, '764764747895', '123345465', 37, '2016', 10, 10, 0, 0, 3000000, 32),
(14, '232874847989', '', 38, '2016', 10, 0, 13, 18, 3000000, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `idusertype` int(11) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `email`, `idusertype`) VALUES
(1, 'admin', '$2y$10$EtwvPR5uZNI39psgIu7IL.JU3Ze0ACdFZwtw4xZPneB5NdqS4Z0X.', 'staff@al-karimiyah.com', 1),
(3, 'ketua', '$2y$10$2B4Hvhnhq.u/lg.RyaGT3u2Hm4q.pz/7gG5EIgDwMT0o46xm.t87i', 'ketua@gmail.com', 3),
(16, 'keuangan', '$2y$10$tNM66RvYmckPvrD4k.VfIek61IVCAD/f5TSh1KzEd2oy4UTJZCkPy', 'keuangan@kbih.com', 6),
(17, 'kepalasekretariat', '$2y$10$kuds87WGBson4D/idnlFIeZ/bKyU5NGzUfurUo5a2TU8GBT6pizVy', 'kepalasekretariat@kbih.com', 5),
(31, 'yudha', '$2y$10$5Wte5k5JObSEZzTZRvA03eQAnQBA919IEWpLUN3FpjrtG1FXZkuGC', 'yudha@gmail.com', 2),
(32, 'aditiyagita', '$2y$10$49hd/vtYoMLaBn4eF125yemUYWkCZyaH8Wgy0yAXKc73HRGHm478K', 'aditiyagita@gmail.com', 2),
(33, 'yasir', '$2y$10$N5xa24vFgr5z9qOaifpoVen6dP9yxupNiWromCRm0LIFmIeVjctKa', 'yasir@gmail.com', 2),
(34, 'Rindy', '$2y$10$z5cR9BGXarwUwle4tHUcteqD1g343lanqpF7jblVmQeBHlrwLEmNm', 'Rindy@gmail.com', 2),
(35, 'ridas', '$2y$10$Gc2eAal1PQlKW8YyrQXcmOAzZaIHhH2xmIrESUPFLkNVqU.VCKtqS', 'Ridas@gmail.com', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `idusertype` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`idusertype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `usertype`
--

INSERT INTO `usertype` (`idusertype`, `nama`) VALUES
(1, 'Administrator'),
(2, 'Jamaah'),
(3, 'Ketua KBIH'),
(4, 'Front Office'),
(5, 'Kepala Sekretariat'),
(6, 'Keuangan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
