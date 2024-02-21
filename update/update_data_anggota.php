<?php
// Include file konfigurasi database
include ('koneksi.php');

// Periksa apakah data POST terkirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah semua data yang diperlukan terisi
    if (isset($_POST['user_id']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['alamat'])) {
        // Tangkap data dari formulir
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        // Query untuk memperbarui informasi anggota di database
        $sql = "UPDATE user SET username='$username', email='$email', alamat='$alamat' WHERE user_id=$user_id";

        if ($conn->query($sql) === TRUE) {
            echo "Informasi anggota berhasil diperbarui.";
            header('location:../admin/index_data_anggota.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Semua data harus diisi.";
    }
} else {
    echo "Metode request tidak valid.";
}

$conn->close();
?>
