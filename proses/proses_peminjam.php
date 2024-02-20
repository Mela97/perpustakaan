<?php
include('koneksi.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $user_id = $_POST['user_id'];
    $status_peminjam = $_POST['status_peminjam'];
    $perpus = $_POST["perpus_id"];
    $buku = $_POST["buku_id"];

    // Query untuk menambahkan data peminjam baru
    $query = "INSERT INTO `peminjaman` (`perpus_id`, `buku_id`, `tanggal_pinjam`, `user_id`, `status_peminjam`)
              VALUES ('$perpus', '$buku', '$tanggal_pinjam', '$user_id','$status_peminjam')";

    if ($conn->query($query)) {
        // Update ketersediaan buku hanya jika peminjaman berhasil dimasukkan
        $result_ketersediaan_buku = mysqli_query($conn, "SELECT * FROM buku WHERE buku_id = $buku");
        $buku_ketersediaan = mysqli_fetch_assoc($result_ketersediaan_buku);
        $ketersediaan = $buku_ketersediaan["ketersediaan"];
        $jumlah = $ketersediaan - 1;
        $update_buku = mysqli_query($conn, "UPDATE buku SET ketersediaan = $jumlah WHERE buku_id = $buku");
        
        if (!$update_buku) {
            echo "Error updating book availability: " . mysqli_error($conn);
        }

        header("Location:../admin/index_peminjam.php"); 
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
