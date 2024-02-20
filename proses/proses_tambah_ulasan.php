<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

// Langkah 1: Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Langkah 2: Memproses data ulasan yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buku_id = $_POST['buku_id'];
    $user_id = $_SESSION['user_id']; 
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    // Periksa apakah nilai $buku_id tidak kosong
    if (!empty($buku_id)) {
        // Langkah 3: Menyimpan ulasan ke database
        $sql = "INSERT INTO buku_ulasan (buku_id, user_id, ulasan, rating, created_at)
                VALUES ('$buku_id', '$user_id', '$ulasan', '$rating', CURRENT_TIMESTAMP)";

        if ($conn->query($sql) === TRUE) {
            // Tampilkan notifikasi ulasan berhasil ditambahkan menggunakan JavaScript
            echo "<script>alert('Ulasan berhasil ditambahkan.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Buku ID tidak valid.";
    }
}

// Tutup koneksi
$conn->close();
?>
