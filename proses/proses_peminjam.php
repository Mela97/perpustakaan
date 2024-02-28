<?php
include('koneksi.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $username = $_POST['username'];
    $status_peminjam = $_POST['status_peminjam'];
    $perpus = $_POST["perpus_id"];
    $buku = $_POST["buku_id"];

    // Menghitung tanggal kembali 7 hari dari tanggal pinjam
    $tanggal_pinjam_obj = new DateTime($tanggal_pinjam);
    $tanggal_kembali_obj = clone $tanggal_pinjam_obj;
    $tanggal_kembali_obj->add(new DateInterval('P7D'));
    $tanggal_kembali = $tanggal_kembali_obj->format('Y-m-d');

    // Query untuk menambahkan data peminjam baru
    $query = "INSERT INTO `peminjaman` (`perpus_id`, `buku_id`, `tanggal_pinjam`, `tanggal_kembali`, `username`, `status_peminjam`)
              VALUES ('$perpus', '$buku', '$tanggal_pinjam', '$tanggal_kembali', '$username','$status_peminjam')";

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
?>
