<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}

if (!isset($_SESSION['email'])) {
    echo "Anda belum masuk. Silakan masuk terlebih dahulu.";
    exit();
}

if (!isset($_GET['id_buku'])) {
    echo "Buku tidak valid.";
    exit();
}

$bukuId = $_GET['id_buku'];

$email = $_SESSION['user_id'];
$usernameuser = $_SESSION['username'];
$userid = $_SESSION['user_id'];
$tanggalnow = date("Y-m-d");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$peminjaman = mysqli_query($conn, "SELECT * FROM peminjaman WHERE user_id='$userid' AND buku_id ='$bukuId' AND status_peminjam = 'dipinjam'");
if (mysqli_num_rows($peminjaman) > 0) {
    $_SESSION['notif'] = "Buku sedang dipinjam";
    header("Location: home.php");
    exit();
} else {
    $resultbuku = mysqli_query($conn, "SELECT * FROM buku WHERE buku_id = $bukuId");
    $fetchbuku = mysqli_fetch_assoc($resultbuku);
    $ketersediaan = $fetchbuku['ketersediaan'];
    $removeketersediaan = $ketersediaan - 1;
    $updateketersediaan = mysqli_query($conn, "UPDATE buku SET ketersediaan='$removeketersediaan' WHERE buku_id='$bukuId'");
    
    // Mengatur tanggal kembali
    $tanggal_kembali = date('Y-m-d', strtotime($tanggalnow . ' + 7 days')); // Misalnya, diatur menjadi 7 hari dari tanggal pinjam
    
    $result = mysqli_query($conn, "INSERT INTO peminjaman (perpus_id, buku_id, tanggal_pinjam, user_id, username, tanggal_kembali, status_peminjam) VALUES (1, '$bukuId', '$tanggalnow', '$userid', '$usernameuser', '$tanggal_kembali', 'dipinjam')");
    
    $_SESSION['notif'] = "Buku berhasil dipinjam";
    header("Location: home.php");
}
