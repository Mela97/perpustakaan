<?php
// Include database connection
include('koneksi.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data yang dikirim dari formulir tambah peminjam
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $user_id = $_POST['user_id'];
    $status_peminjam = $_POST['status_peminjam'];
    $perpus = $_POST["perpus_id"];
    $buku = $_POST["buku_id"];


    // Query untuk menambahkan data peminjam baru
    $query = "INSERT INTO `peminjaman` (`perpus_id`, `buku_id`, `tanggal_pinjam`, `user_id`, `status_peminjam`)
          VALUES ('$perpus', '$buku', '$tanggal_pinjam', '$user_id','$status_peminjam')";


    if ($conn->query($query)) {
        header("Location:../admin/index_peminjam.php"); 
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
