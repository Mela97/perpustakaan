<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

// Menggunakan koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data buku_id dari permintaan AJAX
$bukuId = $_POST['buku_id'];

// Mendapatkan user_id dari session
$email = $_SESSION['email'];
$sql = "SELECT user_id FROM user WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userId = $row['user_id'];
}

// Periksa apakah buku sudah ditandai sebagai bookmark oleh pengguna
$sql = "SELECT * FROM koleksi_pribadi WHERE user_id = '$userId' AND buku_id = '$bukuId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql_delete = "DELETE FROM koleksi_pribadi WHERE user_id = '$userId' AND buku_id = '$bukuId'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Bookmark berhasil dihapus";
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
} else {
    $sql_insert = "INSERT INTO koleksi_pribadi (user_id, buku_id) VALUES ('$userId', '$bukuId')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "Bookmark berhasil ditambahkan";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
