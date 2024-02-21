<?php
// Include database connection
include('koneksi.php');

// Check if the form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    $kategori_id = $_POST["kategori"];
    $ketersediaan = $_POST["ketersediaan"];
    $perpus_id = $_POST["perpus_id"];


    // Handle file upload
    $cover = $_FILES["cover"];
    $cover_path = "uploads/" . basename($cover["name"]);
    $cover_name = $cover["name"];
    move_uploaded_file($cover["tmp_name"], $cover_path);

    // Mengambil deskripsi dari formulir
    $deskripsi = $_POST['deskripsi'];
    // Prepare an SQL statement
    $sql = "INSERT INTO buku (perpus_id,judul, penulis, penerbit, tahun_terbit, deskripsi, kategori_id, cover, ketersediaan) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("isssisiss",$perpus_id, $judul, $penulis, $penerbit, $tahun, $deskripsi, $kategori_id, $cover_name, $ketersediaan);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Buku berhasil ditambahkan.";
        header("Location:../admin/index_data_buku.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
}
