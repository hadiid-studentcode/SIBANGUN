-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 10:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibangun`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(20) NOT NULL,
  `kode_barang_masuk` int(20) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `kode_barang_masuk`, `harga_jual`, `stok_barang`) VALUES
(32, 30, 6000, 10),
(33, 31, 40000, 50),
(34, 32, 15000, 100),
(36, 34, 50000, 500),
(37, 35, 1500000, 500),
(38, 36, 70000, 100),
(39, 37, 20000, 10),
(40, 38, 85000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kode_barang_masuk` int(20) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `satuan_barang` varchar(11) DEFAULT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `id_suplier` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `status_barang_masuk` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`kode_barang_masuk`, `tanggal_masuk`, `nama_barang`, `harga_beli`, `satuan_barang`, `jumlah_masuk`, `id_suplier`, `id_user`, `status_barang_masuk`) VALUES
(30, '2022-02-17', 'keramik dinding 20 * 25 cm', 40000, 'm3', 10, 57, 23, 'ACC'),
(31, '2022-02-17', 'Semen warna', 35000, 'kg', 50, 58, 23, 'ACC'),
(32, '0000-00-00', 'besi beton polos', 12000, 'kg', 100, 59, 23, 'ACC'),
(33, '0000-00-00', 'bata merah', 650, 'unit', 500, 60, 23, 'ACC'),
(34, '0000-00-00', 'atap metal pasir sakura roof 77 * 80 cm', 42000, 'lembar', 500, 61, 23, 'ACC'),
(35, '2022-02-17', 'pintu besi lady 86 * 250 cm', 1400000, 'lembar', 500, 62, 23, 'ACC'),
(36, '0000-00-00', 'gypsum jayaboard 120 * 40 cm', 65000, 'lembar', 100, 63, 23, 'ACC'),
(37, '2022-02-17', 'lantai kayu jati ', 170000, 'lembar', 10, 64, 23, 'ACC'),
(38, '2022-02-17', 'cat tembok vinilex ', 47000, 'kg', 100, 65, 23, 'ACC'),
(39, '0000-00-00', 'pasir merapi', 1100000, 'rit', 5, 66, 23, 'NO ACC');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_gudang`
--

CREATE TABLE `pegawai_gudang` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `no_telp_pegawai` varchar(40) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tl_pegawai` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_gudang`
--

INSERT INTO `pegawai_gudang` (`id_pegawai`, `nama_pegawai`, `alamat_pegawai`, `no_telp_pegawai`, `tempat_lahir`, `tl_pegawai`, `id_user`) VALUES
(5, 'Arief Widi Pratama', 'jalan suka karya', '082739182', 'pekanbaru', '1993-02-10', 24);

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama_pemilik` varchar(20) NOT NULL,
  `alamat_pemilik` text NOT NULL,
  `no_telp_pemilik` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_pemilik`, `alamat_pemilik`, `no_telp_pemilik`, `id_user`) VALUES
(3, 'hadiid andri yulison', 'jalan cipta karya perumahan griya cipta blok.p12', '089620569613', 23);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_transaksi` int(11) DEFAULT NULL,
  `kode_barang` int(20) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `kode_barang`, `jumlah_beli`, `total_harga`) VALUES
(NULL, 39, 1, 20000),
(NULL, 32, 1, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(45) NOT NULL,
  `alamat_suplier` text NOT NULL,
  `no_telp_suplier` varchar(40) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat_suplier`, `no_telp_suplier`, `keterangan`) VALUES
(57, 'PT keramik diamond industries', 'jl. Semeru no.99B, Babakan Surabaya, Lakarsantri, Gresik', '0317662581', 'Keramik'),
(58, 'Distributor Semen Conch Surabaya', 'Pergudangan Margomulyo Jaya C20 22, Jl. Sentong Asri, Balongsari, Tandes, Kota SBY', '082125021333', 'Semen'),
(59, 'PT. The master steel mfg', 'JL. Pangeran jayakarta 107 Jakarta Pusat', '0216393608', 'Besi Beton'),
(60, 'PT. Prima Rezeki Pertiwi', 'Menara Sudirman Lantai 11 Jenderal Suidrman Kav. 60 Jakarta 12190', '02152921135', 'Bata Ringan'),
(61, 'PT. Alsun Suksesindo', 'Jl. Mitra Sunter Boulevard Blok B-21 Jakarta', '0216508026', 'Atap Metal'),
(62, 'PT. Bostinco', 'Jl. Raya Cileungsi - Bekasi KM. 22,5', '0218230494', 'Pintu Besi'),
(63, 'PT. Siam-Indo Gypsum Industry', 'Jl. Inspeksi Kalimalang Km. 2, Cibitung', '02188320028', 'Papan Gipsum'),
(64, 'PT. Grha Inti Makmur', 'Jl. Kamal Raya Outer Ring Road', '02137773331', 'Lantai Kayu'),
(65, 'PT. Ici Paints Indonesia', 'Jl. Boulevard Bintaro Blok B7/B1 No.05 - Bintari Jaya Sektor 7', '0217456777', 'Cat'),
(66, 'CV. Jayawan', 'Jl. Grand Nusa Indah No.69', '081287030528', 'Pasir');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `nama_pembeli` varchar(45) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `uang_kembalian` int(11) NOT NULL,
  `jenis_pembayaran` varchar(45) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `tanggal_transaksi`, `nama_pembeli`, `sub_total`, `uang_kembalian`, `jenis_pembayaran`, `Keterangan`, `id_user`) VALUES
(18, '20220220', '2022-02-20', 'arief widi pratama', 26000, 24000, 'Transfer', 'lunas', 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nip`, `username`, `password`, `level`) VALUES
(23, 'hadiidandri2000@gmail.com', '200402076', 'hadiidandriy12', '123', 'admin'),
(24, 'ariefwidipratama1000@gmail.com', '20038918', 'arief', '321', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_barang_masuk` (`kode_barang_masuk`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kode_barang_masuk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_suplier` (`id_suplier`);

--
-- Indexes for table `pegawai_gudang`
--
ALTER TABLE `pegawai_gudang`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barangkeluar` (`kode_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `kode_barang_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pegawai_gudang`
--
ALTER TABLE `pegawai_gudang`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_barang_masuk`) REFERENCES `barang_masuk` (`kode_barang_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai_gudang`
--
ALTER TABLE `pegawai_gudang`
  ADD CONSTRAINT `pegawai_gudang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD CONSTRAINT `pemilik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
