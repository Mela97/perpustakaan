<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan_digital";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
