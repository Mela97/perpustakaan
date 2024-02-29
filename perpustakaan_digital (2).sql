-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Feb 2024 pada 07.42
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
  `ketersediaan` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`buku_id`, `perpus_id`, `judul`, `cover`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`, `kategori_id`, `ketersediaan`, `created_at`) VALUES
(12, 1, ' Dilan : Dia Adalah Dilanku Tahun 1990', 'Dilan_1990_(poster).jpg', 'Pidi Baiq', 'Mizan', 2016, '“Milea, kamu cantik, tapi aku belum mencintaimu.\r\nEnggak tahu kalau sore.Tunggu aja.”\r\n(Dilan 1990)\r\n\r\n“Milea, jangan pernah bilang ke aku ada yang menyakitimu, nanti, besoknya, orang itu akan hilang.”\r\n(Dilan 1990)\r\n\r\n“Cinta sejati adalah kenyamanan, kepercayaan, dan dukungan.\r\nKalau kamu tidak setuju, aku tidak peduli.”\r\n(Milea 1990)', 1, 0, '2024-02-29 06:23:49'),
(18, 1, 'Dikta & Hukum', 'dikta_dan_hukum.jpg', 'Dhi\'an Farah', 'Asoka Aksara X Loveable', 2021, 'Dikta merupakan tokoh idaman semua wanita karena penggambarannya yang sempurna. Ia kaya, rajin, pintar, baik, penyayang dan tentunya berparas tampan. Di sisi lain terdapat tokoh bernama Nadhira yang merupakan anak SMA kelas 12 dengan karakter berbanding terbalik dengan Dikta, pemalas dan mageran. Nadhira dikenal sebagai orang yang banyak mau, keras kepala dan suka mengeluh. Berbeda dengan image Dikta yang dikenal sebagai sosok yang serius dan disiplin.\r\n\r\nSiapa sangka jika Dikta dijodohkan dengan gadis SMA bernama Nadhira itu dengan sifat dan watak mereka yang amat sangat berbanding terbalik bagai langit dan bumi. Demi menjaga perasaan kedua orang tuanya, mereka terpaksa harus terjebak dalam hubungan yang semakin rumit ini.\r\n\r\nSeiring berjalannya waktu, Nadhira mulai menaruh rasa suka pada Dikta dan benar saja kali ini Nadhira benar-benar jatuh cinta pada sosok yang sejak dulu hanya dianggapnya sebagai kakak. Meskipun begitu kisah percintaan mereka yang rumit akan dibahas dan rahasia-rahasia Dikta yang selama ini dipendam akan mulai terungkap.', 1, 0, '2024-02-28 04:51:20'),
(19, 1, 'Himpunan', 'himpunan.jpg', 'Citra Saras', 'Penerbit Sunset Road', 2018, 'MEMO:\r\nKepada Dimas dan Naya selaku Ketua Himpunan dan Wakil Ketua Himpunan Kabinet Irregular, diharapkan segera ke ruang jurusan begitu menerima memo ini untuk membahas mengenai kepengurusan Himpunan selama setahun ke depan.\r\n\r\nTertanda, Ketua Prodi\r\n\r\nP.S: Saya tahu selain hebat dalam mengurus Himpunan, kalian juga hebat dalam beradu pendapat. Tolong sebelum ke ruang jurusan, jangan bertengkar dan coba untuk lebih mengerti satu sama lain.\r\n\r\nNovel Himpunan karya Citra Saras akan menceritakan kisah Dimas dan Naya yang sibuk mengurus organisasi disamping menjadi mahasiswa. Perbedaan karakter antara Dimas dan Naya sangat jelas, Dimas merupakan seseorang yang tidak terlalu bisa bersosialisasi sementara Naya adalah orang yang ramah. Mereka berdua harus terus bersama-sama dalam tempat yang sama, karena Dimas adalah Kahim dan Naya adalah Wakahim, mereka harus mengalami berbagai konflik, perbedaan pendapat, dan bahkan mengalami masalah-masalah lainnya yang tentunya relate dengan anak-anak kuliah.', 1, 0, '2024-02-28 13:58:43'),
(20, 1, 'DEMON SLAYER: Kimetsu no Yaiba 11', 'Demon_Slayer_11.jpg', 'Koyoharu Goutoge', 'Elex Media Komputindo', 2022, 'Pertempuran di “kota malam” melawan iblis jyogen no roku bersaudara, Gyutaro dan Daki, semakin menegangkan saja! Tanjiro dan kawan-kawan bekerja sama untuk bertarung membantu Tengen Uzui, sang hashira. Akan tetapi, pada akhirnya Tengen, Inosuke, dan Zenitsu ambruk akibat serangan fatal lawan. Sementara kawan-kawannya di ambang kematian, mampukah Tanjiro mengalahkan kedua iblis tersebut seorang diri…!?', 7, 0, '2024-02-28 04:10:49'),
(21, 1, 'Kaguya-Sama, Love is War 15', 'kaguya sama.jpg', 'Aka Akasa', 'm&c', 2024, 'Lewat festival budaya yang ultra romantis, keintiman Kaguya dan Shirogane meningkat dengan cepat. Di tengah suasana Natal yang semakin terasa, mereka pikir sekarang mereka akan menjadi pasangan kekasih yang “normal”. Tapi, tahu-tahu saja “Putri Es” Kaguya bangkit.\r\n\r\nShirogane yang ingin “selalu sempurna” dan Kaguya yang mengharapkan sisi dirinya “yang tidak sempurna”. Ciuman pertama masih belum berakhir.\r\n\r\nDi antara jenis buku lainnya, komik memang disukai oleh semua kalangan mulai dari anak kecil hingga orang dewasa. Alasan komik lebih disukai oleh banyak orang karena disajikan dengan penuh dengan gambar dan cerita yang mengasyikan sehingga mampu menghilangkan rasa bosan di kala waktu senggang.\r\n\r\nKomik seringkali dijadikan sebagai koleksi dan diburu oleh penggemarnya karena serinya yang cukup terkenal dan kepopulerannya terus berlanjut sampai saat ini. Dalam memilih jenis komik, ada baiknya perhatikan terlebih dahulu ringkasan cerita komik di sampul bagian belakang sehingga sesuai dengan preferensi pribadi pembaca.', 7, 0, '2024-02-28 04:51:34'),
(22, 1, 'Yang Telah Lama Pergi', 'tere liye.jpg', 'Tere Liye', 'Sabak Grip Nusantara', 2023, 'KAMU sudah gila!”\r\n\r\nItulah kalimat yang terakhir kali Al Mas\'ud ingat sebelum día pingsan beberapa saat lalu.\r\nSekarang, matanya terbuka, mengerjap-ngerjap. Terang? Seberkas cahaya matahari menembus celah kecil di dinding. Sudah siang? Berapa lama dia pingsan? Beringsut hendak duduk. Mengeluh pelan, tubuhnya terasa sakit. Ada memar di lengan, juga lebam di paha, punggung.\r\n\r\nMas\'ud menoleh ke kiri, ke kanan, gerakannya terhenti oleh sekat. Dia berada di dalam ruangan kecil, seperti kerangkeng. Lembap, bau amis tercium. Lantai tempat dia duduk terasa bergoyang. Suara debur ombak.... Kepalanya berpikir cepat, tidak salah lagi, dia berada di dalam kapal yang berlayar. Seseorang melintas di depan kerangkeng, dengan pakaian khas pelaut, berantakan, rambut awut-awutan. Wajah orang itu melongok ke dalam kerangkeng.\r\n\r\n\"yang ini sudah siuman!\" Berteriak memberi tahu, memukul-mukul kerangkeng, membuat suara bising.Dua pelaut lain di dekat pintu bergegas melangkah mendekat. Ikut memeriksa, dua wajah baru yang terlihat sama galaknya ikut menatap Mas\'ud.', 2, 0, '2024-02-29 06:25:35'),
(24, 1, 'Nikola Maldini', 'nikala.jpg', 'Kale', 'Cloud Books', 2023, 'Nikola Pramudya Sadeli, si ribut sekaligus juga si pekerja keras yang selalu dihantui oleh mimpi-mimpi buruk akibat kelalaiannya di masa lalu. Pikirannya selalu riuh dengan berbagai hal karena dia adalah tipikal manusia yang sulit untuk dipahami.\r\n\r\nThalassa Mikha Maldini-seorang penulis serta seniman amatiran yang selalu dituntut oleh ibunya sendiri. Mikha berpikir kalau ibunya selalu gagal dalam memahami kemauan dan kondisi anaknya. Tapi tetap saja, semua tuntutan yang dilayangkan sang ibu akan selalu dia lakukan karena enggan dicap sebagai anak durhaka.\r\n\r\nNikola adalah pecinta karya sastra, Mikha juga sama. Tanpa keduanya sadari mereka telah memiliki keterhubungan satu sama lain. Buku sketsa yang berisi coretan Mikha, pengetahuan Nikola akan segala hal, lembar-lembar puisi, kata-kata manis yang bisa sampai menggigit bibir, dan juga jerih payah keduanya dalam mencoba untuk menggapai semua keinginannya masing-masing berhasil mengukir jalan menuju sebuah mimpi buruk serta keraguan yang harus segera dimusnahkan.', 1, 8, '2024-02-29 06:24:25');

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
(1, 'Fantasi', '2024-02-18 10:10:26'),
(2, 'Romantis', '2024-02-18 10:12:31'),
(3, 'Horor', '2024-02-18 10:10:40'),
(4, 'Aksi & Petualangan', '2024-02-18 10:13:37'),
(5, 'Humor', '2024-02-18 10:13:37'),
(6, 'Kejahatan & Misteri', '2024-02-18 10:13:37'),
(7, 'Manga', '2024-02-18 10:15:28'),
(8, 'Dongeng', '2024-02-18 10:15:28');

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
(6, 10, 4, 'sangat menarik', 3, '2024-02-20 16:52:52'),
(7, 12, 4, 'sening yang memuaskan', 2, '2024-02-20 16:53:06'),
(13, 18, 4, 'bukunya baguss', 5, '2024-02-20 16:03:08'),
(14, 18, 4, 'ceritanya menarik nih', 4, '2024-02-20 16:08:28'),
(15, 20, 19, 'ceritnya menarik,ceritanya bikin tegang banget ', 5, '2024-02-24 05:48:22'),
(16, 18, 13, 'kenapa malah sad ending,sedih banget', 5, '2024-02-25 04:37:29'),
(17, 18, 13, 'katanya udah dijadiin series ya?? otw nonton', 5, '2024-02-25 04:38:21'),
(18, 12, 19, 'lol', 3, '2024-02-26 06:35:40'),
(19, 18, 13, 'baguss', 5, '2024-02-28 01:51:40'),
(20, 18, 13, 'menarikk', 4, '2024-02-28 01:53:33'),
(21, 12, 13, 'romantis bangett', 4, '2024-02-28 01:55:15');

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
(19, 1, 7, '2024-02-16 01:41:58'),
(4, 3, 10, '2024-02-18 11:36:43'),
(4, 6, 12, '2024-02-20 06:59:30'),
(19, 7, 13, '2024-02-20 09:42:50'),
(19, 8, 12, '2024-02-21 01:07:50'),
(19, 9, 19, '2024-02-21 01:08:48'),
(19, 11, 18, '2024-02-21 05:58:53'),
(13, 14, 24, '2024-02-28 01:49:49'),
(4, 15, 21, '2024-02-28 04:13:18'),
(4, 16, 19, '2024-02-28 04:13:31'),
(19, 17, 22, '2024-02-28 12:13:02');

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
  `username` varchar(255) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjam` enum('dipinjam','dikembalikan','','') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `perpus_id`, `buku_id`, `tanggal_pinjam`, `user_id`, `username`, `tanggal_kembali`, `status_peminjam`, `created_at`) VALUES
(203, 1, 12, '2024-02-29', '19', 'dila', '0000-00-00', 'dipinjam', '2024-02-29 06:23:49'),
(204, 1, 24, '2024-02-29', '19', 'dila', '0000-00-00', 'dipinjam', '2024-02-29 06:24:25'),
(205, 1, 22, '2024-02-29', '19', 'dila', '0000-00-00', 'dipinjam', '2024-02-29 06:25:35');

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
(13, 1, 'jamal', '$2y$10$gjz/0X0d2px0ZdqB4yaHVedXvAWLg732MF1FnFa9bqiwk7fS70HJy', 'jama@gmail.com', 'jamaludin', '', 'banjar', 'peminjam', '2024-02-23 01:01:59'),
(19, 1, 'dila', '$2y$10$lal8gJqLFkpcnwt7bbixVu0lyu60evamuFHJYMqg.9Xi17i8zPsLa', 'sasa@gmail.com', 'dila', '', 'negla', 'peminjam', '2024-02-13 02:03:59'),
(20, 1, 'unknown', '$2y$10$Hk9Ghh0JzoZCAAsHFhP9TutDQcYIh7ccORSkBAAhzYP3mDX0sfIBO', 'test@gmail.com', 'unknown', '08272y78781', 'unknown', 'admin', '2024-02-18 04:25:38'),
(22, 1, 'jeno', '$2y$10$F0Nj6Sm.G4BaUbPJKxR07uwlftJInqYlyoJlNxtxGqFlf6442cFKq', 'jeno@gmail.com', 'lee jeno', '', 'mergo', 'peminjam', '2024-02-28 02:18:38'),
(23, 1, 'karina', '$2y$10$jog5wCqxZqT2XIC3FeSWbu/Q2q7EnwbN/gOl4IqifVBl/m0t5vkba', 'rina@gmail.com', 'karinaa', '', 'mergo', 'peminjam', '2024-02-28 02:23:32'),
(24, 1, 'bihun', '$2y$10$X8Qq0IpOo3P9vVzL1cVgUOS.5r.ygekVa/yCTtRTzzH.5pO.8BEH6', 'bihun@gmail.com', 'bihunn', '', '123', 'peminjam', '2024-02-29 01:13:23'),
(25, 1, 'kuil', '$2y$10$HP8kzNyhCZstj2r6M33fPesAXttKTfS.QzOwcPHTWSZozPQGYh7XG', 'kuila@gmail.com', 'kiula', '', '123', 'peminjam', '2024-02-29 01:19:22');

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
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `buku_kategori`
--
ALTER TABLE `buku_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `koleksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
