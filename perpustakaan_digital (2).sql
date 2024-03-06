-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2024 pada 17.28
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
  `file_pdf` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`buku_id`, `perpus_id`, `judul`, `cover`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`, `kategori_id`, `ketersediaan`, `file_pdf`, `created_at`) VALUES
(12, 1, ' Dilan : Dia Adalah Dilanku Tahun 1990', 'Dilan_1990_(poster).jpg', 'Pidi Baiq', 'Mizan', 2016, '“Milea, kamu cantik, tapi aku belum mencintaimu.\r\nEnggak tahu kalau sore.Tunggu aja.”\r\n(Dilan 1990)\r\n\r\n“Milea, jangan pernah bilang ke aku ada yang menyakitimu, nanti, besoknya, orang itu akan hilang.”\r\n(Dilan 1990)\r\n\r\n“Cinta sejati adalah kenyamanan, kepercayaan, dan dukungan.\r\nKalau kamu tidak setuju, aku tidak peduli.”\r\n(Milea 1990)', 1, 5, 'pdf-dilan-1-shabrinabachtiarpdf_compress.pdf', '2024-03-06 16:26:16'),
(19, 1, 'Himpunan', 'himpunan.jpg', 'Citra Saras', 'Penerbit Sunset Road', 2018, 'MEMO:\r\nKepada Dimas dan Naya selaku Ketua Himpunan dan Wakil Ketua Himpunan Kabinet Irregular, diharapkan segera ke ruang jurusan begitu menerima memo ini untuk membahas mengenai kepengurusan Himpunan selama setahun ke depan.\r\n\r\nTertanda, Ketua Prodi\r\n\r\nP.S: Saya tahu selain hebat dalam mengurus Himpunan, kalian juga hebat dalam beradu pendapat. Tolong sebelum ke ruang jurusan, jangan bertengkar dan coba untuk lebih mengerti satu sama lain.\r\n\r\nNovel Himpunan karya Citra Saras akan menceritakan kisah Dimas dan Naya yang sibuk mengurus organisasi disamping menjadi mahasiswa. Perbedaan karakter antara Dimas dan Naya sangat jelas, Dimas merupakan seseorang yang tidak terlalu bisa bersosialisasi sementara Naya adalah orang yang ramah. Mereka berdua harus terus bersama-sama dalam tempat yang sama, karena Dimas adalah Kahim dan Naya adalah Wakahim, mereka harus mengalami berbagai konflik, perbedaan pendapat, dan bahkan mengalami masalah-masalah lainnya yang tentunya relate dengan anak-anak kuliah.', 1, 4, 'pdf-himpunan-by-citra-saras_compress-dikompresi.pdf', '2024-03-05 01:18:31'),
(25, 0, 'Laut Bercerita', 'laut.jpg', 'Leila S.Chudori', 'Kepustakaan Populer Gramedia', 2017, 'Jakarta, Maret 1998\r\nDi sebuah senja, di sebuah rumah susun di Jakarta, mahasiswa bernama Biru Laut disergap empat lelaki tak dikenal. Bersama kawan-kawannya, Daniel Tumbuan, Sunu Dyantoro, Alex Perazon, dia dibawa ke sebuah tempat yang tak dikenal. Berbulan-bulan mereka disekap, diinterogasi, dipukul, ditendang, digantung, dan disetrum agara bersedia menjawab satu pertanyaan penting: siapakah yang berdiri di balik gerakan aktivis dan mahasiswa saat itu.\r\n\r\nJakarta, Juni 1998\r\nKeluarga Arya Wibisono, seperti biasa, pada hari Minggu sore memasak bersama, menyediakan makanan kesukaan Biru Laut. Sang ayah akan meletakkan satu piring untuk dirinya, satu piring untuk sang ibu, Biru Laut, dan satu piring untuk si bungsu Asmara Jati. Mereka duduk menanti dan menanti. Tapi Biru Laut tak kunjung muncul.\r\n\r\nJakarta, 2000\r\nAsmara Jati, adik Biru Laut, beserta Tim Komisi Orang Hilang yang dipimpin Aswin Pradana mencoba mencari jejak mereka yang hilang serta merekam dan mempelajari testimoni mereka yang kembali. Anjani, kekasih Laut, para orangtua dan istri aktivis yang hilang menuntut kejelasan tentang anggota keluarga mereka. Sementara Biru Laut, dari dasar laut yang sunyi bercerita kepada kita, kepada dunia tentang apa yang terjadi pada dirinya dan kawan-kawannya.', 6, 2, 'pdfcoffee_com_sb-laut-bercerita-leila-s-chudoripdf-pdf-free.pdf', '2024-03-05 14:39:05'),
(33, 0, 'Filosofi Teras', 'filosofi_teras.jpg', 'Henry Manapiring', 'Kepustakaan Populer Gramedia', 2018, 'Lebih dari 2.000 tahun lalu, sebuah mazhab filsafat menemukan akar masalah dan juga solusi dari banyak emosi negatif. Stoisisme, atau Filosofi Teras, adalah filsafat Yunani-Romawi kuno yang bisa membantu kita mengatasi emosi negatif dan menghasilkan mental yang tangguh dalam menghadapi naik-turunnya kehidupan. Jauh dari kesan filsafat sebagai topik berat dan mengawang-awang, Filosofi Teras justru bersifat praktis dan relevan dengan kehidupan Generasi Milenial dan Gen-Z masa kini.', 4, 4, 'filosofi-teras-pdfnbsped-978602412_compress.pdf', '2024-03-05 01:41:55'),
(34, 0, 'Grey & Jingga, The Twilight', '_grey-_-jingga_-the-twilight---cover-baru.jpg', 'Sweta Kartika', 'm&c', 2017, 'Jika cinta itu mudah terucap, maka takkan ada kisah cinta yang berliku. Grey dan Jingga adalah bukti bahwa cinta adalah rasa sulit yang tersamar.\r\n\r\nMenunggu seseorang di toko buku itu adalah suatu hal yang menyenangkan. Ada banyak pilihan bacaan yang bisa kita gunakan untuk membunuh waktu. Aku memilih komik ini sebagai senjatanya. Sebenarnya, aku sudah tahu tentang cerita ini sejak tahun lalu, ditambah nama ilustratornya yang juga melesat berkat komik Nusantaranger itu. Awalnya aku skeptis, aku kira ceritanya akan biasa saja. Eh tidak tahunya aku malah suka.', 1, 3, '1. Grey dan Jingga - The Twilight (Sweta Kartika) (z-lib.org)-compressed.pdf', '2024-03-04 07:46:16'),
(35, 0, 'Grey & Jingga - Days of Violet', '_Grey--Jingga-Days-of-Violet.jpg', 'Sweta Kartika', 'm&c', 2019, 'Kisah ini adalah tentang dirinya.\r\nTentang hari-harinya yang akan seperti violet.\r\nWarna tentang kesedihan, yang diungkapkan dengan keceriaan.', 1, 4, '2. Grey dan Jingga - Days of The Violet (Sweta Kartika) (z-lib.org)-compressed.pdf', '2024-03-05 01:42:25'),
(36, 1, 'Bahasa Indonesia', 'indo.jpg', 'Maman Suryaman, Suherli, dan Istiqomah.', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendik', 2018, ' Buku ini merupakan buku siswa yang dipersiapkan Pemerintah dalam\r\nrangka implementasi Kurikulum 2013. Buku siswa ini disusun dan ditelaah oleh\r\nberbagai pihak di bawah koordinasi Kementerian Pendidikan dan Kebudayaan, dan\r\ndipergunakan dalam tahap awal penerapan Kurikulum 2013. Buku ini merupakan\r\n“dokumen hidup” yang senantiasa diperbaiki, diperbaharui, dan dimutakhirkan sesuai\r\ndengan dinamika kebutuhan dan perubahan zaman. Masukan dari berbagai kalangan\r\nyang dialamatkan kepada penulis dan laman http://buku.kemdikbud.go.id atau melalui email buku@kemdikbud.go.id diharapkan dapat meningkatkan kualitas buku ini.', 4, -1, 'Kelas XII Bahasa Indonesia BS press.pdf', '2024-03-06 16:05:16'),
(37, 1, 'Pendikan Agama Islam', 'islam.webp', 'HA. Sholeh Dimyathi dan Feisal Ghozali.', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendik', 2018, 'Buku ini merupakan buku siswa yang dipersiapkan Pemerintah dalam rangka\r\nimplementasi Kurikulum 2013. Buku siswa ini disusun dan ditelaah oleh berbagai pihak di\r\nbawah koordinasi Kementerian Pendidikan dan Kebudayaan, dan dipergunakan dalam tahap\r\nawal penerapan Kurikulum 2013. Buku ini merupakan “dokumen hidup” yang senantiasa\r\ndiperbaiki, diperbarui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan\r\nzaman. Masukan dari berbagai kalangan yang dialamatkan kepada penulis dan laman\r\nhttp://buku.kemdikbud.go.id atau melalui email buku@kemdikbud.go.id diharapkan dapat\r\nmeningkatkan kualitas buku ini.', 4, 1, 'Kelas 12 Islam BS press.pdf', '2024-03-05 12:28:32'),
(38, 1, 'PPKN Kelas 12', 'pkn.jpg', 'Yusnawan Lubis dan Mohamad Sodeli.', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendik', 2017, 'Buku ini merupakan buku guru yang dipersiapkan Pemerintah dalam rangka\r\nimplementasi Kurikulum 2013. Buku guru ini disusun dan ditelaah oleh berbagai pihak di\r\nbawah koordinasi Kementerian Pendidikan dan Kebudayaan, dan dipergunakan dalam tahap\r\nawal penerapan Kurikulum 2013. Buku ini merupakan ”dokumen hidup” yang senantiasa\r\ndiperbaiki, diperbarui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan\r\nzaman. Masukan dari berbagai kalangan diharapkan dapat meningkatkan kualitas buku ini.', 4, 1, 'PPKn Kelas XII BG press.pdf', '2024-03-05 12:30:50'),
(39, 1, 'Kebangkitan Merah (Red Rising)', 'red.jpg', 'Pierce Brown', ' Gramedia Pustaka Utama', 2017, 'Patahkan belenggunya. Hiduplah untuk tujuan yang lebih berarti.\r\n\r\nBumi sudah sekarat. Darrow seorang Merah, penambang di bawah permukaan Mars. Misinya adalah mengumpulkan elemen-elemen berharga yang kelak akan dimanfaatkan untuk menjinakkan permukaan Mars dan memungkinkan manusia hidup di sana. Kaum Merah adalah harapan terakhir umat manusia.\r\n\r\nItulah yang mereka yakini, sampai Darrow menyadari semua itu kebohongan besar. Mars sudah layak huni—dan sudah dihuni—selama ratusan tahun, oleh orang-orang yang menyebut diri mereka kaum Emas. Mereka adalah golongan yang menganggap Darrow dan kaumnya hanyalah budak remeh yang bisa dieksploitasi dan disingkirkan tanpa ragu.', 1, 4, 'Kebangkitan Merah (Red Rising) (Pierce Brown) (Z-Library).pdf', '2024-03-06 15:38:10'),
(40, 1, 'Sherlock Holmes:Kasus 1', 'serlok.jpg', 'Sir Arthur Conan Doyle', 'Gramedia Pustaka Utama', 2015, 'Sejak muncul pertama kali tahun 1887, Sherlock Holmes menjadi tokoh fi ksi yang paling fenomenal. Dia menjadi jagoan klasik yang legendaris dan menginspirasi dalam budaya pop bahkan hingga abad ke-21. Bersama Dr. John Watson, Sherlock Holmes memecahkan kasus-kasus rumit berdasarkan kemampuannya menemukan petunjuk-petunjuk yang sering diabaikan orang lain.\r\n\r\nKoleksi Kasus Sherlock Holmes 1 ini dimulai dengan novel pertama Penelusuran Benang Merah yang memperkenalkan Sherlock Holmes si eksentrik yang genius ini dengan Dr. Watson. Empat Pemburu Harta yang menyajikan kejutan penuh teka-teki. Perjumpaannya dengan wanita yang sangat dikaguminya di Petualangan Sherlock Holmes. Peristiwa pertama yang mempertemukannya dengan musuh bebuyutannya, Dr. Moriarty, di Memoar Sherlock Holmes. Dan petualangan dalam Anjing Setan Sherlock Holmes yang menegakkan bulu kuduk.', 6, 1, 'Sherlock Holmes Koleksi Kasus 1 (Sir Arthur Conan Doyle) (Z-Library).pdf', '2024-03-05 12:28:57'),
(41, 1, 'Blue Lock vol 1', 'blue 1.jpg', 'Muneyuki Kashiro', 'Elex Media Komputindo', 2018, 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia. Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan 300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training di mana mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!\r\n\r\n\"Mulai hari ini kalian akan tinggal bersama di sini, mengikuti training khusus yang aku rancang. Kalian tidak bisa pulang ke rumah, tidak lagi melakukan kegiatan sepak bola yang selama ini kalian lakukan. Tapi, aku tegaskan. Kalau berhasil bertahan dalam blue lock ini dan mengalahkan 299 Peserta yang lain, maka, 1 orang terakhir yang tersisa bisa menjadi striker nomor 1 di dunia!” -Jinpachi Ego', 8, 4, 'Blue Lock - CH 001 @Manga_Gallery-dikompresi.pdf', '2024-03-05 14:25:43'),
(42, 1, 'Blue Lock vol 2', 'blue 2.jpg', 'Muneyuki Kashiro', 'Elex Media Komputindo', 2022, 'Tahun 2018 timnas Jepang tereliminasi pada putaran per delapan final Piala Dunia… Akibat kegagalan ini, persatuan sepak bola Jepang mendirikan training camp ‘Blue Lock’, mengumpulkan 300 orang penyerang pelajar tingkat SMA supaya Jepang menjadi juara piala dunia. Jinpachi Ego, laki-laki yang menjabat sebagai pelatih, menegaskan, “yang dibutuhkan Jepang itu striker yang penuh keegoisan”. Penyerang yang tidak terkenal, Yoichi Isagi, dan teman-teman penyerang lainnya mengikuti training dimana mereka bersaing satu sama lain, training yang akan mengubah diri mereka menjadi egois!\r\n\r\nDi hadapan kritikan masyarakat dan media massa yang memanas, serta sorot mata sinis gelandang kebanggaan Jepang Sae Itoshi, training BLue Lock akhirnya dimulai. Babak penyisihan memakai sistem setengah kompetisi, di mana 2 dari 5 tim dinyatakan lolos. Isagi dan teman-teman di tim Z mengalami pertandingan yang sangat berat yang pertama kalinya dengan seluruh tim adalah penyerang! Yang diperlukan untuk menang adalah ‘senjata’ yang hanya ada pada diri sendiri!? Temukan senjata yang akan menghasilkan ego!', 8, 4, 'Blue Lock - CH 002 @Manga_Gallery-dikompresi.pdf', '2024-03-05 14:25:29'),
(43, 1, 'Blue Lock vol 3', 'blue 3.jpg', 'Muneyuki Kashiro', 'Elex Media Komputindo', 2022, '2 dari 4 pertandingan seleksi tahap 1 Blue Lock sudah usai. Setelah merasakan kesenangan berhasil mengalahkan lawan dalam duel serius yang mempertaruhkan karier mereka, Isagi dan tim Z menghadapi pertandingan ke-3 melawan tim W dengan semangat tinggi. Tapi, di luar dugaan, ternyata terjadi perpecahan dalam tim Z sendiri!? Ditambah lagi dengan adanya masalah Hyoma Chigiri yang mulai menyerah, dapatkah mereka mengatasi serangan ganas Wanima bersaudara, jagoan tim W?', 8, 3, 'Blue Lock - CH 003 @Manga_Gallery.pdf', '2024-03-05 16:15:58'),
(44, 1, 'Blue Lock vol 4', 'blue 4.jpg', 'Muneyuki Kashiro', 'Elex Media Komputindo', 2022, 'Pertandingan terakhir seleksi tahap 1 Blue Lock dimulai! Isagi dan teman-teman tim Z mengikuti pertandingan yang menentukan takdir, di mana satu-satunya pilihan hanya menang, ‘kalah atau seri = eliminasi’. Lawan mereka tim V, tim paling kuat di blok 5 yang dibawahi oleh jenius Seishiro Nagi. Apakah kekuatan Z yang dikerahkan mati-matian mampu menghadapi serangan tim V yang luar biasa hebat? Kunci kemenangan adalah kemampuan mereproduksi gol!? Kalau kalah, karier tamat! Ayoo, berjuang, para pemain egois! Kalah = karier tamat! tidak ada pilihan lain selain menang! wajar saja, ‘kan!? itu lah dunia pertarungan!', 8, 4, 'Blue Lock - CH 004 @Manga_Gallery.pdf', '2024-03-05 14:31:16'),
(45, 1, 'Blue Lock vol 5', 'blue 5.jpg', 'Muneyuki Kashiro', 'Elex Media Komputindo', 2022, 'Berhadapan dengan tim V yang membanggakan kemampuan mencetak gol sang jenius Nagi, tim Z berhasil mengejar hingga skor 3 - 3 pada 15 menit babak kedua. Para pemain mencari ‘kebangkitan diri’ menuju level berikutnya dan menemukan kembali permainan mereka sendiri. Apakah Isagi memahami sosok dirinya yang menyimpan kesia-siaan dalam permainannya sendiri dan dapat merebut gol dari lawan yang kuat!? Lepaskan tembakan dengan senjata yang baru, lampaui batas! Satu pilihan, berevolusi! satu pilihan, tembak! satu pilihan, menang! seorang penyerang tidak butuh alternatif!', 8, 4, 'Blue Lock - CH 005 @Manga_Gallery.pdf', '2024-03-05 14:32:48'),
(46, 1, 'Bahasa Inggris Sistem 52 M vol 1', 'content.png', 'Herpinus Simanjuntak', 'Kesaint Blanc Publishing', 2013, 'Sesuai dengan namanya “52M”, pembaca diharapkan bisa mahir dalam bahasa Inggris dalam satu tahun (52 Minggu) dengan menggunakan buku ini secara tekun dan sabar per minggunya. Dalam mencapai tujuannya tersebut, metode penyajiannya pun disusun agar mudah dipahami orang Indonesia, termasuk cara pengucapannya yang unik. Hal ini penting terutama mengingat kata-kata dalam bahasa Inggris sering kali dibunyikan tidak...', 4, 1, 'Bahasa Inggris Sistem 52M Vol.1 (Herpinus Simanjuntak) (Z-Library).pdf', '2024-03-06 16:23:53'),
(47, 1, 'Bahasa Inggris Sistem 52 M vol 2', 'content (1).png', 'Herpinus Simanjuntak', 'Kesaint Blanc Publishing', 2010, 'Buku Sistem 52M ​Bahasa Inggris ​menghadirkan kursus​ bahasa Inggris ​yang bisa ​dilakukan secara ​mandiri (di luar ​ruang kelas ​formal) dan ​individu (per ​orangan). Kursus ​bahasa Inggris ​volume 2 ini ​memuat 18 minggu ​(bab) atas ​berbagai macam ​tata bahasa dasar,​ ungkapan-ungkapan, ​dan frasa atau ​kosakata yang ​paling sering ​digunakan dalam ​situasi kehidupan ​kita sehari-hari. ​ Sesuai dengan ​namanya “52M”, ​pembaca diharapkan ​bisa mahir dalam ​bahasa Inggris ​dalam satu tahun ​(52 Minggu) dengan​ menggunakan buku ​ini secara tekun ​dan sabar per ​minggunya. Dalam ​mencapai tujuannya ​tersebut, metode ​penyajiannya pun ​disusun agar mudah​ dipahami orang ​Indonesia,', 4, 2, 'Bahasa Inggris Sistem 52M Volume 2 (Herpinus Simanjuntak) (Z-Library).pdf', '2024-03-05 15:01:22'),
(48, 1, 'Mieruko-chan Vol 1', 'meru 1.jpeg', 'Tomoki Izumi', 'm&c', 2018, 'Siswa SMA bernama Miko Yotsuya memiliki kemampuan untuk melihat hantu dan arwah mengerikan yang menghantuinya dan orang-orang di sekitarnya. Meskipun demikian, Miko melakukan yang terbaik untuk mengabaikan keberadaan mereka dan mencoba menjalani kehidupan SMA yang normal.', 8, 4, 'Mieruko-chan - Volume 01-dikompresi.pdf', '2024-03-05 16:41:36'),
(49, 1, 'Mieruko-chan Vol 2', 'meru 2.jpeg', 'Tomoki Izumi', 'm&c', 2018, 'Siswa SMA bernama Miko Yotsuya memiliki kemampuan untuk melihat hantu dan arwah mengerikan yang menghantuinya dan orang-orang di sekitarnya. Meskipun demikian, Miko melakukan yang terbaik untuk mengabaikan keberadaan mereka dan mencoba menjalani kehidupan SMA yang normal.', 8, 5, 'Mieruko-chan - Volume 02-dikompresi.pdf', '2024-03-05 16:38:47'),
(50, 1, 'Mieruko-chan Vol 3', 'meru 3.jpeg', 'Tomoki Izumi', 'm&c', 2018, 'Siswa SMA bernama Miko Yotsuya memiliki kemampuan untuk melihat hantu dan arwah mengerikan yang menghantuinya dan orang-orang di sekitarnya. Meskipun demikian, Miko melakukan yang terbaik untuk mengabaikan keberadaan mereka dan mencoba menjalani kehidupan SMA yang normal.', 8, 3, 'Mieruko-chan Volume 03.pdf', '2024-03-06 15:40:06'),
(51, 1, 'Mieruko-chan Vol 4', 'meru 4.jpeg', 'Tomoki Izumi', 'm&c', 2018, 'Siswa SMA bernama Miko Yotsuya memiliki kemampuan untuk melihat hantu dan arwah mengerikan yang menghantuinya dan orang-orang di sekitarnya. Meskipun demikian, Miko melakukan yang terbaik untuk mengabaikan keberadaan mereka dan mencoba menjalani kehidupan SMA yang normal.', 8, 4, 'Mieruko-chan - Volume 04-dikompresi.pdf', '2024-03-05 16:40:59');

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
(4, 'Pendidikan', '2024-03-05 11:58:21'),
(6, 'Kejahatan & Misteri', '2024-02-18 10:13:37'),
(8, 'Manga', '2024-03-05 14:16:21');

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
(21, 12, 13, 'romantis bangett', 4, '2024-02-28 01:55:15'),
(22, 33, 22, 'lol', 3, '2024-03-05 01:42:49');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_peminjam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `perpus_id`, `buku_id`, `tanggal_pinjam`, `user_id`, `username`, `tanggal_kembali`, `created_at`, `status_peminjam`) VALUES
(222, 1, 33, '2024-03-05', '22', 'jeno', '0000-00-00', '2024-03-05 01:27:05', 'dikembalikan'),
(223, 1, 22, '2024-03-05', '22', 'jeno', '0000-00-00', '2024-03-05 01:26:55', 'dikembalikan'),
(224, 1, 35, '2024-03-05', '22', 'jeno', '0000-00-00', '2024-03-05 01:27:00', 'dikembalikan'),
(225, 1, 25, '2024-03-05', '22', 'jeno', '0000-00-00', '2024-03-05 01:42:00', 'dikembalikan'),
(226, 1, 33, '2024-03-05', '22', 'jeno', '0000-00-00', '2024-03-05 01:31:03', 'dikembalikan'),
(227, 1, 22, '2024-03-05', '22', 'jeno', '0000-00-00', '2024-03-05 01:41:46', 'dikembalikan'),
(228, 1, 33, '2024-03-05', '22', 'jeno', '0000-00-00', '2024-03-05 01:41:55', 'dikembalikan'),
(229, 1, 35, '2024-03-05', '22', 'jeno', '0000-00-00', '2024-03-05 01:47:29', 'selesai'),
(230, 1, 43, '2024-03-05', '13', 'jamal', '0000-00-00', '2024-03-05 16:32:47', 'selesai'),
(236, 1, 39, '2024-03-06', '19', 'dila', '0000-00-00', '2024-03-06 15:38:10', 'dikembalikan'),
(237, 1, 36, '2024-03-06', '19', 'dila', '2024-03-13', '2024-03-06 15:38:40', 'dipinjam'),
(238, 1, 50, '2024-03-06', '13', 'jamal', '2024-03-13', '2024-03-06 15:50:06', 'Dikembalikan');

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
(24, 1, 'bihun', '$2y$10$X8Qq0IpOo3P9vVzL1cVgUOS.5r.ygekVa/yCTtRTzzH.5pO.8BEH6', 'bihun@gmail.com', 'bihunn', '', 'cisaga', 'peminjam', '2024-03-06 00:14:19'),
(25, 1, 'kuil', '$2y$10$HP8kzNyhCZstj2r6M33fPesAXttKTfS.QzOwcPHTWSZozPQGYh7XG', 'kuila@gmail.com', 'kiula', '', 'cisaga', 'peminjam', '2024-03-06 00:14:26');

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
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `buku_kategori`
--
ALTER TABLE `buku_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `koleksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
