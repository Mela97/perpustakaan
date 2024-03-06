<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data yang dikirim dari formulir edit
    $buku_id = $_POST['buku_id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    // Query untuk memperbarui data buku
    $query = "UPDATE `buku` SET 
              `judul` = '$judul',
              `penulis` = '$penulis',
              `penerbit` = '$penerbit',
              `tahun_terbit` = '$tahun_terbit'
              WHERE `buku_id` = $buku_id";

    if ($conn->query($query)) {
        echo "Data buku berhasil diperbarui. <a href='login.php'>Kembali ke Daftar Buku</a>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Metode pengiriman data tidak valid.";
}

// Close connection
$conn->close();
?>
