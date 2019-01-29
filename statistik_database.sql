-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 08:39 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `statistik_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `foto_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id`, `id_user`, `nip`, `nama`, `golongan`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `jenis_kelamin`, `foto_profil`) VALUES
(1, 1, '21120114120021', 'Admin Sistem', '1', 'batang', '0000-00-00', 'S1', 'L', 'kepsek.png'),
(2, 2, '21120114120021', 'Camat', '1', 'boyolali', '0000-00-00', 'S1', 'L', 'kepsek.png'),
(3, 3, '21120114120021', 'Staf', '2', 'solo', '0000-00-00', 'S1', 'L', 'kepsek.png'),
(4, 4, '4', 'f', 'f', 'f', '2019-01-02', 'f', 'L', 'f'),
(5, 5, 'dd', 'dd', 'dd', 'dd', '2019-01-10', 'dd', 'L', 'dd'),
(6, 6, 'dd', 'dd', 'dd', 'dd', '2019-01-09', 'dd', 'P', 'dd'),
(7, 7, 'ff', 'ff', 'ff', 'ff', '2019-01-17', 'ff', 'P', 'fff'),
(8, 8, 'ef', 'fef', 'fe', 'fef', '0000-00-00', 'fw', 'L', 'fwf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_desa` int(11) NOT NULL,
  `nama_desa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_desa`
--

INSERT INTO `tb_desa` (`id_desa`, `nama_desa`) VALUES
(1, 'Glintang'),
(2, 'Jatisari'),
(3, 'Canden'),
(4, 'Senting'),
(5, 'Tempursari'),
(6, 'Sandi'),
(7, 'Demangan'),
(8, 'Kepoh'),
(9, 'Jagoan'),
(10, 'Babadan'),
(11, 'Tawengan'),
(12, 'Catur'),
(13, 'Ngaglik'),
(14, 'Troboso'),
(15, 'Cermo'),
(16, 'Nglembu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jarak_desa`
--

CREATE TABLE `tb_jarak_desa` (
  `id` int(11) NOT NULL,
  `id_desa_awal` int(11) DEFAULT NULL,
  `id_desa_akhir` int(11) DEFAULT NULL,
  `jarak` int(11) NOT NULL DEFAULT '0',
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kependudukan`
--

CREATE TABLE `tb_kependudukan` (
  `id_desa` int(11) NOT NULL,
  `laki_laki` int(11) NOT NULL,
  `perempuan` int(11) NOT NULL DEFAULT '0',
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kependudukan`
--

INSERT INTO `tb_kependudukan` (`id_desa`, `laki_laki`, `perempuan`, `tahun`) VALUES
(1, 1212, 3131, 2018),
(2, 55, 44, 2018),
(16, 111, 111, 2011);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kependudukan_umur`
--

CREATE TABLE `tb_kependudukan_umur` (
  `id` int(11) NOT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kependudukan_umur`
--

INSERT INTO `tb_kependudukan_umur` (`id`, `id_desa`, `umur`, `jenis_kelamin`, `jumlah`) VALUES
(1, 1, '5-10', 'L', 100),
(2, 2, '5-10', 'P', 100),
(7, 16, '5-10', 'L', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_luas_tanah_kering`
--

CREATE TABLE `tb_luas_tanah_kering` (
  `id_desa` int(11) NOT NULL,
  `perkarangan_bangunan` int(11) DEFAULT NULL,
  `tegal_kebun` int(11) DEFAULT NULL,
  `padang_gembala` int(11) DEFAULT NULL,
  `tambak_kolam` int(11) DEFAULT NULL,
  `hutan_negara` int(11) DEFAULT NULL,
  `perkebunan_negara` int(11) DEFAULT NULL,
  `lainnya` int(11) DEFAULT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_luas_tanah_kering`
--

INSERT INTO `tb_luas_tanah_kering` (`id_desa`, `perkarangan_bangunan`, `tegal_kebun`, `padang_gembala`, `tambak_kolam`, `hutan_negara`, `perkebunan_negara`, `lainnya`, `jumlah`) VALUES
(1, 5, 1, 1, 1, 1, 1, 1, 1),
(16, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_luas_tanah_sawah`
--

CREATE TABLE `tb_luas_tanah_sawah` (
  `id_desa` int(11) NOT NULL,
  `irigasi_teknis` int(11) DEFAULT '0',
  `irigasi_setengah_teknis` int(11) DEFAULT '0',
  `irigasi_sederhana` int(11) DEFAULT '0',
  `hujan_tadah` int(11) DEFAULT '0',
  `jumlah` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_luas_tanah_sawah`
--

INSERT INTO `tb_luas_tanah_sawah` (`id_desa`, `irigasi_teknis`, `irigasi_setengah_teknis`, `irigasi_sederhana`, `hujan_tadah`, `jumlah`) VALUES
(1, 710000, 50000, 140000, 23650, 1373650),
(2, 1, 1, 1, 1, 1),
(16, 100, 99, 99, 99, 99);

-- --------------------------------------------------------

--
-- Table structure for table `tb_luas_wilayah`
--

CREATE TABLE `tb_luas_wilayah` (
  `id_desa` int(11) NOT NULL,
  `luas_wilayah` int(11) DEFAULT '0',
  `tanah_sawah` int(11) DEFAULT '0',
  `tanah_kering` int(11) DEFAULT '0',
  `tahun` year(4) DEFAULT '2018'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_luas_wilayah`
--

INSERT INTO `tb_luas_wilayah` (`id_desa`, `luas_wilayah`, `tanah_sawah`, `tanah_kering`, `tahun`) VALUES
(1, 2565000, 1373650, 1191350, 2018),
(2, 11, 1, 1, 2018),
(3, 1, 0, 0, 2018),
(4, 0, 0, 0, 2018),
(5, 1, 0, 0, 2050),
(16, 111, 111, 111, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mutasi_kependudukan`
--

CREATE TABLE `tb_mutasi_kependudukan` (
  `id_desa` int(11) NOT NULL,
  `jenis_mutasi` enum('kematian','kelahiran','datang','pergi') NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mutasi_kependudukan`
--

INSERT INTO `tb_mutasi_kependudukan` (`id_desa`, `jenis_mutasi`, `jenis_kelamin`, `jumlah`, `tahun`) VALUES
(1, 'kematian', 'L', 111, 2018),
(2, 'kematian', 'L', 111, 2001),
(15, 'kematian', 'L', 12, 2011);

-- --------------------------------------------------------

--
-- Table structure for table `tb_panen_produksi`
--

CREATE TABLE `tb_panen_produksi` (
  `id_desa` int(11) NOT NULL,
  `luas_panen` int(11) DEFAULT NULL,
  `rata_rata_produksi` int(11) DEFAULT NULL,
  `produksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_panen_produksi`
--

INSERT INTO `tb_panen_produksi` (`id_desa`, `luas_panen`, `rata_rata_produksi`, `produksi`) VALUES
(1, 358, 8160, 210528),
(4, 12, 1, 1),
(16, 11, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembagian_desa`
--

CREATE TABLE `tb_pembagian_desa` (
  `id_desa` int(11) NOT NULL,
  `dukuh` int(11) NOT NULL DEFAULT '0',
  `dusun` int(11) NOT NULL DEFAULT '0',
  `rw` int(11) NOT NULL DEFAULT '0',
  `rt` int(11) NOT NULL DEFAULT '0',
  `tahun` year(4) NOT NULL DEFAULT '2018'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembagian_desa`
--

INSERT INTO `tb_pembagian_desa` (`id_desa`, `dukuh`, `dusun`, `rw`, `rt`, `tahun`) VALUES
(1, 111, 111, 111, 111, 2018),
(2, 10, 10, 10, 10, 2018),
(10, 1, 1, 1, 1, 2001),
(15, 123, 12, 1, 1, 2001);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pln_pdam`
--

CREATE TABLE `tb_pln_pdam` (
  `id_desa` int(11) NOT NULL,
  `rumah_tangga` int(11) DEFAULT NULL,
  `pelanggan_pln` int(11) DEFAULT NULL,
  `pelanggan_pdam` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT '2018'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pln_pdam`
--

INSERT INTO `tb_pln_pdam` (`id_desa`, `rumah_tangga`, `pelanggan_pln`, `pelanggan_pdam`, `tahun`) VALUES
(1, 23, 23, 23, 2018),
(2, 1, 1, 1, 2019),
(3, 1, 1, 1, 2018),
(16, 600, 600, 600, 2011);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanah_bengkok`
--

CREATE TABLE `tb_tanah_bengkok` (
  `id_desa` int(11) NOT NULL,
  `bengkok_sawah` int(11) NOT NULL DEFAULT '0',
  `bengkok_lahan_kering` int(11) NOT NULL DEFAULT '0',
  `kas_sawah` int(11) NOT NULL DEFAULT '0',
  `kas_lahan_kering` int(11) NOT NULL DEFAULT '0',
  `tahun` year(4) DEFAULT '2018'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tanah_bengkok`
--

INSERT INTO `tb_tanah_bengkok` (`id_desa`, `bengkok_sawah`, `bengkok_lahan_kering`, `kas_sawah`, `kas_lahan_kering`, `tahun`) VALUES
(1, 11111, 1111, 111111, 11111, 2018),
(2, 1, 0, 0, 0, 2018),
(4, 1, 1, 1, 1, 2001),
(16, 11, 11, 11, 11, 2011);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(20) NOT NULL,
  `bagian` varchar(20) NOT NULL DEFAULT 'camat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `privilege`, `bagian`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin'),
(2, 'camat', '93b89e6160d6c85d709954ce733d5eec131ab0a0', 'camat', 'camat'),
(3, 'wilayah', '8f5dc3bdc21a52f7d7e2dc490edabddd694e1091', 'staf', 'wilayah'),
(4, 'pemerintah', '5e4ee77a02a255342f6cf0fa66fb71b2ccadfb1b', 'staf', 'pemerintah'),
(5, 'penduduk', '230ec8df3aca17589bbc37b1fa6b1b37d295ef18', 'staf', 'penduduk'),
(6, 'pertanahan', '09661562ef1ba7f49247c59ca9f03f1b5bd5490e', 'staf', 'pertanahan'),
(7, 'pertanian', 'ad228250e4a6e16050be99fe165c3f11377a0984', 'staf', 'pertanian'),
(8, 'listrik', 'bfd6e0da9248f7944d3c425987727296ca20ae64', 'staf', 'listrik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_jarak_desa`
--
ALTER TABLE `tb_jarak_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kependudukan`
--
ALTER TABLE `tb_kependudukan`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_kependudukan_umur`
--
ALTER TABLE `tb_kependudukan_umur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_luas_tanah_kering`
--
ALTER TABLE `tb_luas_tanah_kering`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_luas_tanah_sawah`
--
ALTER TABLE `tb_luas_tanah_sawah`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_luas_wilayah`
--
ALTER TABLE `tb_luas_wilayah`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_mutasi_kependudukan`
--
ALTER TABLE `tb_mutasi_kependudukan`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_panen_produksi`
--
ALTER TABLE `tb_panen_produksi`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_pembagian_desa`
--
ALTER TABLE `tb_pembagian_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_pln_pdam`
--
ALTER TABLE `tb_pln_pdam`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_tanah_bengkok`
--
ALTER TABLE `tb_tanah_bengkok`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_jarak_desa`
--
ALTER TABLE `tb_jarak_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kependudukan`
--
ALTER TABLE `tb_kependudukan`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_kependudukan_umur`
--
ALTER TABLE `tb_kependudukan_umur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_luas_tanah_kering`
--
ALTER TABLE `tb_luas_tanah_kering`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_luas_tanah_sawah`
--
ALTER TABLE `tb_luas_tanah_sawah`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_luas_wilayah`
--
ALTER TABLE `tb_luas_wilayah`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_mutasi_kependudukan`
--
ALTER TABLE `tb_mutasi_kependudukan`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_panen_produksi`
--
ALTER TABLE `tb_panen_produksi`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pembagian_desa`
--
ALTER TABLE `tb_pembagian_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pln_pdam`
--
ALTER TABLE `tb_pln_pdam`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_tanah_bengkok`
--
ALTER TABLE `tb_tanah_bengkok`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD CONSTRAINT `data_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
