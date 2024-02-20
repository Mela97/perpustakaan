<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location:../login.php");
    exit();
}

// Periksa apakah parameter buku_id ada di URL
if (!isset($_GET['id'])) {
    header("Location:../user/daftar_bookmark.php");
    exit();
}

// Menghubungkan ke basis data
include_once("koneksi.php");

// Mendapatkan id buku dari parameter URL
$buku_id = $_GET['id'];

// Mendapatkan id pengguna dari sesi
$user_id = $_SESSION['user_id'];

// Persiapkan pernyataan SQL untuk menghapus bookmark
$sql = "DELETE FROM koleksi_pribadi WHERE buku_id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $buku_id, $user_id);

// Jalankan pernyataan SQL
if ($stmt->execute()) {
    header("Location: ../user/daftar_bookmark.php");
} else {
    echo "Terjadi kesalahan saat menghapus bookmark.";
}

$stmt->close();
$conn->close();
?>
