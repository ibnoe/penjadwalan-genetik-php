-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4779
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for penjadwalan_genetik_web
CREATE DATABASE IF NOT EXISTS `penjadwalan_genetik_web` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `penjadwalan_genetik_web`;


-- Dumping structure for table penjadwalan_genetik_web.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `kode` int(2) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

-- Dumping data for table penjadwalan_genetik_web.dosen: ~52 rows (approximately)
DELETE FROM `dosen`;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` (`kode`, `nidn`, `nama`, `alamat`, `telp`) VALUES
	(1, '', 'Erlin, Dr. M.Kom ', '', ''),
	(2, '', 'Triyani Arita Fitri, M.Kom \r\n', '', ''),
	(3, '', 'Karpen, M.Kom ', '', ''),
	(4, '', 'Helda Yenni, M.Kom ', '', ''),
	(37, NULL, 'Rini Yanti, S.Si', NULL, NULL),
	(38, NULL, 'Tat Marlina, MH', NULL, NULL),
	(39, NULL, 'Susi Erlinda, M.Kom ', NULL, NULL),
	(40, NULL, 'Yoso frenaguna, S.Kom ', NULL, NULL),
	(41, NULL, 'Elgamar, S.Kom ', NULL, NULL),
	(42, NULL, 'Fransiskus Z, S.Kom ', NULL, NULL),
	(43, NULL, 'Hamdani, M.Kom ', NULL, NULL),
	(44, NULL, 'Herwin, M.Kom ', NULL, NULL),
	(45, NULL, 'Irawati Sastra, S.Kom ', NULL, NULL),
	(46, NULL, 'Tashid, M.Kom ', NULL, NULL),
	(47, '12345', 'Agung Setiawan, S.Kom, MM', '', ''),
	(48, NULL, 'Suprasman,Drs. MM', NULL, NULL),
	(49, NULL, 'Dewi Sari Wahyuni, M.Pd', NULL, NULL),
	(50, NULL, 'Jusniwati, S.Pd', NULL, NULL),
	(51, NULL, 'Masduki, S.Pd', NULL, NULL),
	(52, NULL, 'Hidayati Azizah, S.Si', NULL, NULL),
	(53, NULL, 'Firman Edigan, M.Pd ', NULL, NULL),
	(54, NULL, 'Rahmiati, M.Kom ', NULL, NULL),
	(55, NULL, 'Dwi Haryono, M.Kom ', NULL, NULL),
	(56, NULL, 'Riati, M.Si', NULL, NULL),
	(57, NULL, 'Rahmaddeni, S.Kom ', NULL, NULL),
	(58, NULL, 'Robinson, M.Sc', NULL, NULL),
	(59, NULL, 'Sabam Parjuangan, M.Kom ', NULL, NULL),
	(60, NULL, 'Corina Tri Handayani, MM', NULL, NULL),
	(61, NULL, 'Herispon, M.Si ', NULL, NULL),
	(62, NULL, 'Kastanti, SE ', NULL, NULL),
	(63, NULL, 'Torkis Nasution, M.Kom ', NULL, NULL),
	(64, NULL, 'T. Sy. Eiva Fatdha, M.Kom ', NULL, NULL),
	(65, NULL, 'Syahrul Imardi, M.T', NULL, NULL),
	(66, NULL, 'Nova Rahmi, S.Kom ', NULL, NULL),
	(67, NULL, 'Iwan Iskandar, MT', NULL, NULL),
	(68, NULL, 'Nurjayadi, S.Kom ', NULL, NULL),
	(69, NULL, 'Mar\'aini, MM', NULL, NULL),
	(70, NULL, 'Lusiana, M.Kom ', NULL, NULL),
	(71, NULL, 'Surya Syahrani, S.Kom ', NULL, NULL),
	(72, NULL, 'Misbah Hayati, S.Pd', NULL, NULL),
	(73, NULL, 'Koko Harianto, S.Kom ', NULL, NULL),
	(74, NULL, 'Khusaeri Andesa, S.Kom ', NULL, NULL),
	(75, NULL, 'Susanti, M.IT', NULL, NULL),
	(76, NULL, 'Sujiwo, S.Kom ', NULL, NULL),
	(77, NULL, 'Imelda Yance, M.Pd', NULL, NULL),
	(78, NULL, 'Wirta Agustin, S.Kom ', NULL, NULL),
	(79, NULL, 'Unang Rio, M.Kom ', NULL, NULL),
	(80, NULL, 'Susandri, M.Kom ', NULL, NULL),
	(81, NULL, 'Edwar Ali, M.Kom ', NULL, NULL),
	(82, NULL, 'Dadang Iskandar,Prof. M.Sc', NULL, NULL),
	(83, NULL, 'Alber, M.Pd', NULL, NULL),
	(84, NULL, 'Selamet Wahyudi,Dr', NULL, NULL);
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;


-- Dumping structure for table penjadwalan_genetik_web.hari
CREATE TABLE IF NOT EXISTS `hari` (
  `kode` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table penjadwalan_genetik_web.hari: ~6 rows (approximately)
DELETE FROM `hari`;
/*!40000 ALTER TABLE `hari` DISABLE KEYS */;
INSERT INTO `hari` (`kode`, `nama`) VALUES
	(1, 'Senin'),
	(2, 'Selasa'),
	(3, 'Rabu'),
	(4, 'Kamis'),
	(5, 'Jumat'),
	(6, 'Sabtu');
/*!40000 ALTER TABLE `hari` ENABLE KEYS */;


-- Dumping structure for table penjadwalan_genetik_web.jadwalkuliah
CREATE TABLE IF NOT EXISTS `jadwalkuliah` (
  `kode` int(10) NOT NULL AUTO_INCREMENT,
  `kode_pengampu` int(10) DEFAULT NULL,
  `kode_jam` int(10) DEFAULT NULL,
  `kode_hari` int(10) DEFAULT NULL,
  `kode_ruang` int(10) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1 COMMENT='hasil proses';

-- Dumping data for table penjadwalan_genetik_web.jadwalkuliah: ~149 rows (approximately)
DELETE FROM `jadwalkuliah`;
/*!40000 ALTER TABLE `jadwalkuliah` DISABLE KEYS */;
INSERT INTO `jadwalkuliah` (`kode`, `kode_pengampu`, `kode_jam`, `kode_hari`, `kode_ruang`) VALUES
	(1, 1, 2, 6, 8),
	(2, 2, 9, 6, 11),
	(3, 3, 9, 2, 9),
	(4, 4, 1, 5, 6),
	(5, 5, 7, 3, 1),
	(6, 6, 2, 5, 5),
	(7, 7, 3, 6, 1),
	(8, 8, 3, 2, 6),
	(9, 9, 7, 6, 11),
	(10, 10, 8, 1, 16),
	(11, 11, 4, 4, 8),
	(12, 12, 7, 2, 9),
	(13, 13, 2, 4, 15),
	(14, 14, 9, 6, 8),
	(15, 15, 10, 2, 3),
	(16, 16, 2, 5, 4),
	(17, 17, 9, 4, 12),
	(18, 18, 1, 1, 16),
	(19, 19, 10, 3, 12),
	(20, 20, 3, 1, 4),
	(21, 21, 8, 4, 11),
	(22, 22, 4, 3, 5),
	(23, 23, 3, 1, 1),
	(24, 24, 9, 1, 3),
	(25, 25, 10, 2, 7),
	(26, 26, 2, 3, 13),
	(27, 27, 8, 2, 6),
	(28, 32, 5, 2, 5),
	(29, 33, 5, 4, 7),
	(30, 34, 8, 1, 12),
	(31, 36, 8, 6, 21),
	(32, 37, 7, 5, 22),
	(33, 38, 4, 4, 15),
	(34, 39, 5, 3, 15),
	(35, 40, 1, 1, 7),
	(36, 41, 7, 4, 5),
	(37, 42, 4, 6, 14),
	(38, 43, 8, 1, 9),
	(39, 44, 1, 6, 3),
	(40, 45, 8, 4, 10),
	(41, 47, 2, 1, 14),
	(42, 48, 7, 6, 14),
	(43, 49, 10, 3, 16),
	(44, 50, 1, 6, 16),
	(45, 51, 8, 5, 9),
	(46, 52, 6, 2, 14),
	(47, 53, 5, 6, 10),
	(48, 54, 6, 3, 6),
	(49, 55, 1, 1, 8),
	(50, 56, 1, 2, 12),
	(51, 57, 3, 6, 12),
	(52, 58, 7, 2, 8),
	(53, 59, 7, 5, 12),
	(54, 60, 6, 1, 9),
	(55, 61, 1, 1, 3),
	(56, 62, 2, 3, 1),
	(57, 63, 9, 5, 6),
	(58, 64, 4, 4, 11),
	(59, 65, 4, 6, 3),
	(60, 66, 1, 1, 5),
	(61, 67, 6, 2, 6),
	(62, 68, 1, 5, 9),
	(63, 69, 5, 4, 6),
	(64, 70, 4, 2, 9),
	(65, 71, 9, 1, 8),
	(66, 72, 2, 1, 15),
	(67, 73, 8, 4, 13),
	(68, 74, 10, 2, 5),
	(69, 75, 4, 4, 10),
	(70, 76, 8, 2, 3),
	(71, 77, 5, 4, 4),
	(72, 78, 4, 2, 14),
	(73, 79, 10, 1, 16),
	(74, 80, 7, 5, 15),
	(75, 82, 3, 3, 6),
	(76, 83, 7, 6, 13),
	(77, 84, 8, 3, 13),
	(78, 85, 3, 3, 2),
	(79, 86, 7, 4, 21),
	(80, 87, 3, 6, 19),
	(81, 88, 6, 2, 16),
	(82, 89, 4, 6, 4),
	(83, 92, 1, 4, 14),
	(84, 93, 7, 5, 7),
	(85, 94, 1, 2, 9),
	(86, 95, 1, 6, 10),
	(87, 96, 5, 6, 1),
	(88, 97, 7, 4, 8),
	(89, 98, 3, 6, 15),
	(90, 99, 7, 1, 15),
	(91, 100, 4, 2, 2),
	(92, 101, 10, 2, 2),
	(93, 102, 6, 3, 4),
	(94, 103, 1, 1, 10),
	(95, 104, 8, 4, 16),
	(96, 105, 3, 4, 1),
	(97, 106, 4, 1, 2),
	(98, 107, 1, 2, 3),
	(99, 108, 8, 2, 13),
	(100, 109, 1, 3, 3),
	(101, 110, 2, 2, 15),
	(102, 111, 5, 2, 12),
	(103, 112, 9, 6, 7),
	(104, 113, 4, 3, 7),
	(105, 114, 3, 4, 14),
	(106, 115, 6, 4, 1),
	(107, 116, 9, 4, 4),
	(108, 117, 2, 6, 13),
	(109, 118, 8, 3, 14),
	(110, 119, 4, 1, 12),
	(111, 120, 7, 6, 9),
	(112, 121, 4, 3, 11),
	(113, 122, 1, 5, 7),
	(114, 123, 1, 6, 11),
	(115, 124, 6, 6, 3),
	(116, 125, 2, 3, 14),
	(117, 126, 3, 2, 4),
	(118, 127, 3, 2, 13),
	(119, 128, 10, 4, 8),
	(120, 129, 9, 2, 12),
	(121, 130, 9, 5, 8),
	(122, 131, 5, 1, 14),
	(123, 132, 1, 5, 1),
	(124, 133, 8, 2, 7),
	(125, 134, 3, 4, 16),
	(126, 144, 6, 1, 7),
	(127, 145, 4, 4, 13),
	(128, 146, 5, 2, 7),
	(129, 147, 10, 5, 1),
	(130, 148, 4, 1, 5),
	(131, 149, 10, 5, 10),
	(132, 150, 6, 2, 4),
	(133, 151, 7, 4, 14),
	(134, 152, 3, 6, 5),
	(135, 153, 3, 2, 16),
	(136, 154, 7, 3, 2),
	(137, 155, 5, 6, 13),
	(138, 156, 8, 3, 3),
	(139, 157, 2, 4, 7),
	(140, 158, 4, 2, 1),
	(141, 159, 9, 1, 2),
	(142, 160, 6, 3, 10),
	(143, 161, 5, 1, 10),
	(144, 162, 1, 4, 5),
	(145, 163, 8, 1, 6),
	(146, 164, 1, 1, 11),
	(147, 165, 2, 2, 7),
	(148, 166, 5, 1, 16),
	(149, 167, 8, 5, 13);
/*!40000 ALTER TABLE `jadwalkuliah` ENABLE KEYS */;


-- Dumping structure for table penjadwalan_genetik_web.jam
CREATE TABLE IF NOT EXISTS `jam` (
  `kode` int(10) NOT NULL AUTO_INCREMENT,
  `range_jam` varchar(50) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table penjadwalan_genetik_web.jam: ~11 rows (approximately)
DELETE FROM `jam`;
/*!40000 ALTER TABLE `jam` DISABLE KEYS */;
INSERT INTO `jam` (`kode`, `range_jam`, `aktif`) VALUES
	(1, '08.00-08.50', NULL),
	(2, '08.50-09.30', NULL),
	(3, '09.40-10.30', NULL),
	(4, '10.30-11.20', NULL),
	(5, '11.20-12.10', NULL),
	(6, '12.10-13.00', NULL),
	(7, '13.00-13.50', NULL),
	(8, '13.50-14.40', NULL),
	(9, '14.40-15.30', NULL),
	(10, '15.30-16.20', NULL),
	(11, '16.20-17.10', NULL);
/*!40000 ALTER TABLE `jam` ENABLE KEYS */;


-- Dumping structure for table penjadwalan_genetik_web.matakuliah
CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kode` int(10) NOT NULL AUTO_INCREMENT,
  `kode_mk` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `sks` int(6) DEFAULT NULL,
  `semester` int(6) DEFAULT NULL,
  `aktif` enum('True','False') DEFAULT 'True',
  `jenis` enum('TEORI','PRAKTIKUM') DEFAULT 'TEORI',
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COMMENT='example kode_mk = 0765109 ';

-- Dumping data for table penjadwalan_genetik_web.matakuliah: ~37 rows (approximately)
DELETE FROM `matakuliah`;
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
INSERT INTO `matakuliah` (`kode`, `kode_mk`, `nama`, `sks`, `semester`, `aktif`, `jenis`) VALUES
	(1, NULL, 'Basis Data I ', 3, 2, 'True', 'TEORI'),
	(2, NULL, 'Sistem Operasi ', 2, 2, 'True', 'TEORI'),
	(3, NULL, 'Kalkulus  II', 2, 2, 'True', 'TEORI'),
	(4, NULL, 'Pemrograman Desktop I (VB) (T)', 2, 2, 'True', 'TEORI'),
	(5, NULL, 'Pemrograman Desktop I (VB) (P)', 2, 2, 'True', 'PRAKTIKUM'),
	(6, NULL, 'Kewarganegaraan ', 2, 2, 'True', 'TEORI'),
	(7, NULL, 'Bahasa Inggris II', 2, 2, 'True', 'TEORI'),
	(8, NULL, 'Analisa & Perancangan SI', 3, 4, 'True', 'TEORI'),
	(9, NULL, 'Statistik Probabilitas', 2, 4, 'True', 'TEORI'),
	(10, NULL, 'Teknik Digital ', 3, 4, 'True', 'TEORI'),
	(11, NULL, 'Bahasa Indonesia ', 2, 4, 'True', 'TEORI'),
	(12, NULL, 'Troubleshooting', 2, 8, 'True', 'TEORI'),
	(13, NULL, 'Kewirausahaan', 2, 8, 'True', 'TEORI'),
	(14, NULL, 'Perbankan & Lembaga Keuangan', 2, 8, 'True', 'TEORI'),
	(15, NULL, 'Microprocessor', 3, 6, 'True', 'TEORI'),
	(16, NULL, 'Manajemen Proyek TI', 3, 6, 'True', 'TEORI'),
	(17, NULL, 'Teknik Simulasi ', 3, 6, 'True', 'TEORI'),
	(18, NULL, 'Struktur Data  (C++/Java)  (T)', 3, 2, 'True', 'TEORI'),
	(19, NULL, 'Struktur Data  (C++/Java)  (P)', 3, 2, 'True', 'PRAKTIKUM'),
	(20, NULL, 'Teknologi Komputer Utilitas (T) ', 2, 2, 'True', 'TEORI'),
	(21, NULL, 'Teknologi Komputer Utilitas (P) ', 2, 2, 'True', 'PRAKTIKUM'),
	(22, NULL, 'Lingkungan Kerja Jaringan (T) ', 3, 4, 'True', 'TEORI'),
	(23, NULL, 'Lingkungan Kerja Jaringan (P) ', 3, 4, 'True', 'PRAKTIKUM'),
	(24, NULL, 'Matematika Diskrit (T) ', 2, 4, 'True', 'TEORI'),
	(25, NULL, 'Matematika Diskrit (P) ', 2, 4, 'True', 'PRAKTIKUM'),
	(26, NULL, 'Pemrograman Science II (T)', 3, 4, 'True', 'TEORI'),
	(27, NULL, 'Pemrograman Science II (P)', 3, 4, 'True', 'PRAKTIKUM'),
	(28, NULL, 'Pemrograman Desktop II (VB) (T) ', 3, 4, 'True', 'TEORI'),
	(29, NULL, 'Pemrograman Desktop II (VB) (P) ', 3, 4, 'True', 'PRAKTIKUM'),
	(30, NULL, 'Teknologi Open Source II  (T)', 3, 6, 'True', 'TEORI'),
	(31, NULL, 'Teknologi Open Source II  (P)', 3, 6, 'True', 'PRAKTIKUM'),
	(32, NULL, 'Pemrograman Mobile II (T)', 3, 6, 'True', 'TEORI'),
	(33, NULL, 'Pemrograman Mobile II (P)', 3, 6, 'True', 'PRAKTIKUM'),
	(34, NULL, 'Web Desain (T)', 2, 6, 'True', 'TEORI'),
	(35, NULL, 'Web Desain (P)', 2, 6, 'True', 'PRAKTIKUM'),
	(36, NULL, 'Project I  (T)', 2, 6, 'True', 'TEORI'),
	(37, NULL, 'Project I  (P)', 2, 6, 'True', 'PRAKTIKUM');
/*!40000 ALTER TABLE `matakuliah` ENABLE KEYS */;


-- Dumping structure for table penjadwalan_genetik_web.pengampu
CREATE TABLE IF NOT EXISTS `pengampu` (
  `kode` int(10) NOT NULL AUTO_INCREMENT,
  `kode_mk` int(10) DEFAULT NULL,
  `kode_dosen` int(10) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `tahun_akademik` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;

-- Dumping data for table penjadwalan_genetik_web.pengampu: ~149 rows (approximately)
DELETE FROM `pengampu`;
/*!40000 ALTER TABLE `pengampu` DISABLE KEYS */;
INSERT INTO `pengampu` (`kode`, `kode_mk`, `kode_dosen`, `kelas`, `tahun_akademik`) VALUES
	(1, 1, 1, 'F', '2011-2012'),
	(2, 1, 1, 'G', '2011-2012'),
	(3, 1, 1, 'H', '2011-2012'),
	(4, 1, 2, 'A', '2011-2012'),
	(5, 1, 2, 'D', '2011-2012'),
	(6, 2, 3, 'A', '2011-2012'),
	(7, 2, 3, 'C', '2011-2012'),
	(8, 2, 3, 'D', '2011-2012'),
	(9, 2, 3, 'B', '2011-2012'),
	(10, 2, 4, 'E', '2011-2012'),
	(11, 2, 4, 'G', '2011-2012'),
	(12, 2, 4, 'H', '2011-2012'),
	(13, 2, 4, 'F', '2011-2012'),
	(14, 4, 43, 'C', '2011-2012'),
	(15, 4, 43, 'A', '2011-2012'),
	(16, 4, 43, 'B', '2011-2012'),
	(17, 4, 43, 'D', '2011-2012'),
	(18, 3, 37, 'A', '2011-2012'),
	(19, 3, 37, 'B', '2011-2012'),
	(20, 24, 37, 'G', '2011-2012'),
	(21, 24, 37, 'E', '2011-2012'),
	(22, 24, 37, 'F', '2011-2012'),
	(23, 6, 38, 'F', '2011-2012'),
	(24, 6, 38, 'C', '2011-2012'),
	(25, 6, 38, 'G', '2011-2012'),
	(26, 6, 38, 'H', '2011-2012'),
	(27, 18, 39, 'D', '2011-2012'),
	(32, 18, 39, 'B', '2011-2012'),
	(33, 18, 39, 'C', '2011-2012'),
	(34, 18, 39, 'A', '2011-2012'),
	(36, 19, 40, 'G', '2011-2012'),
	(37, 19, 40, 'H', '2011-2012'),
	(38, 20, 41, 'E', '2011-2012'),
	(39, 20, 41, 'C', '2011-2012'),
	(40, 20, 41, 'D', '2011-2012'),
	(41, 20, 41, 'F', '2011-2012'),
	(42, 12, 41, 'A', '2011-2012'),
	(43, 12, 41, 'B', '2011-2012'),
	(44, 18, 42, 'H', '2011-2012'),
	(45, 18, 42, 'G', '2011-2012'),
	(47, 34, 42, 'D', '2011-2012'),
	(48, 7, 49, 'F', '2011-2012'),
	(49, 7, 49, 'D', '2011-2012'),
	(50, 7, 49, 'C', '2011-2012'),
	(51, 7, 50, 'A', '2011-2012'),
	(52, 7, 50, 'B', '2011-2012'),
	(53, 22, 55, 'B', '2011-2012'),
	(54, 22, 55, 'A', '2011-2012'),
	(55, 22, 55, 'C', '2011-2012'),
	(56, 22, 55, 'D', '2011-2012'),
	(57, 9, 56, 'F', '2011-2012'),
	(58, 9, 56, 'E', '2011-2012'),
	(59, 9, 56, 'G', '2011-2012'),
	(60, 20, 44, 'B', '2011-2012'),
	(61, 22, 44, 'G', '2011-2012'),
	(62, 22, 44, 'E', '2011-2012'),
	(63, 22, 44, 'F', '2011-2012'),
	(64, 20, 45, 'A', '2011-2012'),
	(65, 20, 45, 'G', '2011-2012'),
	(66, 20, 45, 'H', '2011-2012'),
	(67, 12, 45, 'C', '2011-2012'),
	(68, 4, 46, 'E', '2011-2012'),
	(69, 4, 46, 'F', '2011-2012'),
	(70, 28, 46, 'D', '2011-2012'),
	(71, 28, 46, 'E', '2011-2012'),
	(72, 18, 47, 'F', '2011-2012'),
	(73, 18, 47, 'E', '2011-2012'),
	(74, 6, 48, 'A', '2011-2012'),
	(75, 6, 48, 'E', '2011-2012'),
	(76, 6, 48, 'D', '2011-2012'),
	(77, 11, 77, 'E', '2011-2012'),
	(78, 11, 77, 'D', '2011-2012'),
	(79, 11, 77, 'F', '2011-2012'),
	(80, 8, 70, 'A', '2011-2012'),
	(82, 8, 70, 'C', '2011-2012'),
	(83, 8, 70, 'B', '2011-2012'),
	(84, 17, 64, 'C', '2011-2012'),
	(85, 17, 64, 'D', '2011-2012'),
	(86, 31, 66, 'D', '2011-2012'),
	(87, 31, 66, 'C', '2011-2012'),
	(88, 30, 67, 'B', '2011-2012'),
	(89, 30, 67, 'A', '2011-2012'),
	(92, 9, 84, 'A', '2011-2012'),
	(93, 9, 84, 'B', '2011-2012'),
	(94, 9, 84, 'C', '2011-2012'),
	(95, 9, 84, 'D', '2011-2012'),
	(96, 24, 82, 'B', '2011-2012'),
	(97, 24, 82, 'C', '2011-2012'),
	(98, 24, 82, 'D', '2011-2012'),
	(99, 24, 82, 'A', '2011-2012'),
	(100, 11, 83, 'B', '2011-2012'),
	(101, 11, 83, 'A', '2011-2012'),
	(102, 11, 83, 'C', '2011-2012'),
	(103, 10, 57, 'C', '2011-2012'),
	(104, 10, 57, 'E', '2011-2012'),
	(105, 10, 57, 'F', '2011-2012'),
	(106, 10, 57, 'D', '2011-2012'),
	(107, 10, 75, 'B', '2011-2012'),
	(108, 10, 75, 'A', '2011-2012'),
	(109, 36, 63, 'C', '2011-2012'),
	(110, 36, 63, 'D', '2011-2012'),
	(111, 36, 63, 'A', '2011-2012'),
	(112, 8, 81, 'D', '2011-2012'),
	(113, 8, 81, 'F', '2011-2012'),
	(114, 8, 81, 'E', '2011-2012'),
	(115, 26, 79, 'B', '2011-2012'),
	(116, 26, 79, 'A', '2011-2012'),
	(117, 26, 79, 'C', '2011-2012'),
	(118, 28, 80, 'C', '2011-2012'),
	(119, 28, 80, 'A', '2011-2012'),
	(120, 28, 80, 'B', '2011-2012'),
	(121, 26, 76, 'D', '2011-2012'),
	(122, 26, 76, 'E', '2011-2012'),
	(123, 26, 76, 'F', '2011-2012'),
	(124, 3, 52, 'C', '2011-2012'),
	(125, 3, 52, 'E', '2011-2012'),
	(126, 3, 52, 'D', '2011-2012'),
	(127, 3, 53, 'H', '2011-2012'),
	(128, 3, 53, 'G', '2011-2012'),
	(129, 3, 53, 'F', '2011-2012'),
	(130, 17, 75, 'A', '2011-2012'),
	(131, 17, 75, 'B', '2011-2012'),
	(132, 7, 51, 'H', '2011-2012'),
	(133, 7, 51, 'E', '2011-2012'),
	(134, 7, 51, 'G', '2011-2012'),
	(144, 15, 65, 'B', '2011-2012'),
	(145, 15, 65, 'A', '2011-2012'),
	(146, 10, 71, 'G', '2011-2012'),
	(147, 11, 72, 'G', '2011-2012'),
	(148, 32, 63, 'B', '2011-2012'),
	(149, 13, 60, 'A', '2011-2012'),
	(150, 13, 60, 'B', '2011-2012'),
	(151, 13, 69, 'C', '2011-2012'),
	(152, 8, 54, 'C', '2011-2012'),
	(153, 8, 54, 'B', '2011-2012'),
	(154, 36, 54, 'A', '2011-2012'),
	(155, 36, 81, 'B', '2011-2012'),
	(156, 8, 78, 'G', '2011-2012'),
	(157, 28, 74, 'F', '2011-2012'),
	(158, 28, 74, 'G', '2011-2012'),
	(159, 26, 73, 'G', '2011-2012'),
	(160, 34, 68, 'A', '2011-2012'),
	(161, 34, 68, 'B', '2011-2012'),
	(162, 32, 58, 'C', '2011-2012'),
	(163, 32, 58, 'D', '2011-2012'),
	(164, 15, 59, 'C', '2011-2012'),
	(165, 14, 61, 'A', '2011-2012'),
	(166, 14, 61, 'B', '2011-2012'),
	(167, 14, 62, 'C', '2011-2012');
/*!40000 ALTER TABLE `pengampu` ENABLE KEYS */;


-- Dumping structure for table penjadwalan_genetik_web.ruang
CREATE TABLE IF NOT EXISTS `ruang` (
  `kode` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `kapasitas` int(10) DEFAULT NULL,
  `jenis` enum('TEORI','LABORATORIUM') DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table penjadwalan_genetik_web.ruang: ~23 rows (approximately)
DELETE FROM `ruang`;
/*!40000 ALTER TABLE `ruang` DISABLE KEYS */;
INSERT INTO `ruang` (`kode`, `nama`, `kapasitas`, `jenis`) VALUES
	(1, 'Ruang 1', NULL, 'TEORI'),
	(2, 'Ruang 2', NULL, 'TEORI'),
	(3, 'Ruang 3', NULL, 'TEORI'),
	(4, 'Ruang 4', NULL, 'TEORI'),
	(5, 'Ruang 5', NULL, 'TEORI'),
	(6, 'Ruang 6', NULL, 'TEORI'),
	(7, 'Ruang 7', NULL, 'TEORI'),
	(8, 'Ruang 8', NULL, 'TEORI'),
	(9, 'Ruang 9', NULL, 'TEORI'),
	(10, 'Ruang 10', NULL, 'TEORI'),
	(11, 'Ruang 11', NULL, 'TEORI'),
	(12, 'Ruang 12', NULL, 'TEORI'),
	(13, 'Ruang 13', NULL, 'TEORI'),
	(14, 'Ruang 14', NULL, 'TEORI'),
	(15, 'Ruang 15', NULL, 'TEORI'),
	(16, 'Ruang 16', NULL, 'TEORI'),
	(17, 'Lab. Sisfo 1', NULL, 'LABORATORIUM'),
	(18, 'Lab. Sisfo 2', NULL, 'LABORATORIUM'),
	(19, 'Lab Inherent', NULL, 'LABORATORIUM'),
	(20, 'Lab Aplikasi ', NULL, 'LABORATORIUM'),
	(21, 'Lab Jar ', NULL, 'LABORATORIUM'),
	(22, 'Lab Micro', NULL, 'LABORATORIUM'),
	(23, 'Lab Maintenence', NULL, 'LABORATORIUM');
/*!40000 ALTER TABLE `ruang` ENABLE KEYS */;


-- Dumping structure for table penjadwalan_genetik_web.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `level` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table penjadwalan_genetik_web.user: ~0 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table penjadwalan_genetik_web.waktu_tidak_bersedia
CREATE TABLE IF NOT EXISTS `waktu_tidak_bersedia` (
  `kode` int(10) NOT NULL AUTO_INCREMENT,
  `kode_dosen` int(10) DEFAULT NULL,
  `kode_hari` int(10) DEFAULT NULL,
  `kode_jam` int(10) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table penjadwalan_genetik_web.waktu_tidak_bersedia: ~0 rows (approximately)
DELETE FROM `waktu_tidak_bersedia`;
/*!40000 ALTER TABLE `waktu_tidak_bersedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `waktu_tidak_bersedia` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
