-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Feb 2021 pada 23.05
-- Versi server: 10.3.27-MariaDB-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uankumyi_uanku`
--
CREATE DATABASE IF NOT EXISTS `uankumyi_uanku` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uankumyi_uanku`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reminder`
--

INSERT INTO `reminder` (`id`, `nominal`, `tgl_awal`, `tgl_akhir`, `id_user`) VALUES
(11, 100000, '2021-01-03', '2021-01-07', 7),
(17, 50000000, '2021-02-08', '2021-02-08', 14),
(18, 20000, '2021-02-09', '2021-03-10', 15),
(19, 250000, '2021-02-09', '2021-02-25', 18),
(22, 2000000, '2021-02-01', '2021-02-28', 10),
(23, 100000, '2021-02-13', '2021-02-20', 32),
(24, -1e18, '2021-02-13', '2021-02-01', 34),
(26, 5000, '2021-02-15', '2021-02-22', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `kategori` varchar(123) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nominal`, `keterangan`, `kategori`, `tanggal`, `tipe`, `id_user`) VALUES
(13, 1000, 'Kerja3', 'Penjualan', '2020-12-17', 'pemasukan', 3),
(14, 1000, 'mcd', 'Makanan', '2020-12-17', 'pengeluaran', 3),
(15, 50000, 'a', 'a', '2020-12-17', 'pemasukan', 2),
(16, 10000, 'a3', 'Gaji', '2020-12-20', 'pemasukan', 3),
(17, 3000, 'mcd', 'Keinginan', '2020-12-18', 'pengeluaran', 3),
(18, 3000, 'Kerja', 'Gaji', '2020-12-18', 'pemasukan', 4),
(19, 1000, 'Kerja', 'Penjualan', '2020-12-18', 'pemasukan', 4),
(20, 3000, 'Kerja', 'Gaji', '2020-12-18', 'pemasukan', 5),
(21, 5000, 'Ganja', 'Penjualan', '2020-12-18', 'pemasukan', 5),
(22, 5000, 'malak', 'Pemberian', '2020-12-18', 'pemasukan', 5),
(23, 1000, 'mcd', 'Makanan', '2020-12-18', 'pengeluaran', 5),
(24, 2000, 'jajan', 'Keinginan', '2020-12-18', 'pengeluaran', 5),
(25, 5000, 'mcd', 'Transportasi', '2020-12-18', 'pengeluaran', 5),
(26, 5000, 'mcd', 'Makanan', '2020-12-18', 'pengeluaran', 4),
(27, 5000, 'Kerja', 'Gaji', '2020-12-18', 'pemasukan', 4),
(28, 5000, 'Maling', 'Pemberian', '2020-12-18', 'pemasukan', 4),
(29, 1000, 'Ganja', 'Keinginan', '2020-12-18', 'pengeluaran', 4),
(30, 5000, 'Ganja', 'Penjualan', '2020-12-18', 'pemasukan', 6),
(31, 5000, 'Kerja', 'Gaji', '2020-12-18', 'pemasukan', 6),
(32, 1000, 'jajan', 'Makanan', '2020-12-18', 'pengeluaran', 6),
(33, 1000, 'mcd', 'Tagihan', '2020-12-18', 'pengeluaran', 6),
(34, 5000, 'Ganja', 'Pemberian', '2020-12-14', 'pemasukan', 6),
(35, 3000, 'Ganja', 'Kebutuhan', '2020-12-17', 'pengeluaran', 6),
(36, 5000, 'Kerja', 'Pemberian', '2020-11-18', 'pemasukan', 3),
(37, 5000, 'Kerja3', 'Penjualan', '2020-12-18', 'pemasukan', 3),
(38, 5000, 'Kerja3', 'Pemberian', '2020-12-18', 'pemasukan', 3),
(40, 5000, 'Ganja', 'Kebutuhan', '2020-12-19', 'pengeluaran', 3),
(41, 3000, 'Kerja3', 'Penjualan', '2020-12-19', 'pemasukan', 3),
(42, 7000, 'mcd', 'Tagihan', '2020-12-20', 'pengeluaran', 3),
(43, 5000, 'Kerja', 'Makanan', '2020-12-20', 'pengeluaran', 3),
(44, 1000, 'mcd', 'Makanan', '2020-12-17', 'pengeluaran', 3),
(45, 1000, 'Ganja', 'Makanan', '2020-12-19', 'pengeluaran', 3),
(46, 5000, 'jajan3', 'Pemberian', '2020-12-20', 'pemasukan', 3),
(47, 5000, 'Kerja', 'Gaji', '2020-12-20', 'pemasukan', 3),
(50, 1000, 'mcd', 'Transportasi', '2020-12-20', 'pengeluaran', 3),
(51, 5000, 'Ganja', 'Makanan', '2020-12-21', 'pengeluaran', 3),
(52, 5000, 'mcd', 'Keinginan', '2020-12-23', 'pengeluaran', 3),
(53, 5000, 'jajan', 'Kebutuhan', '2020-12-31', 'pengeluaran', 3),
(55, 5000, 'kerja', 'Gaji', '2020-11-19', 'pemasukan', 3),
(56, 20000, 'mcd', 'Pemberian', '2020-11-28', 'pemasukan', 3),
(57, 3000, 'Ganja', 'Penjualan', '2020-11-29', 'pemasukan', 3),
(58, 3000, 'jajan', 'Penjualan', '2020-11-23', 'pemasukan', 3),
(59, 3000, 'Ganja', 'Penjualan', '2020-11-12', 'pemasukan', 3),
(61, 5000, 'Kerja', 'Gaji', '2020-01-02', 'pemasukan', 3),
(63, 5000, 'Kerja', 'Gaji', '2021-01-04', 'pemasukan', 7),
(64, 1000, 'mcd', 'Makanan', '2021-01-04', 'pengeluaran', 7),
(65, 5000, 'mcd', 'Kebutuhan', '2021-01-04', 'pengeluaran', 7),
(66, 5000, 'mcd', 'Tagihan', '2021-01-05', 'pengeluaran', 7),
(67, 5000, 'mcd', 'Gaji', '2021-01-04', 'pemasukan', 7),
(68, 5000, 'aaaaaaaaaaaaaaaaaa', 'Gaji', '2021-01-05', 'pemasukan', 7),
(70, 1000, 'mcd', 'Tagihan', '2021-01-06', 'pengeluaran', 3),
(71, 5000, 'mcd', 'Tagihan', '2021-01-05', 'pengeluaran', 3),
(72, 5000, 'mcd', 'Gaji', '2021-02-08', 'pemasukan', 3),
(73, 3000, 'Kerja', 'Gaji', '2021-03-11', 'pemasukan', 3),
(74, 1500, 'mcd', 'Penjualan', '2021-04-15', 'pemasukan', 3),
(75, 3900, 'mcd', 'Penjualan', '2021-05-28', 'pemasukan', 3),
(76, 10000, 'Ganja', 'Gaji', '2021-06-24', 'pemasukan', 3),
(77, 1000, 'Ganja', 'Tagihan', '2021-02-17', 'pengeluaran', 3),
(78, 5000, 'Kerja', 'Pemberian', '2021-01-07', 'pemasukan', 3),
(79, 1000, 'mcd', 'Gaji', '2021-01-05', 'pemasukan', 3),
(81, 10000, 'Kerja', 'Pemberian', '2021-01-08', 'pemasukan', 3),
(82, 3000, 'mcd', 'Penjualan', '2021-01-09', 'pemasukan', 3),
(83, 1000, 'Kerja', 'Gaji', '2021-01-10', 'pemasukan', 3),
(84, 1000, 'Kerja', 'Gaji', '2021-01-04', 'pemasukan', 3),
(86, 1000, 'mcd', 'Penjualan', '2021-01-11', 'pemasukan', 4),
(87, 10000, 'Sisa jajan', 'Gaji', '2021-02-07', 'pemasukan', 11),
(88, 100000000, 'Open bo', 'Penjualan', '2021-02-07', 'pemasukan', 14),
(89, 50000000, 'Iphone 12', 'Keinginan', '2021-02-08', 'pengeluaran', 14),
(92, 20000, 'Harian', 'Pemberian', '2021-02-08', 'pemasukan', 15),
(93, 20000, 'Ongkos', 'Transportasi', '2021-02-08', 'pengeluaran', 15),
(94, 20000, 'Ongkos', 'Transportasi', '2021-02-08', 'pengeluaran', 15),
(96, 3000000, 'Kukis', 'Gaji', '2021-02-03', 'pemasukan', 16),
(97, 250000, 'Pulsa', 'Kebutuhan', '2021-02-07', 'pengeluaran', 16),
(98, 2000000, 'Alhamdulillah', 'Penjualan', '2021-02-08', 'pemasukan', 16),
(99, 3000000, 'Gaji dari perusahaan', 'Gaji', '2021-02-08', 'pemasukan', 18),
(100, 1500000, 'makan dan biaya transportasi', 'Kebutuhan', '2021-02-09', 'pengeluaran', 18),
(101, 500000, 'cicilan motor', 'Tagihan', '2021-02-10', 'pengeluaran', 18),
(102, 20000, 'motor', 'Transportasi', '2021-02-09', 'pengeluaran', 18),
(104, 300000, 'Makan', 'Gaji', '2021-02-07', 'pemasukan', 9),
(105, 300000, 'Makan', 'Makanan', '2021-02-09', 'pengeluaran', 9),
(106, 100000, 'Makan', 'Pemberian', '2021-01-20', 'pemasukan', 9),
(107, 2000000, 'Jual dawet', 'Gaji', '2021-02-01', 'pemasukan', 19),
(108, 3000000, 'Panen Pisang', 'Penjualan', '2021-02-02', 'pemasukan', 19),
(109, 4000000, 'Fee jasa edit', 'Pemberian', '2021-02-05', 'pemasukan', 19),
(110, 1000000, 'Bayar Kos', 'Tagihan', '2021-02-02', 'pengeluaran', 19),
(111, 500000, 'Syukuran Panen pisang', 'Makanan', '2021-02-06', 'pengeluaran', 19),
(112, 2000000, 'Beli HP Baru', 'Keinginan', '2021-02-07', 'pengeluaran', 19),
(113, 200000, 'Ke Bandung', 'Transportasi', '2021-02-08', 'pengeluaran', 19),
(114, 1000000, 'Judi Game', 'Penjualan', '2021-02-01', 'pemasukan', 10),
(115, 2000000, 'Uang bulanan', 'Gaji', '2021-02-02', 'pemasukan', 10),
(116, 500000, 'top up game', 'Keinginan', '2021-02-05', 'pengeluaran', 10),
(117, 60000, 'dikasih', 'Gaji', '2021-02-10', 'pemasukan', 10),
(118, 80000, 'jajan warkop', 'Makanan', '2021-02-10', 'pengeluaran', 10),
(119, 2400000, 'uang mingguan', 'Pemberian', '2021-02-12', 'pemasukan', 23),
(120, 15000, 'beli makan', 'Makanan', '2021-02-12', 'pengeluaran', 23),
(121, 50000, '-', 'Gaji', '2021-02-12', 'pemasukan', 24),
(122, 30000000, 'Bisnis', 'Gaji', '2021-02-12', 'pemasukan', 25),
(123, 25000000, 'Meser iphoong', 'Keinginan', '2021-02-12', 'pengeluaran', 25),
(124, 50000, 'Pemberian', 'Pemberian', '2021-02-12', 'pemasukan', 28),
(125, 5000, 'Beli boba', 'Makanan', '2021-02-12', 'pengeluaran', 28),
(126, 3000000, 'Gaji', 'Gaji', '2021-02-12', 'pemasukan', 29),
(127, 500000, 'Tax', 'Tagihan', '2021-02-13', 'pengeluaran', 29),
(128, 3580000, 'Masukan', 'Gaji', '2021-02-13', 'pemasukan', 32),
(129, 56000, 'Beli rokok', 'Keinginan', '2021-02-13', 'pengeluaran', 32),
(130, -1e18, 'A', 'Gaji', '2021-02-27', 'pemasukan', 34),
(131, 10000000, 'a', 'Penjualan', '2021-02-15', 'pemasukan', 36),
(132, 20000, '2', 'Tagihan', '2021-02-16', 'pengeluaran', 36),
(133, 5000000, 'Lembur', 'Gaji', '2021-02-02', 'pemasukan', 37),
(134, 100000, 'Kencan', 'Keinginan', '2021-02-04', 'pengeluaran', 37),
(135, 15000000, 'Gaji', 'Gaji', '2021-02-05', 'pemasukan', 37),
(136, 3000000, 'Jual sepeda', 'Penjualan', '2021-02-08', 'pemasukan', 37),
(137, 1000000, 'Bantu teman', 'Pemberian', '2021-02-09', 'pemasukan', 37),
(138, 2000000, 'Beli kebab', 'Makanan', '2021-02-03', 'pengeluaran', 37),
(139, 100000, 'Bayar grab', 'Transportasi', '2021-02-09', 'pengeluaran', 37),
(140, 5000000, 'Bayar Kontrakan', 'Tagihan', '2021-02-11', 'pengeluaran', 37),
(141, 100000, 'Popok Bayi', 'Kebutuhan', '2021-02-12', 'pengeluaran', 37),
(142, 10000000, 'bayar kas', 'Tagihan', '2021-02-10', 'pengeluaran', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `nama`, `password`) VALUES
(3, 'rizki.arvin@gmail.com', 'Arvin Rizki', '$2y$10$w72YQxbqYqQ7dKG2lbaAF.46Z2JeaSFnxQkwAaoDezQGGWOcxB5Pm'),
(4, 'abced@abced.com', 'Bagas', '$2y$10$7TneK80dXYVXONKgqQgaJ.9Hnwrp7QmbyptpKM/0Ct8FjLcqCnXEq'),
(5, 'admin@gmail.com', 'Teguh Ary', '$2y$10$RUZGxMzo6.IhyNeaJoWklOPF8.5es37wCmf3o0eWGCKaWeIkhi3Py'),
(6, 'aaaa@aaa.com', 'Ucup', '$2y$10$35QsruJx44gBW7x5OlfEKu9EBYK5ykyHhQudGgtDXDQMwKDhklkTu'),
(7, 'aaa1a@aaa.com', 'bacot', '$2y$10$pag0lDZI/ievh9pJLAYhzuPgnmk/wkX3KLrQyqtHrVfGNCkwukvpe'),
(8, 'lolag42683@kleogb.com', 'JNEE', '$2y$10$US6Wg5FOzcGmEb84Zd44Je1NawIhO4exYOkDtkkr4OBzDCklfdzBu'),
(9, 'Teguhary15@gmail.com', 'Teguh Ary', '$2y$10$2ZynLLlmdClTSb4c4DT1deZxEx.qigGCfyzpO9CZwpsnn.NOH1YuS'),
(10, 'yusufsmd58@gmail.com', 'Muhammad Yusuf', '$2y$10$d3jqutRW9qx/ATbEGz80ce.JGq8wVpFYZxtAng5FgufNXtHBr84oG'),
(11, 'rifqimr27@gmail.com', 'Bagas Cikuray', '$2y$10$caPrtlzVqNrM3BgSg7lKEO3b2xMA7R73Rm2bAIqdETMSExkhg0OfC'),
(12, 'au@gmail.com', 'ahmoil', '$2y$10$/Mmrl8qOJjht8quzdihssuGfj6WhANuSnCoSz9d1pvIqy8vsfXXKK'),
(13, 'ai@gmail.com', 'Jancuk', '$2y$10$0mKb74lOGjHqv1TwVLeTRO0TKFFAyDVTerpMntp0DemxXcn7Z4KRK'),
(14, 'kusaerialif04@gmail.com', 'alif', '$2y$10$vMMKhMd7P.DoALp3LoWXFeVGpU.E4tjgKz2hemYqW1/8.AXQQgWCO'),
(15, 'ryunamiya@gmail.com', 'Rahmadiyah Avia Ihsani', '$2y$10$2k17J4XmGKsAXKfTFHunQeIn/KHi.BTH72bDo.CZ5DYS0FPSPDvhK'),
(16, 'aai@gmail.com', 'Hgi', '$2y$10$4ht872zCZcjDHQYgKDLb8OJBmYk04r.mFPVvFPuDchQQ5OZnYtTrq'),
(17, 'asepsukanjan@gmail.com', 'Asep Sukajan', '$2y$10$Dc3O5.rKhrVntyrxwH9/O.bBLjYfXkvTpl8EWCWMKRkLs.xfWgZMC'),
(18, 'erik32017@gmail.com', 'Erik', '$2y$10$BUtKQq6r1Km/DtESTKEDJOQ8UlouLr0YSbm5C5EeUuPCvs03H40Q.'),
(19, 'Admin1@gmail.com', 'Admin', '$2y$10$9RI9yilePtoP87YKG9GUYuiXj5KTTkWFF0f4aNuxCOAxL9Yf0j3CW'),
(20, 'aadmin@gmail.com', 'qq', '$2y$10$dWZTIJIIRSSpLsFhwoxns.NB4WvnZHpkLy3THN0h2hH6GDtb165Ni'),
(21, 'sansan001106@gmail.com', 'Sansan', '$2y$10$Zsw6xLxIDxFx2wDYvDwz1eAWclYRZG9afX6JrV2IZ7bBktBheHLdG'),
(22, 'admin@muri.com', 'Admin', '$2y$10$UAsAE0/fDGDHcXB.6Cg.sewNCHZbQBOJp2L3.DE6PFvLg6a2AnJQq'),
(23, 'siskom@gmail.com', 'siska', '$2y$10$cLew9FpnWGYg7BKNKkRLJudd/kBC9vDJr6FsSmKt4l4eqZ9Htuqkm'),
(24, 'Eki@gmail.com', 'Eki', '$2y$10$KDLkyt7lgi7Qp82Qd5JwZ.wp.BK7V7Ru7Lr0kGYarWaH49vkNhajG'),
(25, 'wisnugilang61@gmail.com', 'Wisnu Gilang Aditya', '$2y$10$RFEqVO4.cc2EBAt.jo9C3eWzEyfcTi9H.4edbElxe1KpR0tWjQs26'),
(26, 'abdulbenyen@gmail.com', 'abdul benyen', '$2y$10$eGpvbDW9ETRlWqEF7Z.lyOnVGk1R779g/mIvOGuP72WVxOl32vWra'),
(27, 'Aliyafauz2111@gmail.com', 'Aliya Fauziah ariftianto', '$2y$10$P0SCIH.Il.vBAA.Ae2NiuuS7U0y8g4K8LaVqSe73rwopiJhkzhexi'),
(28, 'nurhikmahhamid5@gmail.com', 'Nurhikmah', '$2y$10$rVUc5YG6vZgDh0YWe9fVRO3k4sLhK3C5Qug5aOttY9D/ApmNJXs2a'),
(29, 'annas@anz.my.id', 'Annas Ma\'ruf', '$2y$10$zUlloSYSmAKGpCxe9JsxpOMuy2KWAoT4uNbVM0t3ZTeL6EA3u.2ne'),
(30, 'Dopanardiyansyah29@gmail.com', 'M opan', '$2y$10$5K/MkItde5nt6K/GpjM19eAuAb84U7W7AvGHIAfoeuA1SsmeDfoGu'),
(31, 'Gaktau@gmail.com', 'Juara123', '$2y$10$ibl6yTb.Wtlv3/f6EClg2.s3gqKzTgSoGKSUJFHmw6q2.nK6Xq3MK'),
(32, 'Gktau@gmail.com', 'Jsjsk', '$2y$10$FoelRRu1MKSF722mzO3QS.U9wHljmFaiFMPM1FfJJ/haWHBcOGjOG'),
(33, 'hmiftahul321@gmail.com', 'Huda', '$2y$10$oE16s4RrPBPQbHUeMqLA6.RInW/qEp7Ycq2MLyT16Ydfi.hWpk3Nm'),
(34, 'ezs84472@zwoho.com', 'Ez', '$2y$10$jPP4jGSUmox7so2JSxZkbuLhG02piifuieskBPzL8V1Iv8fKUQSrS'),
(35, 'randyargalau@gmail.com', 'Randy Ar', '$2y$10$ex5vwnbTXLxYnKJaHCI64eb9/hvfkH04iS2y8lI6JNS0Q0K/dRpvO'),
(36, 'resaendr@gmail.com', 'resa endrawan', '$2y$10$vfqydrUJvxoQm6Dn6AjpaejUVvn2OZc9Go6xG7gH/SA0WGPReNtke'),
(37, 'email@gmail.com', 'Nama', '$2y$10$FD8GZaANu.fKn1pj1kVyTu0.JY1OKFqjEdWtlJtqR6HPZ6WpiVdG6'),
(38, 'asep@gmail.com', 'FF', '$2y$10$ZvFFwcYtuSo30/rNdw5keOGd/OoskjV2egrvIu5.4W1g/3BlTTkUu'),
(39, 'Rio@gm.com', 'Rio', '$2y$10$.e1.cKJKtoB6oco0oB/pe.rds.5Q40CAFlsWmK9dvAuZVdOLsWALO'),
(40, 'Rio@gmail.com', 'rio', '$2y$10$FZTncI7QpA5QDoOsHkXQNukMHg6ixWRNy/QMLkLL3W5i8ea5JUD0O'),
(41, 'dokodoqq@gmail.com', 'Agung', '$2y$10$PvxLP/JficILt.i5ZBXTn.//vBz981uAiks29Uso/JCxx2ZiHYQ0m'),
(42, 'anjay@gmail.com', 'qwerty', '$2y$10$9sH/2JLKrj.tEIu2GaGKVuXunhjJAspdGYc6gEi4TND11AdirwX8G');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
