<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peminjaman_id = $_POST['peminjaman_id'];

    // Update status peminjaman menjadi 'Dikembalikan'
    $query = "UPDATE peminjaman SET status_peminjam = 'Dikembalikan' WHERE peminjaman_id = $peminjaman_id";
    $conn->query($query);

    // Tambahkan log atau catatan lain jika diperlukan

    echo "Buku telah berhasil dikembalikan.";
} else {
    echo "Akses tidak sah!";
}
?>
