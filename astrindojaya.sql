-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 11:30 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astrindojaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `agama`) VALUES
(1, 'ISLAM'),
(2, 'KRISTEN'),
(3, 'PROTESTANT'),
(4, 'HINDU'),
(5, 'BUDHA'),
(6, 'KATOLIK'),
(7, 'KONGHUCU');

-- --------------------------------------------------------

--
-- Table structure for table `tb_all_mpp`
--

CREATE TABLE `tb_all_mpp` (
  `id_allmpp` int(20) NOT NULL,
  `bulan_allmpp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_counter`
--

CREATE TABLE `tb_counter` (
  `ip` varchar(2050) NOT NULL,
  `date` date NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_counter`
--

INSERT INTO `tb_counter` (`ip`, `date`, `hits`) VALUES
('10.88.25.1', '2016-01-16', 11),
('10.88.25.2', '2016-01-16', 3),
('10.88.25.3', '2016-01-17', 4),
('10.88.25.4', '2016-01-16', 11),
('10.88.25.5', '2016-02-16', 3),
('10.88.25.6', '2016-02-17', 4),
('10.88.25.10', '2016-02-23', 2),
('10.88.25.15', '2016-02-23', 1),
('10.88.25.13', '2016-03-16', 11),
('10.88.25.1', '2016-03-16', 3),
('10.88.25.5', '2016-03-17', 4),
('10.88.25.8', '2016-03-16', 11),
('10.88.25.10', '2016-03-16', 3),
('10.88.25.19', '2016-03-17', 4),
('10.88.25.27', '2016-04-23', 2),
('10.88.25.50', '2016-04-23', 1),
('10.88.25.6', '2016-04-16', 3),
('10.88.25.9', '2016-05-17', 4),
('10.88.25.11', '2016-05-23', 2),
('10.88.25.12', '2016-05-23', 1),
('10.88.25.16', '2016-05-16', 11),
('10.88.25.20', '2016-05-16', 3),
('10.88.25.32', '2016-06-17', 4),
('10.88.25.1', '2016-06-16', 11),
('10.88.25.35', '2016-06-16', 3),
('10.88.25.36', '2016-07-17', 4),
('10.88.25.26', '2016-07-23', 2),
('10.88.25.6', '2016-07-16', 3),
('10.88.25.9', '2016-08-17', 4),
('10.88.25.11', '2016-08-23', 2),
('10.88.25.12', '2016-08-23', 1),
('10.88.25.16', '2016-08-16', 11),
('10.88.25.20', '2016-08-06', 3),
('10.88.25.32', '2016-09-17', 4),
('10.88.25.1', '2016-09-16', 11),
('10.88.25.35', '2016-09-16', 3),
('10.88.25.36', '2016-09-17', 4),
('10.88.25.26', '2016-09-23', 2),
('10.88.25.16', '2016-10-16', 11),
('10.88.25.20', '2016-10-16', 3),
('10.88.25.32', '2016-10-17', 4),
('10.88.25.1', '2016-10-16', 11),
('10.88.25.35', '2016-11-16', 3),
('10.88.25.36', '2016-11-17', 4),
('10.88.25.26', '2016-11-23', 2),
('10.88.25.15', '2016-11-23', 1),
('10.88.25.13', '2016-12-16', 11),
('10.88.25.1', '2016-12-16', 3),
('10.88.25.5', '2016-12-17', 4),
('10.88.25.8', '2016-12-16', 11),
('10.88.25.10', '2016-12-16', 3),
('10.88.25.19', '2016-12-17', 4),
('10.88.25.27', '2016-12-23', 2),
('10.88.25.50', '2016-12-23', 1),
('10.88.25.6', '2016-12-16', 3),
('10.88.25.9', '2016-12-17', 4),
('10.88.25.11', '2016-12-23', 2),
('10.88.25.12', '2016-12-23', 1),
('10.88.25.20', '2016-12-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id_ct` varchar(20) NOT NULL,
  `nama_ct` varchar(50) NOT NULL,
  `divisi_ct` varchar(50) NOT NULL,
  `tgl_ct` varchar(15) NOT NULL,
  `jenis_ct` varchar(30) NOT NULL,
  `alasan_ct` varchar(100) NOT NULL,
  `informasi_ct` varchar(100) NOT NULL,
  `pjs_ct` varchar(50) NOT NULL,
  `status_ct` enum('Disetujui','Pending','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`id_ct`, `nama_ct`, `divisi_ct`, `tgl_ct`, `jenis_ct`, `alasan_ct`, `informasi_ct`, `pjs_ct`, `status_ct`) VALUES
('CT-0001', 'HERMAWAN', 'MARKETING', '12-06-2019', 'CUTI TAHUNAN', 'NIKAH', 'NIKAH', 'DANI', 'Disetujui'),
('CT-0003', 'sas', 'asa', '17-01-2019', 'UPL. Tidak Dibayar - 3 Hari', 'sasa', 'asas', 'MARCO WIJAYA', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_departemen`
--

CREATE TABLE `tb_departemen` (
  `id` varchar(20) NOT NULL,
  `departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_departemen`
--

INSERT INTO `tb_departemen` (`id`, `departemen`) VALUES
('DPT-0001', 'AUDIT'),
('DPT-0002', 'MARKETING'),
('DPT-0003', 'PURCHASING'),
('DPT-0004', 'SALES'),
('DPT-0005', 'HR/GA'),
('DPT-0006', 'FINANCE'),
('DPT-0007', 'MARKETING SUPPORT'),
('DPT-0008', 'IT'),
('DPT-0009', 'LOGISTIK'),
('DPT-0010', 'OPERATIONAL'),
('DPT-0011', 'QA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dinas`
--

CREATE TABLE `tb_dinas` (
  `id_dns` varchar(20) NOT NULL,
  `jenis_dns` varchar(50) NOT NULL,
  `kepentingan_dns` varchar(70) NOT NULL,
  `nama_dns` varchar(50) NOT NULL,
  `total_dns` int(10) NOT NULL,
  `tgl_awal_dns` varchar(10) NOT NULL,
  `tgl_akhir_dns` varchar(10) NOT NULL,
  `tujuan_dns` varchar(100) NOT NULL,
  `pembayaran_dns` varchar(100) NOT NULL,
  `tgl_bayar_dns` varchar(10) NOT NULL,
  `keterangan_dns` varchar(100) NOT NULL,
  `pjs_dns` varchar(50) NOT NULL,
  `status_dns` enum('Pending','Disetujui','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dinas`
--

INSERT INTO `tb_dinas` (`id_dns`, `jenis_dns`, `kepentingan_dns`, `nama_dns`, `total_dns`, `tgl_awal_dns`, `tgl_akhir_dns`, `tujuan_dns`, `pembayaran_dns`, `tgl_bayar_dns`, `keterangan_dns`, `pjs_dns`, `status_dns`) VALUES
('DNS-00-1', 'Domestik', 'Perjalanan Dinas', 'Handri', 2, '12-08-2019', '22-10-2019', 'Bangkok', '61', '21-09-2019', 'ada', 'MARCO WIJAYA', 'Pending'),
('DNS-002', 'Domestik', 'Perjalanan Non Dinas', 'Heru', 1, '20-08-2019', '21-09-2019', 'Bangkok', '12000', '23-07-2019', 'Dinas', 'Gery', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id` varchar(20) NOT NULL,
  `unik` varchar(10) DEFAULT NULL,
  `divisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id`, `unik`, `divisi`) VALUES
('DVS-0001', 'OPT', 'OPERATIONAL'),
('DVS-0002', 'SLS', 'SALES & MARKETING');

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin`
--

CREATE TABLE `tb_izin` (
  `id_izn` varchar(20) NOT NULL,
  `jenis_izn` varchar(100) NOT NULL,
  `tgl_minta_izn` varchar(10) NOT NULL,
  `tgl_akhir_izn` varchar(10) NOT NULL,
  `nama_izn` varchar(50) NOT NULL,
  `alasan_izn` varchar(100) NOT NULL,
  `pjs_izn` varchar(50) NOT NULL,
  `status_izn` enum('Disetujui','Pending','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_izin`
--

INSERT INTO `tb_izin` (`id_izn`, `jenis_izn`, `tgl_minta_izn`, `tgl_akhir_izn`, `nama_izn`, `alasan_izn`, `pjs_izn`, `status_izn`) VALUES
('IZN-0001', 'JENIS', '12-08-2019', '20-08-2019', 'NAMA', 'ALASAN', 'NAMANYA', 'Pending'),
('IZN-0004', 'Ayah Ibu Mertua Saudara Meninggal Dunia [2 Hari] - Sisa 1 Hari', '12-01-2019', '23-02-2019', 'samaanman', 'asaa', 'DINDA', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `jabatan`) VALUES
('JBT-0001', 'ACCOUNTING'),
('JBT-0002', 'ADMIN FINANCE'),
('JBT-0003', 'ADMIN LOGISTIK'),
('JBT-0004', 'ADMIN SALES'),
('JBT-0005', 'ADMIN SERVICE & IT SUPPORT'),
('JBT-0006', '	\r\nTECHNICAL MARKETING SUPPORT'),
('JBT-0007', 'ADMIN TECHNICAL SUPPORT'),
('JBT-0008', 'AUDIT MANAGER'),
('JBT-0009', 'BRANCH MANAGER'),
('JBT-0010', 'CORPORATE ACCOUNT EXECUTIVE'),
('JBT-0011', 'DESIGN GRAPHIC'),
('JBT-0012', 'RECEPTIONIST'),
('JBT-0013', 'FINANCE'),
('JBT-0014', 'FINANCE AP'),
('JBT-0015', 'HELPER'),
('JBT-0016', 'LOGISTIK SUPERVISOR'),
('JBT-0017', 'MARKETING COMMUNICATION'),
('JBT-0018', 'MARKETING COMMUNICATION EVENT'),
('JBT-0019', 'MARKETING COMMUNICATION MANAGER'),
('JBT-0020', 'MARKETING SPECIALIST'),
('JBT-0021', 'PRE SALES ENGINEER'),
('JBT-0022', 'PRODUCT MANAGER'),
('JBT-0023', 'SALES EXECUTIVE'),
('JBT-0024', 'SALES MANAGER'),
('JBT-0025', 'SPB'),
('JBT-0026', 'ACCOUNT EXECUTIVE MANAGER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jk`
--

CREATE TABLE `tb_jk` (
  `id` varchar(5) NOT NULL,
  `jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jk`
--

INSERT INTO `tb_jk` (`id`, `jk`) VALUES
('1', 'LAKI-LAKI'),
('2', 'PEREMPUAN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_kry` varchar(50) NOT NULL,
  `nama_kry` varchar(50) DEFAULT NULL,
  `nik_kry` varchar(20) DEFAULT NULL,
  `jabatan_kry` varchar(30) NOT NULL,
  `pangkat_kry` varchar(30) NOT NULL,
  `divisi_kry` varchar(30) NOT NULL,
  `dep_kry` varchar(50) NOT NULL,
  `lokasi_kry` varchar(50) NOT NULL,
  `panggilan_kry` varchar(50) NOT NULL,
  `identitas_kry` varchar(30) NOT NULL,
  `jk_kry` varchar(10) NOT NULL,
  `tempat_lahir_kry` varchar(50) NOT NULL,
  `tgl_lahir_kry` varchar(20) NOT NULL,
  `negara_kry` varchar(30) NOT NULL,
  `agama_kry` varchar(30) NOT NULL,
  `npwp_kry` varchar(30) NOT NULL,
  `alamat_kry` varchar(100) NOT NULL,
  `tlp_rumah_kry` varchar(30) DEFAULT NULL,
  `no_hp_kry` varchar(30) NOT NULL,
  `tgl_masuk_kry` varchar(30) NOT NULL,
  `status_kerja_kry` varchar(30) NOT NULL,
  `status_nikah_kry` varchar(20) NOT NULL,
  `email_kry` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_kry`, `nama_kry`, `nik_kry`, `jabatan_kry`, `pangkat_kry`, `divisi_kry`, `dep_kry`, `lokasi_kry`, `panggilan_kry`, `identitas_kry`, `jk_kry`, `tempat_lahir_kry`, `tgl_lahir_kry`, `negara_kry`, `agama_kry`, `npwp_kry`, `alamat_kry`, `tlp_rumah_kry`, `no_hp_kry`, `tgl_masuk_kry`, `status_kerja_kry`, `status_nikah_kry`, `email_kry`) VALUES
('6', 'MARCO WIJAYA', '160601 ', 'PRODUCT MANAGER', 'MANAGER', 'SALES & MARKETING', 'MARKETING', 'PUSAT', 'nama', '3173042608920011', 'LAKI-LAKI', 'JAKARTA', '33842', 'INDONESIA', 'PROTESTANT', '70.048.108.8-033.000', 'JL TSS SETIAMASA IV RT 007 RW 001 KEL DURI SELATAN KEC TAMBORA JAKARTA BARAT', 'telpon', '0812-97284078', '42522', 'KONTRAK', 'SINGLE', 'marco.wijaya@astrindo.co.id'),
('EMP-0007', 'DINDA', '23212', 'MARKETING COMMUNICATION', 'STAFF', 'OPERATIONAL', 'FINANCE', 'CABANG SEMARANG', 'DINDA', '3212093938667728', 'PEREMPUAN', 'BANDUNG', '02-01-1988', 'INDONESIA', 'ISLAM', '3212333211123', 'ADA', '1', '0876355256262', '04-09-2018', 'TETAP', 'SINGLE', 'DINDA@gmail.com'),
('EMP-0008', 'SANDRA', '43243', 'CORPORATE ACCOUNT EXECUTIVE', 'STAFF', 'OPERATIONAL', 'IT', 'CABANG BANJARMASIN', 'SANDRA', '3212093938667728', 'PEREMPUAN', 'BANDUNG', '11-01-1992', 'INDONESIA', 'KRISTEN', '3212333211123', 'ADA', '1', '09876665446765', '09-09-2018', 'MAGANG', 'MENIKAH', 'san@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan_baru`
--

CREATE TABLE `tb_karyawan_baru` (
  `id_pmhn` varchar(20) NOT NULL,
  `dep_pmhn` varchar(30) NOT NULL,
  `nama_pemohon_pmhn` varchar(30) NOT NULL,
  `jabatan_pemohon_pmhn` varchar(50) NOT NULL,
  `jabatan_pmhn` varchar(50) NOT NULL,
  `lokasi_pmhn` varchar(30) NOT NULL,
  `waktu_pmhn` varchar(20) NOT NULL,
  `status_kerja_pmhn` varchar(20) NOT NULL,
  `jumlah_pmhn` varchar(10) NOT NULL,
  `tanggal_pmhn` varchar(20) NOT NULL,
  `dasar_permohonan_pmhn` varchar(30) NOT NULL,
  `sumber_rekrutmen_pmhn` varchar(30) NOT NULL,
  `ringkasan_tugas_pmhn` varchar(100) NOT NULL,
  `gajih_pmhn` varchar(30) NOT NULL,
  `jk_pmhn` varchar(15) NOT NULL,
  `usia_pmhn` tinyint(5) NOT NULL,
  `pendidikan_pmhn` varchar(30) NOT NULL,
  `jurusan_pmhn` varchar(30) NOT NULL,
  `pengalaman_kerja_pmhn` varchar(100) NOT NULL,
  `bidang_pmhn` varchar(50) NOT NULL,
  `syarat_lain_pmhn` varchar(100) NOT NULL,
  `keterampilan_pmhn` varchar(100) NOT NULL,
  `tgl_bergabung_pmhn` varchar(15) NOT NULL,
  `office_equipment_pmhn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan_baru`
--

INSERT INTO `tb_karyawan_baru` (`id_pmhn`, `dep_pmhn`, `nama_pemohon_pmhn`, `jabatan_pemohon_pmhn`, `jabatan_pmhn`, `lokasi_pmhn`, `waktu_pmhn`, `status_kerja_pmhn`, `jumlah_pmhn`, `tanggal_pmhn`, `dasar_permohonan_pmhn`, `sumber_rekrutmen_pmhn`, `ringkasan_tugas_pmhn`, `gajih_pmhn`, `jk_pmhn`, `usia_pmhn`, `pendidikan_pmhn`, `jurusan_pmhn`, `pengalaman_kerja_pmhn`, `bidang_pmhn`, `syarat_lain_pmhn`, `keterampilan_pmhn`, `tgl_bergabung_pmhn`, `office_equipment_pmhn`) VALUES
('NEW-0007', 'HR/GA', 'KRISNAWATI', 'ACCOUNTING', 'ADMIN TECHNICAL SUPP', 'CABANG MAKASSAR', '09-01-2019', 'KARYAWAN KONTRAK', '1', '12-12-2018', 'PERGANTIAN KARYAWAN RESIGN', 'SOCIAL MEDIA', '-', '65000000', 'LAKI-LAKI', 23, 'S1', 'AKUNTANSI', '-', 'AKUNTANSI', '-', '-', '07-01-2019', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerja`
--

CREATE TABLE `tb_kerja` (
  `id` varchar(5) NOT NULL,
  `status_kerja` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerja`
--

INSERT INTO `tb_kerja` (`id`, `status_kerja`) VALUES
('1', 'TETAP'),
('2', 'KONTRAK'),
('3', 'MAGANG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lembur`
--

CREATE TABLE `tb_lembur` (
  `id_ot` varchar(20) NOT NULL,
  `tanggal_ot` varchar(10) NOT NULL,
  `waktu_ot` varchar(30) NOT NULL,
  `nama_ot` varchar(50) NOT NULL,
  `keterangan_ot` varchar(100) NOT NULL,
  `status_ot` enum('Disetujui','Pending','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lembur`
--

INSERT INTO `tb_lembur` (`id_ot`, `tanggal_ot`, `waktu_ot`, `nama_ot`, `keterangan_ot`, `status_ot`) VALUES
('OT-0001', '12-07-2019', '10 Jam', 'Alexa', 'Nambah Gajih', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mpp`
--

CREATE TABLE `tb_mpp` (
  `id_pp` varchar(20) NOT NULL,
  `jabatan_pp` varchar(50) NOT NULL,
  `dep_pp` varchar(50) NOT NULL,
  `area_pp` varchar(30) NOT NULL,
  `status_pp` varchar(30) NOT NULL,
  `jml_butuh_pp` int(5) NOT NULL,
  `sisa_pp` int(5) NOT NULL,
  `nama_pmh_pp` varchar(50) NOT NULL,
  `jabatan_pmh_pp` varchar(50) NOT NULL,
  `tgl_pmh_pp` varchar(20) NOT NULL,
  `tgl_tempo_pp` varchar(20) NOT NULL,
  `tgl_wawancara_pp` varchar(20) NOT NULL,
  `tgl_pmnh_pp` varchar(20) NOT NULL,
  `kcp_pmnh_pp` varchar(10) NOT NULL,
  `total_pp` int(20) NOT NULL,
  `tgl_masuk_pp` varchar(20) NOT NULL,
  `sumber_rek_pp` varchar(30) NOT NULL,
  `ket_pp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mpp`
--

INSERT INTO `tb_mpp` (`id_pp`, `jabatan_pp`, `dep_pp`, `area_pp`, `status_pp`, `jml_butuh_pp`, `sisa_pp`, `nama_pmh_pp`, `jabatan_pmh_pp`, `tgl_pmh_pp`, `tgl_tempo_pp`, `tgl_wawancara_pp`, `tgl_pmnh_pp`, `kcp_pmnh_pp`, `total_pp`, `tgl_masuk_pp`, `sumber_rek_pp`, `ket_pp`) VALUES
('MPP-0003', 'ADMIN SERVICE & IT SUPPORT', 'PURCHASING', '', 'N', 1, 1, 'DARTO', 'MARKETING COMMUNICATION', '15-11-2018', '27-11-2018', '27-11-2018', '26-11-2018', '3', 1, '20-11-2018', 'LUAR PERUSAHAAN', 'Q'),
('MPP-0004', 'MARKETING COMMUNICATION', 'IT', '', 'R', 1, 2, 'TAYO', 'MARKETING COMMUNICATION', '29-11-2018', '28-11-2018', '29-11-2018', '28-11-2018', '21', 2, '22-11-2018', 'DALAM PERUSAHAAN', 'ADA'),
('MPP-0005', 'CORPORATE ACCOUNT EXECUTIVE', 'PURCHASING', '', 'N', 3, 2, 'FERRY', 'ADMIN SERVICE & IT SUPPORT', '14-06-2018', '22-01-2018', '22-06-2017', '21-06-2017', '25', 2, '28-11-2018', 'DALAM PERUSAHAAN', 'ADA'),
('MPP-0006', 'ADMIN SALES', 'PURCHASING', '500', 'SS', 1, 1, 'SANDRA', 'SS', '15-01-2019', '21-01-2019', '20-01-2019', '09-01-2019', '1', 1, '18-01-2019', 'LUAR PERUSAHAAN', 'SS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nikah`
--

CREATE TABLE `tb_nikah` (
  `id` varchar(5) NOT NULL,
  `status_nikah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nikah`
--

INSERT INTO `tb_nikah` (`id`, `status_nikah`) VALUES
('1', 'MENIKAH'),
('2', 'SINGLE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pangkat`
--

CREATE TABLE `tb_pangkat` (
  `id` varchar(20) NOT NULL,
  `pangkat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pangkat`
--

INSERT INTO `tb_pangkat` (`id`, `pangkat`) VALUES
('PGK-0001', 'MANAGER'),
('PGK-0002', 'STAFF'),
('PGK-0003', 'OPERATOR'),
('PGK-0004', 'SUPERVISOR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemohon`
--

CREATE TABLE `tb_pemohon` (
  `id_pemohon` varchar(30) NOT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `nik_pemohon` varchar(20) NOT NULL,
  `jabatan_pemohon` varchar(50) NOT NULL,
  `dep_pemohon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemohon`
--

INSERT INTO `tb_pemohon` (`id_pemohon`, `nama_pemohon`, `nik_pemohon`, `jabatan_pemohon`, `dep_pemohon`) VALUES
('ADJ-0002', 'MARCO WIJAYA', '160601 ', 'PRODUCT MANAGER', 'OPERATIONAL'),
('ADJ-0004', 'MARLIANA SARI', '130102 ', 'ACCOUNT EXECUTIVE MANAGER', 'QA'),
('ADJ-0005', 'YENI APRIANI', '070503 ', 'SALES EXECUTIVE', 'SALES');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id` int(10) NOT NULL,
  `pendidikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id`, `pendidikan`) VALUES
(1, 'S2'),
(2, 'S1'),
(3, 'D3'),
(4, 'SMA / SMA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilai`
--

CREATE TABLE `tb_penilai` (
  `id_penilai` varchar(20) NOT NULL,
  `nama_penilai` varchar(50) NOT NULL,
  `nik_penilai` varchar(20) NOT NULL,
  `jabatan_penilai` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilai`
--

INSERT INTO `tb_penilai` (`id_penilai`, `nama_penilai`, `nik_penilai`, `jabatan_penilai`) VALUES
('VER-0002', 'SUPRIYATNA', '140901 ', 'RECEPTIONIST'),
('VER-0003', 'HANDRI', '189009', 'ADMIN SERVICE & IT SUPPORT'),
('VER-0004', 'MARLIANA', '130102 ', 'ACCOUNT EXECUTIVE MANAGER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_nl` varchar(20) NOT NULL,
  `nama_nl` varchar(50) NOT NULL,
  `nik_nl` varchar(20) NOT NULL,
  `dep_nl` varchar(50) NOT NULL,
  `tgl_masuk_nl` varchar(10) NOT NULL,
  `jabatan_nl` varchar(50) NOT NULL,
  `nama_penilai_nl` varchar(50) NOT NULL,
  `jabatan_penilai_nl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_nl`, `nama_nl`, `nik_nl`, `dep_nl`, `tgl_masuk_nl`, `jabatan_nl`, `nama_penilai_nl`, `jabatan_penilai_nl`) VALUES
('ASM-0003', 'TAYO', '140801 ', 'AUDIT', '4-Aug-14', 'ACCOUNTING', 'MARLIANA', 'ACCOUNT EXECUTIVE MANAGER'),
('ASM-0004', 'MESNA MARISI MAGDALENA', '140706 ', 'FINANCE', '10-Jul-14', 'A/R STAFF', 'YENI APRIANI', 'SALES EXECUTIVE'),
('ASM-0005', 'Q', '1', 'AUDIT', '22-11-2018', 'ACCOUNTING', 'Q', 'ACCOUNTING'),
('ASM-0006', 'SUTEJO', '14322', 'PURCHASING', '20-11-2018', 'ADMIN SALES', 'SUPRIYATNA', 'RECEPTIONIST');

-- --------------------------------------------------------

--
-- Table structure for table `tb_percobaan`
--

CREATE TABLE `tb_percobaan` (
  `id_cb` varchar(20) NOT NULL,
  `nama_cb` varchar(50) NOT NULL,
  `nik_cb` varchar(10) NOT NULL,
  `dep_cb` varchar(30) NOT NULL,
  `jabatan_cb` varchar(30) NOT NULL,
  `tgl_masuk_cb` varchar(10) NOT NULL,
  `jenis_cb` varchar(30) NOT NULL,
  `tgl_mulai_cb` varchar(10) NOT NULL,
  `tgl_selesai_cb` varchar(10) NOT NULL,
  `percobaan_cb` tinyint(5) NOT NULL,
  `catatan_hr_cb` varchar(100) NOT NULL,
  `catatan_atasan_cb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_percobaan`
--

INSERT INTO `tb_percobaan` (`id_cb`, `nama_cb`, `nik_cb`, `dep_cb`, `jabatan_cb`, `tgl_masuk_cb`, `jenis_cb`, `tgl_mulai_cb`, `tgl_selesai_cb`, `percobaan_cb`, `catatan_hr_cb`, `catatan_atasan_cb`) VALUES
('TRY-0003', 'IKA HERAWATI', '19876', 'AUDIT', 'ACCOUNTING', '04-12-2018', 'KARYAWAN TETAP', '08-10-2018', '10-01-2019', 2, 'LULUS', 'LULUS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id` tinyint(5) NOT NULL,
  `permohonan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id`, `permohonan`) VALUES
(1, 'RENCANA / ANGGARAN TAHUNAN'),
(2, 'PERGANTIAN KARYAWAN RESIGN'),
(3, 'PERGANTIAN KARYAWAN MUTASI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_preq`
--

CREATE TABLE `tb_preq` (
  `id_preq` int(20) NOT NULL,
  `jns_preq` varchar(30) NOT NULL,
  `jml_preq` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekrutmen`
--

CREATE TABLE `tb_rekrutmen` (
  `id` tinyint(5) NOT NULL,
  `rekrutmen` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekrutmen`
--

INSERT INTO `tb_rekrutmen` (`id`, `rekrutmen`) VALUES
(1, 'DALAM PERUSAHAAN'),
(2, 'LUAR PERUSAHAAN'),
(3, 'SOCIAL MEDIA'),
(4, 'JOB PORTAL'),
(5, 'REFERENSI'),
(6, 'JOB FAIR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_resign`
--

CREATE TABLE `tb_resign` (
  `id_rs` varchar(20) NOT NULL,
  `bulan_rs` varchar(20) NOT NULL,
  `nama_rs` varchar(50) NOT NULL,
  `pangkat_rs` varchar(30) NOT NULL,
  `jabatan_rs` varchar(50) NOT NULL,
  `dep_rs` varchar(30) NOT NULL,
  `tgl_masuk_rs` varchar(10) NOT NULL,
  `tgl_resign_rs` varchar(10) NOT NULL,
  `masa_bulan_rs` varchar(20) NOT NULL,
  `masa_tahun_rs` varchar(20) NOT NULL,
  `keterangan_rs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_resign`
--

INSERT INTO `tb_resign` (`id_rs`, `bulan_rs`, `nama_rs`, `pangkat_rs`, `jabatan_rs`, `dep_rs`, `tgl_masuk_rs`, `tgl_resign_rs`, `masa_bulan_rs`, `masa_tahun_rs`, `keterangan_rs`) VALUES
('RSG-0001', '09-2018', 'ALBERTO', 'STAFF', 'MARKETING COMMUNICATION MANAGER', 'LOGISTIK', '13-06-2018', '2018-09-10', '1', '2', 'ADA'),
('RSG-0002', '11-2018', 'MARIA HENDRADJAJA', 'MANAGER', 'ACCOUNTING', 'PURCHASING', '08-06-1905', '2018-09-23', '23', '2', 'ADA'),
('RSG-0003', '03-01-2019', 'DINDA', 'STAFF', 'MARKETING COMMUNICATION', 'FINANCE', '04-09-2018', '2018-01-16', '1', '21', 'ada'),
('RSG-0004', '31-12-2018', 'SANDRA', 'STAFF', 'CORPORATE ACCOUNT EXECUTIVE', 'IT', '09-09-2018', '2018-11-12', '1', '2', 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sakit`
--

CREATE TABLE `tb_sakit` (
  `id_skt` varchar(20) NOT NULL,
  `nama_skt` varchar(50) NOT NULL,
  `nik_skt` varchar(10) NOT NULL,
  `jabatan_skt` varchar(50) NOT NULL,
  `tgl_awal_skt` varchar(10) NOT NULL,
  `tgl_akhir_skt` varchar(10) NOT NULL,
  `jml_skt` int(5) NOT NULL,
  `penyakit_skt` varchar(50) NOT NULL,
  `keterangan_skt` varchar(100) NOT NULL,
  `pjs_skt` varchar(50) NOT NULL,
  `status_skt` enum('Disetujui','Pending','Ditolak') NOT NULL,
  `lampiran_skt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sakit`
--

INSERT INTO `tb_sakit` (`id_skt`, `nama_skt`, `nik_skt`, `jabatan_skt`, `tgl_awal_skt`, `tgl_akhir_skt`, `jml_skt`, `penyakit_skt`, `keterangan_skt`, `pjs_skt`, `status_skt`, `lampiran_skt`) VALUES
('SKT-0001', 'Jokowi', '1234', 'Calon Presiden', '12-06-2019', '17-10-2019', 10, 'Lupa', 'Masih Calon', 'MARCO WIJAYA', 'Pending', 'react.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_training`
--

CREATE TABLE `tb_training` (
  `id_tr` varchar(20) NOT NULL,
  `nama_pemohon_tr` varchar(50) NOT NULL,
  `nik_pemohon_tr` varchar(30) NOT NULL,
  `jabatan_pemohon_tr` varchar(30) NOT NULL,
  `dep_pemohon_tr` varchar(30) NOT NULL,
  `tgl_permohonan_tr` varchar(10) NOT NULL,
  `judul_training_tr` varchar(100) NOT NULL,
  `penyelenggara_tr` varchar(50) NOT NULL,
  `tgl_pelaksanaan_tr` varchar(10) NOT NULL,
  `tempat_pelaksanaan_tr` varchar(100) NOT NULL,
  `biaya_tr` varchar(30) NOT NULL,
  `pembayaran_tr` varchar(30) NOT NULL,
  `tgl_terima_tr` varchar(30) NOT NULL,
  `tgl_bayar_tr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_training`
--

INSERT INTO `tb_training` (`id_tr`, `nama_pemohon_tr`, `nik_pemohon_tr`, `jabatan_pemohon_tr`, `dep_pemohon_tr`, `tgl_permohonan_tr`, `judul_training_tr`, `penyelenggara_tr`, `tgl_pelaksanaan_tr`, `tempat_pelaksanaan_tr`, `biaya_tr`, `pembayaran_tr`, `tgl_terima_tr`, `tgl_bayar_tr`) VALUES
('TRY-0003', 'SULAIMAN', '16534', 'PRODUCT MANAGER', 'PURCHASING', '16-10-2018', 'ADA APA DENGAN VANESSA', 'PENGUASA', '24-10-2018', 'SURABAYA', '1200000000', 'TRANSFER', '21-11-2018', '16-10-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id` varchar(5) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id`, `kode`, `unit`) VALUES
('1', 'HO', 'PUSAT'),
('2', '500', 'CABANG BALI'),
('3', '600', 'CABANG SEMARANG'),
('4', '700', 'CABANG MAKASSAR'),
('5', '800', 'CABANG MEDAN'),
('6', '910', 'CABANG BANJARMASIN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` enum('admin','manager','staff') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `name`, `email`, `password`, `level`) VALUES
('USR-0001', 'admin', 'Handri Hermawan', 'satu@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('USR-0002', 'member', 'Ika Herawati', 'lima@mail.com', 'aa08769cdcb26674c6706093503ff0a3', 'staff'),
('USR-0003', 'manager', 'Adrian', 'adrian@astrindo.co.id', '1d0258c2440a8d19e716292b231e3190', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tb_all_mpp`
--
ALTER TABLE `tb_all_mpp`
  ADD PRIMARY KEY (`id_allmpp`);

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id_ct`);

--
-- Indexes for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  ADD PRIMARY KEY (`id_dns`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD PRIMARY KEY (`id_izn`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jk`
--
ALTER TABLE `tb_jk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_kry`),
  ADD UNIQUE KEY `id` (`id_kry`);

--
-- Indexes for table `tb_karyawan_baru`
--
ALTER TABLE `tb_karyawan_baru`
  ADD PRIMARY KEY (`id_pmhn`),
  ADD UNIQUE KEY `id` (`id_pmhn`);

--
-- Indexes for table `tb_kerja`
--
ALTER TABLE `tb_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lembur`
--
ALTER TABLE `tb_lembur`
  ADD PRIMARY KEY (`id_ot`);

--
-- Indexes for table `tb_mpp`
--
ALTER TABLE `tb_mpp`
  ADD PRIMARY KEY (`id_pp`);

--
-- Indexes for table `tb_nikah`
--
ALTER TABLE `tb_nikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pangkat`
--
ALTER TABLE `tb_pangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemohon`
--
ALTER TABLE `tb_pemohon`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penilai`
--
ALTER TABLE `tb_penilai`
  ADD PRIMARY KEY (`id_penilai`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_nl`);

--
-- Indexes for table `tb_percobaan`
--
ALTER TABLE `tb_percobaan`
  ADD PRIMARY KEY (`id_cb`);

--
-- Indexes for table `tb_preq`
--
ALTER TABLE `tb_preq`
  ADD PRIMARY KEY (`id_preq`);

--
-- Indexes for table `tb_rekrutmen`
--
ALTER TABLE `tb_rekrutmen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_resign`
--
ALTER TABLE `tb_resign`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indexes for table `tb_sakit`
--
ALTER TABLE `tb_sakit`
  ADD PRIMARY KEY (`id_skt`);

--
-- Indexes for table `tb_training`
--
ALTER TABLE `tb_training`
  ADD PRIMARY KEY (`id_tr`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
