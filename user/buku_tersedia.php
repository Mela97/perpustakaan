<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}
// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan_digital");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Query untuk mengambil data buku yang tersedia
$query = "SELECT * FROM buku WHERE buku_id NOT IN (SELECT buku_id FROM peminjaman WHERE status_peminjam = 'borrowed')";

$result = mysqli_query($koneksi, $query);

// Memeriksa apakah query berhasil dieksekusi
if (!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    exit();
}

// Menampilkan data buku yang tersedia
echo "<h2>Daftar Buku Tersedia</h2>";
echo "<table border='1'>";
echo "<tr><th>ID Buku</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun Terbit</th><th>Cover</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['buku_id']."</td>";
    echo "<td>".$row['judul']."</td>";
    echo "<td>".$row['penulis']."</td>";
    echo "<td>".$row['penerbit']."</td>";
    echo "<td>".$row['tahun_terbit']."</td>";
    echo "<td><img src='".$row['cover']."' alt='Cover' style='max-width:100px; max-height:100px;'></td>";
    echo "</tr>";
}
echo "</table>";

// Menutup koneksi database
mysqli_close($koneksi);
?>
