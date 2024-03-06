<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Memeriksa apakah data buku dikirim dari formulir edit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirim dari formulir
    $buku_id = $_POST['buku_id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $ketersediaan = $_POST['ketersediaan'];

    // Membuat kueri untuk memperbarui data buku
    if (empty($_FILES['cover']['name']) && empty($_FILES['pdf']['name'])) {
        $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', ketersediaan='$ketersediaan' WHERE buku_id=$buku_id";
    } else {
        // Handle file upload for cover
        if (!empty($_FILES['cover']['name'])) {
            $cover = $_FILES["cover"];
            $cover_path = "uploads/" . basename($cover["name"]);
            $cover_name = $cover["name"];
            move_uploaded_file($cover["tmp_name"], $cover_path);
        }

        // Handle file upload for PDF
        if (!empty($_FILES['pdf']['name'])) {
            $pdf = $_FILES["pdf"];
            $pdf_path = "pdf/" . basename($pdf["name"]);
            $pdf_name = $pdf["name"];
            move_uploaded_file($pdf["tmp_name"], $pdf_path);
        }

        // Update query with cover and PDF file information
        $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', ketersediaan='$ketersediaan'";
        if (!empty($cover_name)) {
            $sql .= ", cover='$cover_name'";
        }
        if (!empty($pdf_name)) {
            $sql .= ", file_pdf='$pdf_name'";
        }
        $sql .= " WHERE buku_id=$buku_id";
    }

    // Menjalankan kueri dan memeriksa apakah berhasil
    if ($conn->query($sql) === TRUE) {
        echo "Data buku berhasil diperbarui.";
        header("Location:../admin/index_data_buku.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
