# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.33-community
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2011-12-10 09:19:26
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping structure for table control.anak
CREATE TABLE IF NOT EXISTS `anak` (
  `anak_id` int(10) NOT NULL AUTO_INCREMENT,
  `kar_nik` varchar(10) DEFAULT NULL,
  `anak_ke` int(10) DEFAULT NULL,
  `anak_nama` varchar(50) DEFAULT NULL,
  `anak_tanggallahir` date DEFAULT NULL,
  `anak_tempatlahir` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`anak_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table control.anak: ~0 rows (approximately)
/*!40000 ALTER TABLE `anak` DISABLE KEYS */;
/*!40000 ALTER TABLE `anak` ENABLE KEYS */;


# Dumping structure for table control.categori
CREATE TABLE IF NOT EXISTS `categori` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_nama` varchar(50) DEFAULT NULL,
  `cat_keterangan` text,
  `cat_folder` text,
  `unit_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

# Dumping data for table control.categori: ~30 rows (approximately)
/*!40000 ALTER TABLE `categori` DISABLE KEYS */;
INSERT INTO `categori` (`cat_id`, `cat_nama`, `cat_keterangan`, `cat_folder`, `unit_id`) VALUES
	(5, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/SDM/Manual Mutu', 2),
	(6, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/SDM/Prosedur', 2),
	(7, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/SDM/Instruktur kerja', 2),
	(10, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/pemasaran/Manual Mutu', 3),
	(11, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/pemasaran/Prosedur', 3),
	(12, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/pemasaran/Instruktur kerja', 3),
	(13, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/pembelian/Manual Mutu', 4),
	(14, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/pembelian/Prosedur', 4),
	(15, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/pembelian/Instruktur kerja', 4),
	(16, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/gudang/Manual Mutu', 5),
	(17, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/gudang/Prosedur', 5),
	(18, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/gudang/Instruktur kerja', 5),
	(19, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/maintanance/Manual Mutu', 6),
	(20, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/maintanance/Prosedur', 6),
	(21, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/maintanance/Instruktur kerja', 6),
	(22, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/produksi/Manual Mutu', 7),
	(23, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/produksi/Prosedur', 7),
	(24, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/produksi/Instruktur kerja', 7),
	(25, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/QC/Manual Mutu', 8),
	(26, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/QC/Prosedur', 8),
	(27, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/QC/Instruktur kerja', 8),
	(28, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/DC/Manual Mutu', 9),
	(29, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/DC/Prosedur', 9),
	(30, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/DC/Instruktur kerja', 9),
	(31, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/MR/Manual Mutu', 10),
	(32, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/MR/Prosedur', 10),
	(33, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/MR/Instruktur kerja', 10),
	(34, 'Manual Mutu', 'Level 1', 'c:/xampp/htdocs/web/control/folder/Auditor/Manual Mutu', 11),
	(35, 'Prosedur', 'Level 2', 'c:/xampp/htdocs/web/control/folder/Auditor/Prosedur', 11),
	(36, 'Instruktur kerja', 'Level 3', 'c:/xampp/htdocs/web/control/folder/Auditor/Instruktur kerja', 11);
/*!40000 ALTER TABLE `categori` ENABLE KEYS */;


# Dumping structure for table control.document
CREATE TABLE IF NOT EXISTS `document` (
  `document_id` int(10) NOT NULL AUTO_INCREMENT,
  `document_kode` varchar(50) DEFAULT NULL,
  `document_nama` varchar(50) DEFAULT NULL,
  `document_folder` tinytext,
  `document_deskripsi` text,
  `document_keyword` text,
  `document_revisi` int(10) DEFAULT NULL,
  `document_tahun` year(4) DEFAULT NULL,
  `document_tanggalsah` date DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

# Dumping data for table control.document: ~7 rows (approximately)
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` (`document_id`, `document_kode`, `document_nama`, `document_folder`, `document_deskripsi`, `document_keyword`, `document_revisi`, `document_tahun`, `document_tanggalsah`, `cat_id`) VALUES
	(18, 'dk-1', '5R BPPA', 'C:/xampp/htdocs/web/control/folder/DC/Manual Mutu/5R BPPA_0_2000.xls', '', '5R BPPA dk-1 0 2000 2011-08-03 Manual Mutu DC', 0, '2000', '2011-08-03', 28),
	(19, 'dk-1', 'dokumen 1', 'C:/xampp/htdocs/web/control/folder/SDM/Manual Mutu/dokumen 1_0_2000.doc', '', 'dokumen 1 dk-1 0 2000 2011-08-11 Manual Mutu SDM', 0, '2000', '2011-08-11', 5),
	(21, 'dk-1', 'dokumen 1', 'C:/xampp/htdocs/web/control/folder/SDM/Manual Mutu/dokumen 1_0_2000.doc', NULL, 'dokumen 1 dk-1 0 2000 2011-08-11 Manual Mutu SDM', 1, '2000', '2011-08-11', 5),
	(22, 'tes 1', 'tes', 'C:/xampp/htdocs/web/control/folder/DC/Manual Mutu/tes_0_2000.jpg', 'tes', 'tes tes 1 0 2000 2011-08-04 Manual Mutu gudang', 0, '2000', '2011-08-04', 28),
	(23, 'tes 2', 'tes', 'C:/tes_1_2000.jpg', 'tes 2', 'tes tes 2 1 2000 2011-08-03  gudang', 1, '2000', '2011-08-03', NULL),
	(24, 'tes 2', 'tes', 'C:/xampp/htdocs/web/control/folder/gudang/Manual Mutu/tes_1_2000.jpg', 'tes 2', 'tes tes 2 1 2000 2011-08-03 Manual Mutu gudang', 1, '2000', '2011-08-03', 16),
	(25, 'tes 3', 'tes 3', 'C:/xampp/htdocs/web/control/folder/SDM/Manual Mutu/tes 3_3_2000.jpg', 'tes 3', 'tes 3 tes 3 3 2000 2011-08-03 Manual Mutu SDM', 3, '2000', '2011-08-03', 5);
/*!40000 ALTER TABLE `document` ENABLE KEYS */;


# Dumping structure for table control.history
CREATE TABLE IF NOT EXISTS `history` (
  `his_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `his_aksi` varchar(50) DEFAULT NULL,
  `kar_nik` varchar(10) DEFAULT NULL,
  `his_time` datetime DEFAULT NULL,
  `document_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`his_id`),
  KEY `FK_history_karyawan` (`kar_nik`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

# Dumping data for table control.history: ~6 rows (approximately)
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` (`his_id`, `his_aksi`, `kar_nik`, `his_time`, `document_id`) VALUES
	(1, 'Upload', '05026', '2011-08-02 09:00:49', 18),
	(2, 'Upload', '08106', '2011-08-02 09:01:40', 19),
	(3, 'Upload', '05026', '2011-08-26 13:41:01', 22),
	(4, 'Upload', '05026', '2011-08-26 13:50:19', 23),
	(5, 'Upload', '05026', '2011-08-26 13:50:35', 24),
	(6, 'Upload', '08106', '2011-08-26 13:53:39', 25);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;


# Dumping structure for table control.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `jabatan_id` int(10) NOT NULL AUTO_INCREMENT,
  `jabatan_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

# Dumping data for table control.jabatan: ~4 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`jabatan_id`, `jabatan_nama`) VALUES
	(1, 'Staff'),
	(2, 'Sekretaris'),
	(3, 'Manajer'),
	(4, 'pelaksana madya');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;


# Dumping structure for table control.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `kar_nik` varchar(10) NOT NULL DEFAULT '',
  `kar_kelamin` char(1) NOT NULL DEFAULT 'L',
  `kar_nama` varchar(50) DEFAULT NULL,
  `kar_pass` varchar(32) DEFAULT NULL,
  `unit_id` int(10) DEFAULT NULL,
  `kar_namalengkap` varchar(50) DEFAULT NULL,
  `kar_masukkerja` date DEFAULT NULL,
  `kar_tanggallahir` date DEFAULT NULL,
  `kar_tanggalpensiun` date DEFAULT NULL,
  `kar_tanggalnikah` date DEFAULT NULL,
  `kar_tanggallahirpasangan` date DEFAULT NULL,
  `kar_gajipokok` int(11) DEFAULT NULL,
  `kar_gajipensiun` int(11) DEFAULT NULL,
  `kar_namapasangan` varchar(50) DEFAULT NULL,
  `kar_tempatlahir` varchar(50) DEFAULT NULL,
  `kar_tempatlahirpasangan` varchar(50) DEFAULT NULL,
  `kar_pendidikanakhir` varchar(50) DEFAULT NULL,
  `kar_alamat` varchar(100) DEFAULT NULL,
  `kar_foto` text,
  `kar_keyword` text,
  `jabatan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`kar_nik`),
  KEY `FK_karyawan_jabatan` (`jabatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table control.karyawan: ~5 rows (approximately)
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`kar_nik`, `kar_kelamin`, `kar_nama`, `kar_pass`, `unit_id`, `kar_namalengkap`, `kar_masukkerja`, `kar_tanggallahir`, `kar_tanggalpensiun`, `kar_tanggalnikah`, `kar_tanggallahirpasangan`, `kar_gajipokok`, `kar_gajipensiun`, `kar_namapasangan`, `kar_tempatlahir`, `kar_tempatlahirpasangan`, `kar_pendidikanakhir`, `kar_alamat`, `kar_foto`, `kar_keyword`, `jabatan_id`) VALUES
	('04010', 'L', 'paulina', 'ceaedcc58f5c633911a8cb8ec24084f0', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'c:/xampp/htdocs/web/control/foto/nofoto.png', NULL, NULL),
	('04012', 'L', 'trimada', 'ceaedcc58f5c633911a8cb8ec24084f0', 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'c:/xampp/htdocs/web/control/foto/nofoto.png', NULL, NULL),
	('05026', 'L', 'zaki', '9784ea3da268563469df99b2e6593564', 9, ' Abdul Zaki', '1985-01-15', '1961-04-28', '2016-04-01', '0000-00-00', '1968-09-28', NULL, NULL, 'Yulailik', 'Gresik', 'Sidoarjo', 'S1', 'Jl. Dr. Wahidin SH. Gg XXf NO:88', 'c:/xampp/htdocs/web/control/foto/Foto_05026.jpg', 'c:/xampp/htdocs/web/control/foto/Foto_05026.jpg S1 Sidoarjo Gresik L  Jl. Dr. Wahidin SH. Gg XXf NO:88 1968-09-28 Yulailik 2016-04-01 1961-04-28 1985-01-15  Abdul Zaki 05026 DC zaki', NULL),
	('08106', 'L', 'hartono', 'ceaedcc58f5c633911a8cb8ec24084f0', 2, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '', '', '', '', '', 'c:/xampp/htdocs/web/control/foto/Foto_08106.jpg', 'c:/xampp/htdocs/web/control/foto/Foto_08106.jpg    L         08106 SDM hartono', NULL),
	('1', 'L', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'M. Afwanul Hakim', '0000-00-00', '1989-09-02', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '', 'Gresik', '', '', '', 'c:/xampp/htdocs/web/control/foto/Foto_1.jpg', 'c:/xampp/htdocs/web/control/foto/Foto_1.jpg   Gresik L      1989-09-02  M. Afwanul Hakim 1 admin admin', NULL);
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;


# Dumping structure for table control.kompetensi
CREATE TABLE IF NOT EXISTS `kompetensi` (
  `kompetensi_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kompetensi_nama` varchar(50) DEFAULT NULL,
  `kompetensi_keterangan` text,
  `maskom_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`kompetensi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table control.kompetensi: ~0 rows (approximately)
/*!40000 ALTER TABLE `kompetensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `kompetensi` ENABLE KEYS */;


# Dumping structure for table control.kompetensiambil
CREATE TABLE IF NOT EXISTS `kompetensiambil` (
  `ambil_id` int(10) NOT NULL AUTO_INCREMENT,
  `kar_nik` varchar(50) DEFAULT NULL,
  `kompetensi_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`ambil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table control.kompetensiambil: ~0 rows (approximately)
/*!40000 ALTER TABLE `kompetensiambil` DISABLE KEYS */;
/*!40000 ALTER TABLE `kompetensiambil` ENABLE KEYS */;


# Dumping structure for table control.masterkompetensi
CREATE TABLE IF NOT EXISTS `masterkompetensi` (
  `maskom_id` int(10) NOT NULL AUTO_INCREMENT,
  `maskom_nama` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`maskom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

# Dumping data for table control.masterkompetensi: ~3 rows (approximately)
/*!40000 ALTER TABLE `masterkompetensi` DISABLE KEYS */;
INSERT INTO `masterkompetensi` (`maskom_id`, `maskom_nama`) VALUES
	(1, 'produksi'),
	(2, 'non-produk'),
	(3, 'auditor');
/*!40000 ALTER TABLE `masterkompetensi` ENABLE KEYS */;


# Dumping structure for table control.unitkerja
CREATE TABLE IF NOT EXISTS `unitkerja` (
  `unit_id` int(10) NOT NULL AUTO_INCREMENT,
  `unit_nama` varchar(50) DEFAULT NULL,
  `unit_keterangan` text,
  `unit_folder` text,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

# Dumping data for table control.unitkerja: ~11 rows (approximately)
/*!40000 ALTER TABLE `unitkerja` DISABLE KEYS */;
INSERT INTO `unitkerja` (`unit_id`, `unit_nama`, `unit_keterangan`, `unit_folder`) VALUES
	(1, 'admin', 'admin neh', '/admin'),
	(2, 'SDM', 'Sumber Daya Manusia / umum', 'c:/xampp/htdocs/web/control/folder/SDM'),
	(3, 'pemasaran', '', 'c:/xampp/htdocs/web/control/folder/pemasaran'),
	(4, 'pembelian', '', 'c:/xampp/htdocs/web/control/folder/pembelian'),
	(5, 'gudang', '', 'c:/xampp/htdocs/web/control/folder/gudang'),
	(6, 'maintanance', '', 'c:/xampp/htdocs/web/control/folder/maintanance'),
	(7, 'produksi', '', 'c:/xampp/htdocs/web/control/folder/produksi'),
	(8, 'QC', '', 'c:/xampp/htdocs/web/control/folder/QC'),
	(9, 'DC', '', 'c:/xampp/htdocs/web/control/folder/DC'),
	(10, 'MR', '', 'c:/xampp/htdocs/web/control/folder/MR'),
	(11, 'Auditor', '', 'c:/xampp/htdocs/web/control/folder/Auditor');
/*!40000 ALTER TABLE `unitkerja` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
