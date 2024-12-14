-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 04:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(100) UNSIGNED NOT NULL,
  `no_akun` int(100) UNSIGNED NOT NULL,
  `kode_akun` varchar(100) NOT NULL,
  `nama_akun` varchar(500) NOT NULL,
  `no_subkomponen` int(100) UNSIGNED NOT NULL,
  `no_komponen` int(100) UNSIGNED NOT NULL,
  `no_suboutput` int(100) UNSIGNED NOT NULL,
  `no_output` int(100) UNSIGNED NOT NULL,
  `no_kegiatan` int(100) UNSIGNED NOT NULL,
  `no_program` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `no_akun`, `kode_akun`, `nama_akun`, `no_subkomponen`, `no_komponen`, `no_suboutput`, `no_output`, `no_kegiatan`, `no_program`) VALUES
(1, 1, '522191', 'Belanja Bahan', 1, 1, 1, 1, 1, 1),
(2, 2, '522191', 'Belanja Perjalanan Dinas', 1, 1, 1, 1, 1, 1),
(3, 3, '522191', 'Belanja Perjalanan Dinas Dalam Kota', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `akun_kegiatan`
--

CREATE TABLE `akun_kegiatan` (
  `id_kegiatan` int(100) UNSIGNED NOT NULL,
  `no_kegiatan` int(100) UNSIGNED NOT NULL,
  `kode_kegiatan` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(500) NOT NULL,
  `no_program` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_kegiatan`
--

INSERT INTO `akun_kegiatan` (`id_kegiatan`, `no_kegiatan`, `kode_kegiatan`, `nama_kegiatan`, `no_program`) VALUES
(1, 1, 'BF.1102', 'Penanganan Penyelidikan/Pengamanan/Penggalangan di Kejaksaan Tinggi, Kejaksaan Negeri dan Cabang Kejaksaan Negeri', 1),
(2, 2, 'BF.1103', 'Penerangan dan Penyuluhan Hukum di Pusat dan Daerah', 1),
(3, 3, 'BF.6582', 'Penanganan dan Penyelesaian Perkara Tindak Pidana Umum, Tindak Pidana Khusus, Perdata dan Tata Usaha Negara, Perkara Koneksitas Di Kejaksaan Tinggi, Kejaksaan Negeri dan Cabang Kejaksaan Negeri', 1),
(4, 4, 'WA.1090', 'Dukungan Manajemen Jaksa Agung Muda, Kejaksaan Tinggi, Kejaksaan Negeri dan Cabang Kejaksaan Negeri', 2);

-- --------------------------------------------------------

--
-- Table structure for table `akun_komponen`
--

CREATE TABLE `akun_komponen` (
  `id_komponen` int(100) UNSIGNED NOT NULL,
  `no_komponen` int(100) UNSIGNED NOT NULL,
  `kode_komponen` varchar(100) NOT NULL,
  `nama_komponen` varchar(500) NOT NULL,
  `no_suboutput` int(100) UNSIGNED NOT NULL,
  `no_output` int(100) UNSIGNED NOT NULL,
  `no_kegiatan` int(100) UNSIGNED NOT NULL,
  `no_program` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_komponen`
--

INSERT INTO `akun_komponen` (`id_komponen`, `no_komponen`, `kode_komponen`, `nama_komponen`, `no_suboutput`, `no_output`, `no_kegiatan`, `no_program`) VALUES
(1, 1, '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 1, 1, 1, 1),
(2, 2, '051', 'Pelaksanaan', 2, 1, 1, 1),
(3, 3, '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 3, 1, 1, 1),
(5, 4, '051', 'Pelaksanaan', 5, 2, 1, 1),
(6, 5, '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 6, 3, 2, 1),
(7, 6, '051', 'Pelaksanaan Penyuluhan Hukum di Kejati/kejari/Cabjari', 7, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `akun_output`
--

CREATE TABLE `akun_output` (
  `id_output` int(100) UNSIGNED NOT NULL,
  `no_output` int(100) UNSIGNED NOT NULL,
  `kode_output` varchar(100) NOT NULL,
  `nama_output` varchar(500) NOT NULL,
  `no_kegiatan` int(100) UNSIGNED NOT NULL,
  `no_program` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_output`
--

INSERT INTO `akun_output` (`id_output`, `no_output`, `kode_output`, `nama_output`, `no_kegiatan`, `no_program`) VALUES
(1, 1, 'BKA', 'Pemantauan Masyarakat dan Kelompok Masyarakat', 1, 1),
(2, 2, 'BKB', 'Pemantauan Produk', 1, 1),
(3, 3, 'BAB', 'Pelayanan Publik Kepada Lembaga', 2, 1),
(5, 4, 'QAA', 'Pelayanan Publik Kepada Masyarakat', 1, 1),
(6, 5, 'BCE', 'Penanganan Perkara', 3, 1),
(7, 6, 'CCL', 'OM Sarana Bidang Teknologi dan Komunikasi ', 4, 2),
(8, 7, 'EBA', 'Layanan Dukungan Manajemen Internal', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `akun_pembinaan`
--

CREATE TABLE `akun_pembinaan` (
  `id_akunpembinaan` int(100) UNSIGNED NOT NULL,
  `program` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `output` varchar(100) NOT NULL,
  `suboutput` varchar(100) NOT NULL,
  `komponen` varchar(100) NOT NULL,
  `subkomponen` varchar(100) NOT NULL,
  `akun` varchar(100) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `nama_item` varchar(500) NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_pembinaan`
--

INSERT INTO `akun_pembinaan` (`id_akunpembinaan`, `program`, `kegiatan`, `output`, `suboutput`, `komponen`, `subkomponen`, `akun`, `kode_item`, `nama_item`, `saldo`) VALUES
(1, 'WA | Program Dukungan Manajemen', 'WA.1090 | Dukungan Manajemen Jaksa Agung Muda, Kejaksaan Tinggi, Kejaksaan Negeri dan Cabang Kejaksa', 'CCL | OM Sarana Bidang Teknologi Informasi dan Komunikasi', 'CCL.051 | Penambahan Layanan Internet, Instalasi Jaringan dan Langganan Vsat', '051 | Pelaksanaan', '051.0A | Langganan Jaringan Internet', '522191 | Belanja Jasa Lainnya', '000116', 'Layanan Internet', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `akun_program`
--

CREATE TABLE `akun_program` (
  `id_program` int(100) UNSIGNED NOT NULL,
  `no_program` int(100) UNSIGNED NOT NULL,
  `kode_program` varchar(100) NOT NULL,
  `nama_program` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_program`
--

INSERT INTO `akun_program` (`id_program`, `no_program`, `kode_program`, `nama_program`) VALUES
(1, 1, 'BF', 'Program Penegakan dan Pelayanan Hukum'),
(2, 2, 'WA', 'Program Dukungan Manajemen');

-- --------------------------------------------------------

--
-- Table structure for table `akun_subkomponen`
--

CREATE TABLE `akun_subkomponen` (
  `id_subkomponen` int(100) UNSIGNED NOT NULL,
  `no_subkomponen` int(100) UNSIGNED NOT NULL,
  `kode_subkomponen` varchar(100) NOT NULL,
  `nama_subkomponen` varchar(500) NOT NULL,
  `no_komponen` int(100) UNSIGNED NOT NULL,
  `no_suboutput` int(100) UNSIGNED NOT NULL,
  `no_output` int(100) UNSIGNED NOT NULL,
  `no_kegiatan` int(100) UNSIGNED NOT NULL,
  `no_program` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_subkomponen`
--

INSERT INTO `akun_subkomponen` (`id_subkomponen`, `no_subkomponen`, `kode_subkomponen`, `nama_subkomponen`, `no_komponen`, `no_suboutput`, `no_output`, `no_kegiatan`, `no_program`) VALUES
(2, 2, '051.0A', 'Pemantauan Pemilihan Umum Tahun 2024', 2, 2, 1, 1, 1),
(3, 3, '005.0A', 'TANPA SUB KOMPONEN', 3, 3, 1, 1, 1),
(6, 1, '005.0A', 'TANPA SUB KOMPONEN', 1, 1, 1, 1, 1),
(8, 4, '051.0A', 'Pelaksanaan', 2, 5, 2, 1, 1),
(9, 5, '005.0A', 'TANPA SUB KOMPONEN', 6, 6, 3, 2, 1),
(10, 6, '051.0A', 'Jaksa Masuk Sekolah', 7, 7, 5, 2, 1),
(11, 7, '051.0B', 'Jaksa Menyapa / Om Jak Menjawab', 7, 7, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `isi_pembinaan`
--

CREATE TABLE `isi_pembinaan` (
  `id_isi_pembinaan` int(6) UNSIGNED NOT NULL,
  `id_pencairan_pembinaan` int(6) UNSIGNED NOT NULL,
  `akun` int(11) UNSIGNED NOT NULL,
  `kode_item` int(11) UNSIGNED NOT NULL,
  `rincian` text NOT NULL,
  `volume` int(15) NOT NULL,
  `harga_satuan` int(15) NOT NULL,
  `jumlah` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(100) UNSIGNED NOT NULL,
  `no_item` int(100) UNSIGNED NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `nama_item` varchar(500) NOT NULL,
  `no_akun` int(100) UNSIGNED NOT NULL,
  `no_subkomponen` int(100) UNSIGNED NOT NULL,
  `no_komponen` int(100) UNSIGNED NOT NULL,
  `no_suboutput` int(100) UNSIGNED NOT NULL,
  `no_output` int(100) UNSIGNED NOT NULL,
  `no_kegiatan` int(100) UNSIGNED NOT NULL,
  `no_program` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `no_item`, `kode_item`, `nama_item`, `no_akun`, `no_subkomponen`, `no_komponen`, `no_suboutput`, `no_output`, `no_kegiatan`, `no_program`) VALUES
(1, 1, '000001', 'Pengadaan ATK', 1, 2, 1, 1, 1, 1, 1),
(2, 2, '000002', 'Uang Harian Kegiatan Lid/Pam/Gal', 2, 1, 1, 1, 1, 1, 1),
(4, 3, '000004', 'Uang Harian Kegiatan Lid/Pam/Gal', 3, 3, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(36, '2024-10-27-050502', 'App\\Database\\Migrations\\Pembinaan1', 'default', 'App', 1731379043, 1),
(37, '2024-11-07-095020', 'App\\Database\\Migrations\\AkunProgram', 'default', 'App', 1731379043, 1),
(38, '2024-11-07-133400', 'App\\Database\\Migrations\\AkunKegiatan', 'default', 'App', 1731379263, 2),
(39, '2024-11-09-134752', 'App\\Database\\Migrations\\AkunOutput', 'default', 'App', 1731379263, 2),
(40, '2024-11-09-151449', 'App\\Database\\Migrations\\AkunSubOutput', 'default', 'App', 1731379264, 2),
(43, '2024-11-12-071623', 'App\\Database\\Migrations\\AkunKomponen', 'default', 'App', 1731401936, 3),
(44, '2024-11-12-092726', 'App\\Database\\Migrations\\AkunSubKomponen', 'default', 'App', 1731403781, 4),
(46, '2024-11-12-121230', 'App\\Database\\Migrations\\AkunAkun', 'default', 'App', 1731420068, 5),
(47, '2024-11-13-013247', 'App\\Database\\Migrations\\AkunItem', 'default', 'App', 1731461751, 6),
(91, '2024-11-13-144408', 'App\\Database\\Migrations\\CreateTransaksiPembinaan', 'default', 'App', 1731806628, 7),
(92, '2024-11-14-061011', 'App\\Database\\Migrations\\CreateNilai', 'default', 'App', 1731806628, 7),
(93, '2024-11-15-233507', 'App\\Database\\Migrations\\CreateAkunPembinaan', 'default', 'App', 1731806628, 7),
(94, '2024-11-16-231752', 'App\\Database\\Migrations\\CreatePencairanPembinaan', 'default', 'App', 1731806628, 7),
(95, '2024-11-17-000828', 'App\\Database\\Migrations\\CreateIsiPembinaan', 'default', 'App', 1731806628, 7),
(97, '2024-12-13-121617', 'App\\Database\\Migrations\\AddNoSuratToPencairanPembinaan', 'default', 'App', 1734094814, 8),
(98, '2024-12-13-125745', 'App\\Database\\Migrations\\CreatePaguanggaranTable', 'default', 'App', 1734099671, 9),
(100, '2024-12-14-040308', 'App\\Database\\Migrations\\ChangeNoSuratTypeToVarchar', 'default', 'App', 1734149213, 10),
(101, '2024-12-14-055157', 'App\\Database\\Migrations\\AddForeignKeyToPaguanggaran', 'default', 'App', 1734155571, 11),
(102, '2024-12-14-064021', 'App\\Database\\Migrations\\ChangeKodeItemAtPencairanPembinaanTableToVarchar', 'default', 'App', 1734158502, 12);

-- --------------------------------------------------------

--
-- Table structure for table `paguanggaran`
--

CREATE TABLE `paguanggaran` (
  `id_paguanggaran` int(10) UNSIGNED NOT NULL,
  `kode_suboutput` int(100) UNSIGNED NOT NULL,
  `kode_item` int(100) UNSIGNED NOT NULL,
  `jumlah` int(100) NOT NULL DEFAULT 0,
  `tahun` year(4) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paguanggaran`
--

INSERT INTO `paguanggaran` (`id_paguanggaran`, `kode_suboutput`, `kode_item`, `jumlah`, `tahun`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 100, '2024', 'Keterangan', NULL, NULL, NULL),
(2, 2, 4, 200, '2024', 'Keterangan', NULL, NULL, NULL),
(3, 3, 4, 450, '2024', 'Keterangan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembinaan1`
--

CREATE TABLE `pembinaan1` (
  `id_pembinaan1` int(6) UNSIGNED NOT NULL,
  `kode` varchar(15) NOT NULL,
  `uraian_kegiatan` text DEFAULT NULL,
  `pagu_dalam_dipa` varchar(20) NOT NULL,
  `spp_sd_bulan_lalu` varchar(20) NOT NULL,
  `spp_bulan_ini` varchar(20) NOT NULL,
  `jumlah_spp_sd_bulan_ini` varchar(20) NOT NULL,
  `sisa_pagu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pencairan_pembinaan`
--

CREATE TABLE `pencairan_pembinaan` (
  `id_pencairan_pembinaan` int(6) UNSIGNED NOT NULL,
  `no_kwitansi` varchar(5) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `perihal` varchar(500) NOT NULL,
  `akun` int(11) UNSIGNED NOT NULL,
  `kode_item` varchar(255) DEFAULT NULL,
  `rincian` text NOT NULL,
  `volume` int(15) NOT NULL,
  `harga_satuan` int(15) NOT NULL,
  `jumlah` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `no_surat` varchar(255) DEFAULT NULL,
  `tgl_surat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pencairan_pembinaan`
--

INSERT INTO `pencairan_pembinaan` (`id_pencairan_pembinaan`, `no_kwitansi`, `tanggal`, `perihal`, `akun`, `kode_item`, `rincian`, `volume`, `harga_satuan`, `jumlah`, `created_at`, `updated_at`, `deleted_at`, `no_surat`, `tgl_surat`) VALUES
(2, '0005', '2024-11-17', 'pembayaran', 522191, '000001', '1 bulan ', 1, 300000, 300000, NULL, '2024-12-14 15:31:23', NULL, '100', '10/2024'),
(3, '0002', '2024-11-17', 'boleh', 522191, '000002', '1 bulan ', 1, 200000, 200000, NULL, NULL, NULL, NULL, NULL),
(4, '0003', '2024-11-17', 'BB', 522191, '000004', 'BEBS', 1, 20000, 20000, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suboutput`
--

CREATE TABLE `suboutput` (
  `id_suboutput` int(100) UNSIGNED NOT NULL,
  `no_suboutput` int(100) UNSIGNED NOT NULL,
  `kode_suboutput` varchar(100) NOT NULL,
  `nama_suboutput` varchar(500) NOT NULL,
  `no_output` int(100) UNSIGNED NOT NULL,
  `no_kegiatan` int(100) UNSIGNED NOT NULL,
  `no_program` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suboutput`
--

INSERT INTO `suboutput` (`id_suboutput`, `no_suboutput`, `kode_suboutput`, `nama_suboutput`, `no_output`, `no_kegiatan`, `no_program`) VALUES
(1, 1, 'BKA.052', 'Kegiatan / Operasi Intelijen Penyidikan, Pengamanan, dan Penggalangan di Kejaksaan Tinggi/ Kejaksaan Negeri/ Cabang Kejaksaan Negeri', 1, 1, 1),
(2, 2, 'BKA.056', 'Pemantauan PEMILU (Legislatif, Pemilihan Presiden, Pemilihan Kepala Daerah)', 1, 1, 1),
(3, 3, 'BKA.054', 'Kegiatan Pengawasan Aliran Kepercayaan Masyarakat Di Kejaksaan Tinggi/Kejaksaan Negeri/Cabang Kejaksaan Negeri', 1, 1, 1),
(5, 4, 'BKB.058', 'Kampanye Anti Korupsi di Kejaksaan Tinggi / Kejaksaan Negeri / Cabang Kejaksaan Negeri', 2, 1, 1),
(6, 5, 'BAB.U55', 'Lembaga Yang Telah Diberi Penerangan Hukum pada Kejaksaan Tinggi / Kejaksaan Negeri / Cabang Kejaksaan Negeri', 3, 2, 1),
(7, 6, 'QAA.057', 'Penyuluhan Hukum Di Kejaksaan Tinggi / Kejaksaan Negeri / Cabang Kejaksaan Negeri', 5, 2, 1),
(8, 7, 'BCE.051', 'Perkara Pidana Umum Dalam Tahap Pra Penuntutan pada Kejaksaan Tinggi / Kejaksaan Negeri / Cabang Kejaksaan Negeri', 6, 3, 1),
(9, 8, 'BCE.052', 'Perkara Pidana Umum Dalam Tahap Pra Penuntutan dan Penuntutan pada Kejaksaan Negeri / Cabang Kejaksaan Negeri', 6, 3, 1),
(10, 9, 'BCE.054', 'Perkara Tindak Pidana Umum Dalam Tahap Upaya Hukum dan Pelaksanaan Eksekusi di Kejaksaan Negeri / Cabang Kejaksaan Negeri', 6, 3, 1),
(11, 10, 'BCE.062', 'Pelaksanaan eksekusi perkara Tindak Pidana Korupsi, Tindak Pidana Khusus Lainnya terpidana tidak ditahan dalam Rumah Tahanan di kejaksaan Tinggi/Kejaksaan Negeri/Cabang Kejaksaan Negeri', 6, 3, 1),
(12, 11, 'BCE.063', 'Pelaksanaan eksekusi perkara Tindak Pidana Korupsi, Tindak Pidana Khusus Lainnya terpidana ditahan dalam Rumah Tahanan di kejaksaan Tinggi/Kejaksaan Negeri/Cabang Kejaksaan Negeri', 6, 3, 1),
(13, 12, 'BCE.065', 'Perkara Perdata dan Tata Usaha Negara yang diselesaikan di Kejaksaan Tinggi/Kejaksaan Negeri/Cabang Kejaksaan Negeri', 6, 3, 1),
(14, 13, 'BCE.066', 'Layanan Informasi dan Pelayanan Hukum Gratis di Kejaksaan Tinggi/Kejaksaan Negeri', 6, 3, 1),
(15, 14, 'BCE.067', 'Pertimbangan Hukum/Penampingan Hukum/Bantuan Hukum yang dilakukan di Kejaksaan Tinggi/Kejaksaan Negeri', 6, 3, 1),
(16, 15, 'BCE.073', 'Pemeliharaan, Pemusnahan, Penyelesaian barang bukti/sitaan/rampasan', 6, 3, 1),
(17, 16, 'BCE.U50', 'Restorative Justice perkara Tindak Pidana Umum Pada Kejaksaan Negeri/ Cabang Kejaksaan Negeri', 1, 1, 1),
(18, 17, 'BCE.U51', 'Perkara Tindak Pidana Korupsi dan Pencucian Uang Pada Tahap Penyelidikan Di Kejaksaan Tinggi/Kejaksaan Negeri/Cabang Kejaksaan Negeri', 6, 3, 1),
(19, 18, 'BCE.U53', 'Perkara Tindak Pidana Korupsi dan Pencucian Uang pada Tahap Penyidikan di Kejaksaan Tinggi/Kejaksaan Negeri/Cabang Kejaksaan Negeri', 6, 3, 1),
(20, 19, 'BCE.U56', 'Perkara Tindak Pidana Korupsi dan Tindak Pidana Khusus Lainnya pada Tahap Pra Penuntutan dan Penuntutan di Kejaksaan Negeri/Cabang Kejaksaan Negeri Wilayah I', 6, 3, 1),
(21, 20, 'CCL.051', 'Penambahan Layanan Internet, Instalasi, Jaringan dan Langganan Vsat', 7, 4, 2),
(22, 21, 'EBA.962', 'Layanan Umum', 7, 4, 2),
(23, 22, 'EBA.994', 'Layanan Perkantoran', 7, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_pembinaan`
--

CREATE TABLE `tbl_nilai_pembinaan` (
  `id_nilai` int(6) UNSIGNED NOT NULL,
  `id_transaksi` int(5) UNSIGNED NOT NULL,
  `kode_akun` int(11) UNSIGNED NOT NULL,
  `kode_item` int(11) UNSIGNED NOT NULL,
  `rincian` text NOT NULL,
  `volume` int(15) NOT NULL,
  `harga_satuan` int(15) NOT NULL,
  `jumlah` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_pembinaan`
--

CREATE TABLE `tbl_transaksi_pembinaan` (
  `id_transaksi` int(6) UNSIGNED NOT NULL,
  `no_kwitansi` varchar(5) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `perihal` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi_pembinaan`
--

INSERT INTO `tbl_transaksi_pembinaan` (`id_transaksi`, `no_kwitansi`, `tanggal`, `perihal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0001', '2024-11-17', 'oke', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `akun_akun_no_program_foreign` (`no_program`);

--
-- Indexes for table `akun_kegiatan`
--
ALTER TABLE `akun_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `akun_kegiatan_no_program_foreign` (`no_program`);

--
-- Indexes for table `akun_komponen`
--
ALTER TABLE `akun_komponen`
  ADD PRIMARY KEY (`id_komponen`),
  ADD KEY `akun_komponen_no_program_foreign` (`no_program`);

--
-- Indexes for table `akun_output`
--
ALTER TABLE `akun_output`
  ADD PRIMARY KEY (`id_output`),
  ADD KEY `akun_output_no_program_foreign` (`no_program`);

--
-- Indexes for table `akun_pembinaan`
--
ALTER TABLE `akun_pembinaan`
  ADD PRIMARY KEY (`id_akunpembinaan`);

--
-- Indexes for table `akun_program`
--
ALTER TABLE `akun_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `akun_subkomponen`
--
ALTER TABLE `akun_subkomponen`
  ADD PRIMARY KEY (`id_subkomponen`),
  ADD KEY `akun_subkomponen_no_program_foreign` (`no_program`);

--
-- Indexes for table `isi_pembinaan`
--
ALTER TABLE `isi_pembinaan`
  ADD PRIMARY KEY (`id_isi_pembinaan`),
  ADD KEY `isi_pembinaan_id_pencairan_pembinaan_foreign` (`id_pencairan_pembinaan`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `akun_item_no_program_foreign` (`no_program`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paguanggaran`
--
ALTER TABLE `paguanggaran`
  ADD PRIMARY KEY (`id_paguanggaran`),
  ADD KEY `paguanggaran_kode_sub_output_foreign` (`kode_suboutput`),
  ADD KEY `paguanggaran_kode_item_foreign` (`kode_item`);

--
-- Indexes for table `pembinaan1`
--
ALTER TABLE `pembinaan1`
  ADD PRIMARY KEY (`id_pembinaan1`);

--
-- Indexes for table `pencairan_pembinaan`
--
ALTER TABLE `pencairan_pembinaan`
  ADD PRIMARY KEY (`id_pencairan_pembinaan`);

--
-- Indexes for table `suboutput`
--
ALTER TABLE `suboutput`
  ADD PRIMARY KEY (`id_suboutput`),
  ADD KEY `akun_suboutput_no_program_foreign` (`no_program`);

--
-- Indexes for table `tbl_nilai_pembinaan`
--
ALTER TABLE `tbl_nilai_pembinaan`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `tbl_nilai_pembinaan_id_transaksi_foreign` (`id_transaksi`);

--
-- Indexes for table `tbl_transaksi_pembinaan`
--
ALTER TABLE `tbl_transaksi_pembinaan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `akun_kegiatan`
--
ALTER TABLE `akun_kegiatan`
  MODIFY `id_kegiatan` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `akun_komponen`
--
ALTER TABLE `akun_komponen`
  MODIFY `id_komponen` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `akun_output`
--
ALTER TABLE `akun_output`
  MODIFY `id_output` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `akun_pembinaan`
--
ALTER TABLE `akun_pembinaan`
  MODIFY `id_akunpembinaan` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun_program`
--
ALTER TABLE `akun_program`
  MODIFY `id_program` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `akun_subkomponen`
--
ALTER TABLE `akun_subkomponen`
  MODIFY `id_subkomponen` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `isi_pembinaan`
--
ALTER TABLE `isi_pembinaan`
  MODIFY `id_isi_pembinaan` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `paguanggaran`
--
ALTER TABLE `paguanggaran`
  MODIFY `id_paguanggaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembinaan1`
--
ALTER TABLE `pembinaan1`
  MODIFY `id_pembinaan1` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pencairan_pembinaan`
--
ALTER TABLE `pencairan_pembinaan`
  MODIFY `id_pencairan_pembinaan` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suboutput`
--
ALTER TABLE `suboutput`
  MODIFY `id_suboutput` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_nilai_pembinaan`
--
ALTER TABLE `tbl_nilai_pembinaan`
  MODIFY `id_nilai` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaksi_pembinaan`
--
ALTER TABLE `tbl_transaksi_pembinaan`
  MODIFY `id_transaksi` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_akun_no_program_foreign` FOREIGN KEY (`no_program`) REFERENCES `akun_program` (`id_program`);

--
-- Constraints for table `akun_kegiatan`
--
ALTER TABLE `akun_kegiatan`
  ADD CONSTRAINT `akun_kegiatan_no_program_foreign` FOREIGN KEY (`no_program`) REFERENCES `akun_program` (`id_program`);

--
-- Constraints for table `akun_komponen`
--
ALTER TABLE `akun_komponen`
  ADD CONSTRAINT `akun_komponen_no_program_foreign` FOREIGN KEY (`no_program`) REFERENCES `akun_program` (`id_program`);

--
-- Constraints for table `akun_output`
--
ALTER TABLE `akun_output`
  ADD CONSTRAINT `akun_output_no_program_foreign` FOREIGN KEY (`no_program`) REFERENCES `akun_program` (`id_program`);

--
-- Constraints for table `akun_subkomponen`
--
ALTER TABLE `akun_subkomponen`
  ADD CONSTRAINT `akun_subkomponen_no_program_foreign` FOREIGN KEY (`no_program`) REFERENCES `akun_program` (`id_program`);

--
-- Constraints for table `isi_pembinaan`
--
ALTER TABLE `isi_pembinaan`
  ADD CONSTRAINT `isi_pembinaan_id_pencairan_pembinaan_foreign` FOREIGN KEY (`id_pencairan_pembinaan`) REFERENCES `pencairan_pembinaan` (`id_pencairan_pembinaan`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `akun_item_no_program_foreign` FOREIGN KEY (`no_program`) REFERENCES `akun_program` (`id_program`);

--
-- Constraints for table `paguanggaran`
--
ALTER TABLE `paguanggaran`
  ADD CONSTRAINT `paguanggaran_kode_item_foreign` FOREIGN KEY (`kode_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `paguanggaran_kode_sub_output_foreign` FOREIGN KEY (`kode_suboutput`) REFERENCES `suboutput` (`id_suboutput`);

--
-- Constraints for table `suboutput`
--
ALTER TABLE `suboutput`
  ADD CONSTRAINT `akun_suboutput_no_program_foreign` FOREIGN KEY (`no_program`) REFERENCES `akun_program` (`id_program`);

--
-- Constraints for table `tbl_nilai_pembinaan`
--
ALTER TABLE `tbl_nilai_pembinaan`
  ADD CONSTRAINT `tbl_nilai_pembinaan_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi_pembinaan` (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
