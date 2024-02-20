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

// Proses pengembalian buku di database (contoh: update status buku)
$query = "UPDATE peminjaman SET tanggal_kembali = $tanggal_kembali,status_peminjam='dikembalikan' WHERE peminjaman_id = $id_buku";

if ($koneksi->query($query) === TRUE) {
    echo "Buku berhasil dikembalikan.";
    // header('location:../user/home.php');
} else {
    echo "Error: " . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
