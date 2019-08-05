-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 12:10 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `futsaljakarta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
('1', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konfirmasi` varchar(20) NOT NULL,
  `id_sewa` varchar(20) NOT NULL,
  `id_pengelola` varchar(5) NOT NULL,
  `bukti` text NOT NULL,
  `tgl_konfirmasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_sewa`, `id_pengelola`, `bukti`, `tgl_konfirmasi`) VALUES
('K2019070001', 'S2019070006', 'P0001', 'bukti.jpg', '2019-07-24 14:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE IF NOT EXISTS `lapangan` (
  `id_lapangan` varchar(5) NOT NULL,
  `nama_lapangan` varchar(50) NOT NULL,
  `harga_lapangan` int(6) NOT NULL,
  `harga_lapangana` int(6) NOT NULL,
  `foto` longtext NOT NULL,
  `id_pengelola` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `nama_lapangan`, `harga_lapangan`, `harga_lapangana`, `foto`, `id_pengelola`) VALUES
('L0001', 'Mega Kuningan  Futsal A Lap. Kecil', 150000, 310000, 'IMG-20190723-WA0017.jpg', 'P0001'),
('L0002', 'Mega Kuningan  Futsal B Lap. Kecil', 150000, 310000, 'IMG-20190723-WA0018.jpg', 'P0001'),
('L0003', 'Mega Kuningan  Futsal Lap. Besar', 200000, 360000, 'IMG-20190723-WA0019.jpg', 'P0001'),
('L0004', 'Yanara Futsal', 150000, 200000, 'IMG-20190723-WA0013.jpg', 'P0007'),
('L0005', 'Matteo Futsal', 150000, 150000, 'IMG-20190723-WA0010.jpg', 'P0009'),
('L0006', 'JR Futsal', 75000, 160000, 'IMG-20190723-WA0009.jpg', 'P0008'),
('L0007', 'Gala Futsal', 160000, 200000, 'IMG-20190723-WA0015.jpg', 'P0005'),
('L0008', 'Oriental Futsal A', 135000, 175000, 'IMG-20190723-WA0008.jpg', 'P0006'),
('L0009', 'Oriental Futsal B', 135000, 175000, 'IMG-20190723-WA0007.jpg', 'P0006'),
('L0010', 'Jumpshoot Futsal', 135000, 175000, 'IMG-20190723-WA0016.jpg', 'P0003'),
('L0011', 'Kolin Futsal A', 150000, 240000, 'IMG-20190723-WA0011.jpg', 'P0010'),
('L0012', 'Kolin Futsal B', 150000, 240000, 'IMG-20190723-WA0012.jpg', 'P0011');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `id_sewa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `nohp`, `id_sewa`) VALUES
('PL201907240224380001', 'Ahmad Fachri', 'ahmadfachri990@gmail.com', '083897892230', 'S2019070001'),
('PL201907240228500403', 'Yuhasman', 'yuhasman@gmail.com', '08290099902', 'S2019070002'),
('PL201907240318150403', 'Abdul Fahmi', 'abd@gmail.com', '08288298999', 'S2019070003'),
('PL201907240327260404', 'Muhammad Deska Prayo', 'deska99@gmail.com', '083889899989', 'S2019070004'),
('PL201907240349090404', 'Mansyur', 'mansyur@gmail.com', '083897892230', 'S2019070005'),
('PL201907241435310404', 'Abdul Fahmi', 'abdul@gmail.com', '083897892230', 'S2019070006');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE IF NOT EXISTS `pengelola` (
  `id_pengelola` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_pengelola` varchar(20) NOT NULL,
  `nohppengelola` varchar(15) NOT NULL,
  `emailpengelola` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`id_pengelola`, `username`, `password`, `nama_pengelola`, `nohppengelola`, `emailpengelola`, `alamat`) VALUES
('P0001', 'megakuninganadmin', 'megakuninganadmin', 'Mega Kuningan Futsal', '082210522277', 'megakuningan@gmail.com', 'Jalan Guru Mughni Blok Batas No.4, RT.12/RW.1, Kuningan Timur, Kecamatan Setiabudi, RT.12/RW.1, Kuningan, Kuningan Tim., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950'),
('P0003', 'jumpshootadmin', 'jumpshootadmin', 'Jumpshoot Futsal', '081212777965', 'jumpshootadmin@gmail.com', ' Jl. Kb. Pala I No.288, RT.2/RW.16, Kb. Melati, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10230'),
('P0005', 'galafutsaladmin', 'galafutsaladmin', 'Gala Futsal', '08389792230', 'galafutsaladmin@gmail.com', 'Jl. Taman Sari Raya No.40, RT.4/RW.8, Maphar, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11160'),
('P0006', 'orientalfutsaladmin', 'orientalfutsaladmin', 'Oriental Futsal', '02180301888', 'orientalfutsal@gmail.com', 'Jl. Krekot Jaya No.4b, RT.1, Ps. Baru, Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10710'),
('P0007', 'yanaraadmin', 'yanaraadmin', 'Yanara Futsal', '081314174402', 'yanara@gmail.com', 'Jl. Sawo IV No.16, RT.1/RW.7, Manggarai Sel., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12860'),
('P0008', 'jrfutsaladmin', 'jrfutsaladmin', 'JR Futsal', '083808907281', 'jrfutsal@gmail.com', 'Jl. Raya Inpres No.35, RT.2/RW.3, Kramat Jati, Jakarta Timur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13520'),
('P0009', 'matteoadmin', 'matteoadmin', 'Matteo Futsal', '081808290983', 'matteofutsal@gmail.com', 'Jalan budi Tanjung Sanyang No.67, RT.02 rw 08, Cawang, Kramat jati, RT.2/RW.8, Cawang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13630'),
('P0010', 'kolinadmin', 'kolinadmin', 'Kolin Futsal', '08176340585', 'kolinfutsal@gmail.com', 'Jl. Tabah I No.4, RT.8/RW.2, Klp. Gading Bar., Kec. Klp. Gading, Kota Jakarta Utara, Daerah Khusus Ibukota Jakarta 14240');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE IF NOT EXISTS `sewa` (
  `id_sewa` varchar(20) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `jam_mulai` datetime NOT NULL,
  `jam_selesai` datetime NOT NULL,
  `lama_sewa` int(2) NOT NULL,
  `total` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `id_lapangan` varchar(5) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `id_pengelola` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `tgl_pesan`, `jam_mulai`, `jam_selesai`, `lama_sewa`, `total`, `status`, `id_lapangan`, `id_pelanggan`, `id_pengelola`) VALUES
('S2019070001', '2019-07-24 02:25:19', '2019-08-30 08:00:00', '2019-08-30 10:00:00', 2, '300000', 'Disewakan', 'L0001', 'PL201907240224380001', 'P0001'),
('S2019070002', '2019-07-24 02:29:34', '2019-07-25 08:00:00', '2019-07-25 09:00:00', 1, '200000', 'Disewakan', 'L0003', 'PL201907240228500403', 'P0001'),
('S2019070004', '2019-07-24 03:28:30', '2019-07-31 09:00:00', '2019-07-31 10:00:00', 1, '180000', 'Sudah Konfirmasi', 'L0013', 'PL201907240327260404', 'P0011'),
('S2019070005', '2019-07-24 03:49:44', '2019-08-09 20:00:00', '2019-08-09 22:00:00', 2, '360000', 'Sudah Konfirmasi', 'L0013', 'PL201907240349090404', 'P0011'),
('S2019070006', '2019-07-24 14:37:02', '2019-07-27 21:00:00', '2019-07-27 23:00:00', 2, '620000', 'Disewakan', 'L0002', 'PL201907241435310404', 'P0001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
 ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
 ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
 ADD PRIMARY KEY (`id_pengelola`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
 ADD PRIMARY KEY (`id_sewa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
