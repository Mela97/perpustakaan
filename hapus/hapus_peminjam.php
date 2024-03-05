<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}
// Pastikan parameter id peminjaman telah diterima
if (isset($_GET['id'])) {
    // Tangkap nilai id dari parameter
    $peminjaman_id = $_GET['id'];

    // Buat query untuk menghapus data peminjaman berdasarkan id
    $query = "DELETE FROM peminjaman WHERE peminjaman_id = $peminjaman_id";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman utama dengan pesan sukses
        header("Location: ../admin/index_peminjam.php?pesan=Data peminjam berhasil dihapus");
        exit();
    } else {
        // Jika gagal menghapus, redirect ke halaman utama dengan pesan error
        header("Location: ../admin/index_peminjam.php?pesan=Gagal menghapus data peminjam");
        exit();
    }
} else {
    // Jika parameter id tidak diterima, redirect ke halaman utama dengan pesan error
    header("Location: ../admin/index_peminjam.php?pesan=Parameter id tidak ditemukan");
    exit();
}
?>
