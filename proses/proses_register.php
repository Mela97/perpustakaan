<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    // Insert data into 'user' table
    $query = "INSERT INTO `user` (perpus_id, username, password, email, nama_lengkap, alamat, role, created_at)
              VALUES (1, '$username', '$password', '$email', '$full_name', '$address', '$role', current_timestamp())";

    if ($conn->query($query)) {
        echo "Registrasi berhasil";
        header("Location:../admin/index_register.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
