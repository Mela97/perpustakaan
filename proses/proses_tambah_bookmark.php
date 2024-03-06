<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['email'])) {
    // Jika belum masuk, kembalikan pesan kesalahan atau arahkan pengguna ke halaman masuk
    echo "Anda belum masuk. Silakan masuk terlebih dahulu.";
    exit();
}

// Pastikan buku_id disertakan dalam permintaan
if (!isset($_POST['buku_id'])) {
    // Jika tidak, kembalikan pesan kesalahan
    echo "Buku tidak valid.";
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

// Fungsi untuk menambahkan bookmark
function addBookmark($conn, $userId, $bukuId)
{
    $sql_insert = "INSERT INTO koleksi_pribadi (user_id, buku_id) VALUES ('$userId', '$bukuId')";
    if ($conn->query($sql_insert) === TRUE) {
        return "Bookmark berhasil ditambahkan";
    } else {
        return "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

// Mendapatkan user_id dari session
$email = $_SESSION['email'];
$sql = "SELECT user_id FROM user WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userId = $row['user_id'];
}

// Mendapatkan buku_id dari permintaan
$bukuId = $_POST['buku_id'];

// Panggil fungsi untuk menambahkan bookmark
$response = addBookmark($conn, $userId, $bukuId);

// Kirim respons
echo $response;

// Tutup koneksi
$conn->close();
?>
