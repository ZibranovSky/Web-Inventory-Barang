-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2024 pada 12.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama`, `telepon`, `foto`) VALUES
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '081235', '22092020020607employee1.png'),
(26, 'umam', '202cb962ac59075b964b07152d234b70', 'umim', '10928287', '9-WhatsApp Image 2024-06-25 at 08.38.31_c6fea67b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ajuan`
--

CREATE TABLE `tb_ajuan` (
  `no_ajuan` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_ajuan` int(11) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_ajuan`
--

INSERT INTO `tb_ajuan` (`no_ajuan`, `tanggal`, `kode_brg`, `nama_brg`, `stok`, `jml_ajuan`, `petugas`, `val`) VALUES
(112, '2020-09-22', '92938', 'Ssd IOS 1 tb', 90, 2, 'Petugas', 0),
(121, '2024-07-17', '121', 'hp murah', 40, 30, 'Petugas', 1),
(202, '2024-07-17', '222', 'hp rusak', 30, 5, 'Petugas', 1),
(212, '2020-09-22', '92938', 'Ssd IOS 1 tb', 70, 3, 'Petugas', 0),
(222, '2020-09-22', '99105', 'Handphone Maus', 13, 2, 'Petugas', 0),
(224, '2020-09-22', '92938', 'Ssd IOS 1 tb', 91, 2, 'Petugas', 0),
(990, '2020-09-22', '99101', 'Flashdisk 12 gb', 1, 2, 'Kliment Vederov', 0),
(992, '2020-09-19', '99102', 'Handphone Xue hua piao piao', 93, 1, 'Petugas 1', 0),
(2021, '2024-07-17', '78787', 'gjg', 17, 100, 'Petugas', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_brg`, `nama_brg`, `stok`, `rak`, `supplier`) VALUES
(0, '         ', 0, 'RAK 001', 'CV.Aja'),
(121, 'hp murah', 45, 'RAK 001', 'CV.Aja'),
(222, 'hp rusak', 30, 'RAK 005', 'CV Indah Pertiwi'),
(21312, 'dsada', 213, 'RAK 003', 'CV.Barunih'),
(78787, 'gjg', 17, 'RAK 001', 'CV.Aja'),
(92938, 'Ssd IOS 1 tb', 90, 'RAK 001', 'CV. Ayu Senja'),
(93333, 'Speaker Diskotik', 31, 'RAK 001', 'CV.Matahari'),
(99101, 'Flashdisk 12 gb', 23, 'RAK 001', 'CV.Abadi Sentosa'),
(99102, 'Handphone T34', 70, 'RAK 001', 'CV.Abadi Sentosa'),
(99103, 'Laptop Baru', 11, 'RAK 001', 'CV.Aja'),
(99105, 'Handphone Maus', 13, 'RAK 001', 'CV.Abadi Sentosa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_in`
--

CREATE TABLE `tb_barang_in` (
  `id_brg_in` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `noinv` varchar(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang_in`
--

INSERT INTO `tb_barang_in` (`id_brg_in`, `tanggal`, `noinv`, `supplier`, `kode_brg`, `nama_brg`, `stok`, `jml_masuk`, `jam`, `petugas`) VALUES
(1, '19-12-2002', '1', 'CV. Tes', '22922', 'Kancut', 11, 22, '07.00', 'Budi\r\n'),
(5, '2020-09-19', '001', 'CV.Abadi Sentosa', '99102', 'Handphone Xue hua piao piao', 92, 1, '10:11 am', 'Hibiki Chan <3  >_<'),
(7, '2020-09-19', '001', 'CV.Abadi Sentosa', '99102', 'Handphone Xue hua piao piao', 93, 1, '10:58 am', 'Petugas satu'),
(8, '2020-09-22', '0022', 'CV.Abadi Sentosa', '93333', 'Speaker Diskotik', 22, 9, '07:28 am', 'Petugas'),
(9, '2020-09-22', '121', 'CV Indah Pertiwi', '99101', 'Flashdisk 12 gb', 1, 22, '09:49 am', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_out`
--

CREATE TABLE `tb_barang_out` (
  `no_brg_out` int(11) NOT NULL,
  `no_ajuan` int(11) NOT NULL,
  `tanggal_ajuan` varchar(255) NOT NULL,
  `tanggal_out` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_ajuan` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang_out`
--

INSERT INTO `tb_barang_out` (`no_brg_out`, `no_ajuan`, `tanggal_ajuan`, `tanggal_out`, `petugas`, `kode_brg`, `nama_brg`, `stok`, `jml_ajuan`, `jml_keluar`, `admin`) VALUES
(112, 112, '2020-09-22', '2024-07-17', 'Petugas', '92938', 'Ssd IOS 1 tb', 91, 2, 1, 'al'),
(115, 990, '2020-09-22', '2020-09-22', 'Kliment Vederov', '99101', 'Flashdisk 12 gb', 3, 2, 2, 'admin'),
(2021, 2021, '2024-07-17', '2024-07-17', 'Petugas', '78787', 'gjg', 67, 100, 50, 'al');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama`, `telepon`) VALUES
(12, 'Petugas1', '698d51a19d8a121ce581499d7b701668', 'admin', '091818'),
(14, 'biksu', 'd41d8cd98f00b204e9800998ecf8427e', 'Leonid Budovkin', '0812822929'),
(17, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Petugas', '081280328889'),
(18, 'qq', '97282b278e5d51866f8e57204e4820e5', 'al', '3'),
(20, 'ni\'mil', '21232f297a57a5a743894a0e4a801fc3', 'ni\'mal', '9999'),
(22, 'Ma\'ruf amin', '202cb962ac59075b964b07152d234b70', 'admin', '01882'),
(23, 'mamank', '97282b278e5d51866f8e57204e4820e5', 'al', '24342'),
(24, 'jgjg', 'b09c600fddc573f117449b3723f23d64', 'asa', '999'),
(27, 'aa\'an', '698d51a19d8a121ce581499d7b701668', 'aan', '1029289');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'RAK 001'),
(2, 'RAK 002\r\n'),
(3, 'RAK 003'),
(5, 'RAK 004'),
(6, 'RAK 005'),
(7, 'rak 09'),
(8, 'RAK 10'),
(9, 'RAK 007'),
(10, 'RAK 005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sup`
--

CREATE TABLE `tb_sup` (
  `id_sup` int(11) NOT NULL,
  `nama_sup` varchar(255) NOT NULL,
  `kontak_sup` varchar(255) NOT NULL,
  `alamat_sup` text NOT NULL,
  `telepon_sup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sup`
--

INSERT INTO `tb_sup` (`id_sup`, `nama_sup`, `kontak_sup`, `alamat_sup`, `telepon_sup`) VALUES
(1, 'CV uyuy', '09-990', 'jl.kebangsaan', '78877'),
(2, 'CV.Matahari', 'Matahari@aman.com', 'JL. Matahari', '0820283882883\r\n'),
(3, 'CV Indah Pertiwi', 'Indah@pertiwi.com', 'Jl. Makmur raya', '081202928382'),
(7, 'CV.Barunih', '090909', 'jl.walet', '0838733'),
(8, 'PT.UMAM', '0897657', 'JL.PUNYA UMAM', '020304'),
(9, 'Pt.Gajah Tunggal', '099888', 'Jatiuwung', '0918829'),
(10, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_ajuan`
--
ALTER TABLE `tb_ajuan`
  ADD PRIMARY KEY (`no_ajuan`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indeks untuk tabel `tb_barang_in`
--
ALTER TABLE `tb_barang_in`
  ADD PRIMARY KEY (`id_brg_in`);

--
-- Indeks untuk tabel `tb_barang_out`
--
ALTER TABLE `tb_barang_out`
  ADD PRIMARY KEY (`no_brg_out`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tb_sup`
--
ALTER TABLE `tb_sup`
  ADD PRIMARY KEY (`id_sup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_ajuan`
--
ALTER TABLE `tb_ajuan`
  MODIFY `no_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_in`
--
ALTER TABLE `tb_barang_in`
  MODIFY `id_brg_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_sup`
--
ALTER TABLE `tb_sup`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
