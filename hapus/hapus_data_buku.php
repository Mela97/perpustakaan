<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}

if (isset($_GET['id'])) {
    $buku_id = mysqli_real_escape_string($conn, $_GET['id']);

    $delete_query = "DELETE FROM `buku` WHERE `buku_id` = $buku_id";

    if ($conn->query($delete_query)) {
        header("Location: ../admin/index_data_buku.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Data buku tidak terhapus.";

    exit();
}

$conn->close();
