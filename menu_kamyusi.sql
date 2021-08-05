-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2021 pada 10.33
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menu_kamyusi`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getMenu` ()  BEGIN
SELECT * FROM list_menu;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `ket_menu` (`id_kategori` VARCHAR(30)) RETURNS VARCHAR(30) CHARSET utf8mb4 BEGIN

DECLARE ket varchar(30);

CASE id_kategori
WHEN 'Mn-01' THEN
SET ket = 'minuman';
WHEN 'Mn-02' THEN
SET ket = 'makanan';
END CASE;

RETURN ket;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `gambar`) VALUES
(29, 'admin1', '$2y$10$lgoF5imYGa.g3cGT7bToROFrS2KVtqksEIamLDDLff63Q6965v1cy', ''),
(30, 'admin2', '$2y$10$J72ybyM9NZurD1mPpE8.auyKe05MKU9rcW3F5Zn2dYHhqlrU5xOL2', ''),
(49, 'admin3', '$2y$10$ldHntdMzJJBxmDMnmE0PzOm4xsgFoNI8pkTAu3G8J.cFDRZNxAsAG', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_menu`
--

CREATE TABLE `list_menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `kode_menu` varchar(20) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `jumlah_menu` varchar(11) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_menu`
--

INSERT INTO `list_menu` (`id_menu`, `id_kategori`, `kode_menu`, `nama_menu`, `harga`, `jumlah_menu`, `gambar`, `ket`) VALUES
(1, 'Mn-01 ', 'vd-01', 'Vietnam Drip', '15000', '10', 'vietnam drip.jpg', 'minuman'),
(2, 'Mn-02', 'ds-01', 'Pancake', '15000', '10', 'rsz_pancake.jpg', 'makanan'),
(3, 'Mn-02', 'ds-a02', 'Rolung', '15000', '16', 'rsz_tlor_gulung.jpg', 'makanan'),
(4, 'Mn-02', 'ds-03', 'Roti Bakar', '15000', '10', 'rsz_roti_bakar.jpg', 'makanan'),
(5, 'Mn-02', 'ds-04', 'Pisjuara', '12000', '16', 'rsz_1pisang.jpg', 'makanan'),
(6, 'Mn-01 ', 'eb-01', 'Americano', '14000', '10', 'rsz_31americano.png', 'minuman'),
(7, 'Mn-01 ', 'eb-02', 'Long Black', '14000', '8', 'rsz_long_black.png', 'minuman'),
(8, 'Mn-01 ', 'eb-03', 'Coffe Late', '14000', '10', 'rsz_coffe_late.png', 'minuman'),
(9, 'Mn-01 ', 'eb-04', 'Cappucino', '14000', '10', 'rsz_capuchino.png', 'minuman'),
(10, 'Mn-01 ', 'eb-05', 'Mochaccino', '17000', '10', 'rsz_mocachino.png', 'minuman'),
(11, 'Mn-01 ', 'eb-06', 'Greentea Latte Espresso', '17000', '10', 'latte espresso greentea.jpg', 'minuman'),
(12, 'Mn-01 ', 'eb-07', 'Coffee Latte Hazelnut', '17000', '10', 'rsz_hazelnut_latte.png', 'minuman'),
(13, 'Mn-01 ', 'eb-08', 'Coffee Latte Regal', '17000', '10', 'rsz_coffe_late_regal.png', 'minuman'),
(14, 'Mn-01 ', 'eb-09', 'Coffee Latte Cookies', '17000', '10', 'rsz_coffe_latte_cookies.png', 'minuman'),
(15, 'Mn-01 ', 'kc-01', 'Coffee Cheese', '18000', '10', 'rsz_coffe_cheese.png', 'minuman'),
(16, 'Mn-01 ', 'kc-02', 'Greentea Cheese', '18000', '10', 'rsz_1greentea_chese.png', 'minuman'),
(17, 'Mn-01 ', 'kc-03', 'Red Velvet Cheese', '18000', '10', 'rsz_redvelvet_chese.png', 'minuman'),
(18, 'Mn-01 ', 'kc-04', 'Taro Cheese', '18000', '10', 'rsz_taro_chesse.png', 'minuman'),
(19, 'Mn-01 ', 'kc-05', 'Choco Cheese', '18000', '16', 'rsz_1choco_cheese.png', 'minuman'),
(20, 'Mn-01 ', 'kc-06', 'Vanila Cheese', '18000', '10', 'rsz_vanila_chesee.jpg', 'minuman'),
(21, 'Mn-01 ', 'km-01', 'Lemon Squash', '17000', '10', 'rsz_lemon_squash.png', 'minuman'),
(22, 'Mn-01 ', 'km02', 'Mojitos', '17000', '11', 'rsz_mojitos.png', 'minuman'),
(23, 'Mn-01 ', 'km-03', 'Bloody Marry', '17000', '10', 'rsz_1blody_mary.png', 'minuman'),
(24, 'Mn-01 ', 'km-04', 'Cola Lime', '17000', '10', 'rsz_cola_lime.png', 'minuman'),
(25, 'Mn-01 ', 'ks-01', 'Kopi Remaja', '15000', '10', 'rsz_kopi_remaja.png', 'minuman'),
(26, 'Mn-01 ', 'ks-02', 'Kopi Sobad', '15000', '10', 'rsz_kopi_sobad.png', 'minuman'),
(27, 'Mn-01 ', 'ks-03', 'Kopi Benjud', '15000', '10', 'rsz_kopi_benjud.png', 'minuman'),
(28, 'Mn-01 ', 'ks-04', 'Kopi Alaska', '15000', '11', 'rsz_kopi_alaska.png', 'minuman'),
(29, 'Mn-02', 'lm-01', 'Kentang Goreng', '12000', '11', 'rsz_kentang.jpg', 'makanan'),
(30, 'Mn-02', 'lm-02', 'Bakso Sosis', '12000', '18', 'rsz_11baksosis.jpg', 'makanan'),
(31, 'Mn-02', 'lm-03', 'Nuget', '13000', '18', 'rsz_nugget.jpg', 'makanan'),
(32, 'Mn-02', 'lm-04', 'Omelette', '17000', '18', 'omlette.jpg', 'makanan'),
(33, 'Mn-02', 'lm-05', 'Pop Corn', '17000', '18', 'rsz_popcorn.jpg', 'makanan'),
(34, 'Mn-02', 'mc-01', 'Nasi Ribut', '15000', '18', 'rsz_nasi_ribut.jpg', 'makanan'),
(35, 'Mn-02', 'mc-02', 'Mie Ribut', '15000', '18', 'rsz_2mie_ribut.jpg', 'makanan'),
(36, 'Mn-02', 'mc-03', 'Fuyung Hai', '17000', '18', 'rsz_fuyung_hai.jpg', 'makanan'),
(37, 'Mn-02', 'mc-04', 'Mie Goreng & Mie Rebus', '13000', '18', 'rsz_1mie_rebus.jpg', 'makanan'),
(38, 'Mn-01 ', 'mb-01', 'V60', '20000', '11', 'rsz_v60.png', 'minuman'),
(39, 'Mn-01 ', 'mb-02', 'Kono', '20000', '18', 'rsz_kono.png', 'minuman'),
(40, 'Mn-01 ', 'mb-03', 'Chemax', '20000', '18', 'rsz_chemax.png', 'minuman'),
(41, 'Mn-01 ', 'mb-04', 'Frenchpress', '20000', '18', 'rsz_french_press.png', 'minuman'),
(42, 'Mn-01 ', 'mb-05', 'Japanese', '20000', '18', 'rsz_japannese.png', 'minuman'),
(43, 'Mn-01 ', 'mb-06', 'Tubruk', '20000', '18', 'rsz_kopi_tubruk.png', 'minuman'),
(44, 'Mn-01 ', 'nc-01', 'Greentea Latte', '15000', '20', 'rsz_greentea.png', 'minuman'),
(45, 'Mn-01 ', 'nc-02', 'Red Velvet Latte', '15000', '10', 'rsz_red_velvet.png', 'minuman'),
(46, 'Mn-01 ', 'nc-03', 'Taro Latte', '15000', '10', 'rsz_taro.png', 'minuman'),
(47, 'Mn-01 ', 'nc-04', 'Choco Latte', '15000', '10', 'rsz_choco_late.jpg', 'minuman'),
(48, 'Mn-01 ', 'nc-05', 'Vanilla Latte', '15000', '10', 'rsz_vanila_latte.png', 'minuman'),
(49, 'Mn-01 ', 'nc-06', 'Choco Mint', '15000', '10', 'rsz_choco_mint.png', 'minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_hp`, `alamat`) VALUES
(18, 'nisa', '085123456789', 'desa gabus'),
(19, 'faldi', '082123456789', 'tambi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 1, 1, '2020-12-16', 30000),
(2, 2, 2, '2020-12-17', 30000),
(30, 3, 1, '2020-12-17', 19000),
(31, 3, 1, '2020-12-17', 36000),
(32, 14, 2, '2020-12-17', 45000),
(33, 15, 1, '2020-12-18', 32000),
(34, 16, 0, '2020-12-19', 15000),
(35, 17, 0, '2020-12-19', 15000),
(36, 16, 0, '2020-12-22', 14000),
(37, 15, 0, '2020-12-27', 41000),
(38, 18, 0, '2021-01-04', 15000),
(39, 18, 0, '2021-01-05', 15000),
(40, 19, 0, '2021-01-05', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_menu`
--

CREATE TABLE `pembelian_menu` (
  `id_pembelianmenu` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_menu` varchar(12) NOT NULL,
  `jumlah_dibeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_menu`
--

INSERT INTO `pembelian_menu` (`id_pembelianmenu`, `id_pembelian`, `id_menu`, `jumlah_dibeli`) VALUES
(1, 2, '1', 2),
(2, 1, '3', 2),
(3, 3, '7', 2),
(5, 29, '1', 2),
(7, 3, '1', 2),
(8, 4, '4', 3),
(32, 30, '5', 1),
(33, 31, '3', 1),
(34, 31, '8', 1),
(35, 32, '36', 1),
(36, 32, '15', 1),
(37, 33, '37', 1),
(38, 33, '5', 1),
(39, 34, '34', 1),
(40, 35, '34', 1),
(41, 36, '8', 1),
(42, 37, '7', 1),
(43, 37, '2', 1),
(44, 37, '5', 1),
(45, 38, '3', 1),
(46, 39, '3', 1),
(47, 40, '48', 1),
(48, 40, '3', 1);

--
-- Trigger `pembelian_menu`
--
DELIMITER $$
CREATE TRIGGER `pembelian_baru` AFTER INSERT ON `pembelian_menu` FOR EACH ROW BEGIN
	UPDATE list_menu SET jumlah_menu = jumlah_menu-NEW.jumlah_dibeli
    WHERE id_menu=id_menu;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif_ongkir`
--

CREATE TABLE `tarif_ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tarif_ongkir`
--

INSERT INTO `tarif_ongkir` (`id_ongkir`, `alamat`, `tarif`) VALUES
(1, 'Indramayu Kota', 8000),
(2, 'Sindang ', 7000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_menu`
--
ALTER TABLE `list_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  ADD PRIMARY KEY (`id_pembelianmenu`);

--
-- Indeks untuk tabel `tarif_ongkir`
--
ALTER TABLE `tarif_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `list_menu`
--
ALTER TABLE `list_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  MODIFY `id_pembelianmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tarif_ongkir`
--
ALTER TABLE `tarif_ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
