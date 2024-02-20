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

// Fungsi untuk menghapus bookmark
function removeBookmark($conn, $userId, $bukuId)
{
    $sql_delete = "DELETE FROM koleksi_pribadi WHERE user_id = '$userId' AND buku_id = '$bukuId'";
    if ($conn->query($sql_delete) === TRUE) {
        return "Bookmark berhasil dihapus";
    } else {
        return "Error: " . $sql_delete . "<br>" . $conn->error;
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

// Mendapatkan daftar bookmark pengguna
$sql = "SELECT b.*, k.nama_kategori FROM buku b JOIN koleksi_pribadi kp ON b.buku_id = kp.buku_id JOIN user u ON u.user_id = kp.user_id JOIN buku_kategori k ON b.kategori_id = k.kategori_id WHERE u.email = '$email'";
$result = $conn->query($sql);
?>


<?php
$conn->close();
?>