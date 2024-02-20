<?php
// Pastikan session sudah dimulai
session_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

// Menggunakan koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data ulasan yang dikirimkan melalui form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buku_id = $_POST['buku_id'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    // Query SQL untuk menyimpan ulasan ke database
    $sql = "INSERT INTO buku_ulasan (buku_id, ulasan, rating) VALUES ('$buku_id', '$ulasan', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "Ulasan berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
