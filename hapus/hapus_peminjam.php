<?php
session_start(); 

include('koneksi.php');

if(isset($_GET['id'])) {
    $peminjaman_id = $_GET['id'];
    
    $query = "DELETE FROM peminjaman WHERE peminjaman_id = $peminjaman_id";
    $result = mysqli_query($conn, $query);

    if($result) {
        $_SESSION['success_message'] = "Peminjaman berhasil dihapus.";

        header("Location: ../admin/index_peminjam.php");
        exit();
    } else {
        echo "Gagal menghapus peminjaman.";
    }
} else {
    echo "ID peminjaman tidak ditemukan.";
}
?>

