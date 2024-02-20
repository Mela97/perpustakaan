<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjam</title>
</head>
<body>

<?php
// Include database connection
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data yang dikirim dari formulir edit peminjam
    $peminjaman_id = $_POST['peminjaman_id'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $user_id = $_POST['user_id'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status_peminjam = $_POST['status_peminjam'];

    // Query untuk memperbarui data peminjam
    $query = "UPDATE `peminjaman` SET 
              `tanggal_pinjam` = '$tanggal_pinjam',
              `user_id` = '$user_id',
              `tanggal_kembali` = '$tanggal_kembali',
              `status_peminjam` = '$status_peminjam'
              WHERE `peminjaman_id` = $peminjaman_id";

    if ($conn->query($query)) {
        echo "Data peminjam berhasil diperbarui. <a href='login.php'>Kembali ke Daftar Peminjam</a>";
    } else {
        echo "Error: " . $conn->error;
    }
} elseif (isset($_GET['id'])) {
    $peminjaman_id = $_GET['id'];

    // Fetch data peminjam berdasarkan ID
    $query = "SELECT * FROM `peminjaman` WHERE `peminjaman_id` = $peminjaman_id";
    $result = $conn->query($query) or die($conn->error);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Form untuk mengedit data peminjam
        echo "<h2>Edit Peminjam</h2>";
        echo "<form action='edit_peminjam.php' method='post'>
            <input type='hidden' name='peminjaman_id' value='{$row['peminjaman_id']}'>
            <label for='tanggal_pinjam'>Tanggal Pinjam:</label>
            <input type='date' name='tanggal_pinjam' value='{$row['tanggal_pinjam']}' required><br>
            
            <label for='user_id'>ID Peminjam:</label>
            <input type='number' name='user_id' value='{$row['user_id']}' required><br>

            <label for='tanggal_kembali'>Tanggal Kembali:</label>
            <input type='date' name='tanggal_kembali' value='{$row['tanggal_kembali']}' required><br>

            <label for='status_peminjam'>Status Peminjam:</label>
            <input type='text' name='status_peminjam' value='{$row['status_peminjam']}' required><br>

            <input type='submit' value='Simpan Perubahan'>
        </form>";

    } else {
        echo "Data peminjam tidak ditemukan.";
    }

} else {
    echo "ID peminjam tidak diberikan.";
}

// Close connection
$conn->close();
?>

</body>
</html>
