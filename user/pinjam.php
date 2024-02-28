<?php
session_start();


if (!isset($_SESSION['email'])) {
    echo "Anda belum masuk. Silakan masuk terlebih dahulu.";
    exit();
}

if (!isset($_GET['id_buku'])) {
    echo "Buku tidak valid.";
    exit();
}

$bukuId = $_GET['id_buku'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

$conn = new mysqli($servername, $username, $password, $dbname);
$email = $_SESSION['user_id'];
$tanggalnow = date("Y-m-d");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "INSERT INTO peminjaman (perpus_id, buku_id, tanggal_pinjam, user_id, tanggal_kembali, status_peminjam)
        VALUES (1, '$bukuId','$tanggalnow', '$email', '0000-00-00', 'dipinjam')";
$result = mysqli_query($conn, $sql);
$resultbuku = mysqli_query($conn, "SELECT * FROM buku WHERE buku_id = $bukuId");
$fetchbuku = mysqli_fetch_assoc($resultbuku);
$ketersediaan = $fetchbuku['ketersediaan'];
$removeketersediaan = $ketersediaan - 1;
$updateketersediaan = mysqli_query($conn, "UPDATE buku SET ketersediaan='$removeketersediaan' WHERE buku_id='$bukuId'");
if ($result) {
    echo "<script>alert('Buku berhasil dipinjam.');</script>";
    header("Location: home.php");
    $_SESSION['notif'] = "Buku berhasil dipinjam";
    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
