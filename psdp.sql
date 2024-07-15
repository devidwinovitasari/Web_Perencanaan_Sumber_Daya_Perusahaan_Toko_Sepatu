-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 23 Jun 2024 pada 19.35
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psdp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `customer_data`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `customer_data` (
`id_pelanggan` int(11)
,`nama` varchar(100)
,`username` varchar(50)
,`email` varchar(100)
,`no_telp` varchar(20)
,`alamat` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `total_harga` int(100) DEFAULT NULL,
  `metode_pembayaran` varchar(100) DEFAULT NULL,
  `metode_pengiriman` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_orders`, `tanggal_pembayaran`, `nama_barang`, `total_harga`, `metode_pembayaran`, `metode_pengiriman`, `alamat`, `nama`, `id_user`) VALUES
(1, '2024-06-23', 'Hoops Low Putih Hitam Putih (x1)', 164900, 'BRI', 'J&T Express', 'kamal', 'Ayu', NULL),
(2, '2024-06-23', 'Comfy Hitam Sepatu Slip On Slop Casual (x2)', 299800, 'DANA', 'Antareja', 'Graha candi', 'Arum Rahmadhani', NULL),
(3, '2024-06-23', 'Brookly Natural Biru Navy (x7)', 1224300, 'BNI', 'JNE Express', 'Graha candi', 'Arum Rahmadhani', NULL),
(4, '2024-06-23', 'Jennie Hitam Putih Emas (x1), Hoops Low Putih Hitam Putih (x1), Comfy Hitam Sepatu Slip On Slop Casu', 644600, 'BRI', 'J&T Express', 'Lamongan', 'Adinda', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `notlp` varchar(20) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `email`, `username`, `notlp`, `alamat`, `password`) VALUES
(1, 'araaa852@gmail.com', 'Arum Rahmadhani', '08123456789', 'Pasuruan', '63581b3818f3b4e0de9f57466a9ccca5'),
(2, 'febiyanti852@gmail.com', 'Debi ', '0987654', 'Lamongan', '$2y$10$ShrDAcZwGEF9MZD/SGG4gunfkzd/IKmdrMSNk.DkeEMxOA9XuTe72'),
(3, 'dombret@gmail.com', 'Gaga Berani ', '08765432', 'Bogor', '$2y$10$SZmsaz95hxmMR0UPZ/ktnu5Do5cALzdA.YApR3hXnM1R8gBYiPFB6'),
(4, 'akuara@gmail.com', 'Ara cantik i ', '08765432', 'Bogor', '$2y$10$KAxGv6umfuNbtOYnYVuVBOfXE82Tgi4v265TDYSmJUqV4OZV7nQPe'),
(5, 'andadi@gmail.com', 'andi', '09000000', 'Pamekasan', '$2y$10$FFYIbazzfrokconHZap8aeaXfNRf18jgzVjIDCKH6VZN.0wg8KoHq'),
(6, 'nduk@gmail.com', 'Raya Sastro', '0876543189', 'Purworejo', '$2y$10$gQ8PSsTZ7/oi76NotXmLpuBlbX2oPiWDj.eK2ZWkPA/xvx73kw46K'),
(7, 'cape123@gmail.com', 'aku letih', '0813345678', 'Bogor', '$2y$10$b7e9DSE1PgGsX8TtZ6ySeusFiw1YAjvY2tRo069W5GUEmTWTw3bQq'),
(8, 'srikaya@gmail.com', 'sri', '0000000000000000000', 'Grati', '$2y$10$JyEJRWc1pW3VviOC7D85B.5yPtLy1MRNkkNa7szru5/Ula6GLczn.'),
(9, 'apa@gmail.com', 'Aqila', '099999999999999999', 'Istanbul', '$2y$10$NaSmep3Jv5wD2PzRhAYrpu624N.Ves3WIq8AaiX2QQ1EwTAVkgzW2'),
(10, 'faizalakbar@gmail.com', 'Akbar Kenzo', '08976567890', 'Pamekasan', '$2y$10$nlA..D308JMSH7yJRic9ue498wfedKuj/1o8UEloVUMoFDVf3C0pC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(10) NOT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `jumlah_produk` int(10) DEFAULT NULL,
  `harga_produk` int(10) DEFAULT NULL,
  `total` int(100) DEFAULT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `status` enum('Lunas','Hutang') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `tanggal_beli`, `nama_produk`, `jumlah_produk`, `harga_produk`, `total`, `nama_supplier`, `status`) VALUES
(4, '2024-06-23', 'Black Mamba', 40, 176000, 7040000, 'Angga Dwi', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stok` int(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `stok`, `price`, `image`) VALUES
(0, 'Massiv Low Hitam Natural', 30, '154900.00', 'aero1.jpg'),
(1, 'Hoops Low Putih Hitam Putih', 45, '164900.00', 'aero2.jpg'),
(2, 'Brookly Natural Biru Navy', 43, '174900.00', 'aero3.jpg'),
(3, 'Classic Natural Hitam', 21, '174900.00', 'aero4.jpg'),
(4, 'Olivia Natural Matcha', 55, '154900.00', 'aero5.jpg'),
(5, 'Comfy Hitam Sepatu Slip On Slop Casual', 56, '149900.00', 'aero6.jpg'),
(6, 'Queen Putih', 43, '139900.00', 'aero7.jpg'),
(7, 'Jennie Putih Abu Muda', 20, '154900.00', 'aero8.jpg'),
(8, 'Aurora Lilac Putih', 10, '154900.00', 'aero9.jpg'),
(9, 'Jennie Hitam Putih Emas', 54, '154900.00', 'aero10.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `email_supplier` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `status` enum('Lunas','Hutang','Belum Melakukan Pembelian') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `nama_barang`, `alamat_supplier`, `email_supplier`, `kode_pos`, `no_telp`, `no_rek`, `status`) VALUES
(3, 'Marina', 'Hoops Low Putih Hitam Putih', 'Surabaya', 'marina123@gmail.com', 64524, '087125672517', '123123912783917', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur untuk view `customer_data`
--
DROP TABLE IF EXISTS `customer_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_data`  AS SELECT `p`.`id` AS `id_pelanggan`, `o`.`nama` AS `nama`, `p`.`username` AS `username`, `p`.`email` AS `email`, `p`.`notlp` AS `no_telp`, `o`.`alamat` AS `alamat` FROM (`pelanggan` `p` join `orders` `o` on(`p`.`id` = `o`.`id_user`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD UNIQUE KEY `username` (`nama_supplier`),
  ADD UNIQUE KEY `email` (`alamat_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
