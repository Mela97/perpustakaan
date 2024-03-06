<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}

$perpus = 1;
// Pembersihan input
$status_peminjam = isset($_POST['status_peminjam']) ? $_POST['status_peminjam'] : '';
$status_peminjam = mysqli_real_escape_string($conn, $status_peminjam);
$buku = isset($_POST['buku_id']) ? $_POST['buku_id'] : '';


// Query untuk menambahkan data peminjam baru
$query = "INSERT INTO `peminjaman` (`perpus_id`, `buku_id`, `tanggal_pinjam`, `tanggal_kembali`, `username`, `status_peminjam`)
          VALUES (?, ?, ?, ?, ?, ?)";

// Mempersiapkan statement
$stmt = $conn->prepare($query);

// Binding parameter
$stmt->bind_param("iissis", $perpus, $buku, $tanggal_pinjam, $tanggal_kembali, $username, $status_peminjam);

// Eksekusi statement
if ($stmt->execute()) {
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

// Tutup statement
$stmt->close();
