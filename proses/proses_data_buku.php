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

    // Handle file upload
    $cover = $_FILES["cover"];
    $cover_path = "uploads/" . basename($cover["name"]);
    $cover_name = $cover["name"];
    move_uploaded_file($cover["tmp_name"], $cover_path);

    // Mengambil deskripsi dari formulir
    $deskripsi = $_POST['deskripsi'];

    // Memasukkan deskripsi ke dalam database
    $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, deskripsi, kategori_id, cover,ketersediaan) VALUES ('$judul', '$penulis', '$penerbit', $tahun, '$deskripsi', $kategori_id, '$cover_name','$ketersediaan')";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil ditambahkan.";
        header("Location:../admin/index_data_buku.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
