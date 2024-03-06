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

// Ambil nilai tanggal pinjam dan tanggal kembali dari formulir
$tanggal_pinjam = isset($_POST['tanggal_pinjam']) ? $_POST['tanggal_pinjam'] : '';
$tanggal_kembali = isset($_POST['tanggal_kembali']) ? $_POST['tanggal_kembali'] : '';

$email = $_POST['email_peminjam'];
$resultuser = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
$finduser = mysqli_fetch_assoc($resultuser);
$user_id = $finduser['user_id'];
$username = $finduser['username'];
$status_peminjam = 'dipinjam';

// Query untuk menambahkan data peminjam baru
$query = "INSERT INTO `peminjaman` (`perpus_id`, `buku_id`, `tanggal_pinjam`, `tanggal_kembali`, `username`, `status_peminjam`,`user_id`)
          VALUES (?, ?, ?, ?, ?, ?,?)";

// Mempersiapkan statement
$stmt = $conn->prepare($query);

// Binding parameter
$stmt->bind_param("iissssi", $perpus, $buku, $tanggal_pinjam, $tanggal_kembali, $username, $status_peminjam, $user_id);

// Eksekusi statement
if ($stmt->execute()) {
    // Update ketersediaan buku hanya jika peminjaman berhasil dimasukkan
    // Eksekusi kueri UPDATE buku
    // Eksekusi kueri UPDATE buku
    $update_buku = mysqli_query($conn, "UPDATE buku SET ketersediaan = ketersediaan - 1 WHERE buku_id = '$buku'");

    // Periksa apakah kueri berhasil dieksekusi
    if ($update_buku) {
        // Kueri berhasil dieksekusi, lanjutkan dengan redirect
        header("Location:../admin/index_peminjam.php");
        exit();
    } else {
        // Jika ada kesalahan dalam eksekusi kueri, tampilkan pesan kesalahan
        echo "Error updating book availability: " . mysqli_error($conn);
    }
}

// Tutup statement
$stmt->close();
