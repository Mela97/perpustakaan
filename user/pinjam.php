<?php
session_start();


if (!isset($_SESSION['email'])) {
    // Jika pengguna belum masuk, kembalikan pesan kesalahan atau arahkan pengguna ke halaman masuk
    echo "Anda belum masuk. Silakan masuk terlebih dahulu.";
    exit();
}

// Periksa apakah buku_id disertakan dalam permintaan
if (!isset($_GET['id_buku'])) {
    // Jika buku_id tidak disertakan, kembalikan pesan kesalahan
    echo "Buku tidak valid.";
    exit();
}

// Ambil buku_id dari permintaan
$bukuId = $_GET['id_buku'];

// Melakukan koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

$conn = new mysqli($servername, $username, $password, $dbname);
$email = $_SESSION['user_id'];
$tanggalnow = date("Y-m-d");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menyiapkan pernyataan SQL untuk memasukkan data peminjaman ke dalam tabel peminjaman
$sql = "INSERT INTO peminjaman (perpus_id, buku_id, tanggal_pinjam, user_id, tanggal_kembali, status_peminjam)
        VALUES (1, '$bukuId','$tanggalnow', '$email', '0000-00-00', 'dipinjam')";
$result = mysqli_query($conn, $sql);
if ($result) {
    // Jika peminjaman berhasil dimasukkan, kirim respons sukses
    header("Location:home.php");
    //var_dump($conn);
    echo "success";
} else {
    // Jika terjadi kesalahan saat memasukkan peminjaman, kirim respons error
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
//$conn->close();

//SELECT peminjaman.*, user.nama_lengkap AS nama_peminjam
//FROM peminjaman
//INNER JOIN user ON peminjaman.user_id = user.user_id;