<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

// Buat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil ID buku dari permintaan POST
$id_buku = $_GET['id_buku'];
$tanggal_kembali = date("Y-m-d");

$resultpeminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE peminjaman_id='$id_buku'");
$assocpeminjaman = mysqli_fetch_assoc($resultpeminjaman);
$bukuid = $assocpeminjaman['buku_id'];

$resultbuku = mysqli_query($koneksi, "SELECT * FROM buku WHERE buku_id='$bukuid'");
$assocbuku = mysqli_fetch_assoc($resultbuku);
$ketersediaan = $assocbuku['ketersediaan'];
$addbuku = $ketersediaan + 1;

// Proses pengembalian buku di database (contoh: update status buku)
$query = "UPDATE peminjaman SET tanggal_kembali = $tanggal_kembali,status_peminjam='dikembalikan' WHERE peminjaman_id = $id_buku";
$querybuku = mysqli_query($koneksi, "UPDATE buku SET ketersediaan='$addbuku' WHERE buku_id='$bukuid'");
if ($koneksi->query($query) === TRUE) {
    header('location:../user/home.php');
} else {
    echo "Error: " . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
