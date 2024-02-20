-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2024 pada 06.21
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_digital`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `deskripsi` varchar(10000) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `ketersediaan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`buku_id`, `perpus_id`, `judul`, `cover`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`, `kategori_id`, `ketersediaan`, `created_at`) VALUES
(10, 0, 'Laut Bercerita', 'HC_Laut_Bercerita_FINAL_F.jpg', 'leila', 'Kepustakaan', 2017, 'Buku Laut Bercerita menceritakan terkait perilaku kekejaman dan kebengisan yang dirasakan oleh kelompok aktivis mahasiswa di masa Orde Baru. Tidak hanya itu, novel ini pun merenungkan kembali akan hilangnya tiga belas aktivis, bahkan sampai saat ini belum juga ada yang mendapatkan petunjuknya. Buku ini juga bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan di dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, dan sejumlah keluarga yang mencari kejelasan makam anaknya.\r\nCerita dalam novel Laut Bercerita terbagi menjadi dua bagian dengan jarak waktu yang jauh berbeda. Adapun bagian pertama diceritakan melalui sudut pandang tokoh bernama Biru Laut beserta para kawan sesama aktivisnya seraya menyelesaikan visi atau tujuan mereka. Sementara pada bagian kedua, kisahnya diambil dari sudut pandang Asmara Jati, adik dari Laut yang mempunyai tujuan atau visi yang cenderung berlainan dengan Laut. Buku ini ditulis dengan menggunakan bahasa yang sederhana, sehingga para pembaca dapat memahami isi dari buku ini. Buku ini dapat dibaca oleh semua kalangan masyarakat. Jadi tunggu apalagi? Segera miliki buku Laut Bercerita sekarang juga! Selamat membaca ya, Teman-teman!', 1, '', '2024-02-17 08:56:19'),
(11, 0, 'Sebuah Seni untuk Bersikap Bodo Amat', '9786024526986_Sebuah-Seni-Untuk-Bersikap-Bodo-Amat_1.png', 'Mark Manson', 'Gramedia', 2009, 'Selama beberapa tahun belakangan, Mark Manson—melalui blognya yang sangat populer—telah membantu mengoreksi harapan-harapan delusional kita, baik mengenai diri kita sendiri maupun dunia. Ia kini menuangkan buah pikirnya yang keren itu di dalam buku hebat ini.\r\n“Dalam hidup ini, kita hanya punya kepedulian dalam jumlah yang terbatas. Makanya, Anda harus bijaksana dalam menentukan kepedulian Anda.” Manson menciptakan momen perbincangan yang serius dan mendalam, dibungkus dengan cerita-cerita yang menghibur dan “kekinian”, serta humor yang cadas. Buku ini merupakan tamparan di wajah yang menyegarkan untuk kita semua, supaya kita bisa mulai menjalani kehidupan yang lebih memuaskan, dan apa adanya.\r\n\"', 2, '', '2024-02-17 08:48:02'),
(12, 0, 'dilan milea', 'Dilan_1990_(poster).jpg', 'kghf', 'Kepustakaan', 2016, 'lorem', 1, '', '2024-02-18 05:17:41'),
(13, 0, 'test', 'jumat.png', 'test', 'test', 1945, 'lorem', 1, '', '2024-02-17 07:53:06'),
(16, 0, 'dilanda bencana', 'jumat.png', 'kghf', 'test', 2009, 'lorem', 1, '', '2024-02-17 08:38:54'),
(17, 0, 'hola', 'cover.png', 'Ishigami senku', 'lorem', 5002, 'lorem ipsum', 2, '', '2024-02-17 08:41:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_kategori`
--

CREATE TABLE `buku_kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_kategori`
--

INSERT INTO `buku_kategori` (`kategori_id`, `nama_kategori`, `created_at`) VALUES
(1, 'Fiksi', '2024-02-07 03:51:25'),
(2, 'Romance', '2024-02-07 03:51:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_ulasan`
--

CREATE TABLE `buku_ulasan` (
  `ulasan_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ulasan` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_ulasan`
--

INSERT INTO `buku_ulasan` (`ulasan_id`, `buku_id`, `user_id`, `ulasan`, `rating`, `created_at`) VALUES
(1, 11, 4, 'fghsdg', 2, '2024-02-17 15:21:39'),
(2, 12, 4, 'aaaa', 4, '2024-02-17 15:32:19'),
(3, 12, 4, 'asswe', 3, '2024-02-17 15:34:14'),
(4, 10, 4, 'uioeiehj', 5, '2024-02-17 15:36:14'),
(5, 10, 4, 'aas', 3, '2024-02-17 15:37:01'),
(6, 10, 4, 'aas', 3, '2024-02-17 15:37:13'),
(7, 12, 4, 'nbvfcdyy', 2, '2024-02-17 15:37:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi_pribadi`
--

CREATE TABLE `koleksi_pribadi` (
  `user_id` int(11) NOT NULL,
  `koleksi_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `koleksi_pribadi`
--

INSERT INTO `koleksi_pribadi` (`user_id`, `koleksi_id`, `buku_id`, `created_at`) VALUES
(19, 0, 7, '2024-02-16 01:41:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjam` enum('dipinjam','dikembalikan','','') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `perpus_id`, `buku_id`, `tanggal_pinjam`, `user_id`, `tanggal_kembali`, `status_peminjam`, `created_at`) VALUES
(91, 1, 12, '2024-02-18', 'admin@gmail', '0000-00-00', '', '2024-02-18 04:32:30'),
(92, 1, 11, '2024-02-18', '4', '0000-00-00', '', '2024-02-18 04:32:30'),
(93, 1, 11, '2024-02-18', '4', '0000-00-00', 'dikembalikan', '2024-02-18 04:31:57'),
(94, 1, 10, '2024-02-18', '4', '0000-00-00', 'dikembalikan', '2024-02-18 04:38:57'),
(95, 1, 16, '2024-02-18', '4', '0000-00-00', 'dikembalikan', '2024-02-18 04:40:44'),
(96, 1, 11, '2024-02-18', 'jeno', '0000-00-00', '', '2024-02-18 05:06:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `pinjam_detail_id` int(11) NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpus`
--

CREATE TABLE `perpus` (
  `perpus_id` int(11) NOT NULL,
  `nama_perpus` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp_hp` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perpus`
--

INSERT INTO `perpus` (`perpus_id`, `nama_perpus`, `alamat`, `tlp_hp`, `created_at`) VALUES
(1, 'Perpus SMKN 1 Banjar', 'gk tau', '323232441', '2024-02-06 04:37:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `perpus_id`, `username`, `password`, `email`, `nama_lengkap`, `no_hp`, `alamat`, `role`, `created_at`) VALUES
(4, 1, 'admin1', '$2y$10$Hk9Ghh0JzoZCAAsHFhP9TutDQcYIh7ccORSkBAAhzYP3mDX0sfIBO', 'admin@gmail.com', 'admin', '098884', 'banjar', 'admin', '2024-01-29 07:13:04'),
(12, 1, 'mela', '$2y$10$CwCUmAG7tFxUvX.8UCzrN.uKqyYWGgnOAcg23DGo2ti.AkGTOjixS', 'mela@gmail.com', 'mela', '', 'banjar', 'petugas', '2024-02-13 02:19:01'),
(13, 1, 'jamal', '$2y$10$gjz/0X0d2px0ZdqB4yaHVedXvAWLg732MF1FnFa9bqiwk7fS70HJy', 'jama@gmail.com', 'jamaludin', '', 'banjar', 'user', '2024-02-03 13:39:58'),
(15, 1, 'mela', '$2y$10$JSMMCjkCcCUpw6Y96D4/PuiZAKmg3RZlFFGusCwEN9AfxIGWAaUt.', 'tes@gmail.com', 'sasas', '', '123', 'admin', '2024-02-13 01:16:28'),
(16, 1, 'mela', '$2y$10$VQmVYFVvIiMV2bCieL.T.OewvTDHhDNFyYXPQZF6SFlZQhtYyQc6O', 'tes@gmail.com', 'sasas', '', '123', 'admin', '2024-02-13 01:17:25'),
(17, 1, 'dila', '$2y$10$H1kjWnBDljSW8Keu8/7EyuSCc9e5IQZaNckwBkA9jfIHgcarrZJ/C', 'tes@gmail.com', 'sasas', '', '123', 'admin', '2024-02-13 01:17:57'),
(18, 1, 'dila', '123', 'tes@gmail.com', 'dila', '', 'neglasari\r\n', 'peminjam', '2024-02-13 01:55:58'),
(19, 1, 'dila', '$2y$10$lal8gJqLFkpcnwt7bbixVu0lyu60evamuFHJYMqg.9Xi17i8zPsLa', 'sasa@gmail.com', 'dila', '', 'negla', 'peminjam', '2024-02-13 02:03:59'),
(20, 1, 'unknown', '$2y$10$Hk9Ghh0JzoZCAAsHFhP9TutDQcYIh7ccORSkBAAhzYP3mDX0sfIBO', 'test@gmail.com', 'unknown', '08272y78781', 'unknown', 'admin', '2024-02-18 04:25:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indeks untuk tabel `buku_kategori`
--
ALTER TABLE `buku_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  ADD PRIMARY KEY (`ulasan_id`);

--
-- Indeks untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  ADD PRIMARY KEY (`koleksi_id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`);

--
-- Indeks untuk tabel `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD PRIMARY KEY (`pinjam_detail_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `buku_kategori`
--
ALTER TABLE `buku_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
