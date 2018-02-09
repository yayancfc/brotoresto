-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Feb 2018 pada 04.41
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_pak_broto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bhn` char(8) NOT NULL,
  `nama_bahan` varchar(30) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_exp` date DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `satuan` varchar(15) DEFAULT NULL,
  `id_pegawai` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bhn`, `nama_bahan`, `tgl_masuk`, `tgl_exp`, `stok`, `satuan`, `id_pegawai`) VALUES
('B001', 'Bawang Merah', '2018-02-05', '2018-02-28', 1000, 'gram', 'P003'),
('B002', 'Kecap', '2018-02-01', '2018-02-22', 1000, 'gram', 'P003'),
('B003', 'Garam', '2018-02-13', '2018-02-27', 982, 'gram', 'P003'),
('B004', 'Beras', '2018-02-03', '2018-08-03', 9600, 'gram', 'P003'),
('B005', 'Daun Salam', '2018-02-03', '2018-03-03', 981, 'gram', 'P003'),
('B006', 'Serai', '2018-02-03', '2018-03-03', 45, 'gram', 'P003'),
('B007', 'Daun Pandan', '2018-02-03', '2018-02-17', 99, 'gram', 'P003'),
('B008', 'Santan Kelapa', '2018-02-03', '2018-02-10', 1000, 'gram', 'P003'),
('B009', 'Air', '2018-02-03', '2018-03-03', 9800, 'gram', 'P003'),
('B010', 'Minyak Goreng', '2018-02-03', '2018-03-03', 4955, 'gram', 'P003'),
('B011', 'Daun Pisang', '2018-02-03', '2018-02-10', 99, 'gram', 'P003'),
('B012', 'Lidi', '2018-02-03', '2018-03-03', 99, 'gram', 'P003'),
('B013', 'Ikan Tongkol', '2018-02-03', '2018-03-03', 18000, 'gram', 'P003'),
('B014', 'Lada Putih', '2018-02-03', '2018-02-10', 2999, 'gram', 'P003'),
('B015', 'Jeruk Nipis', '2018-02-03', '2018-02-17', 3956, 'gram', 'P003'),
('B016', 'Bawang Putih', '2018-02-03', '2018-02-24', 2860, 'gram', 'P003'),
('B017', 'Cabe Merah', '2018-02-03', '2018-02-17', 4995, 'gram', 'P003'),
('B018', 'Cabe Keriting', '2018-02-03', '2018-02-17', 4995, 'gram', 'P003'),
('B019', 'Cabe Rawit', '2018-02-03', '2018-02-17', 1940, 'gram', 'P003'),
('B020', 'Jahe', '2018-02-03', '2018-02-24', 949, 'gram', 'P003'),
('B021', 'Tomat', '2018-02-03', '2018-02-17', 9920, 'gram', 'P003'),
('B022', 'Lemon', '2018-02-03', '2018-02-17', 3000, 'gram', 'P003'),
('B023', 'Kembang Kol', '2018-02-03', '2018-02-10', 5000, 'gram', 'P003'),
('B024', 'Daun Peterseli', '2018-02-03', '2018-02-17', 2000, 'gram', 'P003'),
('B025', 'Salmon', '2018-02-03', '2018-02-10', 17300, 'gram', 'P003'),
('B026', 'Telur', '2018-02-03', '2018-02-28', 4865, 'gram', 'P003'),
('B027', 'Krim', '2018-02-03', '2018-02-17', 3650, 'gram', 'P003'),
('B028', 'Tepung Roti', '2018-02-03', '2018-02-28', 4550, 'gram', 'P003'),
('B030', 'Saus Pesto', '2018-02-03', '2018-02-17', 3300, 'gram', 'P003'),
('B031', 'Sosis', '2018-02-03', '2018-02-21', 9100, 'gram', 'P003'),
('B032', 'Zaitun Hitam', '2018-02-03', '2018-02-24', 2955, 'gram', 'P003'),
('B033', 'Jagung', '2018-02-03', '2018-02-17', 5000, 'gram', 'P003'),
('B034', 'Bawang Bombai', '2018-02-03', '2018-02-24', 3100, 'gram', 'P003'),
('B035', 'Ayam', '2018-02-03', '2018-02-28', 6000, 'gram', 'P003'),
('B036', 'Daun Jeruk', '2018-02-03', '2018-02-10', 1986, 'gram', 'P003'),
('B037', 'Daun Kemangi', '2018-02-03', '2018-02-10', 1986, 'gram', 'P003'),
('B038', 'Daun Bawang', '2018-02-03', '2018-02-10', 1986, 'gram', 'P003'),
('B039', 'Daun Kunyit', '2018-02-03', '2018-02-10', 1986, 'gram', 'P003'),
('B040', 'Lada Hitam', '2018-02-03', '2018-02-28', 1963, 'gram', 'P003'),
('B041', 'Gula', '2018-02-03', '2018-02-17', 2973, 'gram', 'P003'),
('B042', 'Kunyit', '2018-02-03', '2018-02-17', 2967, 'gram', 'P003'),
('B043', 'Kemiri', '2018-02-03', '2018-02-17', 5949, 'gram', 'P003'),
('B044', 'Ikan Gurame', '2018-02-03', '2018-02-10', 3300, 'gram', 'P003'),
('B045', 'Sereh', '2018-02-03', '2018-02-17', 6982, 'gram', 'P003'),
('B046', 'Mentumin', '2018-02-03', '2018-02-28', 7955, 'gram', 'P003'),
('B047', 'Wortel', '2018-02-03', '2018-02-17', 8955, 'gram', 'P003'),
('B048', 'Cuka', '2018-02-03', '2018-02-17', 7910, 'gram', 'P003'),
('B049', 'Es Batu', '2018-02-03', '2018-03-01', 9000, 'gram', 'P003'),
('B050', 'Teh', '2018-02-03', '2018-03-31', 2998, 'gram', 'P003'),
('B051', 'Pisang', '2018-02-03', '2018-02-24', 4000, 'gram', 'P003'),
('B052', 'Alpukat', '2018-02-03', '2018-02-24', 3000, 'gram', 'P003'),
('B053', 'Susu', '2018-02-03', '2018-03-03', 43936, 'gram', 'P003'),
('B054', 'Kelapa', '2018-02-03', '2018-03-03', 6550, 'gram', 'P003'),
('B055', 'Nangka', '2018-02-03', '2018-02-17', 5850, 'gram', 'P003'),
('B056', 'Kurma', '2018-02-03', '2018-02-17', 3976, 'gram', 'P003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_menu`
--

CREATE TABLE `detail_menu` (
  `id_bhn` char(8) DEFAULT NULL,
  `id_menu` char(8) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_menu`
--

INSERT INTO `detail_menu` (`id_bhn`, `id_menu`, `jumlah`) VALUES
('B004', 'm007', 400),
('B003', 'm007', 1),
('B005', 'm007', 1),
('B006', 'm007', 1),
('B007', 'm007', 1),
('B008', 'm007', 500),
('B009', 'm007', 200),
('B010', 'm007', 40),
('B011', 'm007', 1),
('B012', 'm007', 1),
('B013', 'm007', 2000),
('B003', 'm007', 1),
('B014', 'm007', 1),
('B015', 'm007', 1),
('B016', 'm007', 5),
('B017', 'm007', 5),
('B018', 'm007', 5),
('B019', 'm007', 5),
('B020', 'm007', 3),
('B021', 'm007', 10),
('B010', 'm007', 5),
('B022', 'm008', 5),
('B016', 'm008', 3),
('B003', 'm008', 1),
('B023', 'm008', 10),
('B024', 'm008', 1),
('B025', 'm009', 300),
('B026', 'm009', 15),
('B027', 'm009', 150),
('B028', 'm009', 50),
('B034', 'm009', 100),
('B030', 'm009', 300),
('B031', 'm009', 100),
('B032', 'm009', 5),
('B035', 'm010', 2000),
('B015', 'm010', 5),
('B006', 'm010', 2),
('B036', 'm010', 2),
('B021', 'm010', 10),
('B037', 'm010', 2),
('B038', 'm010', 2),
('B039', 'm010', 2),
('B040', 'm010', 2),
('B003', 'm010', 1),
('B019', 'm010', 2),
('B020', 'm010', 6),
('B042', 'm010', 3),
('B043', 'm010', 3),
('B044', 'm011', 300),
('B015', 'm011', 2),
('B003', 'm011', 1),
('B045', 'm011', 2),
('B005', 'm011', 2),
('B019', 'm011', 5),
('B046', 'm011', 5),
('B047', 'm011', 5),
('B009', 'm011', 200),
('B048', 'm011', 10),
('B040', 'm011', 3),
('B016', 'm011', 15),
('B043', 'm011', 4),
('B020', 'm011', 2),
('B042', 'm011', 2),
('B021', 'm001', 150),
('B051', 'm004', 10),
('B052', 'm004', 7),
('B053', 'm004', 5),
('B053', 'm006', 20),
('B054', 'm006', 150),
('B055', 'm006', 50),
('B056', 'm005', 8),
('B053', 'm005', 8),
('B003', 'm012', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_pesanan` int(11) DEFAULT NULL,
  `id_menu` char(8) DEFAULT NULL,
  `jml_pesanan` int(6) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_kuisioner`
--

CREATE TABLE `hasil_kuisioner` (
  `id_pesanan` int(11) DEFAULT NULL,
  `kode_kuisioner` int(11) DEFAULT NULL,
  `hasil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuisioner`
--

CREATE TABLE `kuisioner` (
  `kode_kuisioner` int(11) NOT NULL,
  `pertanyaan` varchar(100) DEFAULT NULL,
  `id_pegawai` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuisioner`
--

INSERT INTO `kuisioner` (`kode_kuisioner`, `pertanyaan`, `id_pegawai`) VALUES
(4, 'Apakah Pelayanan kami memuaskan?', 'P004'),
(5, 'Apakah makanan yang dijasikan memuaskan?', 'P004'),
(6, 'Apakah tempat kami nyaman?', 'P004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `no_meja` int(11) NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `id_pegawai` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`no_meja`, `kapasitas`, `username`, `password`, `status`, `id_pegawai`) VALUES
(1, 10, 'meja1', 'meja1', 0, 'P001'),
(2, 6, 'meja2', 'meja2', 0, 'P001'),
(3, 8, 'meja3', 'meja3', 0, 'P001'),
(4, 5, 'meja4', 'meja4', 0, 'P001'),
(5, 10, 'meja5', 'meja5', 0, 'P001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` char(8) NOT NULL,
  `nama_menu` varchar(30) DEFAULT NULL,
  `jenis_menu` varchar(15) DEFAULT NULL,
  `kategori_menu` varchar(15) DEFAULT NULL,
  `harga_menu` int(11) DEFAULT NULL,
  `gambar` text NOT NULL,
  `id_pegawai` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis_menu`, `kategori_menu`, `harga_menu`, `gambar`, `id_pegawai`) VALUES
('m001', 'Jus Tomat', 'Minuman', 'Juice', 10000, 'jus_tomat.jpg', 'P003'),
('m004', 'Smoothie Alpukat Pisang', 'Minuman', 'Special', 20000, 'smoothie_alpukat_pisang.png', 'P003'),
('m005', 'Jus Kurma', 'Minuman', 'Juice', 15000, 'jus_kurma.png', 'P003'),
('m006', 'Es Teler', 'Minuman', 'Special', 25000, 'es_teler.png', 'P003'),
('m007', 'Nasi Bakar Ikan Tongkol', 'Makanan', 'Appetizer', 25000, 'nasi_bakar_ikan_tongkol.png', 'P003'),
('m008', 'Steak Kembang Kol Panggang', 'Makanan', 'Appetizer', 28000, 'steak_kembang_kol_panggang.png', 'P003'),
('m009', 'Terrine Salmon dan Sosis Hati', 'Makanan', 'Main Course', 35000, 'terrine_salmon_dan sosis_hati.png', 'P003'),
('m010', 'Ayam Woku', 'Makanan', 'Main Course', 40000, 'ayam_woku.png', 'P003'),
('m011', 'Pesmol Ikan', 'Makanan', 'Main Course', 55000, 'pesmol_ikan.png', 'P003'),
('m012', 'Ice Tea', 'minuman', 'Tea', 5000, 'file_1517761364.png', 'P003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` char(8) NOT NULL,
  `nama_pegawai` varchar(30) DEFAULT NULL,
  `alamat_pegawai` varchar(50) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `alamat_pegawai`, `no_hp`, `jabatan`, `username`, `password`) VALUES
('P001', 'Iqbal', 'Sekeloa', '082212121', 'Pelayan', 'pelayan', 'pelayan'),
('P002', 'Yayan', 'Dago', '082212121', 'Koki', 'koki', 'koki'),
('P003', 'Septa', 'Bogor', '082212121', 'Pantry', 'pantry', 'pantry'),
('P004', 'Adid', 'Sekeloa', '082212121', 'CS', 'cs', 'cs'),
('P005', 'Anugerah', 'Dago', '082212121', 'Kasir', 'kasir', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pegawai` char(8) DEFAULT NULL,
  `total_harga` int(8) DEFAULT NULL,
  `tgl_pemesanan` date DEFAULT NULL,
  `no_meja` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bhn`),
  ADD KEY `bahan_baku_ibfk_1` (`id_pegawai`);

--
-- Indexes for table `detail_menu`
--
ALTER TABLE `detail_menu`
  ADD KEY `id_bhn` (`id_bhn`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_pesanan_2` (`id_pesanan`),
  ADD KEY `id_pesanan_3` (`id_pesanan`),
  ADD KEY `id_pesanan_4` (`id_pesanan`),
  ADD KEY `id_pesanan_5` (`id_pesanan`),
  ADD KEY `id_pesanan_6` (`id_pesanan`),
  ADD KEY `id_pesanan_7` (`id_pesanan`);

--
-- Indexes for table `hasil_kuisioner`
--
ALTER TABLE `hasil_kuisioner`
  ADD KEY `kode_kuisioner` (`kode_kuisioner`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`kode_kuisioner`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `no_meja` (`no_meja`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `kode_kuisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_menu`
--
ALTER TABLE `detail_menu`
  ADD CONSTRAINT `detail_menu_ibfk_1` FOREIGN KEY (`id_bhn`) REFERENCES `bahan_baku` (`id_bhn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_kuisioner`
--
ALTER TABLE `hasil_kuisioner`
  ADD CONSTRAINT `hasil_kuisioner_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_kuisioner_ibfk_2` FOREIGN KEY (`kode_kuisioner`) REFERENCES `kuisioner` (`kode_kuisioner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD CONSTRAINT `kuisioner_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD CONSTRAINT `meja_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
