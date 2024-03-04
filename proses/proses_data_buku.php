<?php
// Include database connection
include('koneksi.php');

// Informasi koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan_digital";

// Membuat koneksi ke database
$mysqli = new mysqli($server, $username, $password, $database);

// Periksa apakah terjadi kesalahan saat membuat koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Check if the form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    $kategori_id = $_POST["kategori"];
    $ketersediaan = $_POST["ketersediaan"];

    // Handle file upload for cover
    $cover = $_FILES["cover"];
    $cover_path = "uploads/" . basename($cover["name"]);
    $cover_name = $cover["name"];
    move_uploaded_file($cover["tmp_name"], $cover_path);

    // Handle file upload for PDF
    $pdf = $_FILES["pdf"];
    $pdf_path = "pdf/" . basename($pdf["name"]);
    $pdf_name = $pdf["name"];
    move_uploaded_file($pdf["tmp_name"], $pdf_path);

    // Get description from form
    $deskripsi = $_POST['deskripsi'];

    // Persiapkan statement SQL
    $stmt = $mysqli->prepare("INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, deskripsi, kategori_id, cover, ketersediaan, file_pdf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Periksa apakah statement SQL telah disiapkan dengan benar
    if ($stmt === false) {
        die("Kesalahan persiapan SQL: " . htmlspecialchars($mysqli->error));
    }

    // Bind parameter ke statement SQL
    $stmt->bind_param('sssisisss', $judul, $penulis, $penerbit, $tahun, $deskripsi, $kategori_id, $cover_name, $ketersediaan, $pdf_name);

    // Eksekusi statement SQL
    $result = $stmt->execute();

    // Periksa apakah eksekusi berhasil
    if ($result === false) {
        die("Kesalahan eksekusi SQL: " . htmlspecialchars($stmt->error));
    } else {
        echo "Buku berhasil ditambahkan!";
        header("Location:../admin/index_data_buku.php");
    }

    // Tutup statement
    $stmt->close();
}
?>
